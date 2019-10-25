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
