<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $guarded = [];
    public function photos()
    {
    	return $this->hasMany(Photo::class);
    }

    public function attachPhotos($photos){

    		$this->photos()->saveMany($photos);
    }
}
