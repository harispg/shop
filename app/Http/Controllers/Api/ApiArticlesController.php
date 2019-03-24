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

    public function changeNewAttribute(Request $request, Article $article)
    {
    	$this->validate($request, [
    		'new' => 'boolean'
    	]);

    	$article->update([
    		'new' => $request->new
    	]);
    	
    }

    public function changeFeaturedAttribute(Request $request, Article $article)
    {
    	$this->validate($request, [
    		'featured' => 'boolean'
    	]);

    	$article->update([
    		'featured' => $request->featured
    	]);
    }
}
