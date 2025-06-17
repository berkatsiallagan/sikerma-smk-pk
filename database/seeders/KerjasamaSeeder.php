<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KerjasamaSeeder extends Seeder
{
    public function run()
    {
        DB::table('kerjasama')->insert([
            ['id_kerjasama' => 1, 'id_ajuan' => 12, 'id_pemohon' => 11, 'id_mitra' => 20, 'id_bidang' => null, 'id_dokumen' => 17, 'jenis_kerjasama' => 'Memorandum of Understanding (MoU)'],
            ['id_kerjasama' => 2, 'id_ajuan' => 14, 'id_pemohon' => 12, 'id_mitra' => 22, 'id_bidang' => null, 'id_dokumen' => 19, 'jenis_kerjasama' => 'Memorandum of Understanding (MoU)'],
            ['id_kerjasama' => 3, 'id_ajuan' => 15, 'id_pemohon' => 13, 'id_mitra' => 23, 'id_bidang' => null, 'id_dokumen' => 20, 'jenis_kerjasama' => 'Memorandum of Understanding (MoU)'],
            ['id_kerjasama' => 4, 'id_ajuan' => 18, 'id_pemohon' => 14, 'id_mitra' => 25, 'id_bidang' => null, 'id_dokumen' => 21, 'jenis_kerjasama' => 'Memorandum of Understanding (MoU)'],
        ]);
    }
}