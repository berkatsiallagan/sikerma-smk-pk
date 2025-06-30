<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemohonBidangSeeder extends Seeder
{
    public function run()
    {
        DB::table('pemohon_bidang')->insert([
            ['id_bidang' => 1, 'id_pemohon' => 1],
            ['id_bidang' => 1, 'id_pemohon' => 2],
            ['id_bidang' => 1, 'id_pemohon' => 7],
            ['id_bidang' => 1, 'id_pemohon' => 10],
            ['id_bidang' => 1, 'id_pemohon' => 15],
            ['id_bidang' => 2, 'id_pemohon' => 1],
            ['id_bidang' => 2, 'id_pemohon' => 3],
            ['id_bidang' => 2, 'id_pemohon' => 8],
            ['id_bidang' => 2, 'id_pemohon' => 11],
            ['id_bidang' => 3, 'id_pemohon' => 1],
            ['id_bidang' => 3, 'id_pemohon' => 4],
            ['id_bidang' => 3, 'id_pemohon' => 9],
            ['id_bidang' => 3, 'id_pemohon' => 12],
            ['id_bidang' => 3, 'id_pemohon' => 16],
            ['id_bidang' => 3, 'id_pemohon' => 18],
            ['id_bidang' => 4, 'id_pemohon' => 2],
            ['id_bidang' => 4, 'id_pemohon' => 5],
            ['id_bidang' => 4, 'id_pemohon' => 10],
            ['id_bidang' => 4, 'id_pemohon' => 13],
            ['id_bidang' => 4, 'id_pemohon' => 17],
            ['id_bidang' => 5, 'id_pemohon' => 3],
            ['id_bidang' => 5, 'id_pemohon' => 6],
            ['id_bidang' => 5, 'id_pemohon' => 11],
            ['id_bidang' => 5, 'id_pemohon' => 14],
            ['id_bidang' => 6, 'id_pemohon' => 4],
            ['id_bidang' => 6, 'id_pemohon' => 7],
            ['id_bidang' => 6, 'id_pemohon' => 12],
            ['id_bidang' => 6, 'id_pemohon' => 15],
            ['id_bidang' => 7, 'id_pemohon' => 5],
            ['id_bidang' => 7, 'id_pemohon' => 8],
            ['id_bidang' => 7, 'id_pemohon' => 13],
            ['id_bidang' => 8, 'id_pemohon' => 6],
            ['id_bidang' => 8, 'id_pemohon' => 9],
            ['id_bidang' => 8, 'id_pemohon' => 14],
            ['id_bidang' => 8, 'id_pemohon' => 16],
        ]);
    }
}
