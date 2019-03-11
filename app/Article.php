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

    public function categories()
    {
    	return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function saveComment($comment)
    {
        $this->comments()->save($comment);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function avgRating()
    {
        return $this->ratings()->avg('rating');
    }
    /**
     * returns rating by $user
     * @param  [App\User] $user [user instance]
     * @return [integer]       [Rating given by $user]
     */
    public function ratingByUser($user)
    {
        if(!$user || !$this->ratings->count()){
            return 0;
            }
        return Rating::where(
            [
                'article_id'=>$this->id, 
                'user_id'=>$user->id
            ])->first()->rating;
    }

    /**
     * [getComments -  getting all comments for the article]
     * @return [Illuminate\Support\Collection] [Collection of comments]
     */
    public function getComments()
    {
        $allComments = $this->comments()->with('owner')->get()->groupBy('parent_id');

        if(count($allComments)){
            $allComments['root'] = $allComments[""];  
            unset($allComments[""]);
        }else{
        $allComments['root']=[]; 
        }

        return $allComments;
    }
}


