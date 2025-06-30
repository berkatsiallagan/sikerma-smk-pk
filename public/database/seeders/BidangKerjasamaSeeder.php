<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangKerjasamaSeeder extends Seeder
{
    public function run()
    {
        DB::table('bidang_kerjasama')->insert([
            ['id_bidang' => 1, 'nama_bidang' => 'Pendidikan'],
            ['id_bidang' => 2, 'nama_bidang' => 'Penelitian'],
            ['id_bidang' => 3, 'nama_bidang' => 'Pengabdian kepada Masyarakat'],
            ['id_bidang' => 4, 'nama_bidang' => 'Digitalisasi Produk'],
            ['id_bidang' => 5, 'nama_bidang' => 'Pelatihan dan Sertifikasi'],
            ['id_bidang' => 6, 'nama_bidang' => 'Pertukaran Pelajar'],
            ['id_bidang' => 7, 'nama_bidang' => 'Magang dan Rekrutmen'],
            ['id_bidang' => 8, 'nama_bidang' => 'Pengembangan Kurikulum'],
            ['id_bidang' => 9, 'nama_bidang' => 'Budak'],
        ]);
    }
}
