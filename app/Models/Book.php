<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_buku',
        'isbn',
        'judul_buku',
        'pengarang',
        'penerbit',
        'jumlah_buku',
        'jenis_buku',
        'tahun_penerbit',
        'letak_buku',
        'asal_buku',
    ];
}
