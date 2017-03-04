<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\SubCategory;
use App\Category;
use App\Traits\ManagesImages;
use App\MarketingImage;

class ProductController extends Controller
{
    use ManagesImages;

    public function __construct()
    {
        $this->setImageDefaultsFromConfig('marketingImage');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $thumbnailPath = $this->thumbnailPath;

       

        return view('backend.product.index',compact('products','thumbnailPath'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = SubCategory::orderBy('sub_name')->get();

        $categories = Category::select('id','category_name')->orderBy('category_name')->get();

        return view('backend.product.create',compact('subcategories','categories'));
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
                'name' => 'required',
                'description' => 'required',
                'sub_category_id' => 'required|integer',
                'image' => 'required|mimes:jpeg,jpg,bmp,png|max:2097152'
            ]);

        $slug = str_slug($request->name, "-");
        $category_id = SubCategory::where('id',$request->sub_category_id)->first()->category()->first()->id;
        
        $product = Product::create([
                'name' => $request->name,
                'slug' => $slug,
                'description' => $request->description,
                'sub_category_id' => $request->sub_category_id,
                'category_id' => $category_id
            ]);

        $this::storeImage($request,$product);

        return redirect('gotg/product');
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
        //
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
        //
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



    public function storeImage($request, $product)
    {
        $this->setImageDefaultsFromConfig('marketingImage');
        
        $marketingImage = new MarketingImage([
            'image_name'        => $product->slug,
            'product_id'        => $product->id,
            'image_extension'   => $request->file('image')->getClientOriginalExtension(),
        ]);


        $marketingImage->save();

        // get instance of file

        $file = $this->getUploadedFile();

        // pass in the file and the model

        $this->saveImageFiles($file, $marketingImage);

    }
}
