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
            [ 'idProgram' => 1, 'namaProgram' => 'DUP'],
            [ 'idProgram' => 2, 'namaProgram' => 'DCC'],
            [ 'idProgram' => 3, 'namaProgram' => 'DEV'],
            [ 'idProgram' => 4, 'namaProgram' => 'DHF'],
            [ 'idProgram' => 5, 'namaProgram' => 'DPM'],
            [ 'idProgram' => 6, 'namaProgram' => 'DAT'],
            [ 'idProgram' => 7, 'namaProgram' => 'DPR'],
            [ 'idProgram' => 8, 'namaProgram' => 'DKA'],
            [ 'idProgram' => 9, 'namaProgram' => 'DGU'],
            [ 'idProgram' => 10, 'namaProgram' => 'DSB'],
            [ 'idProgram' => 11, 'namaProgram' => 'DKM'],
            [ 'idProgram' => 12, 'namaProgram' => 'DTP'],
            [ 'idProgram' => 13, 'namaProgram' => 'DEM'],
            [ 'idProgram' => 14, 'namaProgram' => 'DET'],
            [ 'idProgram' => 15, 'namaProgram' => 'DTK'],
            [ 'idProgram' => 16, 'namaProgram' => 'TVET'],
        ];

        foreach ($program as $each) {
            Program::create($each);
        }
    }
}
