<?php

use App\Article;
use App\Category;
use Illuminate\Http\Request;


Route::get('/', function () {
	$categories = Category::has('articles')->get();
	$articles = Article::where('featured', true)->get();
    return view('home', compact('categories', 'articles'));
})->name('home');
Route::redirect('/home', '/');
Route::get('plan', function(){
	return view('PLAN');
})->middleware(['auth']);//,role:admin




Auth::routes(['verify' => true]);

Route::get('admin', function(){
	return view('admin.master');
})->middleware(['auth', 'can:articles.modify']);

Route::get('/admin/articles', 'ArticlesController@adminIndex')->middleware('can:articles.edit')->name('admin.articles.index');

Route::get('articles/new', function(){
	$articles = Article::where('new', true)->paginate(8);
	return view('articles.index', compact('articles'));
})->name('articles.new');
Route::resource('articles', 'ArticlesController');




Route::get('/login/google', 'Auth\LoginController@redirectToGoogle')->name('loginGoogle');
Route::get('google/callback', 'Auth\LoginController@handleGoogleCallback');


Route::get('/photos', 'PhotosController@index')->name('photos.index');
Route::delete('/photos/{photo}', 'PhotosController@destroy')->name('photoDelete');


Route::get('categories/create', 'CategoriesController@create')->name('categories');
Route::get('categories/{category}', 'CategoriesController@show')->name('categoryArticles');


Route::post('/comments/{article}', 'CommentsController@store')->name('comments.store');
Route::delete('/comments/{comment}', 'CommentsController@destroy');
Route::post('/ratings/{article}', 'RatingsController@store');


Route::get('/tags/{tag}', 'TagsController@show')->name('tags.articles');

Route::get('users/index', 'UsersController@index');
Route::get('users/{user}', 'UsersController@show')->name('admin.users.show');

