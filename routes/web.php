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

// LOG IN & LOG OUT

Route::post('/login', 'UserController@login');
Route::get('/logout', 'UserController@logout');

// INDEX

Route::get('/', 'IndexController@index');

// USER REGISTRATION

Route::get('/registro', 'RegisterController@form'); // FORM
Route::post('/registro', 'RegisterController@store'); // STORE NEW USER

	// AJAX CHECK USER EXISTS
	
	Route::post('/ajax/checkUser', 'RegisterController@checkUser');
	Route::get('/ajax/checkUser', 'RegisterController@checkUser');

	// AJAX CHECK EMAIL EXISTS

	// Route::post('/ajax/checkMail', 'RegisterController@checkMail');

// FORUM

Route::get('/foro', 'IndexController@catIndex'); // FORUM CATEGORIES
Route::get('/foro/{category}', 'IndexController@catThreads'); // THREADS FOR CATEGORY

// THREAD

Route::get('/thread/{id}', 'ThreadController@getThreadsIndex');
Route::post('/sendReply', 'ThreadController@submitReply');

// NEW THREAD

Route::get('/newthread', 'NewThreadController@index');
Route::post('/createThread', 'NewThreadController@newThreadStore');

// PROFILE

Route::get('/profile/{name}', 'UserController@getProfile');
Route::post('/updateProfile', 'UserController@updateProfile');

// TEST

Route::get('/test','TestController@myform');
Route::post('/test','TestController@myformPost');