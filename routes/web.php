<?php


Route::get('/', function () {
    return view('home');
});
Route::get('plan', function(){
	return view('PLAN');
})->middleware('role:Admin');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify', function(){
	return view('auth.verify');
});

Route::get('/login/google', 'Auth\LoginController@redirectToGoogle')->name('loginGoogle');
Route::get('google/callback', 'Auth\LoginController@handleGoogleCallback');