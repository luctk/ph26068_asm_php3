<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/list/student',[\App\Http\Controllers\StudentController::class,'index'])->name('list-student');
Route::match(['GET','POST'],'/add/student',[\App\Http\Controllers\StudentController::class,'add'])->name('add-student');
Route::match(['GET','POST'],'/edit/student/{id}',[\App\Http\Controllers\StudentController::class,'edit'])->name('edit-student');
Route::get('/delete/student/{id}',[\App\Http\Controllers\StudentController::class,'delete'])->name('delete-student');
