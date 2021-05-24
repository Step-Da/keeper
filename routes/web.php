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

Route::prefix('/auth')->group(function(){
    Route::get('/login', 'Auth\LoginController@index')->name('login-page');
    Route::get('/register', 'Auth\RegisterController@index')->name('register-page');
});

Route::get('/', function () {
    return redirect()->route(Auth::check() ? ('account-main-page') : ('landing-page'));
});

Route::get('/landing', function(){
    return view('landing');
})->name('landing-page');

Route::prefix('/account')->group(function(){
    Route::get('/main', 'HomeController@index')->name('account-main-page');
    Route::get('/users', 'UserController@index')->name('account-users-page');
    Route::get('/projects', 'ProjectController@index')->name('account-projects-page');
    Route::get('/todos', 'TodoController@index')->name('account-todos-page');
    Route::get('/project/{id}/kanban', 'TaskController@index')->name('account-kanban-page');
    Route::get('/work','WorkerController@index')->name('account-worker-task-page');
    Route::post('/projects/create', 'ProjectController@store')->name('account-project-create');
    Route::post('/task/create', 'TaskController@store')->name('account-create-task');
});