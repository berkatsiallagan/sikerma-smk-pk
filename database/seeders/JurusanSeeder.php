<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    public function run()
    {
        DB::table('jurusan')->insert([
            ['id_jurusan' => 1, 'nama_jurusan' => 'Desain Komunikasi Visual'],
            ['id_jurusan' => 2, 'nama_jurusan' => 'Rekayasa Perangkat Lunak'],
            ['id_jurusan' => 3, 'nama_jurusan' => 'Teknik Instalasi Tenaga Listrik'],
            ['id_jurusan' => 4, 'nama_jurusan' => 'Teknik Jaringan Akses Telekomunikasi'],
            ['id_jurusan' => 5, 'nama_jurusan' => 'Teknik Komputer dan Jaringan'],
        ]);
    }
}