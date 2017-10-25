<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Post;
use App\Tag;
use App\Category;
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

        $tags = Tag::orderBy('name')->get();

        $thumbnailFolder = $this->thumbnailPath;
    	$posts = Post::orderBy('id','DESC')->limit('6')->get();

    	$post = Post::first();

    	return view('frontend.index', compact('menus','posts','thumbnailFolder','tags','post'));
    }

    public function show($category,$id)
    {
        $menus = Menu::all();
        $tags = Tag::orderBy('name')->get();

        $post = Post::findOrFail($id);
        $posts = Post::orderBy('id','DESC')->limit('3')->get();

        return view('frontend.show',compact('menus','posts','thumbnailFolder','tags','post'));
    }

    public function listByKeyword($keyword)
    {
        $menus = Menu::all();

        $tags = Tag::orderBy('name')->get();

        $thumbnailFolder = $this->thumbnailPath;

        $posts = Post::orderBy('id','DESC')->limit('3')->get();

        if(count(Menu::where('menu_link',$keyword)->first()))
        {
            $postList = Menu::where('menu_link',$keyword)->first();

            return view('frontend.list', compact('menus','postList','thumbnailFolder','tags','posts'));
        }

        elseif(count(Category::where('category_link',$keyword)->first()))
        {
            $postList = Category::where('category_link',$keyword)->first();

            return view('frontend.list', compact('menus','postList','thumbnailFolder','tags'));
        }
    }
}
