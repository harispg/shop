<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = ['name'];
    public function articles()
    {
    	return $this->belongsToMany(Article::class);
    }

    public static function makeTagsFrom($tags)
    {
    	$newTagsNames = array_map('strtolower',explode(',',$tags));
        $tagIDs=[];
        foreach ($newTagsNames as $name) {
            $tagIDs[] = Tag::firstOrCreate(["name"=> $name])->id;
        }
        
        return $tagIDs;
    }

    public function getColor()
    {
        $colors = ['green','black','red','blue','pink','purple','orange','main','cyan','bluegray','deeporange','teal'];
        return $colors[array_rand($colors)];
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    
}
