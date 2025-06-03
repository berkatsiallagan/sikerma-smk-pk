<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    public function run()
    {
        $jurusan = [
            ['nama_jurusan' => 'Desain Komunikasi Visual'],
            ['nama_jurusan' => 'Rekayasa Perangkat Lunak'],
            ['nama_jurusan' => 'Teknik Instalasi Tenaga Listrik'],
            ['nama_jurusan' => 'Teknik Jaringan Akses Telekomunikasi'],
            ['nama_jurusan' => 'Teknik Komputer dan Jaringan'],
        ];
        
        foreach ($jurusan as $j) {
            Jurusan::create($j);
        }
    }
}