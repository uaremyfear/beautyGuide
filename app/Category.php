<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name','menu_id','category_link'];

    public static $rules = [
    	'category_name'=>'required|unique:categories',
    	'menu_id'=>'required'
    ];
    
	public static $editRules = [
    	'category_name'=>'required',
    	'menu_id'=>'required'
    ];
    

    public function menu()
    {
    	return $this->belongsTo(Menu::class);
    }

    public function posts()
    {
    	return $this->belongsToMany(Post::class);
    }
}
