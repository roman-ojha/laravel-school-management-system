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

    // Books:
    Route::get('/books', [AdminController::class,'books'])->name('admin-books');
    Route::view('/book', 'admin/add_book')->name('admin-view-add-book');
    Route::post('/book', [AdminController::class,'add_book'])->name('admin-add-book');
    Route::delete('/book/{id}', [AdminController::class,'delete_book'])->name('admin-delete-book');

    // Faculties:
    Route::get('/faculties', [AdminController::class,'faculties'])->name('admin-faculties');
    Route::view('/faculty', 'admin/add_faculty')->name('admin-view-add-faculty');
    Route::post('/faculty', [AdminController::class,'add_faculty'])->name('admin-add-faculty');
});
