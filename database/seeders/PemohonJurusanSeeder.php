<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemohonJurusanSeeder extends Seeder
{
    public function run()
    {
        DB::table('pemohon_jurusan')->insert([
            ['id_jurusan' => 1, 'id_pemohon' => 1],
            ['id_jurusan' => 1, 'id_pemohon' => 6],
            ['id_jurusan' => 1, 'id_pemohon' => 10],
            ['id_jurusan' => 2, 'id_pemohon' => 1],
            ['id_jurusan' => 2, 'id_pemohon' => 7],
            ['id_jurusan' => 2, 'id_pemohon' => 11],
            ['id_jurusan' => 3, 'id_pemohon' => 2],
            ['id_jurusan' => 3, 'id_pemohon' => 6],
            ['id_jurusan' => 3, 'id_pemohon' => 12],
            ['id_jurusan' => 3, 'id_pemohon' => 16],
            ['id_jurusan' => 3, 'id_pemohon' => 18],
            ['id_jurusan' => 4, 'id_pemohon' => 2],
            ['id_jurusan' => 4, 'id_pemohon' => 7],
            ['id_jurusan' => 4, 'id_pemohon' => 13],
            ['id_jurusan' => 5, 'id_pemohon' => 3],
            ['id_jurusan' => 5, 'id_pemohon' => 8],
            ['id_jurusan' => 5, 'id_pemohon' => 12],
            ['id_jurusan' => 6, 'id_pemohon' => 3],
            ['id_jurusan' => 6, 'id_pemohon' => 9],
            ['id_jurusan' => 6, 'id_pemohon' => 13],
            ['id_jurusan' => 7, 'id_pemohon' => 4],
            ['id_jurusan' => 7, 'id_pemohon' => 8],
            ['id_jurusan' => 7, 'id_pemohon' => 14],
            ['id_jurusan' => 7, 'id_pemohon' => 16],
            ['id_jurusan' => 8, 'id_pemohon' => 4],
            ['id_jurusan' => 8, 'id_pemohon' => 9],
            ['id_jurusan' => 8, 'id_pemohon' => 15],
            ['id_jurusan' => 9, 'id_pemohon' => 5],
            ['id_jurusan' => 9, 'id_pemohon' => 10],
            ['id_jurusan' => 9, 'id_pemohon' => 14],
            ['id_jurusan' => 9, 'id_pemohon' => 17],
            ['id_jurusan' => 10, 'id_pemohon' => 5],
            ['id_jurusan' => 10, 'id_pemohon' => 11],
            ['id_jurusan' => 10, 'id_pemohon' => 15],
        ]);
    }
}
