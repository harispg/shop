<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiPhotosController extends Controller
{
    public function find(Request $request)
    {
    	$typedIn = $request->searchQuery;
    	$photos = Photo::where('name', 'like', "%$typedIn%")->get();
    	return $photos;
    }
}
