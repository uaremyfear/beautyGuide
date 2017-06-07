<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public static $rules = [
    	'name' => 'required | min:3 | unique:authors'
    ];

    protected $fillable = ['name'];

    public function posts()
    {
    	return $this->hasMany(Post::class);
    } 
}
