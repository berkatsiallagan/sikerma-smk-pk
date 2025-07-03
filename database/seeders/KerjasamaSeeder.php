<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KerjasamaSeeder extends Seeder
{
    public function run()
    {
        DB::table('kerjasama')->insert([
            ['id_kerjasama' => 2, 'id_ajuan' => 18, 'id_pemohon' => 17, 'id_mitra' => 13, 'id_bidang' => null, 'id_dokumen' => 17, 'jenis_kerjasama' => 'Memorandum of Understanding (MoU)'],
            ['id_kerjasama' => 3, 'id_ajuan' => 19, 'id_pemohon' => 18, 'id_mitra' => 9, 'id_bidang' => null, 'id_dokumen' => 18, 'jenis_kerjasama' => 'Memorandum of Agreement (MoA)'],
        ]);
    }
}
