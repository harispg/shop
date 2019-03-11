<?php

namespace App\Http\Controllers;

use App\Article;
use App\Rating;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request, Article $article)
    {
        if(!auth()->check()){
            return response('Not Autheticated',401);
        }
    	$this->validate($request, [
    		'rating' => 'required|integer|between:1,5'
    	]);

    	$rating = Rating::updateOrCreate([
    		'article_id' => $article->id,
    		'user_id' => auth()->id(),
    	], 
    	[
    		'rating'=> $request->rating
    	]
    	);

    	return [$article->avgRating(), $article->ratingByUser(auth()->user())];
    }
}
