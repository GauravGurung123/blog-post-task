<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', Category::paginate(5));
    }

} 
