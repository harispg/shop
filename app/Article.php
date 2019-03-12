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


    /**
     * [getComments -  getting all comments for the article]
     * @return [Illuminate\Support\Collection] [Collection of comments]
     */
    public function getComments()
    {
        $allComments = $this->comments()->with('owner')->get()->groupBy('parent_id');

        if(isset($allComments[""])){
            $allComments['root'] = $allComments[""];  
            unset($allComments[""]);
        }else{
        $allComments['root']=[]; 
        }

        return $allComments;
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
        return number_format($this->ratings()->avg('rating'), 1);
    }
    /**
     * returns rating by $user
     * @param  [App\User] $user [user instance]
     * @return [integer]       [Rating given by $user]
     */
    public function ratingByUser($user)
    {
        if(!$user || !$this->ratings->where('user_id',$user->id)->count()){
            return 0;
            }
        return Rating::where(
            [
                'article_id'=>$this->id, 
                'user_id'=>$user->id
            ])->first()->rating;
    }

}


