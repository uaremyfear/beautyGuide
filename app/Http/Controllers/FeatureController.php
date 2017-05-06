<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ManagesImages;
use App\MarketingImage;
use App\Product;

class FeatureController extends Controller
{
	use ManagesImages;

	public function __construct()
	{
		$this->setImageDefaultsFromConfig('marketingImage');
	}

	public function showFeature()
	{
		$products 	= 	Product::where('feature','=','0')->get();
		$features	=  	Product::where('feature','=','1')->get();

		$destinationFolder = $this->destinationFolder;

		return view('backend.feature.feature',compact('features','products','destinationFolder'));
	}

	public function storeFeature(Request $request)
	{
		DB::table('products')
		->update(['feature' => 0]);

		if (count($request->feature)>0) {
			DB::table('products')
			->whereIn('id',$request->feature)
			->update(['feature' => 1]);
		}
		return redirect()->back();        
	}

	public function showBest()
	{
		$products 	= 	Product::where('best_seller','=','0')->get();
		$best_sellers	=  	Product::where('best_seller','=','1')->get();

		$destinationFolder = $this->destinationFolder;

		return view('backend.feature.best',compact('products','best_sellers','destinationFolder'));
	}

	public function storeBest(Request $request)
	{

		DB::table('products')
		->update(['best_seller' => 0]);

		if (count($request->best_seller)>0) {
			DB::table('products')
			->whereIn('id',$request->best_seller)
			->update(['best_seller' => 1]);
		}
		return redirect()->back();        
	}

	public function editBanner()
	{
		return view('backend.feature.banner');
	}

	public function updateBanner(Request $request)
	{
		
		$this->validate($request,[
			'image' => 'required|mimes:jpeg,jpg,bmp,png|max:2097152'
			]);

		$path = $request->file('image')->storeAs(
				public_path('banner'),'banner'.'.'.$request->file('image')->getClientOriginalExtension()
			);

		return $path;

		// $this->setImageDefaultsFromConfig('marketingImage');

		// File::delete(public_path($destination) .
  //           $modelImage->image_name . '.' .
  //           $modelImage->image_extension);

		// $marketingImage = new MarketingImage([
		// 	'image_name'        => 'banner',
		// 	'product_id'        => '1',
		// 	'image_extension'   => $request->file('image')->getClientOriginalExtension(),
		// 	]);

		

		// $file = $this->getUploadedFile();

  //       // pass in the file and the model

		// $this->saveImageFiles($file, $marketingImage);

		return view('backend.feature.banner');
	}
}
