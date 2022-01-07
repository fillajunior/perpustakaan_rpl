<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Katagori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BookController extends AppController
{
    public function index()
    {
        $title      = 'Daftar Buku';
        $katagori   = Katagori::all();
        return view('admin.book.book',compact(['title','katagori']));
    }
    public function storebuku(Request $request)
    {
        $request->validate([
            'judul_buku'    => 'required',
            'isbn'          => 'required',
            'pengarang'     => 'required',
            'penerbit'      => 'required',
            'letak_buku'    => 'required',
            'asal_buku'     => 'required',
            'jumlah_buku'   => 'required',
            'tahun_penerbit'=> 'required',
            'jenis_buku'    => 'required',
        ]);

        //Acak Kode Buku
        $no = Book::orderBy("kode_buku", "DESC")->first();
        if ($no == null) {
            $kode_buku = 'BKU0001';
        } else {
            $nama = substr($no->kode_buku, 4, 4);
            $tambah = (int) $nama + 1;
            if (strlen($tambah) == 1) {
                $kode_buku = 'BKU' . "000" . $tambah;
            } elseif (strlen($tambah) == 2) {
                $kode_buku = 'BKU' . "00" . $tambah;
            } elseif (strlen($tambah) == 3) {
                $kode_buku = 'BKU' . "0" . $tambah;
            } else {
                $kode_buku = 'BKU' . $tambah;
            }
        }

        Book::create([
            'kode_buku'     => $kode_buku,
            'judul_buku'    => $request->judul_buku,
            'isbn'          => $request->isbn,
            'pengarang'     => $request->pengarang,
            'penerbit'      => $request->penerbit,
            'letak_buku'    => $request->letak_buku,
            'asal_buku'     => $request->asal_buku,
            'jumlah_buku'   => $request->jumlah_buku,
            'tahun_penerbit'=> $request->tahun_penerbit,
            'jenis_buku'    => $request->jenis_buku,
        ]);

        return redirect()->back()->with('message','Tambah Buku Berhasil');
    }
    public function editbuku(Request $request)
    {
        $book = Book::where('id',Crypt::decrypt($request->id))->first();
        return response()->json([
            'book' => $book,
        ]);
    }
    public function updatebuku(Request $request)
    {
        Book::where('id',Crypt::decrypt($request->id))
            ->update([
                'judul_buku'    => $request->judul_buku,
                'isbn'          => $request->isbn,
                'pengarang'     => $request->pengarang,
                'penerbit'      => $request->penerbit,
                'letak_buku'    => $request->letak_buku,
                'asal_buku'     => $request->asal_buku,
                'jumlah_buku'   => $request->jumlah_buku,
                'tahun_penerbit'=> $request->tahun_penerbit,
                'jenis_buku'    => $request->jenis_buku,
            ]);
        return redirect()->back()->with('message', 'Ubah Buku Berhasil');
    }
    public function destroybuku(Request $request)
    {
        Book::destroy(Crypt::decrypt($request->id));
        return redirect()->back()->with('message', 'Hapus Buku Berhasil');
    }
}
