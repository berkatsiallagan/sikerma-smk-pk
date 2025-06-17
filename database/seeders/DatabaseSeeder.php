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
            KerjasamaSeeder::class,
            PemohonBidangSeeder::class,
            PemohonJurusanSeeder::class,
        ]);
    }
}