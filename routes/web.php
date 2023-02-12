<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::group(['prefix'=>'admin'], function () {
    // Student:
    Route::get('/', [AdminController::class,'index'])->name('admin');
    Route::get('/students', [AdminController::class,'students'])->name('admin-students');
    Route::view('/student', 'admin/add_student', ['error'=>''])->name('admin-view-add-student');
    Route::post('/student', [AdminController::class,'add_student'])->name('admin-add-student');
    Route::get('/student/{id}', [AdminController::class,'delete_student'])->name('admin-delete-student');

    // Teacher:
    Route::get('/teachers', [AdminController::class,'teachers'])->name('admin-teachers');
    Route::view('/teacher', 'admin/add_teacher')->name('admin-view-add-teacher');
    Route::post('/teacher', [AdminController::class,'add_teacher'])->name('admin-add-teacher');
    Route::delete('/teacher/{id}', [AdminController::class,'delete_teacher'])->name('admin-delete-teacher');
});
