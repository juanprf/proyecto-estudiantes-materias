<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StudentLessonController;

Route::resource('students', StudentController::class);
Route::resource('lessons', LessonController::class);

/* Route::get('/student-lesson/create', [StudentLessonController::class, 'create'])->name('student-lesson.create');
Route::post('/student-lesson/store', [StudentLessonController::class, 'store'])->name('student-lesson.store'); */


Route::resource('student-lesson', StudentLessonController::class);