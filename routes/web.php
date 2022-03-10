<?php

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
Auth::routes();

// Rotte area Admin
Route::middleware('auth')->namespace('Admin')->prefix('admin')->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');
});

// Rotte pubbliche
Route::get('/', function () {
    return view('front');
});