<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JurusanFactory extends Factory
{
    public function definition()
    {
        $jurusan = [
            'Desain Komunikasi Visual',
            'Rekayasa Perangkat Lunak',
            'Teknik Instalasi Tenaga Listrik',
            'Teknik Jaringan Akses Telekomunikasi',
            'Teknik Komputer dan Jaringan'
        ];
        
        return [
            'nama_jurusan' => $this->faker->unique()->randomElement($jurusan),
        ];
    }
}