<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservation::create([
            'namaPengguna' => "Fawwaz",
            'email' => "muhdfawwaz18@gmail.com",
            'Jabatan' => "JTMK",
            'date' => "2024-03-27",
            'checkin' => "12:15:00",
            'checkout' => "15:15:00",
            'groupNum' => 6,
            'purpose' => "Study",
            'roomID' => 01,
        ]);

        Reservation::create([
            'namaPengguna' => "Aliya",
            'email' => "aliya@gmail.com",
            'Jabatan' => "JP",
            'date' => "2024-03-27",
            'checkin' => "13:30:00",
            'checkout' => "15:30:00",
            'groupNum' => 4,
            'purpose' => "FYP Meeting",
            'roomID' => 03,
        ]);
    }
}
