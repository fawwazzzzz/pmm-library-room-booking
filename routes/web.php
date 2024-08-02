<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

// Routes accessible to authenticated users only
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return 'Dashboard';
    });

    Route::get('/users', function () {
        return 'Users';
    });

    Route::get('/admin', [MainController::class, 'admin'])->name('admin');

    Route::get('/admin/tempahan', [AdminController::class, 'index'])->name('admin-tempahan');

    Route::get('/admin/tempahan-pelajar-list', [AdminController::class, 'tempahanPelajarList'])->name('tempahan.pelajar-list');

    Route::get('/admin/tempahan-pensyarah-list', [AdminController::class, 'tempahanPensyarahList'])->name('tempahan.pensyarah-list');

    Route::get('admin/tempahan-recent-list', [AdminController::class, 'tempahanRecentList'])->name('tempahan.recent-list');
});

// Routes accessible to all users
Route::get('/', function () {
    return view('welcome');
});

Route::get('/form-available', [MainController::class, 'availablePage']);

Route::get('/form-details', [MainController::class, 'detailsPage']);

Route::get('/form-result', [MainController::class, 'result']);

// Data Process
Route::post('/process-data', [MainController::class, 'checkBetween']);

Route::post('/insert-time', [MainController::class, 'insertTime'])->name('time');

Route::post('/details', [MainController::class, 'insertDetails'])->name('details');

Route::get('/delete-available/{id}', [MainController::class, 'deleteTime']);

Route::get('/cancel-reserve/{id}', [MainController::class, 'cancelReserve']);

// PDF Files
Route::get('/pdf-student', [MainController::class, 'pdfStudent'])->name('generate-pdf-student');

Route::get('/pdf-staff', [MainController::class, 'pdfStaff'])->name('generate-pdf-staff');

Route::get('/pdf-reservation/{id}', [MainController::class, 'pdfReserve'])->name('generate-pdf-reservation');

// Authentication routes
Auth::routes();

