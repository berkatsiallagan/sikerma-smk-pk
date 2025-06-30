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
            ['id_jurusan' => 6, 'nama_jurusan' => 'Akuntansi'],
            ['id_jurusan' => 7, 'nama_jurusan' => 'Bisnis Digital'],
            ['id_jurusan' => 8, 'nama_jurusan' => 'Teknik Elektronika'],
            ['id_jurusan' => 9, 'nama_jurusan' => 'Teknik Mekatronika'],
            ['id_jurusan' => 10, 'nama_jurusan' => 'Administrasi Perkantoran'],
        ]);
    }
}
