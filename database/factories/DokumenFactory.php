<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DokumenFactory extends Factory
{
    public function definition()
    {
        return [
            'catatan' => $this->faker->sentence,
            'dokumen' => $this->faker->word . '.pdf',
            'status' => $this->faker->randomElement(['aktif', 'tidak aktif', 'kadaluarsa']),
            'tanggal_mulai' => $this->faker->date(),
            'tanggal_selesai' => $this->faker->date(),
        ];
    }
}