<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static $rulesWithImage = [
        'title' => 'required',
        'content' => 'required',
        'prefix'=> 'required|max:4|min:3',
        'author_id' => 'required',
        'image' => 'required|mimes:jpeg,jpg,bmp,png|max:2097152',
        'tag_id' => 'required'
    ];

    public static $rules = [
        'title' => 'required',
        'content' => 'required',
        'prefix'=> 'required|max:4',
        'author_id' => 'required',
        'tag_id' => 'required'
    ];

    public static $firstrules = [
        'title' => 'required',
        'prefix'=> 'required|max:4',
        'author_id' => 'required',
        'tag_id' => 'required'
    ];

    protected $fillable = [  
    'title','prefix', 'content' , 'author_id' ];

    public function author()
    {
    	return $this->belongsTo(Author::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function picture()
    {
        return $this->hasOne(MarketingImage::class);
    }

    public function subContents()
    {
        return $this->hasMany(SubContent::class);
    }

    public function getActive($value)
    {
    	if ($value == 1) {
    		$value="true";
    	}

    	$value="true";
    }

    // public function getPrefixAttribute($value)
    // {
    //     $prefix = explode('-', $value);
    //     return $prefix[1];
    // }

    public function setPrefixAttribute($value)
    {
        $this->attributes['prefix'] = mt_rand(1000,10000).'-'.$value;
    }

    public function getPrefix()
    {  
        return explode('-', $this->prefix)[1];
    }
}
