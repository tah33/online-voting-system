<?php

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@home');
Route::get('profile','HomeController@profile');
Route::get('edit-profile/{id}','HomeController@editProfile');
Route::post('update-profile/{id}','HomeController@updateProfile');
Route::get('password','HomeController@password');
Route::post('update-password/{id}','HomeController@updatePassword');
Route::post('update-password/{id}','HomeController@updatePassword');

Route::resource('users','UserController');
Route::get('blocked-users','UserController@blockUsers');
Route::get('unblock/{id}','UserController@unblock');

Route::resource('elections','ElectionController');
Route::resource('candidates','CandidateController')->except('store');
Route::get('candidate-store/{id}','CandidateController@store');
Route::get('pending-application','CandidateController@pending');
Route::get('reject-applications','CandidateController@reject');
Route::get('candidate','CandidateController@candidate');
Route::get('applies','CandidateController@apply');
Route::resource('voters','VoterController');
Route::resource('results','ResultController');

