<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('posts', 'PostController');

Route::post('posts/{post}/comments', 'PostController@addComment');

Route::get('tags/{tag}', 'TagController@show');

Route::get('users/{user}', 'UserController@show');
