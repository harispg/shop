<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function show(Request $request, Tag $tag)
    {
    	if(isset($request->show)){
            $perPage = $request->show;
        }else{
            $perPage = 8;
        }
        if(isset($request->sortBy)){
            $sortBy = $request->sortBy;
        }else{
            $sortBy = 'updated_at';
        }
        if(isset($request->ascDesc)){
            $ascDesc = $request->ascDesc;
        }else{
            $ascDesc = 'ASC';
        }

    	$articles = $tag->articles()->with(['photos', 'categories'])->orderBy($sortBy, $ascDesc)->paginate($perPage);


        return view('articles.index', compact(['articles', 'perPage', 'sortBy', 'ascDesc']));
    }
}
