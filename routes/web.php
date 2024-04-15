<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Form Page

Route::get('/form-available', [MainController::class, 'availablePage']);

Route::get('/form-details', [MainController::class, 'detailsPage']);

Route::get('/form-result', [MainController::class, 'result']);

// Admin

Route::get('/admin', [MainController::class, 'admin'])->name('admin');

Route::get('admin/tempahan', [AdminController::class, 'index'])->name('admin-tempahan');

Route::get('admin/tempahan-pelajar-list', [AdminController::class, 'tempahanPelajarList'])->name('tempahan.pelajar-list');

Route::get('admin/tempahan-pensyarah-list', [AdminController::class, 'tempahanPensyarahList'])->name('tempahan.pensyarah-list');

// Data Process

Route::post('/process-data', [MainController::class, 'checkBetween']);

Route::post('/insert-time', [MainController::class, 'insertTime'])->name('time');

Route::post('/details', [MainController::class, 'insertDetails'])->name('details');

Route::get('/delete-available/{id}', [MainController::class, 'deleteTime']);

Route::get('/cancel-reserve/{id}', [MainController::class, 'cancelReserve']);
