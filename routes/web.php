<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Student:
Route::get('/students', [AdminController::class, 'students'])->name('students');
Route::get('/student', [AdminController::class, 'add_student_view'])->name('add-student-view');
Route::post('/student', [AdminController::class, 'add_student'])->name('add-student');
Route::get('/student/{id}', [AdminController::class, 'delete_student'])->name('delete-student');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    // Teacher:
    Route::get('/teachers', [AdminController::class, 'teachers'])->name('admin-teachers');
    Route::view('/teacher', 'admin/add_teacher')->name('admin-view-add-teacher');
    Route::post('/teacher', [AdminController::class, 'add_teacher'])->name('admin-add-teacher');
    Route::delete('/teacher/{id}', [AdminController::class, 'delete_teacher'])->name('admin-delete-teacher');

    // Books:
    Route::get('/books', [AdminController::class, 'books'])->name('admin-books');
    Route::view('/book', 'admin/add_book')->name('admin-view-add-book');
    Route::post('/book', [AdminController::class, 'add_book'])->name('admin-add-book');
    Route::delete('/book/{id}', [AdminController::class, 'delete_book'])->name('admin-delete-book');

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
