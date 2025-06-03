<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pemohon;

class PemohonSeeder extends Seeder
{
    public function run()
    {
        Pemohon::create([
            'no_permohonan' => 'PMH01',
            'nama_pemohon' => '0',
            'id_jurusan' => 3,
            'nomor_telp' => 0,
        ]);
        
        Pemohon::create([
            'no_permohonan' => 'PMH02',
            'nama_pemohon' => '0',
            'id_jurusan' => 5,
            'nomor_telp' => 0,
        ]);
    }
}