<?php

namespace Database\Seeders;

use App\Models\Month;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $month = [
            [ 'monthID' => 5 ],
            [ 'monthID' => 6 ],
            [ 'monthID' => 7 ],
            [ 'monthID' => 8 ],
        ];

        foreach($month as $each) {
            Month::create($each);
        }
    }
}
