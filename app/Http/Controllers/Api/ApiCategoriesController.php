<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;

class ApiCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:categories.modify']);
        $this->middleware('can:api|categories.create')->only('store');
    }
    
    public function update(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|min:3',
    		'description' => 'required|min:10',
            'photo' => 'nullable|mimes:jpg,jpeg,bmp,png',
            'dymType' => 'alpha',
    	]);
        //TODO: return custom JSON response after validator fails
        $category = Category::find($request->categoryId);

        if($request->photo){
            $photo = Photo::makePhotosFromFiles([$request->photo], $request->dimType);
            $category->photos()->sync($photo);
        }

    	$category->name = $request->name;
        $category->description = $request->description;
        $category->updated_at = now();
        $category->save();

        return response()->json($category);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'photo' => 'required|mimes:jpg,jpeg,bmp,png',
        ]);

        $photo = Photo::makePhotosFromFiles([$request->photo], $request->dimType);

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description
       ]);

        $category->photos()->attach($photo);

        return response()->json($category);
    }

    public function destroy(Request $request)
    {
        $category = Category::find($request->categoryId);
        $category->delete();
        return response()->json('success');
    }
}