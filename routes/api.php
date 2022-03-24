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

//ristoranti
Route::get('/restaurants/details/{slug}', 'Api\UserController@show');
Route::post('/restaurants/advanced', 'Api\UserController@advancedSearch');

//tags
Route::get('/tags', 'Api\TagController@index');

//braintree
Route::get('orders/generate', 'Api\OrderController@generate');
Route::post('orders/make/payment', 'Api\OrderController@makePayment');

//orders
Route::post('/orders/sending', 'Api\OrderController@store');
Route::get('/orders/{date}', 'Api\OrderController@date');
