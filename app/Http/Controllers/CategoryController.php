<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
    	return view('backend.category.index',compact('categories'));
    }

    public function create()
    {
    	return view('backend.category.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'category_name' => 'required|string|max:50|unique:categories,category_name'
    		]);
		
		$slug = str_slug($request->category_name, "-");

		Category::create([
				'category_name' => $request->category_name,
				'slug' => $slug
			]);

        return redirect('gotg/category');
    }

    public function edit($id)
    {
    	$category = Category::findOrFail($id);

    	return view('backend.category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
            'category_name' => 'required|string|max:50|unique:categories,category_name,' .$id
            ]);

    	$slug = str_slug($request->name, "-");

    	$category = Category::findOrFail($id); 

    	$category->update([
				'category_name' => $request->category_name,
				'slug' => $slug
			]);

        return redirect('gotg/category');
    }
}
