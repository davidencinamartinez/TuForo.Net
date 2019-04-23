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

// INDEX

Route::get('/', 'TrackerController@index');

// USER REGISTRATION

Route::get('registro', 'RegisterController@create'); // FORM
Route::get('lol','RegisterController@index'); // AJAX
// Route::post('registro', 'RegisterController@store'); // STORE NEW USER

// FORUM

Route::get('forum', function () {
    return view('forum');
});

// THREAD

Route::get('thread', function () {
    return view('thread');
});

// NEW THREAD

Route::get('newthread', 'NewThreadController@index');