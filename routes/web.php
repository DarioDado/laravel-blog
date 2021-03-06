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

Route::get('/users/{user}', 'UsersController@show');
Route::get('/users/{user}/edit', 'UsersController@edit');
Route::put('/users/{user}', 'UsersController@update');

Route::get('/', 'PostsController@index');
Route::get('/posts', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::get('/posts/{post}', 'PostsController@show');
Route::put('/posts/{post}', 'PostsController@update');
Route::delete('/posts/{post}', 'PostsController@delete');
Route::post('/posts', 'PostsController@store');


Route::post('/comments', 'CommentsController@store');

Route::get('/login', 'AuthController@loginPage')->name('login');
Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');
Route::get('/register', 'AuthController@registerPage');
Route::post('/register', 'AuthController@register');
