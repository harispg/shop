<?php

use App\Article;
use App\Category;
use App\Mail\InactiveWarningMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


Route::get('/', 'HomeController@index')->name('home');
Route::redirect('/home', '/');
// Getting user for api
Route::get('authUser', 'AuthTokensController@getUser');

//For checking if user is authenticated before API requests
Route::get('/userTokensForApiAuthentication', 'AuthTokensController@getTokens');

Auth::routes(['verify' => true]);

Route::get('/email-verification', 'Auth\RegisterController@verifyEmail');

Route::get('admin', 'HomeController@admin')->middleware(['auth', 'can:articles.modify']);

Route::get('/admin/articles', 'ArticlesController@adminIndex')->middleware('can:articles.edit')->name('admin.articles.index');

Route::get('articles/new', 'ArticlesController@newArticles')->name('articles.new');

Route::resource('articles', 'ArticlesController');
Route::post('articles/{article}/addToActiveOrder', 'ArticlesController@addToActiveOrder')->name('articles.addToActiveOrder');

Route::get('/login/google', 'Auth\LoginController@redirectToGoogle')->name('loginGoogle');
Route::get('google/callback', 'Auth\LoginController@handleGoogleCallback');


Route::get('/photos', 'PhotosController@index')->name('photos.index');
Route::delete('/photos/{photo}', 'PhotosController@destroy')->name('photoDelete');


Route::get('categories/create', 'CategoriesController@create')->name('categories');
Route::get('categories/{category}', 'CategoriesController@show')->name('categoryArticles');
Route::post('categories', 'CategoriesController@store');
Route::PATCH('categories/{category}', 'CategoriesController@update');
Route::delete('categories/{category}', 'CategoriesController@destroy');


Route::post('/comments/{article}', 'CommentsController@store')->name('comments.store');
Route::delete('/comments/{comment}', 'CommentsController@destroy');

Route::post('/ratings/{article}', 'RatingsController@store');


Route::get('/tags/{tag}', 'TagsController@show')->name('tags.articles');

Route::get('admin/users/index', 'UsersController@index')->middleware('can:users.work')->name('admin.users.index');
Route::get('admin/users/{user}', 'UsersController@show')->middleware('can:users.work')->name('admin.users.show');

Route::get('orders/{order}', 'OrdersController@getOrder');
Route::get('orders/{order}/show', 'OrdersController@show')->name('orders.show');
Route::post('orders/{order}/update', 'OrdersController@update')->name('orders.update');
Route::post('orders/{order}/payment', 'OrdersController@payment')->name('orders.payment');
Route::get('orders/{user}/index', 'OrdersController@usersOrders')->name('user.orders.index');
Route::delete('orders/{order}/items/{item}', 'OrdersController@deleteItem');

Route::get('wishlist', 'WishlistController@index')->name('wishlist.index');
Route::post('wishlist/{article}', 'WishlistController@addRemoveWishlist')->name('wishlist');

Route::get('search', 'SearchController@index');
