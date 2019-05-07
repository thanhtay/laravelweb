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

// Route::prefix('admin')->group(function() {
//     Route::get('/', 'BackendController@index');
//     Route::get('/store', 'BackendController@store');
// })->middleware('admin');
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('/', 'AdminController@index');
    Route::get('/list-user', 'UserController@listUser');
    Route::get('/control-user', 'UserController@controlUser');
});

Route::group(['prefix' => 'admin', 'middleware' => 'superAdmin'], function() {
    Route::get('/create-admin', 'AdminController@createAdmin');
    Route::get('/list-admin', 'AdminController@listAdmin');
    Route::get('/control-admin', 'AdminController@controlAdmin');
});