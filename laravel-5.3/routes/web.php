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

Route::get('/home', 'HomeController@index');

Route::resource('user', 'UserController');
Route::resource('notes', 'NotesController');

Auth::routes();

Route::get('/home', 'HomeController@index');

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