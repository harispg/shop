<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
    	
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
        $articles = Article::with(['photos', 'categories'])
        					->orderBy($sortBy, $ascDesc)
        					->where('name', 'like', '%'.$request->search.'%')
        					->orWhere('sku', 'like', '%'.$request->search.'%')
        					->paginate($perPage);
        return view('articles.index', compact(['articles', 'perPage', 'sortBy', 'ascDesc']));
    }
}
