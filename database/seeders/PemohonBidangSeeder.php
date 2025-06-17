<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemohonBidangSeeder extends Seeder
{
    public function run()
    {
        DB::table('pemohon_bidang')->insert([
            ['id_bidang' => 1, 'id_pemohon' => 12],
            ['id_bidang' => 2, 'id_pemohon' => 12],
            ['id_bidang' => 2, 'id_pemohon' => 13],
            ['id_bidang' => 2, 'id_pemohon' => 14],
            ['id_bidang' => 3, 'id_pemohon' => 12],
            ['id_bidang' => 3, 'id_pemohon' => 13],
            ['id_bidang' => 4, 'id_pemohon' => 12],
        ]);
    }
}