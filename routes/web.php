<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\UserController;

Route::group(['middleware' => ['userAuth']], function () {
    Route::get('/', [UserController::class, 'index']);
    // Student:
    Route::group(['prefix' => 'student'], function () {
        Route::get('/', [StudentController::class, 'students'])->name('students');
        Route::get('/new', [StudentController::class, 'add_student_view'])->name('add-student-view');
        Route::post('/new', [StudentController::class, 'add_student'])->name('add-student');
        Route::get('/{id}', [StudentController::class, 'delete_student'])->name('delete-student');
    });
    // Teacher:
    Route::group(['prefix' => 'teacher'], function () {
        Route::get('/', [TeacherController::class, 'teachers'])->name('teachers');
        Route::view('/new', 'pages.teacher.add_teacher')->name('add-teacher-view');
        Route::post('/new', [TeacherController::class, 'add_teacher'])->name('add-teacher');
        Route::delete('/{id}', [TeacherController::class, 'delete_teacher'])->name('delete-teacher');
    });
    // Books:
    Route::group(['prefix' => 'book'], function () {
        Route::get('/', [BookController::class, 'books'])->name('books');
        Route::view('/new', 'pages.book.add_book')->name('add-book-view');
        Route::post('/new', [BookController::class, 'add_book'])->name('add-book');
        Route::delete('/{id}', [BookController::class, 'delete_book'])->name('delete-book');
    });
    // Faculties:
    Route::group(['prefix' => 'faculty'], function () {
        Route::get('/', [FacultyController::class, 'faculties'])->name('faculties');
        Route::view('/new', 'pages.faculty.add_faculty')->name('add-faculty-view');
        Route::post('/new', [FacultyController::class, 'add_faculty'])->name('add-faculty');
        Route::delete('/{id}', [FacultyController::class, 'delete_faculty'])->name('delete-faculty');
    });
    // Subjects:
    Route::group(['prefix' => 'subject'], function () {
        Route::get('/', [SubjectController::class, 'subjects'])->name('subjects');
        Route::view('/new', 'pages.subject.add_subject')->name('add-subject-view');
        Route::post('/new', [SubjectController::class, 'add_subject'])->name('add-subject');
        Route::delete('/{id}', [SubjectController::class, 'delete_subject'])->name('delete-subject');
    });
    // Library:
    Route::group(['prefix' => 'library'], function () {
        Route::view("/", "pages.library.index")->name("library-view");
        Route::group(['prefix' => 'book-self'], function () {
            Route::get('/', [LibraryController::class, 'book_self'])->name('book-self');
            Route::view('/new', 'pages.library.add_book_self')->name('add-book-into-book-self');
            Route::post('/new', [LibraryController::class, 'add_book_into_book_self'])->name('add-book-int-book-self');
            Route::delete('/{id}', [LibraryController::class, 'delete_book_from_book_self'])->name('delete-book-from-book-self');
        });
        Route::group(['prefix' => 'students-record'], function () {
            Route::get("/", [LibraryController::class, 'library_student_records'])->name('library-student-records');
            Route::view('/new', 'pages/library/add-new-student-record')->name('library-add-new-student-record');
            Route::post("/new", [LibraryController::class, 'library_add_student_record'])->name('library-add-student-record');
            Route::delete("/", [LibraryController::class, 'delete_student_record'])->name('delete-library-student-record');
            // /library/students-record?student_id=${student_id}&book_id=${book_id}
        });
    });
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
    });
});

// Auth
Route::view('/login', 'pages.auth.login')->name('login-view');
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::view('/register', 'pages.auth.register')->name('register-view');
// Route::post('/register', [AuthController::class, 'register'])->name('register');
