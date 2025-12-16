<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\SubjectController;


Route::apiResource('users', UserController::class);
Route::apiResource('teachers', TeacherController::class);
Route::apiResource('subjects', SubjectController::class);
Route::apiResource('classrooms', ClassroomController::class);
Route::apiResource('exams', ExamController::class);


