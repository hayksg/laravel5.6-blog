<?php

/*
App::bind('App\Billing\Stripe', function(){
	return new App\Billing\Stripe(config('services.stripe.secret'));
});
*/

//$stripe = App::make('App\Billing\Stripe');
//$stripe = resolve('App\Billing\Stripe');
//$stripe = app('App\Billing\Stripe');
//App::instance('\App\Billing\Stripe', $stripe); // do not work ???

//dd($stripe->greeting('Hi'));




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



Route::group(['middleware' => ['admin']], function () {
    
    Route::get('/admin', 'Admin\AdminController@index');
    
    Route::get('/admin/posts',             'Admin\PostController@index');
    Route::get('/admin/posts/create',      'Admin\PostController@create');
    Route::post('/admin/posts',            'Admin\PostController@store');
    Route::get('/admin/posts/{post}/edit', 'Admin\PostController@edit');
    Route::delete('/admin/posts/{post}',   'Admin\PostController@destroy');
    Route::put('/admin/posts/{post}',      'Admin\PostController@update');
    
    Route::get('/admin/categories',        'Admin\CategoryController@index');
    Route::get('/admin/categories/create', 'Admin\CategoryController@create');

    Route::get('/admin/tags',             'Admin\TagController@index');
    Route::get('/admin/tags/{tag}',       'Admin\TagController@show');
    Route::put('/admin/tags/{tag}',       'Admin\TagController@update');
    Route::get('/admin/tags/{tag}/edit',  'Admin\TagController@edit');
    Route::post('/admin/tags',            'Admin\TagController@store');
    Route::delete('/admin/tags/{tag}',    'Admin\TagController@destroy');
});


Route::get('/',                       'PostController@index');
Route::get('/{category}',             'CategoryController@index');
Route::get('/posts/{post}',           'PostController@show')->name('posts');
Route::post('/posts/{post}/comments', 'CommentController@store');
Route::get('/posts/tags/{tag}',       'TagController@index');

