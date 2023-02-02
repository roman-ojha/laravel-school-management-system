<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::group(['prefix'=>'admin'], function () {
    Route::get('/', [AdminController::class,'index'])->name('admin');
    Route::get('/students', [AdminController::class,'students'])->name('admin.students');
    Route::group(['prefix'=>'add'], function () {
        Route::view('/student', 'admin/add_student')->name('admin.add.student');
        Route::post('/student', [AdminController::class,'create_student'])->name('admin.add.student');
    });
});
