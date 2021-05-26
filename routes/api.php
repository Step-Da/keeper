<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WorkerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/todo', [TodoController::class, 'index']);
Route::prefix('/todo')->group(function(){
    Route::post('/store', [TodoController::class, 'store']);
    Route::put('/{id}', [TodoController::class, 'update']);
    Route::delete('/{id}', [TodoController::class, 'destroy']);
});

Route::prefix('/user')->group(function(){
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

Route::prefix('/group')->group(function(){
    Route::post('/store', [GroupController::class, 'store']);
    Route::delete('/{id}', [GroupController::class, 'destroy']);
});

Route::prefix('/task')->group(function(){
    Route::post('/store', [TaskController::class, 'store']);
    Route::put('/move/task/{task}/group/{group}',[TaskController::class, 'update']);
    Route::delete('/{id}', [TaskController::class, 'destroy']);
});

Route::prefix('/project')->group(function(){
    Route::delete('/{id}', [ProjectController::class, 'destroy']);
});

Route::prefix('/worker')->group(function(){
    Route::put('/simple/{id}', [WorkerController::class, 'simple']);
});

Route::prefix('/chart')->group(function(){
    Route::get('/liner', [ProjectController::class, 'liner']);
    Route::get('/polar', [TaskController::class, 'polar']);
});