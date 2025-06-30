<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AjuanSeeder extends Seeder
{
    public function run()
    {
        DB::table('ajuan')->insert([
            ['id_ajuan' => 1, 'tanggal_ajuan' => '2025-01-15', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
            ['id_ajuan' => 2, 'tanggal_ajuan' => '2025-02-20', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
            ['id_ajuan' => 3, 'tanggal_ajuan' => '2025-03-10', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
            ['id_ajuan' => 4, 'tanggal_ajuan' => '2025-04-05', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
            ['id_ajuan' => 5, 'tanggal_ajuan' => '2025-05-12', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
            ['id_ajuan' => 6, 'tanggal_ajuan' => '2025-06-18', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
            ['id_ajuan' => 7, 'tanggal_ajuan' => '2025-07-22', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
            ['id_ajuan' => 8, 'tanggal_ajuan' => '2025-08-30', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
            ['id_ajuan' => 9, 'tanggal_ajuan' => '2025-09-14', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
            ['id_ajuan' => 10, 'tanggal_ajuan' => '2025-10-25', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
            ['id_ajuan' => 11, 'tanggal_ajuan' => '2025-11-08', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
            ['id_ajuan' => 12, 'tanggal_ajuan' => '2025-12-03', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
            ['id_ajuan' => 13, 'tanggal_ajuan' => '2026-01-17', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
            ['id_ajuan' => 14, 'tanggal_ajuan' => '2026-02-21', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
            ['id_ajuan' => 15, 'tanggal_ajuan' => '2026-03-09', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
            ['id_ajuan' => 17, 'tanggal_ajuan' => '2025-06-29', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
            ['id_ajuan' => 18, 'tanggal_ajuan' => '2025-06-30', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
            ['id_ajuan' => 19, 'tanggal_ajuan' => '2025-06-30', 'id_admin' => null, 'created_at' => null, 'updated_at' => null],
        ]);
    }
}
