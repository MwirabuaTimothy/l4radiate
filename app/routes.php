<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| Application Account Routes
|--------------------------------------------------------------------------
*/

Route::controller('users', 'UsersController');
Route::resource('users/index', 'UsersController');
Route::resource('login', 'UsersController');
Route::resource('register', 'UsersController');
Route::resource('courses', 'CoursesController');

/*
|--------------------------------------------------------------------------
| Application Search Routes
|--------------------------------------------------------------------------
*/
Route::get('howitworks', function(){ return View::make('howitworks');});
Route::get('privacypolicy', function(){ return View::make('privacypolicy');});
Route::get('termsofuse', function(){ return View::make('termsofuse');});
Route::get('customerservice', function(){ return View::make('customerservice');});
Route::get('template', function(){return View::make('template');});
Route::get('blog', function(){ return View::make('blog');});

Route::resource('forums', 'ForumsController');
Route::resource('colleges', 'CollegesController');
Route::resource('bookshelves', 'BookshelvesController');
Route::resource('wishlists', 'WishlistsController');

Route::get('search','SearchController@search');
Route::get('ssearch','SearchController@ssearch');


Route::controller('/', 'HomeController');


