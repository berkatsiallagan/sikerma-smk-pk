<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            JurusanSeeder::class,
            MitraSeeder::class,
            PemohonSeeder::class,
            BidangKerjasamaSeeder::class,
            DokumenSeeder::class,
            AjuanSeeder::class,
            KerjasamaSeeder::class,
        ]);
    }
}