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
            [ 'idJabatan' => 1, 'namaJabatan' => 'Jabatan Perdagangan'],
            [ 'idJabatan' => 2, 'namaJabatan' => 'JPH'],
            [ 'idJabatan' => 3, 'namaJabatan' => 'Jabatan Kejuruteraan Mekanikal'],
            [ 'idJabatan' => 4, 'namaJabatan' => 'Jabatan Kejuruteraan Elektrik'],
            [ 'idJabatan' => 5, 'namaJabatan' => 'Jabatan Kejuruteraan Awam'],
            [ 'idJabatan' => 6, 'namaJabatan' => 'TVET'],
        ];

        foreach ($jabatan as $each) {
            Jabatan::create($each);
        }

    }
}
