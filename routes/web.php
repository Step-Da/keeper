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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/auth/login', function(){
    return view('auth.login');
})->name('login-page');

Route::get('/auth/register', function(){
    return view('auth.register');
})->name('register-page');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('landing');
})->name('landing-page');