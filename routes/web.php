<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/form-available', [MainController::class, 'availablePage']);

Route::get('/form-details', [MainController::class, 'detailsPage']);

Route::get('/admin', [MainController::class, 'admin']);

Route::post('/process-data', [MainController::class, 'checkBetween']);

Route::post('/insert-time', [MainController::class, 'insertTime'])->name('time');

Route::post('/details', [MainController::class, 'insertDetails'])->name('details');

Route::get('/form-result', [MainController::class, 'result']);
