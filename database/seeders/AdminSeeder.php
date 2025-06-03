<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin; // Make sure this line is present

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'email' => 'admin@gmail.com',
            'kata_sandi' => bcrypt('password'),
        ]);
    }
}