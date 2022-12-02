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
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::post('/make-order', 'App\Http\Controllers\CartController@makeOrder')->name('makeOrder');
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cartIndex');
Route::get('/add-cart', 'App\Http\Controllers\CartController@addCart')->name('addCart');
Route::get('/checkout', 'App\Http\Controllers\CartController@checkout')->name('checkOut')->middleware('auth');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/{cat}', 'App\Http\Controllers\ProductController@showCategory')->name('showCategory');
Route::get('/{cat}/{product_id}', 'App\Http\Controllers\ProductController@show')->name('showProduct');
