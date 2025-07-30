<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks/store', [TaskController::class, 'store']);
Route::get('/tasks/show/{id}', [TaskController::class, 'show']);
Route::put('/tasks/update/{id}', [TaskController::class, 'update']);
Route::delete('/tasks/destroy/{id}', [TaskController::class, 'destroy']);
