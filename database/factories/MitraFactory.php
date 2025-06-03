<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MitraFactory extends Factory
{
    public function definition()
    {
        return [
            'nama_mitra' => $this->faker->company,
            'negara' => $this->faker->country,
            'website' => $this->faker->url,
            'email' => $this->faker->companyEmail,
        ];
    }
}