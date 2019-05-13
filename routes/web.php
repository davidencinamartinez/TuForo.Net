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

Route::get('/', 'IndexController@index');

// USER REGISTRATION

Route::get('registro', 'RegisterController@create'); // FORM
Route::post('registro', 'IndexController@store'); // STORE NEW USER

// FORUM

Route::get('forum', 'IndexController@catIndex'); // FORUM CATEGORIES

// THREAD

Route::get('thread', 'ThreadController@getThreadsIndex');

// NEW THREAD

Route::get('newthread', 'NewThreadController@index');