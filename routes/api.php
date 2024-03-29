<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/students", [StudentController::class, 'get_students_api']);
Route::get('/subjects-and-faculties', [SubjectController::class, 'get_subjects_and_faculties_api']);
Route::get('/library/books-for-book-self', [LibraryController::class, 'get_books_for_book_self_api']);
Route::get('/library/books', [LibraryController::class, 'get_library_books']);
Route::get('/faculties', [FacultyController::class, 'get_faculties_api']);
