<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ShowsImages;

class MarketingImage extends Model
{
	use ShowsImages;

	protected $table = "images";

	protected $fillable = [
	'product_id',
	'image_name',
	'image_extension'];
}
