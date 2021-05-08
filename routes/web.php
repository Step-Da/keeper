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

Route::get('/account/main', 'HomeController@index')->name('home');

Route::get('/', function () {
    return Auth::check() ? (view('includes.pages.main')) : (view('landing'));
})->name('landing-page');

Route::get('/account/main', 'HomeController@index')->name('account-main-page');

Route::get('/account/users', 'UserController@index')->name('account-users-page');

Route::get('/account/projects', function(){
    return view('includes.pages.projects');
})->name('account-projects-page');

Route::post('/account/projects/create', 'ProjectController@store')->name('account-project-create');

Route::get('/account/todos', 'TodoController@index')->name('account-todos-page');