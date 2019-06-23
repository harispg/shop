<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

	public function __construct()
	{
		$this->middleware(['auth', 'can:categories.modify'])->except('show');
        $this->middleware('can:categories.create')->only('store')->except('show');;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::latest()->paginate(5);
        if($request->expectsJson()){
            return $categories;
        }
        return view('categories.create', compact('categories'));
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
            'description' => 'required|min:10',
            'photo' => 'required|mimes:jpg,jpeg,bmp,png',
        ]);

        $photo = Photo::makePhotosFromFiles([$request->photo]);

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description
       ]);

        $category->photos()->attach($photo);

        return response()->json($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Category $category)
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
        $articles = $category->articles()->with(['photos', 'categories'])->orderBy($sortBy, $ascDesc)->paginate($perPage);
        return view('articles.index', compact(['articles', 'perPage', 'sortBy', 'ascDesc']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'photo' => 'nullable|mimes:jpg,jpeg,bmp,png',
        ]);

        if($request->photo){
            $photo = Photo::makePhotosFromFiles([$request->photo]);
            $category->photos()->sync($photo);
        }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->updated_at = now();
        $category->save();

        $category->fresh();

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        $category->delete();
        return 'deleted';
    }
}
