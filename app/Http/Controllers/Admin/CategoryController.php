<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);

        $newCategory = new Category();
        $newCategory->name = $data['name'];
        $newCategory->slug = Str::of($newCategory->name)->slug('-');
        $newCategory->save();

        return redirect()->route('categories.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->all();

        $request->validate([
            'name' => "required|unique:categories,name,{$category->id}|max:100"
        ]);

        $category->name = $data['name'];
        $category->slug = Str::of($category->name)->slug('-');
        $category->save();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        $previous = URL::previous();

        $url = '/admin/categories/'.$category->id;

        if (str_ends_with($previous, $url)) {
            return redirect()->route('categories.index');
        }
    }
}
