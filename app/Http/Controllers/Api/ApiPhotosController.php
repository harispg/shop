<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class ApiPhotosController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth','can:photos.work']);
	}
    public function find(Request $request)
    {
    	$typedIn = $request->searchQuery;
    	$photos = Photo::where('name', 'like', "%$typedIn%")->get();
    	return $photos;
    }

    public function allPhotos(Request $request)
    {
    	return Photo::latest()->get();
    }

    public function delete(Request $request)
    {
        foreach ($request->photos as $id) {
            $photo = Photo::find($id);
            File::delete($photo->path);
            File::delete($photo->thumbnail_path);
            $photo->delete();
        }

        return Photo::latest()->get();
    }
}
