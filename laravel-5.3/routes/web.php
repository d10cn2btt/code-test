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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/user', 'UserController@index');

Route::get('/notes', 'NotesController@index');
Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('cart', 'CartController');
Route::get('cart-index-data', ['as' => 'cart.index.data', 'uses' => 'CartController@cartIndexData']);

Route::resource('category', 'CategoryController');
Route::get('category-index-data', ['as' => 'category.index.data', 'uses' => 'CategoryController@cateIndexData']);

Route::resource('product', 'ProductController');
Route::get('product-index-data', ['as' => 'product.index.data', 'uses' => 'ProductController@productIndexData']);