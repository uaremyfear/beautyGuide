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

        // $pro1 = Product::findOrFail('1');
        // dd($pro1->picture()->first());
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
            'price' => 'integer|min:0',
            'description' => 'required',
            'sub_category_id' => 'required|integer',
            'image' => 'required|mimes:jpeg,jpg,bmp,png|max:2097152'
            ]);

        $slug = str_slug($request->name, "-");

        $category_id = SubCategory::where('id',$request->sub_category_id)->first()->category()->first()->id;
        
        $product = Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'price' => $request->price,
            'description' => $request->description,
            'sub_category_id' => $request->sub_category_id,
            'category_id' => $category_id
            ]);

        $this::storeImage($request,$product);

        alert()->success('Product', 'Product Created!');

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
        $product = Product::findOrFail($id);

        $destinationFolder = $this->destinationFolder;

        return view('backend.product.show',compact('product','destinationFolder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $subcategories = SubCategory::orderBy('sub_name')->get();

        $categories = Category::select('id','category_name')->orderBy('category_name')->get();

        $thumbnailPath = $this->thumbnailPath;

        return view('backend.product.edit',compact('product','categories','subcategories','thumbnailPath'));
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
        if ($request->hasFile('image')) {
            $this->validate($request,[
                'name' => 'required',
                'price' => 'integer|min:0',
                'description' => 'required',
                'sub_category_id' => 'required|integer',
                'image' => 'required|mimes:jpeg,jpg,bmp,png|max:2097152'
                ]);
        }
        else {
            $this->validate($request,[
                'name' => 'required',
                'price' => 'integer|min:0',
                'description' => 'required',
                'sub_category_id' => 'required|integer',
                ]);;
        }

        $slug = str_slug($request->name, "-");
        
        $category_id = SubCategory::where('id',$request->sub_category_id)->first()->category()->first()->id;
        
        $product= Product::findOrFail($id);

        $product->name = $request->name;
        $product->slug = $slug;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->sub_category_id = $request->sub_category_id;
        $product->category_id = $category_id;
        $product->save();

        if ($request->hasFile('image')) {
             $this::updateImage($request,$product);
        }
        // $this::storeImage($request,$product);

        alert()->success('Product', 'Product Edited!');

        return redirect('gotg/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $marketingImage = MarketingImage::findOrFail($product->picture()->first()->id);

        $this->deleteExistingImages($marketingImage);

        MarketingImage::destroy($id);

        Product::destroy($id);

        alert()->error('Notice', 'Product deleted!');

        return redirect()->route('product.index');        
    }

    public function storeImage($request, $product)
    {
        $this->setImageDefaultsFromConfig('marketingImage');
        
        $marketingImage = new MarketingImage([
            'image_name'        => $product->slug .'-'. mt_rand(10,10000),
            'product_id'        => $product->id,
            'image_extension'   => $request->file('image')->getClientOriginalExtension(),
            ]);


        $marketingImage->save();

        // get instance of file

        $file = $this->getUploadedFile();

        // pass in the file and the model

        $this->saveImageFiles($file, $marketingImage);
    }

    public function updateImage($request, $product)
    {
        $marketingImage = MarketingImage::findOrFail($product->picture()->first()->id);

        // if file, we have additional requirements before saving

        if ($this->newFileIsUploaded()) {
            $this->deleteExistingImages($marketingImage);
            $this->setNewFileExtension($request, $marketingImage);
        }

        $marketingImage->save();

        // check for file, if new file, overwrite existing file

        if ($this->newFileIsUploaded()){
            $file = $this->getUploadedFile();
            $this->saveImageFiles($file, $marketingImage);
        }
    }

     /**
     * @param EditImageRequest $request
     * @param $marketingImage
     */

    private function setNewFileExtension($request, $marketingImage)
    {
        $marketingImage->image_extension = $request->file('image')->getClientOriginalExtension();
    }

    /**
     * @param EditImageRequest $request
     * @param $marketingImage
     */

    private function setUpdatedModelValues(EditImageRequest $request, $marketingImage)
    {
        $marketingImage->is_active = $request->get('is_active');
        $marketingImage->is_featured = $request->get('is_featured');
    }
}
