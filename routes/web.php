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
    Route::get('about', 'SiteController@about');
    Route::match(['get', 'post'], 'contact', 'SiteController@contact')->name('siteContact');
});
Auth::routes();

Route::group(['prefix' => 'course', 'middleware' => 'teacher'], function () {
    Route::get('management', 'CourseController@management')->name('course.management');
    Route::get('info/{id}', 'CourseController@info')->name('course.info');
});

Route::group(['prefix' => 'lesson', 'middleware' => 'teacher'], function () {
    Route::post('create', 'LessonController@create')->name('lesson.create');
    Route::post('edit', 'LessonController@edit')->name('lesson.edit');
    Route::post('delete', 'LessonController@delete')->name('lesson.delete');
    Route::get('info/{id}', 'LessonController@info')->name('lesson.info');
});