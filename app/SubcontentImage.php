<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ShowsImages;

class SubcontentImage extends Model
{
    use ShowsImages;

	protected $fillable = [
	'sub_content_id',
	'image_name',
	'image_extension'];
}
