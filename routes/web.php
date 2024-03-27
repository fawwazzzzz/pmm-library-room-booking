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

Route::get('/form-available', [MainController::class, 'formavailable']);

Route::get('/form-details', [MainController::class, 'details']);

Route::get('/admin', [MainController::class, 'admin']);

Route::post('/process-data', [MainController::class, 'checkBetween']);

Route::post('/insert-time', [MainController::class, 'insertTime'])->name('time');

Route::get('admin/tempahan', [AdminController::class, 'index'])->name('tempahan');

Route::get('admin/tempahan-list', [AdminController::class, 'tempahanList'])->name('tempahan.list');
