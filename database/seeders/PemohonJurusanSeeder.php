<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemohonJurusanSeeder extends Seeder
{
    public function run()
    {
        DB::table('pemohon_jurusan')->insert([
            ['id_jurusan' => 1, 'id_pemohon' => 12],
            ['id_jurusan' => 1, 'id_pemohon' => 13],
            ['id_jurusan' => 2, 'id_pemohon' => 11],
            ['id_jurusan' => 2, 'id_pemohon' => 12],
            ['id_jurusan' => 2, 'id_pemohon' => 13],
            ['id_jurusan' => 3, 'id_pemohon' => 11],
            ['id_jurusan' => 3, 'id_pemohon' => 12],
            ['id_jurusan' => 3, 'id_pemohon' => 14],
            ['id_jurusan' => 4, 'id_pemohon' => 12],
            ['id_jurusan' => 5, 'id_pemohon' => 12],
            ['id_jurusan' => 5, 'id_pemohon' => 13],
        ]);
    }
}