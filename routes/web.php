<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/form-available', [MainController::class, 'available']);

Route::get('/form-details', [MainController::class, 'details']);

Route::post('/process-data', [MainController::class, 'checkBetween']);

Route::post('/insert-time', [MainController::class, 'insertTime'])->name('time');
