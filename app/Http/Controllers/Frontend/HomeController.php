<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $blog_search = $request['blog_search'] ?? null;
        if($blog_search != null){
            $blogs = Blog::where('name', 'like', "%$blog_search%")
            ->with('images')
            ->orderBy('id', 'desc')
            ->paginate(6);
            
        } else {        
            $blogs = Blog::with('images')->orderBy('id', 'desc')->paginate(6);
        }
        return view('home', compact(['blog_search', 'blogs']));
    }
    
    public function showDetail($slug)
    {
        $blog = Blog::where('slug', $slug)->with('images')->first();

        // dd($blog);
        return view('blogs/detail', compact('blog'));
    }
    
    public function relatedCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();

        $title = $category->name;
        $categories = $category->blogs;

        return view('blogs/related-categories', compact(['categories','title']));
    }

    public function relatedTag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        
        $title = $tag->name;
        $tags = $tag->blogs;

        return view('blogs/related-tags', compact(['tags','title']));
    }
    
}
