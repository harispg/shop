<?php

use Illuminate\Http\Request;


Route::get('/', function () {
    return view('home');
});
Route::get('plan', function(){
	return view('PLAN');
})->middleware(['auth','role:Admin']);




Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('articles', 'ArticlesController');

Route::get('/login/google', 'Auth\LoginController@redirectToGoogle')->name('loginGoogle');
Route::get('google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::post('/findPhotos', 'Api\ApiPhotosController@find');
Route::post('/allPhotos', 'Api\ApiPhotosController@allPhotos');

Route::get('/photosUpload', 'PhotosController@index')->name('photosUpload');
Route::post('/photos', 'PhotosController@store')->name('addingPhotos');
Route::delete('/photos/{photo}', 'PhotosController@destroy')->name('photoDelete');

Route::get('admin', function(){
	return view('admin.master');
});


Route::get('categories/create', 'CategoriesController@create')->name('categories');
Route::post('categories', 'Api\ApiCategoriesController@store');
Route::PATCH('categories/{category}', 'Api\ApiCategoriesController@update');
Route::delete('categories/{category}', 'Api\ApiCategoriesController@destroy');

Route::post('/articles/{article}/comment', 'CommentsController@store')->name('comments.store');
Route::post('/ratings/{article}', 'RatingsController@store');
Route::post('/file-upload', function(){});