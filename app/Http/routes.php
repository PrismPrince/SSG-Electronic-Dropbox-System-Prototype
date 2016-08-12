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

Route::resource('posts', 'PostController', ['except' => ['create']]); // done
Route::resource('users', 'UserController'); // done
Route::resource('surveys', 'SurveyController', ['except' => ['create']]);
Route::resource('suggestions', 'SuggestionController', ['only' => ['index', 'show', 'destroy']]); // done

// password reset
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');

// login
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// profile
Route::get('profile/{id}/timeline', 'UserController@profileTimeline');

// images
Route::get('images/{folder}/{id}', 'FileController@getImage');
Route::post('images/{folder}/{id}', 'FileController@postImage');

// ajax
Route::get('ajax/create/{view}', 'AjaxController@getCreate');
Route::post('ajax/create/{view}', 'AjaxController@postCreate');
Route::get('ajax/show/{view}', 'AjaxController@getShow');
Route::get('ajax/{activity}/{id}', 'AjaxController@getActivity');

// students
Route::get('/', 'HomeController@index'); // done
Route::get('home', 'HomeController@home'); // done
Route::resource('suggest', 'SuggestionController', ['only' => ['create', 'store']]); // done
Route::post('vote/{id}', 'SurveyController@vote'); // done
Route::get('surveys/active', ['as' => 'surveys.active', 'uses' => 'SurveyController@active']);
Route::get('surveys/pending', ['as' => 'surveys.pending', 'uses' => 'SurveyController@pending']);
Route::get('surveys/expired', ['as' => 'surveys.expired', 'uses' => 'SurveyController@expired']);

// register (admin)		may not be importantbecause of the users controller
// Route::get('admin/register', 'Auth\AuthController@showRegistrationForm');
// Route::post('admin/register', 'Auth\AuthController@register');