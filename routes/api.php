<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
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
});

Route::prefix('/task')->group(function(){
    Route::post('/store', [TaskController::class, 'store']);
});

// Route::prefix('/project')->group(function(){
//     Route::post('/store', [ProjectController::class, 'store']);
// });