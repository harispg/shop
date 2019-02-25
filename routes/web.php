<?php

use Illuminate\Http\Request;


Route::get('/', function () {
    return view('home');
});
Route::get('plan', function(){
	flash()->success('Usao si u plan', 'bole te brige');
	return view('PLAN');
})->middleware(['auth','role:Admin']);




Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('articles', 'ArticlesController');

Route::get('/login/google', 'Auth\LoginController@redirectToGoogle')->name('loginGoogle');
Route::get('google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::post('/findPhotos', 'Api\ApiPhotosController@find');

Route::get('/photosUpload', 'PhotosController@index')->name('photosUpload');
Route::post('/photos', 'PhotosController@store')->name('addingPhotos');
Route::delete('/photos/{photo}', 'PhotosController@destroy')->name('photoDelete');

Route::get('admin', function(){
	return view('admin.master');
});



Route::resource('categories', 'CategoriesController');

Route::post('/file-upload', function(){});