<?php

use App\Models\Reservation;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote')->everyFifteenSeconds();

Schedule::call(function () {

    $data = Reservation::where('checkout', '<', now())
            ->whereNull('status')
            ->update(['status' => 'Completed']);

})->everyFifteenMinutes();
