<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Menu;

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
        return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::pluck('menu_name','id');
        return view('backend.category.create',compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,Category::$rules);

        $request->request->add(['category_link' => $this->formatLink(strtolower($request->category_name))]);

        Category::create($request->all());

        alert('Success','Category Created');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $menus = Menu::pluck('menu_name','id');
        return view('backend.category.edit',compact('menus','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $this->validate($request,Category::$editRules);

        $request->request->add(['category_link' => $this->formatLink(strtolower($request->category_name))]);

        $category->update($request->all());

        alert('Success','Category Updated');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if(count($category->posts()->get()))
        {
            alert('Error','This cateogyr has posts, cant delete');
        }
        else
        {
            Category::destroy($id);
        }

        return redirect()->back();
    }

    private function formatLink($string) 
    {   
        $string =  rtrim($string);
        $string = str_replace(' ', '-',$string); // Replaces all spaces with hyphens.
        return $string; // Removes special chars.
    }
}
