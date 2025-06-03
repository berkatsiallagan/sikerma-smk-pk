<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BidangKerjasama;

class BidangKerjasamaSeeder extends Seeder
{
    public function run()
    {
        $bidang = [
            ['nama_bidang' => 'pendidikan'],
            ['nama_bidang' => 'penelitian'],
            ['nama_bidang' => 'pengabdian kepada masyarakat'],
            ['nama_bidang' => 'digitalisasi produk'],
        ];
        
        foreach ($bidang as $b) {
            BidangKerjasama::create($b);
        }
    }
}