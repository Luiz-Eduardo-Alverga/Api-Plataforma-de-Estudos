<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;


Route::apiResource('users', UserController::class);
Route::apiResource('teachers', TeacherController::class);


