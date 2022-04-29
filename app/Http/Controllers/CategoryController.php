<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Exception;

class CategoryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.categories.index', [
            'categories' => Category::paginate(10),
        ]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.add-new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            $categories = explode(",", $request->get('name'));

            foreach ($categories as $category) {
                Category::create([
                    'name' => $category,
                ]);
            }
            return redirect()->route('admin.categories.index')->with('success', 'category added successfully');

        } catch (Exception $e) {
            return redirect()->route('admin.categories.index')->with('error', 'something went wrong');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = Category::where('slug',$slug)->firstOrFail(); 
        
        return view('dashboard.categories.edit', compact('category') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update(['name'=>$request->name]);

            return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully');

        } catch (Exception $e) {
            return redirect()->route('admin.categories.index')->with('error', 'Update failed! something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id',$id)->first()->delete();

        return redirect()->back()->withSuccess('Tag has been Deleted successfully');       
    }
}
