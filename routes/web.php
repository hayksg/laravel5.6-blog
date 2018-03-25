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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/',                       'PostController@index');
Route::get('/posts/{post}',           'PostController@show');
Route::post('/posts/{post}/comments', 'CommentController@store');

Route::get('/admin',                   'Admin\AdminController@index');
Route::get('/admin/posts',             'Admin\PostController@index');
Route::get('/admin/posts/create',      'Admin\PostController@create');
Route::post('/admin/posts',            'Admin\PostController@store');
Route::get('/admin/posts/{post}/edit', 'Admin\PostController@edit');
Route::delete('/admin/posts/{post}',   'Admin\PostController@destroy');
Route::put('/admin/posts/{post}',      'Admin\PostController@update');
