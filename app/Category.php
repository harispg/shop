<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];


    public function getThumbnailAttribute()
    {
        return $this->photos()->first()->thumbnail_path;
    }

    protected $appends = ['thumbnail'];

    public function photos()
    {
    	return $this->belongsToMany(Photo::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
