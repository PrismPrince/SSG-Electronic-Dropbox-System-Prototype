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
Route::get('posts/me', ['as' => 'posts.me', 'uses' => 'PostController@me']); // done
Route::get('posts/other', ['as' => 'posts.other', 'uses' => 'PostController@other']); // done
Route::resource('posts', 'PostController'); // done
Route::get('profile/{id}/timeline', ['as' => 'profile.timeline', 'uses' => 'UserController@profileTimeline']);
Route::get('profile/{id}/about', ['as' => 'profile.about', 'uses' => 'UserController@profileAbout']);
Route::get('profile/{id}/posts', ['as' => 'profile.posts', 'uses' => 'UserController@profilePosts']);
Route::get('profile/{id}/surveys', ['as' => 'profile.surveys', 'uses' => 'UserController@profileSurveys']);

// admin
Route::get('admin', 'HomeController@admin'); // done
Route::get('users/moderator', ['as' => 'users.moderator','uses' => 'UserController@moderator']); // done
Route::get('users/admin', ['as' => 'users.admin','uses' => 'UserController@admin']); // done
Route::resource('users', 'UserController'); // done
//Route::get('admin/survey/{id}/result', 'ResultController@getResult');

// moderator
Route::get('moderator', 'HomeController@moderator'); // done
Route::resource('suggestions', 'SuggestionController', ['only' => ['index', 'show', 'destroy']]); // done
//Route::resource('moderator/surveys', 'SurveyController');

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
Route::get('home', 'HomeController@home'); // done
Route::resource('suggest', 'SuggestionController', ['only' => ['create', 'store']]); // done
Route::post('vote/{id}', 'SurveyController@vote'); // done
Route::get('surveys/active', ['as' => 'surveys.active', 'uses' => 'SurveyController@active']);
Route::get('surveys/pending', ['as' => 'surveys.pending', 'uses' => 'SurveyController@pending']);
Route::get('surveys/expired', ['as' => 'surveys.expired', 'uses' => 'SurveyController@expired']);
Route::resource('surveys', 'SurveyController');

// register (admin)		may not be importantbecause of the users controller
// Route::get('admin/register', 'Auth\AuthController@showRegistrationForm');
// Route::post('admin/register', 'Auth\AuthController@register');