<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','slug','description','category_id','sub_category_id'];

    public function picture()
    {
    	return $this->hasOne(MarketingImage::class);
    }
}
