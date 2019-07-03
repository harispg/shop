<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*$this->middleware('auth');*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::has('articles')->get();
        $articles = Article::where('featured', true)->get();
        return view('home', compact('categories', 'articles'));return view('home');
    }
}
