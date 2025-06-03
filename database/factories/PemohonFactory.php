<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PemohonFactory extends Factory
{
    public function definition()
    {
        return [
            'no_permohonan' => 'PMH' . $this->faker->unique()->numberBetween(10, 99),
            'nama_pemohon' => $this->faker->name,
            'id_jurusan' => $this->faker->numberBetween(1, 5),
            'nomor_telp' => $this->faker->phoneNumber,
        ];
    }
}