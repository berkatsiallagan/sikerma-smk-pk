<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemohonSeeder extends Seeder
{
    public function run()
    {
        DB::table('pemohon')->insert([
            ['id_pemohon' => 11, 'no_permohonan' => 'PMH11', 'nama_pemohon' => 'paldi', 'nomor_telp' => '0778421558'],
            ['id_pemohon' => 12, 'no_permohonan' => 'PMH12', 'nama_pemohon' => 'bagus', 'nomor_telp' => '0778421558'],
            ['id_pemohon' => 13, 'no_permohonan' => 'PMH13', 'nama_pemohon' => 'bambang', 'nomor_telp' => '0778-4215-58'],
            ['id_pemohon' => 14, 'no_permohonan' => 'PMH14', 'nama_pemohon' => 'bambang', 'nomor_telp' => '0778-4215-58'],
        ]);
    }
}