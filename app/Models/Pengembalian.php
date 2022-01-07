<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'id_pengembalian',
        'nama',
        'judul_buku',
        'kode_buku',
        'isbn',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'keterlambatan',
        'jumlah_buku',
        'alamat',
    ];
}
