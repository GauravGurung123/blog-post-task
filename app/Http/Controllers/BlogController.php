<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function __construct()
    {
        // category alias CategoryCountMiddleware redirect if category count is 0; 
        $this->middleware('category')->only('create');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.blogs.index', [
            'blogs' => Blog::paginate(10),
        ]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $countTag = \App\Models\Tag::count();
        
        if($countTag == 0 ) {
            return redirect()->route('admin.tags.create');
        }

        return view('dashboard.blogs.add-new', [
            'tags' => Tag::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {

       try {           
        Blog::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        $blog_id = Blog::orderBy('id', 'desc')->first();
   
        foreach ($request->category as $id) {
            DB::table('blog_category')->insert([
                'blog_id' => $blog_id->id,
                'category_id' => $id,
            ]);
        }
        
        foreach ($request->tag as $id) {
            DB::table('blog_tag')->insert([
                'blog_id' => $blog_id->id,
                'tag_id' => $id,
            ]);
        }

       } catch (\Throwable $th) {
            return redirect()->route('admin.blogs.index')->with('error', 'Failed! something went wrong');  
       } 

        // $imgName = time().$request->file('upload')->getClientOriginalName();
        
        // $request->file('upload')->move(public_path('images/blogs'), $imgName);

        // $path = 'images/blogs/'.$imgName;

        // DB::table('images')
        // ->where('imageable_id', $blog_id)
        // ->update(['path' => $path]);

       return redirect()->route('admin.blogs.index')->with('success', 'Blog added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        
        return view('dashboard.blogs.edit', [
            'blog'=> $blog,
            'tags' => Tag::all(),
            'categories' => Category::all(),
            ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog=$blog->id; 
        
        try {

            Blog::where('id', $blog)->update([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
            ]);

            DB::table('blog_category')->where('blog_id', $blog)->delete();
            DB::table('blog_tag')->where('blog_id', $blog)->delete();
            
            foreach ($request->category as $id) {
                DB::table('blog_category')->insert([
                    'blog_id' => $blog,
                    'category_id' => $id,
                ]);
            }
    
            foreach ($request->tag as $id) {
                DB::table('blog_tag')->insert([
                    'blog_id' => $blog,
                    'tag_id' => $id,
                ]);
            }

           } catch (\Throwable $th) {
                return redirect()->route('admin.blogs.index')->with('error', 'Update Failed! something went wrong');  
           } 
    
           return redirect()->route('admin.blogs.index')->with('success', 'Blog Updated successfully');
     
    }

    public function status(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        
        $request->validate(['name'=>'required|integer|digits_between:0,1']);

        if ($request->name == 0) {
            $blog->update(['status'=>1]);           
            return redirect()->route('admin.blogs.index')->with('success', 'Blog published successfully');
        }else {
            $blog->update(['status'=>0]);            
            return redirect()->route('admin.blogs.index')->with('success', 'Blog status to draft successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
        Blog::where('id',$id)->first()->delete();

        return redirect()->back()->withSuccess('blog has been Deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'first delete tags and category associated with this blog');
        }
    }
}
