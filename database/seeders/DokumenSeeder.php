<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokumen;

class DokumenSeeder extends Seeder
{
    public function run()
    {
        Dokumen::create([
            'catatan' => null,
            'dokumen' => 'dokumencoba',
            'status' => 'tidak aktif',
            'tanggal_mulai' => '2025-05-07',
            'tanggal_selesai' => '2025-05-16',
        ]);
    }
}