<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {	
    	if($articles = auth()->user()->articles != null){
    		return view('articles.wishlist', compact('articles'));
	    }else{
	    	return view('articles.emptyWishlist');
	    }
    }
}
