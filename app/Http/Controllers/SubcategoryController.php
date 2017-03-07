<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::orderBy('sub_name')->get();

        return  view('backend.subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('category_name')->get();

        return view('backend.subcategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'sub_name' => 'required|string|max:100|unique:sub_categories,sub_name',
            'category_id' =>'required|integer'
            ]);
        
        $slug = str_slug($request->sub_name, "-");

        SubCategory::create([
            'sub_name' => $request->sub_name,
            'category_id' => $request->category_id,
            'slug' => $slug
            ]);

        alert()->success('Sub Category', 'Sub Category Created!');

        return redirect('gotg/subcategory');
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
        $subcategory = SubCategory::findOrFail($id);

        $categories = Category::where('id','!=',$subcategory->category()->first()->id)->get();



        return view('backend.subcategory.edit',compact('subcategory','categories'));
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
        $this->validate($request,[
            'sub_name' => 'required|string|max:100',
            'category_id' =>'required|integer'
            ]);
        
        $slug = str_slug($request->sub_name, "-");

        $subcategory = SubCategory::findOrFail($id); 

        $subcategory->update([
                'sub_name' => $request->sub_name,
                'category_id' => $request->category_id,
                'slug' => $slug
            ]);       

        alert()->success('Sub Category', 'Sub Category Updated!');

        return redirect('gotg/subcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
