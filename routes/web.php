<?php
Route::get('/', 'HomeController@welcome' );
Auth::routes();
//HomeController
Route::get('/home', 'HomeController@home');
Route::get('profile','HomeController@profile');
Route::get('edit-profile/{id}','HomeController@editProfile');
Route::post('update-profile/{id}','HomeController@updateProfile');
Route::get('password','HomeController@password');
Route::post('update-password/{id}','HomeController@updatePassword');
//UserController
Route::resource('users','UserController');
Route::get('blocked-users','UserController@blockUsers');
Route::get('unblock/{id}','UserController@unblock');
//ElectionController
Route::resource('elections','ElectionController');
//CandidateController
Route::resource('candidates','CandidateController')->except('store');
Route::get('candidate-store/{id}','CandidateController@store');
Route::get('pending-application','CandidateController@pending');
Route::get('reject-applications','CandidateController@reject');
Route::get('candidate','CandidateController@candidate');
Route::get('applies','CandidateController@apply');
Route::post('candidate-search','CandidateController@candidateFind');
//VoterController
Route::resource('voters','VoterController');
Route::get('voters_list','VoterController@elections');

//ResultController
Route::resource('results','ResultController');
Route::get('winner','ResultController@winner');
Route::get('result-election/{id}','ResultController@result');
Route::post('result-search','ResultController@resultFind');

//AdminController
Route::get('all-voter','AdminController@voter');
Route::get('all-candidate','AdminController@candidate');
Route::get('ongoing','AdminController@ongoing');
Route::get('election-candidate/{id}','VoterController@edit');
//Can
Route::get('upcoming','CandidateController@upcoming');

//PDFController
Route::get('area-pdf/{id}','PdfController@area');
Route::get('users-pdf','PdfController@user');
Route::get('voters-pdf','PdfController@voter');
Route::get('candidate-pdf','PdfController@candidate');
Route::get('elections-pdf','PdfController@elections');
//EmailController
Route::resource('emails','EmailController');
//SocialController
Route::resource('socials','SocialController');
