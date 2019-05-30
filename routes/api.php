<?php

use Illuminate\Http\Request;



Route::group(['middleware' => ['auth:api']], function () {
Route::get('articles', 'Api\ApiArticlesController@index');

Route::post('/photos', 'Api\ApiPhotosController@store');
Route::post('/findPhotos', 'Api\ApiPhotosController@find');
Route::post('/allPhotos', 'Api\ApiPhotosController@allPhotos');
Route::delete('photosDelete', 'Api\ApiPhotosController@delete');

Route::post('categories', 'Api\ApiCategoriesController@store');
Route::PATCH('categories/{category}', 'Api\ApiCategoriesController@update');
Route::delete('categories/{category}', 'Api\ApiCategoriesController@destroy');

Route::delete('articles/{article}','Api\ApiArticlesController@destroy')->middleware('can:api|articles.create');
Route::post('articles/{article}/new', 'Api\ApiArticlesController@changeNewAttribute')->middleware('can:api|articles.modify');
Route::post('articles/{article}/featured', 'Api\ApiArticlesController@changeFeaturedAttribute')->middleware('can:api|articles.modify');



Route::post('items/{item}', 'Api\ApiItemsController@add');
Route::delete('items/{item}', 'Api\ApiItemsController@destroy');

Route::post('users/{user}/role/{role}', 'Api\ApiUsersController@changeRole')->middleware('can:api|users.work');
Route::post('users/superAdmin/{user}', 'Api\ApiUsersController@toggleSupperAdmin')->middleware('isSuper:api');



});
    //




