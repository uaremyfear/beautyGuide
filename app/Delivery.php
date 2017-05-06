<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = ['place','price'];

    public function days()
    {
    	return $this->belongsToMany(Day::class);
    }
}
