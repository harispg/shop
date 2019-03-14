<?php

use App\Category;
use Illuminate\Http\Request;


Route::get('/', function () {
	$categories = Category::latest()->get();
    return view('home', compact('categories'));
});
Route::get('plan', function(){
	return view('PLAN');
})->middleware(['auth']);//,role:admin




Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', function(){
	return view('admin.master');
})->middleware(['auth', 'can:articles.modify']);

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
Route::post('/file-upload', function(){});