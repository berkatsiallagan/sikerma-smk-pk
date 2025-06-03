<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mitra;

class MitraSeeder extends Seeder
{
    public function run()
    {
        Mitra::create([
            'nama_mitra' => 'Budi Susanto',
            'negara' => 'Indonesia',
            'website' => null,
            'email' => '',
        ]);
    }
}