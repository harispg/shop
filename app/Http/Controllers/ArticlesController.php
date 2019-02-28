<?php

namespace App\Http\Controllers;

use App\Article;
use App\Photo;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth','role:Admin'])->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(8);
        return view('articles.index', compact(['articles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photos = Photo::latest()->get();
        return view('articles.create', compact('photos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer',
            'price' => "required|numeric", //regex:/^\d*(\.\d{1,2})?$/
            'photos' => 'required|string',
            'specification' => 'required',
        ]);

        $photoIDs = explode('_', $request->photos);

        $article = Article::create([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'specification' => $request->specification,
        ]);
        

        $article->photos()->sync($photoIDs);

        flash()->success('Article created', $article->name . " is saved in database");

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact(['article']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact(['article']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
    }
}
