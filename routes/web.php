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

Route::get('/', 'SiteController@index')->name('home');

Route::group(['prefix' => 'site'], function () {
    Route::get('read', 'SiteController@read');
    Route::get('about', 'SiteController@about');

    Route::match(['get','post'], 'contact', 'SiteController@contact')->name('siteContact');

    Route::get('site/{id}', 'SiteController@index');
});

Auth::routes();