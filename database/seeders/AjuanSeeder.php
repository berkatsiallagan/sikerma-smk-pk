<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AjuanSeeder extends Seeder
{
    public function run()
    {
        DB::table('ajuan')->insert([
            ['id_ajuan' => 1, 'tanggal_ajuan' => '2025-03-10', 'id_admin' => 1, 'created_at' => '2025-06-10 07:10:20', 'updated_at' => '2025-06-10 07:10:20'],
            ['id_ajuan' => 2, 'tanggal_ajuan' => '2025-03-10', 'id_admin' => 1, 'created_at' => '2025-06-10 07:10:20', 'updated_at' => '2025-06-10 07:10:20'],
            ['id_ajuan' => 3, 'tanggal_ajuan' => '2025-04-19', 'id_admin' => 1, 'created_at' => '2025-06-10 07:10:20', 'updated_at' => '2025-06-10 07:10:20'],
            ['id_ajuan' => 4, 'tanggal_ajuan' => '2025-04-20', 'id_admin' => 1, 'created_at' => '2025-06-10 07:10:20', 'updated_at' => '2025-06-10 07:10:20'],
            ['id_ajuan' => 12, 'tanggal_ajuan' => '2025-06-16', 'id_admin' => null, 'created_at' => '2025-06-16 03:40:15', 'updated_at' => '2025-06-16 03:40:15'],
            ['id_ajuan' => 14, 'tanggal_ajuan' => '2025-06-16', 'id_admin' => null, 'created_at' => '2025-06-16 04:19:16', 'updated_at' => '2025-06-16 04:19:16'],
            ['id_ajuan' => 15, 'tanggal_ajuan' => '2025-06-17', 'id_admin' => null, 'created_at' => '2025-06-17 02:02:26', 'updated_at' => '2025-06-17 02:02:26'],
            ['id_ajuan' => 18, 'tanggal_ajuan' => '2025-06-17', 'id_admin' => null, 'created_at' => '2025-06-17 02:37:24', 'updated_at' => '2025-06-17 02:37:24'],
        ]);
    }
}