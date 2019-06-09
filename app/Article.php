<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $guarded = [];

    /**
     * this attribute tells model to append computed atributes
     * to json representation of models
     * @var array
     */
    protected $appends=['wished', 'rating_by_user', 'average_rating'];
    public function photos()
    {
    	return $this->belongsToMany(Photo::class);
    }

    public function attachPhotos($photos){

            $this->photos()->sync($photos);
    }

    public function getSmallPhoto()
    {
        return $this->photos->first()->thumbnail_small;
    }

    public function getThumbnail()
    {
        return $this->photos->first()->thumbnail_path;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
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

    public function getAverageRatingAttribute()
    {
        return $this->avgRating();
    }
    /**
     * returns rating by $user
     * @param  [App\User] $user [user instance]
     * @return [integer]       [Rating given by $user]
     */
    public function ratingByUser()
    {
        if(!auth()->user() || !$this->ratings->where('user_id',auth()->id())->count()){
            return 0;
            }
        return Rating::where(
            [
                'article_id'=>$this->id, 
                'user_id'=>auth()->id()
            ])->first()->rating;
    }

    public function getRatingByUserAttribute(){
        return $this->ratingByUser();
    }

    public function belongsToCategory(Category $category)
    {
        return in_array($category->name, $this->categories->pluck('name')->all());
    }

    public function getPriceAttribute($price)
    {
        return round($price,2);
    }

    public function discountedPrice()
    {
        return $this->price*((100-$this->discount)/100);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function isWished(){
        if($this->users->find(auth()->id()) === null){
            return false;
        }
        return true;
    }

    public function getWishedAttribute(){
        return $this->isWished();
    }

}


