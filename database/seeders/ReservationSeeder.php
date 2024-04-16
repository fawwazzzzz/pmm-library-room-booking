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

        // Pensyarah

        Reservation::create([
            'namaPengguna' => "Fawwaz",
            'email' => "muhdfawwaz18@gmail.com",
            'noMatriks' => "Staff",
            "semester" => 5,
            'idJabatan' => 2,
            'date' => "2024-03-27",
            'checkin' => "12:15:00",
            'checkout' => "15:15:00",
            'groupNum' => 6,
            'purpose' => "Study",
            'roomID' => 01,
        ]);

        Reservation::create([
            'namaPengguna' => "Fawwaz",
            'email' => "muhdfawwaz18@gmail.com",
            'noMatriks' => "Staff",
            "semester" => 5,
            'idJabatan' => 2,
            'date' => "2024-03-27",
            'checkin' => "12:15:00",
            'checkout' => "15:15:00",
            'groupNum' => 6,
            'purpose' => "Study",
            'roomID' => 01,
        ]);

        // Pelajar

        Reservation::create([
            'namaPengguna' => "Aliya",
            'email' => "aliya@gmail.com",
            "noMatriks" => "01DDT21F2027",
            "semester" => 2,
            'idProgram' => 6,
            'date' => "2024-03-27",
            'checkin' => "13:30:00",
            'checkout' => "15:30:00",
            'groupNum' => 4,
            'purpose' => "FYP Meeting",
            'roomID' => 03,
        ]);

        Reservation::create([
            'namaPengguna' => "Aliya",
            'email' => "aliya@gmail.com",
            "noMatriks" => "01DDT21F2027",
            "semester" => 4,
            'idProgram' => 6,
            'date' => "2024-03-27",
            'checkin' => "13:30:00",
            'checkout' => "15:30:00",
            'groupNum' => 4,
            'purpose' => "FYP Meeting",
            'roomID' => 03,
        ]);

        Reservation::create([
            'namaPengguna' => "Aliya",
            'email' => "aliya@gmail.com",
            "noMatriks" => "01DDT21F2027",
            "semester" => 2,
            'idProgram' => 3,
            'date' => "2024-03-27",
            'checkin' => "13:30:00",
            'checkout' => "15:30:00",
            'groupNum' => 4,
            'purpose' => "FYP Meeting",
            'roomID' => 03,
        ]);
        
        Reservation::create([
            'namaPengguna' => "Aliya",
            'email' => "aliya@gmail.com",
            "noMatriks" => "01DDT21F2027",
            "semester" => 2,
            'idProgram' => 6,
            'date' => "2024-03-27",
            'checkin' => "13:30:00",
            'checkout' => "15:30:00",
            'groupNum' => 4,
            'purpose' => "FYP Meeting",
            'roomID' => 03,
        ]);
    }
}
