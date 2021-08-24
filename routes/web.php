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
Route::get('/', function () {
    return view('welcomes');
});
*/

Route::get('/', 'ProductsController@index')->name('product');
Route::get('/details/{id}', 'ProductsController@show')->name('product.details');
Route::get('/add', 'ProductsController@create')->name('product.add');
Route::post('/save', 'ProductsController@store')->name('product.save');
Route::get('/edit/{id}', 'ProductsController@edit')->name('product.edit');
Route::post('/update', 'ProductsController@update')->name('product.update');
Route::get('/delete/{id}', 'ProductsController@destroy')->name('product.delete');


Route::get('/test', 'ProductsController@prod')->name('product.test');


//Authentication
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
