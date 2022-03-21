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
// Route::get('/categories/{slug}', 'Api\CategoryController@show');

//ristoranti
// Route::get('/restaurants', 'Api\UserController@index');
Route::get('/restaurants/details/{slug}', 'Api\UserController@show');
// Route::get('/restaurants/{query}', 'Api\UserController@search');
Route::post('/restaurants/advanced', 'Api\UserController@advancedSearch');

//tags
Route::get('/tags', 'Api\TagController@index');
// Route::get('/tags/{slug}', 'Api\TagController@show');

//types
// Route::get('/types', 'Api\TypeController@index');
// Route::get('/types/{slug}', 'Api\TypeController@show');

//braintree
Route::get('orders/generate', 'Api\OrderController@generate');
Route::post('orders/make/payment', 'Api\OrderController@makePayment');

//orders
Route::post('/orders/sending', 'Api\OrderController@store');
