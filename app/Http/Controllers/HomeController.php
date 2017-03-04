<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\SubCategory;
use App\Category;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_product = count(Product::all());
        $count_category = count(Category::all());
        $count_subcategory = count(SubCategory::all());
        $count_user = count(User::all());
        
        return view('admin.index',compact('count_product','count_subcategory','count_category','count_user'));
    }
}
