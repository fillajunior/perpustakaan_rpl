<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OperatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'username' => $this->faker->unique()->username(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'nik' => '46578798746344',
            'alamat' => Str::random(20),
            'jenis_kelamin' => 'laki-laki',
            'tanggal_lahir' => Carbon::now(),
        ];
    }
}
