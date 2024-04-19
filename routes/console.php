<?php

use App\Models\Reservation;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote')->everyFifteenSeconds();

// Schedule::call(function () {

    

// })->everySecond();

Schedule::command('app:test-job')->everyFifteenMinutes();
Schedule::command('app:delete-time')->daily();
