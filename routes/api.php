<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api']], function () {

Route::post('/photos', 'Api\ApiPhotosController@store');
Route::post('/findPhotos', 'Api\ApiPhotosController@find');
Route::post('/allPhotos', 'Api\ApiPhotosController@allPhotos');
Route::delete('photosDelete', 'Api\ApiPhotosController@delete');

Route::post('categories', 'Api\ApiCategoriesController@store');
Route::PATCH('categories/{category}', 'Api\ApiCategoriesController@update');
Route::delete('categories/{category}', 'Api\ApiCategoriesController@destroy');

});
    //




