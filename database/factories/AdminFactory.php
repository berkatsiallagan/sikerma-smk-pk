<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'kata_sandi' => bcrypt('password'),
        ];
    }
}