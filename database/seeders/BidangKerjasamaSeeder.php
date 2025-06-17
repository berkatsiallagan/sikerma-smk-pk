<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangKerjasamaSeeder extends Seeder
{
    public function run()
    {
        DB::table('bidang_kerjasama')->insert([
            ['id_bidang' => 1, 'nama_bidang' => 'pendidikan'],
            ['id_bidang' => 2, 'nama_bidang' => 'penelitian'],
            ['id_bidang' => 3, 'nama_bidang' => 'pengabdian kepada masyarakat'],
            ['id_bidang' => 4, 'nama_bidang' => 'digitalisasi produk'],
        ]);
    }
}