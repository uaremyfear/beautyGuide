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

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function categories()
    {
    	return $this->hasMany(Category::class);
    }

    protected $appends = ['title','link'];

    public function getTitleAttribute()
    {
        return $this->menu_name;
    }

    public function getLinkAttribute()
    {
        return $this->menu_link;
    }
}
