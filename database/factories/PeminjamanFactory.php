<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PeminjamanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user' => Str::random(10),
            'id_peminjaman' => Str::random(10),
            'nama' => Str::random(10),
            'judul_buku' => Str::random(10),
            'kode_buku' => Str::random(10),
            'isbn' => Str::random(10),
            'no_panggil' => Str::random(10),
            'tanggal_peminjaman' => Carbon::now(),
            'tanggal_pengembalian' => Carbon::now(),
            'jenis_peminjaman' => Str::random(10),
        ];
    }
}
