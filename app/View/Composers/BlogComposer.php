<?php

namespace App\View\Composers;

use App\Models\Blog;
use Illuminate\View\View;

class BlogComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('blogs', Blog::orderBy('id', 'desc')->paginate(6));
    }

} 
