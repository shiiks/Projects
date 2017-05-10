<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/**
* Home
*/
Route::get('/', [
	'uses' => '\Connection\Http\Controllers\HomeController@index',
	'as' => 'home',	
]);

/**
* Authentication
*/

Route::get('/signup', [
	'uses' => '\Connection\Http\Controllers\AuthController@getSignup',
	'as' => 'auth.signup',
	'middleware' => ['guest'],
]);

Route::post('/signup', [
	'uses' => '\Connection\Http\Controllers\AuthController@postSignup',
	'middleware' => ['guest'],
]);


Route::get('/signin', [
	'uses' => '\Connection\Http\Controllers\AuthController@getSignin',
	'as' => 'auth.signin',
	'middleware' => ['guest'],
]);

Route::post('/signin', [
	'uses' => '\Connection\Http\Controllers\AuthController@postSignin',
	'middleware' => ['guest'],
]);

Route::get('/signout', [
	'uses' => '\Connection\Http\Controllers\AuthController@getSignout',
	'as' => 'auth.signout',
]);

/**
* Search
*/

Route::get('/search', [
	'uses' => '\Connection\Http\Controllers\SearchController@getResults',
	'as' => 'search.results',
]);

/**
* Profile
*/

Route::get('/user/{username}', [
	'uses' => '\Connection\Http\Controllers\ProfileController@getProfile',
	'as' => 'profile.index',
]);

Route::get('/profile/edit', [
	'uses' => '\Connection\Http\Controllers\ProfileController@getEdit',
	'as' => 'profile.edit',
	'middleware' => ['auth'],
]);

Route::post('/profile/edit', [
	'uses' => '\Connection\Http\Controllers\ProfileController@postEdit',
	'middleware' => ['auth'],
]);

/**
* Connections
*/

Route::get('/connections', [
	'uses' => '\Connection\Http\Controllers\FriendController@getIndex',
	'as' => 'friends.index',
	'middleware' => ['auth'],
]);

Route::get('/connections/add/{username}', [
	'uses' => '\Connection\Http\Controllers\FriendController@getAdd',
	'as' => 'friends.add',
	'middleware' => ['auth'],
]);

Route::get('/connections/accept/{username}', [
	'uses' => '\Connection\Http\Controllers\FriendController@getAccept',
	'as' => 'friends.accept',
	'middleware' => ['auth'],
]);

Route::post('/connections/delete/{username}', [
	'uses' => '\Connection\Http\Controllers\FriendController@postDelete',
	'as' => 'friends.delete',
	'middleware' => ['auth'],
]);

/**
* Statuses
*/

Route::post('/status', [
	'uses' => '\Connection\Http\Controllers\StatusController@postStatus',
	'as' => 'status.post',
	'middleware' => ['auth'],
]);

Route::post('/status/{statusId}/reply', [
	'uses' => '\Connection\Http\Controllers\StatusController@postReply',
	'as' => 'status.reply',
	'middleware' => ['auth'],
]);

Route::get('/status/{statusId}/like', [
	'uses' => '\Connection\Http\Controllers\StatusController@getLike',
	'as' => 'status.like',
	'middleware' => ['auth'],
]);