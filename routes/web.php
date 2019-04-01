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

Route::get('/abc', function () {
    return 'welcome abc';
});


Route::get('post', [
    'as' => 'My Post',
    function () {
        return 'welcome post';
    }
]);

Route::get('Review routes laravel', function () {
    return redirect()->route('My Post');
});


Route::get('news', function () {
    return "welcome news";
})->name('My News');

Route::get('The weather is cool', function () {
    return redirect()->route('My News');
});


Route::group(['prefix' => 'group'], function () {
    Route::get('team1', function () {
        return "Welcome Team 1";
    });

    Route::get('team2', function () {
        return "Welcome Team 2";
    });
});

Route::get('site', 'SiteController@index');
