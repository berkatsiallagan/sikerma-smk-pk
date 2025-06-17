<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            BidangKerjasamaSeeder::class,
            JurusanSeeder::class,
            MitraSeeder::class,
            PemohonSeeder::class,
            AjuanSeeder::class,
            DokumenSeeder::class,
            PemohonBidangSeeder::class, // Moved before KerjasamaSeeder
            PemohonJurusanSeeder::class,
            KerjasamaSeeder::class,
        ]);
    }
}