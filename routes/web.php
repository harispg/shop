<?php

use App\Article;
use App\Category;
use App\Mail\InactiveWarningMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


Route::get('/', function () {
	$categories = Category::has('articles')->get();
	$articles = Article::where('featured', true)->get();
    return view('home', compact('categories', 'articles'));
})->name('home');
Route::redirect('/home', '/');
Route::get('plan', function(){
	return view('PLAN');
})->middleware(['auth']);//,role:admin

// Getting user for api
Route::get('authUser', function() {
    return auth()->user() ?: 'Unauthenticated';
});

//For checking if user is authenticated before API requests
Route::get('/userTokensForApiAuthentication', function (Request $request) {
    if(! auth()->check()){
    	return response()->json(
    		[
    			'API_TOKEN' => 'Unauthenticated', 
    			'CSRF_TOKEN' => 'Session expired'
    		]
    	);
    }
    return response()->json(
    	[
    		'API_TOKEN'=>$request->user()->api_token, 
    		'CSRF_TOKEN' => $request->session()->has('_token') ? $request->session()->token():'Session expired'
    	]
    );
});



Auth::routes(['verify' => true]);

Route::get('/email-verification', function(){
    return view('auth.verify');
});

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

Route::get('admin/users/index', 'UsersController@index')->middleware('can:users.work')->name('admin.users.index');
Route::get('admin/users/{user}', 'UsersController@show')->middleware('can:users.work')->name('admin.users.show');


Route::get('orders/{order}/show', 'OrdersController@show')->name('orders.show');
Route::post('orders/{order}/update', 'OrdersController@update')->name('orders.update');
Route::post('orders/{order}/payment', 'OrdersController@payment')->name('orders.payment');
Route::get('orders/{user}/index', 'OrdersController@usersOrders')->name('user.orders.index');

Route::get('wishlist', 'WishlistController@index')->name('wishlist.index');


Route::get('/test', function(Request $request){
	return view('test');
});

