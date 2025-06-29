<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MitraSeeder extends Seeder
{
    public function run()
    {
        // Insert mitra dasar
        DB::table('mitra')->insert([
            ['id_mitra' => 1, 'nama_mitra' => 'PT. Infineon', 'lingkup' => 'Nasional'],
            ['id_mitra' => 2, 'nama_mitra' => 'PT. Berkat Sentosa', 'lingkup' => 'Nasional'],
            ['id_mitra' => 6, 'nama_mitra' => 'PT. Fajar Jaya', 'lingkup' => 'Internasional'],
            ['id_mitra' => 7, 'nama_mitra' => 'PT. Bagus Raya', 'lingkup' => 'Nasional'],
            ['id_mitra' => 20, 'nama_mitra' => 'PT. Fajar Jaya', 'lingkup' => 'Nasional'],
            ['id_mitra' => 22, 'nama_mitra' => 'PT. Berkat Sentosa', 'lingkup' => 'Nasional'],
            ['id_mitra' => 23, 'nama_mitra' => 'PT. Berkat Sentosa', 'lingkup' => 'Nasional'],
            ['id_mitra' => 25, 'nama_mitra' => 'PT. Bagus Raya', 'lingkup' => 'Internasional'],
        ]);

        // Insert kontak mitra
        DB::table('mitra_kontak')->insert([
            ['id_kontak' => 1, 'id_mitra' => 1, 'website' => 'https://www.infineon.com', 'email' => 'infineon@gmail.com', 'tipe_kontak' => 'Utama'],
            ['id_kontak' => 2, 'id_mitra' => 2, 'website' => 'https://chat.deepseek.com', 'email' => 'flowtunder@gmail.com', 'tipe_kontak' => 'Utama'],
            // Tambahkan sesuai kebutuhan
        ]);
    }
}