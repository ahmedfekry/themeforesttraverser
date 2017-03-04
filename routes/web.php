<?php

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

Route::get('/category/{category}', "ItemController@index");
Route::get('/category/{category}/items/{slug}', "ItemController@index");
// Route::get('items/{slug}', "ItemController@show");
// Route::get('items/{item}', "ItemController@show");
