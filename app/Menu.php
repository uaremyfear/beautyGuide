<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['menu_name','menu_link','active'];

    public static $rules = [
    	'menu_name'=>'required|unique:menus'
    ];

    public static $editRules = [
    	'menu_name'=>'required'
    ];

    public function categories()
    {
    	return $this->hasMany(Category::class);
    }
}
