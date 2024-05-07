<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatan = [
            [ 'idJabatan' => 1, 'namaJabatan' => 'Jabatan Perdagangan', 'shortJabatan' => 'JP'],
            [ 'idJabatan' => 2, 'namaJabatan' => 'Jabatan Pelancongan & Hospitaliti', 'shortJabatan' => 'JPH'],
            [ 'idJabatan' => 3, 'namaJabatan' => 'Jabatan Kejuruteraan Mekanikal', 'shortJabatan' => 'JKM'],
            [ 'idJabatan' => 4, 'namaJabatan' => 'Jabatan Kejuruteraan Elektrik', 'shortJabatan' => 'JKE'],
            [ 'idJabatan' => 5, 'namaJabatan' => 'Jabatan Kejuruteraan Awam', 'shortJabatan' => 'JKA'],
            [ 'idJabatan' => 6, 'namaJabatan' => 'TVET', 'shortJabatan' => 'TVET'],
        ];

        foreach ($jabatan as $each) {
            Jabatan::create($each);
        }

    }
}
