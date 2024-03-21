<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'roomID' => 01,
            'roomName' => "A1"
        ]);

        Room::create([
            'roomID' => 02,
            'roomName' => "A2"
        ]);

        Room::create([
            'roomID' => 03,
            'roomName' => "A3"
        ]);

        Room::create([
            'roomID' => 04,
            'roomName' => "B3",
        ]);

        Room::create([
            'roomID' => 05,
            'roomName' => "Anjung"
        ]);
    }
}
