<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiWishlistController extends Controller
{
    public function addRemoveWishlist(Request $request, Article $article)
    {
    	$article->users()->toggle(auth()->user()->id);
    }
}
