<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskProgramingController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users',UserController::class);
Route::resource('tasks',TaskController::class);
Route::resource('tasksPrograming',TaskProgramingController::class);
Route::get('tasksProgramingTomorrow', [TaskProgramingController::class, 'tomorrow']);
Route::get('tasksProgramingNextweek', [TaskProgramingController::class, 'nextweek']);
Route::get('tasksProgramingNextask', [TaskProgramingController::class, 'nextask']);


