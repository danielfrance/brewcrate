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


Route::get('logout', 'LoginController@getLogout');
Route::post('/create', 'SignupController@create');
Route::get('/', 'PageController@index');
Route::post('/newsletter', 'EmailController@newsletter');

Route::get('/signup', 'PageController@signup');
Route::get('/signin', 'PageController@signin');
Route::post('/log_in', 'SignupController@login');
Route::get('/beerprofile', 'PageController@beer');

Route::get('/profile', 'PageController@profile');
Route::get('/dashboard', 'PageController@dashboard');
Route::get('/upcoming-crate', 'PageController@upcoming');
Route::get('/instant-crate', 'PageController@instant');

Route::get('/logout', 'LoginController@logout');


