<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KerjasamaFactory extends Factory
{
    public function definition()
    {
        return [
            'no_kerjasama' => $this->faker->unique()->numberBetween(1, 100),
            'id_ajuan' => $this->faker->numberBetween(1, 4),
            'id_pemohon' => $this->faker->numberBetween(1, 2),
            'id_mitra' => $this->faker->numberBetween(1, 1),
            'id_bidang' => $this->faker->numberBetween(1, 4),
            'id_dokumen' => $this->faker->numberBetween(1, 1),
            'jenis_kerjasama' => $this->faker->randomElement(['Memorandum of Understanding (MoU)', 'Memorandum of Agreement (MoA)']),
        ];
    }
}