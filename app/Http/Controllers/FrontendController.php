<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Post;
use App\MarketingImage;
use App\Traits\ManagesImages;

class FrontendController extends Controller
{
	use ManagesImages;

    public function __construct()
    {
        $this->setImageDefaultsFromConfig('marketingImage');
    }

    public function index()
    {
    	$menus = Menu::all();
    	$destinationFolder = $this->destinationFolder;
    	$posts = Post::orderBy('id','DESC')->limit('3')->get();

    	$latest1 = Post::orderBy('id','DESC')->first();    	
    	$latest2 = Post::orderBy('id','DESC')->whereNotIn('id',[$latest1->id])->first();
    	$latest3 = Post::orderBy('id','DESC')->whereNotIn('id',[$latest1->id,$latest2->id])->first();

    	return view('frontend.index',compact('menus','posts','destinationFolder','latest1','latest2','latest3'));
    }
}
