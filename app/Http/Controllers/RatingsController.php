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

    	$this->validate($request, [
    		'rating' => 'required|integer|between:1,5'
    	]);

    	Rating::updateOrCreate(
            [
        		'article_id' => $article->id,
        		'user_id' => auth()->id(),
        	], 
        	[
        		'rating'=> $request->rating
        	]
    	);
    	return response()->json(
            [ 
                'avg' => $article->avgRating(), 
                'count' => $article->ratings->count()
            ]
        );
    }
}
