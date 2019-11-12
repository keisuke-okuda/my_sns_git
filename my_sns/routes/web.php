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

Route::any('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'post'], function() 
{
    Route::get('/', 'PostController@store');
    Route::post('/', 'PostController@store');
});

Route::group(['prefix' => 'follow'], function() 
{
    Route::any('/', 'FollowController@index')->name('follow');
    Route::any('store', 'FollowController@store');

});