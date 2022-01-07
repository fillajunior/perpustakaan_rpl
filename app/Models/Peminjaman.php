<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'id_peminjaman',
        'nama',
        'judul_buku',
        'kode_buku',
        'isbn',
        'no_panggil',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'jenis_peminjaman',
    ];
}
