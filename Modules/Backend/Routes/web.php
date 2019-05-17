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
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/list-user', 'AdminUserController@listUser')->name('userAdmin.listUser');
    Route::get('/user/control-user/{id}', 'AdminUserController@controlUser')->name('userAdmin.controlUser');
    Route::post('/user/control-user/{id}', 'AdminUserController@controlUser')->name('userAdmin.controlUser');
    Route::get('/course/list-course', 'AdminCourseController@listCourse')->name('adminCourse.listCourse');
    Route::post('/course/update-status', 'AdminCourseController@updateStatus')->name('adminCourse.updateStatus');
    Route::post('/user/update-status-user', 'AdminUserController@updateStatusUser')->name('adminUser.updateStatusUser');

});

Route::group(['prefix' => 'admin', 'middleware' => 'superAdmin'], function () {
    Route::get('/create-admin', 'AdminController@createAdmin')->name('admin.createAdmin');
    Route::post('/create-admin', 'AdminController@createAdmin')->name('admin.createAdmin');
    Route::get('/list-admin', 'AdminController@listAdmin')->name('admin.listAdmin');
    Route::get('/control-admin', 'AdminController@controlAdmin')->name('admin.controlAdmin');
    Route::post('/update-status-admin', 'AdminController@updateStatusAdmin')->name('admin.updateStatusAdmin');

});