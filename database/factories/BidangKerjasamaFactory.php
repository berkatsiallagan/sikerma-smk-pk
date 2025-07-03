<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BidangKerjasamaFactory extends Factory
{
    public function definition()
    {
        $bidang = [
            'pendidikan',
            'penelitian',
            'pengabdian kepada masyarakat',
            'digitalisasi produk'
        ];
        
        return [
            'nama_bidang' => $this->faker->unique()->randomElement($bidang),
        ];
    }
}