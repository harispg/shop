<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiArticlesController extends Controller
{
    public function destroy(Article $article)
    {
    	try{
    		$article->delete();
    		return response()->json('success');
    	}catch(Exception $e){
    		return $e;
    	}

    }
}
