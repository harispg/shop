<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthTokensController extends Controller
{
    public function getUser(){
    	return auth()->user() ?: 'Unauthenticated';
    }

    public function getTokens(Request $request)
    {
    	if(! auth()->check()){
	    	return response()->json(
	    		[
	    			'API_TOKEN' => 'Unauthenticated', 
	    			'CSRF_TOKEN' => 'Session expired'
	    		]
	    	);
	    }
	    return response()->json(
	    	[
	    		'API_TOKEN'=>$request->user()->api_token, 
	    		'CSRF_TOKEN' => $request->session()->has('_token') ? $request->session()->token():'Session expired'
	    	]
	    );
    }
}
