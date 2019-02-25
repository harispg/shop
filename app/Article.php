<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $guarded = [];
    public function photos()
    {
    	return $this->belongsToMany(Photo::class);
    }

    public function attachPhotos($photos){

    		$this->photos()->sync($photos);
    }
}
