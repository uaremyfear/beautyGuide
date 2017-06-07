<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubContent extends Model
{
    protected $fillable = ['post_id','title','description','priority'];
    
    public static $rulesWithImage = [
    	'post_id'	=>	'required|numeric',
    	'priority'  =>	'required|numeric',
    	'title'		=>	'required|unique:sub_contents',
    	'description'=>	'required',
    	'image' => 'required|mimes:jpeg,jpg,bmp,png|max:2097152'
    ];

    public static $rules = [
    	'post_id'	=>	'required|numeric',
    	'priority'  =>	'required|numeric',
    	'title'		=>	'required|unique:sub_contents',
    	'description'=>	'required'
    ];

    public function picture()
    {
        return $this->hasOne(SubcontentImage::class);
    }
}
