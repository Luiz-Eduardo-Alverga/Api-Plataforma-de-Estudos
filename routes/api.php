<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TeacherController;
use \App\Http\Controllers\SubjectController;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('teachers', TeacherController::class);
    Route::apiResource('subjects', SubjectController::class);
    Route::apiResource('classrooms', ClassroomController::class);
    Route::apiResource('exams', ExamController::class);
});




