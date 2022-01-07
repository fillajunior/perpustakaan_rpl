<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_buku'=> Str::random(8),
            'isbn'=> Str::random(8),
            'judul_buku'=> Str::random(50),
            'pengarang'=> Str::random(20),
            'penerbit'=> Str::random(30),
            'jumlah_buku'=> 80,
            'jenis_buku'=> 3,
            'letak_buku'=> 5,
            'tahun_penerbit'=> "2021",
            'asal_buku'=> Str::random(8),
        ];
    }
}
