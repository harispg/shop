<?php

use Illuminate\Http\Request;


Route::get('/', function () {
    return view('home');
});
Route::get('plan', function(){
	return view('PLAN');
})->middleware('role:Admin');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('articles', 'ArticlesController');

Route::get('/login/google', 'Auth\LoginController@redirectToGoogle')->name('loginGoogle');
Route::get('google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('admin', function(){
	return view('admin.master');
});


Route::post('/ajaxPost', function(Request $request){
	dd($request->all());
});