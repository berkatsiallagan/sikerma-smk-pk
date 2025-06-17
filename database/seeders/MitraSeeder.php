<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MitraSeeder extends Seeder
{
    public function run()
    {
        DB::table('mitra')->insert([
            ['id_mitra' => 1, 'nama_mitra' => 'PT. Infineon', 'lingkup' => 'Nasional', 'website' => 'https://www.infineon.com', 'email' => 'infineon@gmail.com'],
            ['id_mitra' => 2, 'nama_mitra' => 'PT. Berkat Sentosa', 'lingkup' => 'Nasional', 'website' => 'https://chat.deepseek.com', 'email' => 'flowtunder@gmail.com'],
            ['id_mitra' => 6, 'nama_mitra' => 'PT. Fajar Jaya', 'lingkup' => 'Internasional', 'website' => 'https://fadil.com', 'email' => 'dwe@gmail.com'],
            ['id_mitra' => 7, 'nama_mitra' => 'PT. Bagus Raya', 'lingkup' => 'Nasional', 'website' => 'https://fajar.com', 'email' => 'harimuktibagus@gmail.com'],
            ['id_mitra' => 20, 'nama_mitra' => 'PT. Fajar Jaya', 'lingkup' => 'Nasional', 'website' => 'https://chat.deepseek.com', 'email' => 'harimuktibagus@gmail.com'],
            ['id_mitra' => 22, 'nama_mitra' => 'PT. Berkat Sentosa', 'lingkup' => 'Nasional', 'website' => 'https://chat.deepseek.com', 'email' => 'avivaharry.20@gmail.com'],
            ['id_mitra' => 23, 'nama_mitra' => 'PT. Berkat Sentosa', 'lingkup' => 'Nasional', 'website' => 'https://chat.deepseek.com', 'email' => 'flowtunder@gmail.com'],
            ['id_mitra' => 25, 'nama_mitra' => 'PT. Bagus Raya', 'lingkup' => 'Internasional', 'website' => 'https://fajar.com', 'email' => 'harimuktibagus@gmail.com'],
        ]);
    }
}