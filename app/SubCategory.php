<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{

	protected $fillable = ['sub_name','slug','category_id'];

	protected $appends = ['category'];

	public function getCategoryAttribute($value)
    {
        return $this->category()->first()->category_name;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
