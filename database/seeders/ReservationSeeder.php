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
            'idJabatan' => 5,
            'date' => "2024-03-27",
            'checkin' => "14:00:00",
            'checkout' => "15:30:00",
            'groupNum' => 6,
            'purpose' => "Meeting",
            'roomID' => 01,
        ]);
        
        Reservation::create([
            'namaPengguna' => "Firdaus",
            'email' => "fidaus@gmail.com",
            'noMatriks' => "Staff",
            "semester" => 5,
            'idJabatan' => 2,
            'date' => "2024-03-27",
            'checkin' => "14:00:00",
            'checkout' => "15:30:00",
            'groupNum' => 6,
            'purpose' => "Team Discussion",
            'roomID' => 04,
        ]);

        Reservation::create([
            'namaPengguna' => "Fadil",
            'email' => "fadil18@gmail.com",
            'noMatriks' => "Staff",
            "semester" => 5,
            'idJabatan' => 1,
            'date' => "2024-03-27",
            'checkin' => "14:00:00",
            'checkout' => "15:30:00",
            'groupNum' => 5,
            'purpose' => "Discussion",
            'roomID' => 02,
        ]);
        

        Reservation::create([
            'namaPengguna' => "Hanif",
            'email' => "hanif@gmail.com",
            'noMatriks' => "Staff",
            "semester" => 5,
            'idJabatan' => 5,
            'date' => "2024-03-27",
            'checkin' => "14:00:00",
            'checkout' => "15:30:00",
            'groupNum' => 6,
            'purpose' => "Study",
            'roomID' => 05,
        ]);

        Reservation::create([
            'namaPengguna' => "Aemir",
            'email' => "wan@gmail.com",
            'noMatriks' => "Staff",
            "semester" => 5,
            'idJabatan' => 3,
            'date' => "2024-03-27",
            'checkin' => "14:00:00",
            'checkout' => "15:30:00",
            'groupNum' => 4,
            'purpose' => "Online Meeting",
            'roomID' => 03,
        ]);

        Reservation::create([
            'namaPengguna' => "Hakim",
            'email' => "akim@gmail.com",
            'noMatriks' => "Staff",
            "semester" => 5,
            'idJabatan' => 1,
            'date' => "2024-03-27",
            'checkin' => "15:30:00",
            'checkout' => "16:30:00",
            'groupNum' => 3,
            'purpose' => "Meeting",
            'roomID' => 05,
        ]);

        Reservation::create([
            'namaPengguna' => "Shazley",
            'email' => "boy@gmail.com",
            'noMatriks' => "Staff",
            "semester" => 5,
            'idJabatan' => 4,
            'date' => "2024-03-27",
            'checkin' => "15:30:00",
            'checkout' => "16:30:00",
            'groupNum' => 4,
            'purpose' => "Study",
            'roomID' => 04,
        ]);

        Reservation::create([
            'namaPengguna' => "Azarul",
            'email' => "joy@gmail.com",
            'noMatriks' => "Staff",
            "semester" => 5,
            'idJabatan' => 6,
            'date' => "2024-03-27",
            'checkin' => "15:30:00",
            'checkout' => "16:30:00",
            'groupNum' => 5,
            'purpose' => "Team Discussion",
            'roomID' => 03,
        ]);

        Reservation::create([
            'namaPengguna' => "Yaakob",
            'email' => "yakobhensem@gmail.com",
            'noMatriks' => "Staff",
            "semester" => 5,
            'idJabatan' => 4,
            'date' => "2024-03-27",
            'checkin' => "16:30:00",
            'checkout' => "17:45:00",
            'groupNum' => 2,
            'purpose' => "Meeting",
            'roomID' => 01,
        ]);

        Reservation::create([
            'namaPengguna' => "Shuib",
            'email' => "shuibsepah2@gmail.com",
            'noMatriks' => "Meeting",
            "semester" => 5,
            'idJabatan' => 2,
            'date' => "2024-03-27",
            'checkin' => "16:30:00",
            'checkout' => "17:45:00",
            'groupNum' => 3,
            'purpose' => "Study",
            'roomID' => 03,
        ]);

        // Pelajar

        Reservation::create([
            'namaPengguna' => "Aliya",
            'email' => "aliya@gmail.com",
            "noMatriks" => "01DDT21F2027",
            "semester" => 5,
            'idProgram' => 6,
            'date' => "2024-03-27",
            'checkin' => "13:30:00",
            'checkout' => "14:00:00",
            'groupNum' => 4,
            'purpose' => "FYP Meeting",
            'roomID' => 01,
        ]);

        Reservation::create([
            'namaPengguna' => "Dhaifina",
            'email' => "dhaifina@gmail.com",
            "noMatriks" => "10DDT21F1007",
            "semester" => 4,
            'idProgram' => 3,
            'date' => "2024-03-27",
            'checkin' => "13:30:00",
            'checkout' => "14:00:00",
            'groupNum' => 5,
            'purpose' => "FYP Meeting",
            'roomID' => 02,
        ]);

        Reservation::create([
            'namaPengguna' => "Hazwani",
            'email' => "wani46@gmail.com",
            "noMatriks" => "10DDT21F1001",
            "semester" => 3,
            'idProgram' => 4,
            'date' => "2024-03-27",
            'checkin' => "13:30:00",
            'checkout' => "14:00:00",
            'groupNum' => 4,
            'purpose' => "Exam Discussion",
            'roomID' => 03,
        ]);
        
        Reservation::create([
            'namaPengguna' => "Amicha",
            'email' => "Arni019@gmail.com",
            "noMatriks" => "10DLC21F1099",
            "semester" => 2,
            'idProgram' => 5,
            'date' => "2024-03-27",
            'checkin' => "13:00:00",
            'checkout' => "13:30:00",
            'groupNum' => 4,
            'purpose' => "Meeting",
            'roomID' => 04,
        ]);

        Reservation::create([
            'namaPengguna' => "Natasha",
            'email' => "elly123@gmail.com",
            "noMatriks" => "10DLC21F1090",
            "semester" => 3,
            'idProgram' => 6,
            'date' => "2024-03-27",
            'checkin' => "12:30:00",
            'checkout' => "13:00:00",
            'groupNum' => 4,
            'purpose' => "Meeting",
            'roomID' => 05,
        ]);

        Reservation::create([
            'namaPengguna' => "Ammar",
            'email' => "ammarcomel@gmail.com",
            "noMatriks" => "10DDT21F1011",
            "semester" => 2,
            'idProgram' => 7,
            'date' => "2024-03-27",
            'checkin' => "12:00:00",
            'checkout' => "12:30:00",
            'groupNum' => 4,
            'purpose' => "Group Discussion",
            'roomID' => 04,
        ]);

        Reservation::create([
            'namaPengguna' => "Marzuki",
            'email' => "marzuki@gmail.com",
            "noMatriks" => "10DLC21F1077",
            "semester" => 2,
            'idProgram' => 8,
            'date' => "2024-03-27",
            'checkin' => "11:00:00",
            'checkout' => "12:00:00",
            'groupNum' => 3,
            'purpose' => "Test Online",
            'roomID' => 03,
        ]);

        Reservation::create([
            'namaPengguna' => "Jaafar",
            'email' => "japakacak@gmail.com",
            "noMatriks" => "10DLC21F1021",
            "semester" => 2,
            'idProgram' => 9,
            'date' => "2024-03-27",
            'checkin' => "10:30:00",
            'checkout' => "11:00:00",
            'groupNum' => 5,
            'purpose' => "Study",
            'roomID' => 01,
        ]);

        Reservation::create([
            'namaPengguna' => "Samad",
            'email' => "samad@gmail.com",
            "noMatriks" => "10DLC21F1049",
            "semester" => 2,
            'idProgram' => 10,
            'date' => "2024-03-27",
            'checkin' => "10:00:00",
            'checkout' => "10:30:00",
            'groupNum' => 4,
            'purpose' => "Study",
            'roomID' => 05,
        ]);

        Reservation::create([
            'namaPengguna' => "Asmaan",
            'email' => "nqnik@gmail.com",
            "noMatriks" => "10DDT21F1079",
            "semester" => 5,
            'idProgram' => 16,
            'date' => "2024-03-27",
            'checkin' => "09:00:00",
            'checkout' => "10:00:00",
            'groupNum' => 2,
            'purpose' => "Study",
            'roomID' => 02,
        ]);
    }
}
