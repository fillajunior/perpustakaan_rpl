<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Book;
use App\Models\Katagori;
use App\Models\Operator;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $katagori = [
            ['kode_katagori' => 'KTR0001', 'nama_katagori' => 'Publikasi Umum, informasi umum dan komputer'],
            ['kode_katagori' => 'KTR0002', 'nama_katagori' => 'Bibiliografi'],
            ['kode_katagori' => 'KTR0003', 'nama_katagori' => 'Perpustakaan dan informasi'],
            ['kode_katagori' => 'KTR0004', 'nama_katagori' => 'Ensiklopedia dan buku yang memuat fakta-fakta'],
            ['kode_katagori' => 'KTR0005', 'nama_katagori' => 'Tidak ada klasifikasi '],
            ['kode_katagori' => 'KTR0006', 'nama_katagori' => 'Majalah dan Jurnal'],
            ['kode_katagori' => 'KTR0007', 'nama_katagori' => 'Asosiasi, Organisasi dan Museum'],
            ['kode_katagori' => 'KTR0008', 'nama_katagori' => 'Media massa, junalisme dan publikasi'],
            ['kode_katagori' => 'KTR0009', 'nama_katagori' => 'Kutipan'],
            ['kode_katagori' => 'KTR0010', 'nama_katagori' => 'Manuskrip dan buku langka'],
            ['kode_katagori' => 'KTR0011', 'nama_katagori' => 'Filsafat dan psikologi'],
            ['kode_katagori' => 'KTR0012', 'nama_katagori' => 'Metafisika'],
            ['kode_katagori' => 'KTR0013', 'nama_katagori' => 'Epistimologi'],
            ['kode_katagori' => 'KTR0014', 'nama_katagori' => 'Parapsikologi dan Okultisme'],
            ['kode_katagori' => 'KTR0015', 'nama_katagori' => 'Pemikiran Filosofis'],
            ['kode_katagori' => 'KTR0016', 'nama_katagori' => 'Psikologi'],
            ['kode_katagori' => 'KTR0017', 'nama_katagori' => 'Filosofis Logis'],
            ['kode_katagori' => 'KTR0018', 'nama_katagori' => 'Etik'],
            ['kode_katagori' => 'KTR0019', 'nama_katagori' => 'ilosofi kuno, zaman pertengahan, dan filosofi ketimuran'],
            ['kode_katagori' => 'KTR0020', 'nama_katagori' => 'Filosofi barat modern'],
        ];
        Katagori::insert($katagori);
        // Book::factory(100)->create();
        // Katagori::factory(100)->create();
        User::factory(100)->create();
        Operator::factory(100)->create();
        // Peminjaman::factory(100)->create();
        // Pengembalian::factory(100)->create();
        Admin::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('12345678')
        ]);


    }
}
