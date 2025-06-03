<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kerjasama;

class KerjasamaSeeder extends Seeder
{
    public function run()
    {
        Kerjasama::create([
            'no_kerjasama' => '1',
            'id_ajuan' => 1,
            'id_pemohon' => 1,
            'id_mitra' => 1,
            'id_bidang' => 1,
            'id_dokumen' => 1,
            'jenis_kerjasama' => 'Memorandum of Understanding (MoU)',
        ]);
    }
}