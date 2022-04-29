<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Exception;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.tags.index', [
            'tags' => Tag::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tags.add-new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        // dd($request->tag);
        try {
            $tags = explode(",", $request->get('tag'));

            foreach ($tags as $tag) {
                Tag::create([
                    'name' => $tag,
                ]);
            }
            return redirect()->route('admin.tags.index')->with('success', 'Tag added successfully');

        } catch (Exception $e) {
            return redirect()->route('admin.tags.index')->with('error', 'something went wrong');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $tag = Tag::where('slug',$slug)->firstOrFail(); 
        
        return view('dashboard.tags.edit', compact('tag') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, $id)
    {
        try {
            $tag = Tag::findOrFail($id);
            $tag->update(['name'=>$request->name]);

            return redirect()->route('admin.tags.index')->with('success', 'Tag updated successfully');

        } catch (Exception $e) {
            return redirect()->route('admin.tags.index')->with('error', 'Update failed! something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::where('id',$id)->first()->delete();

        return redirect()->back()->withSuccess('Tag has been Deleted successfully');
    }
}
