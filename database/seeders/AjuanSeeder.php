<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ajuan;

class AjuanSeeder extends Seeder
{
    public function run()
    {
        Ajuan::create(['tanggal_ajuan' => '2025-03-10']);
        Ajuan::create(['tanggal_ajuan' => '2025-03-10']);
        Ajuan::create(['tanggal_ajuan' => '2025-04-19']);
        Ajuan::create(['tanggal_ajuan' => '2025-04-20']);
    }
}