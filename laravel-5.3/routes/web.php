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

Route::get('/home', ['uses' => 'HomeController@index', 'as' => 'home']);

Route::group(['middleware' => ['auth']], function () {
    Route::resource('user', 'UserController');
    Route::resource('notes', 'NotesController');

    Route::get('/sort-cate', ['uses' => 'SortController@index', 'as' => 'sort.cate']);
    Route::get('/get-catel3/{idcate25}', ['uses' => 'SortController@getCateL3', 'as' => 'get.catel3']);
    Route::get('/get-catel35/{idcate3}', ['uses' => 'SortController@getCateL35', 'as' => 'get.catel35']);
});


Auth::routes();

Route::get('/_debugbar/assets/stylesheets', [
    'as' => 'debugbar-css',
    'uses' => '\Barryvdh\Debugbar\Controllers\AssetController@css'
]);

Route::get('/_debugbar/assets/javascript', [
    'as' => 'debugbar-js',
    'uses' => '\Barryvdh\Debugbar\Controllers\AssetController@js'
]);

Route::get('/_debugbar/open', [
    'as' => 'debugbar-open',
    'uses' => '\Barryvdh\Debugbar\Controllers\OpenController@handler'
]);