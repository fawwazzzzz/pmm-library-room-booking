<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program = [
            [ 'idProgram' => 1, 'namaProgram' => 'Program Perakaunan'],
            [ 'idProgram' => 2, 'namaProgram' => 'Program Teknologi Maklumat Dan Komunikasi'],
        ];

        foreach ($program as $each) {
            Program::create($each);
        }
    }
}
