<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;

class ApiCategoriesController extends Controller
{
    public function update(Request $request, Category $category)
    {
    	$this->validate($request, [
    		'name' => 'required|min:2',
    		'description' => 'required|min:10',
    	]);

    	return $request;
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'photo' => 'required|mimes:jpg,jpeg,bmp,png',
        ]);

        $photo = Photo::makePhotosFromFiles([$request->photo]);

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description
       ]);

        $category->photos()->attach($photo);

        return response()->json([
            'photo' => $request->photo,
            'name' => $request->name,
            'description' => $request->description
        ]);
    }
}