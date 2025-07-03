<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin')->insert([
            'id_admin' => 1,
            'email' => 'admin@gmail.com',
            'kata_sandi' => '$2y$10$PUopdhNrDMn2Oz7mgpn3Ye3hytvOhzK7Mb2FEzMUkaG6o6yMuKvk2',
        ]);
    }
}