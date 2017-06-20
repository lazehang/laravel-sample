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

Route::group(['prefix' => '/'], function () {
    Route::get('/',[ 'as' => 'home', 'uses' => 'SiteController@index'] );
    Route::get('contact',[ 'as' => 'contact', 'uses' => 'SiteController@contact'] );
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function () {
    Route::get('/',[ 'as' => 'index', 'uses' => 'AdminController@index']);
    Route::get('home',[ 'as' => 'home', 'uses' => 'AdminController@home']);
    Route::post('post', [ 'as' => 'post', 'uses' => 'AdminController@post']);
    Route::post('updateHead/{id}', [ 'as' => 'updateHead', 'uses' => 'AdminController@updateHead']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
