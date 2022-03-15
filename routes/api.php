<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//categorie
Route::get('/categories', 'Api\CategoryController@index');
Route::get('/categories/{slug}', 'Api\CategoryController@show');

//piatti
Route::get('/foods/{slug}', 'Api\FoodController@index');

//ristoranti
Route::get('/restaurants/details/{slug}', 'Api\UserController@show');
Route::get('/restaurants/{query}', 'Api\UserController@search');
Route::post('/restaurants/advanced', 'Api\UserController@advancedSearch');

//tags
Route::get('/tags', 'Api\TagController@index');
Route::get('/tags/{slug}', 'Api\TagController@show');

//types
Route::get('/types', 'Api\TypeController@index');
Route::get('/types/{slug}', 'Api\TypeController@show');
