<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','slug','description','category_id','sub_category_id','price'];

    public function picture()
    {
    	return $this->hasOne(MarketingImage::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
    	return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
}
