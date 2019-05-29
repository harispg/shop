<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function index()
    {	
    	if(auth()->user()->articles->count()>0){
    		$articles = auth()->user()->articles;
    		return view('articles.wishlist', compact('articles'));
	    }else{
	    	return view('articles.emptyWishlist');
	    }
    }

    public function addRemoveWishlist(Request $request, Article $article)
    {
    	$article->users()->toggle(auth()->user()->id);
        return response()->json('success');
    }
}
