<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\BookController;

// Student:
Route::group(['prefix' => 'student'], function () {
    Route::get('/', [StudentController::class, 'students'])->name('students');
    Route::get('/new', [StudentController::class, 'add_student_view'])->name('add-student-view');
    Route::post('/new', [StudentController::class, 'add_student'])->name('add-student');
    Route::get('/{id}', [StudentController::class, 'delete_student'])->name('delete-student');
});

// Teacher:
Route::group(['prefix' => 'teacher'], function () {
    Route::get('', [TeacherController::class, 'teachers'])->name('teachers');
    Route::view('/new', 'pages.teacher.add_teacher')->name('add-teacher-view');
    Route::post('/new', [TeacherController::class, 'add_teacher'])->name('add-teacher');
    Route::delete('/{id}', [TeacherController::class, 'delete_teacher'])->name('delete-teacher');
});

// Books:
Route::group(['prefix' => 'book'], function () {
    Route::get('', [BookController::class, 'books'])->name('books');
    Route::view('/new', 'pages.book.add_book')->name('add-book-view');
    Route::post('/new', [BookController::class, 'add_book'])->name('add-book');
    Route::delete('/{id}', [BookController::class, 'delete_book'])->name('delete-book');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');


    // Faculties:
    Route::get('/faculties', [AdminController::class, 'faculties'])->name('admin-faculties');
    Route::view('/faculty', 'admin/add_faculty')->name('admin-view-add-faculty');
    Route::post('/faculty', [AdminController::class, 'add_faculty'])->name('admin-add-faculty');
    Route::delete('/faculty/{id}', [AdminController::class, 'delete_faculty'])->name('admin-delete-faculty');


    // Subjects:
    Route::get('/subjects', [AdminController::class, 'subjects'])->name('admin-subjects');
    Route::view('/subject', 'admin/add_subject')->name('admin-view-add-subject');
    Route::post('/subject', [AdminController::class, 'add_subject'])->name('admin-add-subject');
    Route::delete('/subject/{id}', [AdminController::class, 'delete_subject'])->name('admin-delete-subject');

    // Library:
    Route::view("/library", "admin/library")->name("library-view");
    Route::get('/library/book-self', [AdminController::class, 'book_self'])->name('book-self');
    Route::view('/add-book-into-book-self', 'admin/add_book_self')->name('admin-add-book-into-book-self');
    Route::post('/add-book-into-book-self', [AdminController::class, 'add_book_into_book_self'])->name('admin-add-book-int-book-self');
    Route::get("/library/students-record", [AdminController::class, 'library_student_records'])->name('library-student-records');
    Route::view('/library/add-student-record', 'pages/library/add-new-student-record')->name('library-add-new-student-record');
    Route::post("/library/add-student-record", [AdminController::class, 'library_add_student_record'])->name('library-add-student-record');
});
