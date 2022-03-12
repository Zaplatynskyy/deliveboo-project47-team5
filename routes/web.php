<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Rotte Autenticazione
Auth::routes(['verify' => true]);

// Rotte area Admin
Route::middleware('verified')->namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');

    Route::middleware('checkUser')->group(function () {
        Route::resource('foods', 'FoodController');
        Route::get('/orders', 'OrderController@index')->name('orders.index');
        Route::get('/orders/{id}', 'OrderController@show')->name('orders.show');
        Route::patch('/orders/{id}/approves', 'OrderController@update')->name('orders.approves');
        Route::patch('/orders/{id}/disapproves', 'OrderController@disapproves')->name('orders.disapproves');
    });

    Route::middleware('checkAdmin')->group(function () {
        Route::resource('categories', 'CategoryController');
        Route::resource('types', 'TypeController');
        Route::resource('tags', 'TagController');
    });
});


// Rotte pubbliche
Route::get('/', function () {
    return view('front');
});
