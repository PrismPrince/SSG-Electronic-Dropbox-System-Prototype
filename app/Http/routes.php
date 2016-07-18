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

// auth (admin and moderator owns the same view)
Route::get('posts/me', ['as' => 'posts.me', 'uses' => 'PostController@me']);
Route::get('posts/other', ['as' => 'posts.other', 'uses' => 'PostController@other']);
Route::resource('posts', 'PostController');

// admin
Route::get('admin', 'HomeController@admin'); // done
Route::get('users/moderator', ['as' => 'users.moderator','uses' => 'UserController@moderator']);
Route::get('users/admin', ['as' => 'users.admin','uses' => 'UserController@admin']);
Route::resource('users', 'UserController');
//Route::resource('admin/surveys', 'SurveyController');
//Route::resource('admin/suggestions', 'SuggestionController');
//Route::get('admin/survey/{id}/result', 'ResultController@getResult');

// moderator
Route::get('moderator', 'HomeController@moderator'); // done
//Route::resource('moderator/surveys', 'SurveyController');
//Route::resource('moderator/suggestions', 'SuggestionController', ['only' => ['index', 'show']]);

// password reset
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');

// login
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// students
Route::get('/', 'HomeController@index'); // done
//Route::resource('surveys', 'SurveyController', ['only' => ['index', 'show']]);
//Route::post('surveys/{id}/vote', 'OptionStudentController@store');
//Route::resource('suggest', 'SuggestionController', ['only' => ['create', 'store']]);

// register (admin)		may not be importantbecause of the users controller
// Route::get('admin/register', 'Auth\AuthController@showRegistrationForm');
// Route::post('admin/register', 'Auth\AuthController@register');