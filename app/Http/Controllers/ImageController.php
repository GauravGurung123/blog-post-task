<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        // $blog = new Blog();
        // $blog->id = 0;
        // $blog->exists = true;
        
        $imgName = time().$request->file('upload')->getClientOriginalName();
        
        $request->file('upload')->move(public_path('images/blogs'), $imgName);

        $url = asset('images/blogs/'.$imgName);

        return response()->json([
            'url' => $url,
        ]);
    }
}
