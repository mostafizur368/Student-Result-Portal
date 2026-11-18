<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'index'])->name('home');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class)->except(['index', 'show']);
    Route::resource('results', ResultController::class);
});
