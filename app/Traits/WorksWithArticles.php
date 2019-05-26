<?php

namespace App\Traits;

use App\Article;

trait WorksWithArticles{

	/**
	 * relationship with article, belongsTo
	 * @return [relationship]
	 */
	public function article()
    {
    	return $this->belongsTo(Article::class);
    }

    /**
     * Item price
     * @return [float] price of the article
     */
    public function price()
    {
    	return $this->article->price;
    }

    /**
     * total of this item
     * @return [float] total = price * quantity
     */
    public function total()
    {
    	return $this->price()*$this->quantity;
    }

    /**
     * First photo of the connected article
     * @return [App\Photo] 
     */
    public function photo()
    {
    	return $this->article->photos->first();
    }

    /**
     * Name of the article connected
     * @return [string]
     */
    public function name()
    {
    	return $this->article->name;
    }
    
    public function getNameAttribute(){
        return $this->name();
    }

    public function getPriceAttribute(){
        return $this->price();
    }

    public function getPhotoAttribute(){
        return $this->photo()->thumbnail_path;
    }

    public function getTotalAttribute(){
        return $this->total();
    }
}