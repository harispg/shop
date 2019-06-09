<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Photo;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('can:articles.modify')->except(['index', 'show', 'addToActiveOrder']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
        $articles = Article::with(['photos', 'categories'])->orderBy($sortBy, $ascDesc)->paginate($perPage);
        return view('articles.index', compact(['articles', 'perPage', 'sortBy', 'ascDesc']));
    }

    public function adminIndex(Request $request)
    {
        $articles = Article::with('photos')->get();
        $categories = Category::all();
        return view('admin.articles.index', compact('articles', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $photos = Photo::latest()->get();
        $categories = Category::latest()->get();
        return view('articles.create', compact(['photos', 'categories']));
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
            'name' => 'required|min:3',
            'sku' => 'required|integer|min:10000000|max:99999999|unique:articles',
            'description' => 'required|min:10',
            'quantity' => 'required|integer',
            'discount' => 'integer|min:0|max:99',
            'price' => "required|numeric", //regex:/^\d*(\.\d{1,2})?$/
            'photos' => 'required|string',
            'specification' => 'required',
            'category' => 'required',
            'tags' => 'nullable|string',
        ]);

        $photoIDs = explode('_', $request->photos);

        $article = Article::create([
            'name' => $request->name,
            'sku' => $request->sku,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount' => $request->discount,
            'specification' => $request->specification,
        ]);

        if($request->has('new')){
            $article->new = true;
            $article->save();
        }
        
        if($request->has('featured')){
            $article->featured = true;
            $article->save();
        }

        $article->photos()->sync($photoIDs);
        $article->categories()->attach($request->category);



        if($request->tags){
            $tags = Tag::makeTagsFrom($request->tags);
            $article->tags()->sync($tags);
        }


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
        $article->load('ratings');
        $allComments = $article->getComments();
        $articles = Article::where('featured',true);

        return view('articles.show', compact(['article', 'allComments', 'articles']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $photos = Photo::latest()->get();
        return view('admin.articles.edit', compact(['article', 'categories', 'photos']));
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
        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'quantity' => 'required|integer',
            'price' => "required|numeric", //regex:/^\d*(\.\d{1,2})?$/
            'discount' => 'integer|min:0|max:99',
            'photos' => 'nullable|string',
            'specification' => 'required',
            'category' => 'required',
        ]);

        $article->update([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount' => $request->discount,
            'specification' => $request->specification,
        ]);

        if($request->photos){
            $photoIDs = explode('_', $request->photos);
            $article->photos()->sync($photoIDs);
            $article->categories()->sync($request->category);
        }

        if($request->tags){
            $tags = Tag::makeTagsFrom($request->tags);
            $article->tags()->sync($tags);
        }

        if($request->has('new')){
            $article->new = true;
            $article->save();
        }
        
        if($request->has('featured')){
            $article->featured = true;
            $article->save();
        }

        flash()->success('Article updated', 'You have successfully updated your article');

        return redirect()->back();
    }

    public function addToActiveOrder(Request $request, Article $article)
    {
        auth()->user()->activeOrder()->addArticle($article, $request->quantity);
        return auth()->user()->activeOrder()->itemOfArticle($article);
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
