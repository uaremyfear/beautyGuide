<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\SubCategory;
use App\Category;
use App\User;
use App\Traits\ManagesImages;
use App\MarketingImage;
use App\Day;

class HomeController extends Controller
{
    use ManagesImages;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->setImageDefaultsFromConfig('marketingImage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {#9a936a
        $products = Product::orderBy('id','DESC')->limit('8')->get();

        $feature_products = Product::where('feature','1')->get();
        
        $best_sellers = Product::where('best_seller','1')->get();

        $destinationFolder = $this->destinationFolder;
        
        return view('frontend.home',compact('best_sellers','feature_products','products','destinationFolder'));
    }

    public function showProduct($id)
    {
        $product = Product::findOrFail($id);

        $products = Category::where('id',$product->category_id)->first()->products()->where('id','!=',$product->id)->limit('4')->get();

        $destinationFolder = $this->destinationFolder;

        return view('frontend.productDetail',compact('product','products','destinationFolder'));
    }

    public function shop()
    {
        $categories = Category::all();

        $products = Product::all();

        $destinationFolder = $this->destinationFolder;

        return view('frontend.shop',compact('categories','products','destinationFolder'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function delivery()
    {
        $mon = Day::findOrFail(1)->places()->orderBy('id')->get();
        $thue = Day::findOrFail(2)->places()->orderBy('id')->get(); 
        $wed = Day::findOrFail(3)->places()->orderBy('id')->get(); 
        $thur = Day::findOrFail(4)->places()->orderBy('id')->get();
        $fri = Day::findOrFail(5)->places()->orderBy('id')->get();
        $sat = Day::findOrFail(6)->places()->orderBy('id')->get();        
        return view('frontend.delivery',compact('mon','thue','wed','thur','fri','sat'));
    }
}
