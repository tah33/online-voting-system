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
Route::get('/home', function() {
    if(Auth::user()->role == 'admin')
        return view('admin.home');
    elseif(Auth::user()->role == 'candidate')
        return view('candidate.home');
    elseif(Auth::user()->role == 'voter')
        return view('voter.home');
})->name('home')->middleware('auth');
Route::get('profile','HomeController@profile');
Route::get('edit-profile/{id}','HomeController@editProfile');
Route::post('update-profile/{id}','HomeController@updateProfile');
Route::get('password','HomeController@password');
Route::post('update-password/{id}','HomeController@updatePassword');
Route::get('nid','HomeController@nid');
Route::post('update-password/{id}','HomeController@updatePassword');
