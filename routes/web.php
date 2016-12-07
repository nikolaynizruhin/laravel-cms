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

Route::get('users/{user}', 'UserController@show');

Route::get('profile', 'UserController@profile');

Route::post('profile', 'UserController@updateAvatar');

Route::resource('tags', 'TagController', ['only' => [
    'show', 'store', 'destroy'
]]);

Route::resource('categories', 'CategoryController', ['only' => [
    'show', 'store', 'destroy'
]]);

Route::get('search', 'PostController@search');
