<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AjuanFactory extends Factory
{
    public function definition()
    {
        return [
            'tanggal_ajuan' => $this->faker->date(),
            'id_admin' => $this->faker->numberBetween(1, 1),
        ];
    }
}