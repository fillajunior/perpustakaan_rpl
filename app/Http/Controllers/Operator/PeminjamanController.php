<?php

namespace App\Http\Controllers\Operator;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PeminjamanController extends AppController
{
    public function index()
    {
        $title = 'Peminjaman Buku';
        return view('admin.peminjaman.peminjaman',compact(['title']));
    }
    public function storepeminjaman(Request $request)
    {
        $request->validate([
            'nama'          => 'required',
            'judul_buku'    => 'required',
            'kode_buku'     => 'required',
            'isbn'          => 'required',
        ]);

        //Acak Kode Peminjaman
        $no = Peminjaman::orderBy("id_peminjaman", "DESC")->first();
        if ($no == null) {
            $id_peminjaman = 'PMJ0001';
        } else {
            $nama = substr($no->id_peminjaman, 4, 4);
            $tambah = (int) $nama + 1;
            if (strlen($tambah) == 1) {
                $id_peminjaman = 'PMJ' . "000" . $tambah;
            } elseif (strlen($tambah) == 2) {
                $id_peminjaman = 'PMJ' . "00" . $tambah;
            } elseif (strlen($tambah) == 3) {
                $id_peminjaman = 'PMJ' . "0" . $tambah;
            } else {
                $id_peminjaman = 'PMJ' . $tambah;
            }
        }

        Peminjaman::create([
            'id_user'       => Auth::user()->id,
            'id_peminjaman' => $id_peminjaman,
            'nama'          => $request->nama,
            'judul_buku'    => $request->judul_buku,
            'kode_buku'     => $request->kode_buku,
            'isbn'          => $request->isbn,
        ]);
        return redirect()->back()->with('message','Simpan Peminjaman Berhasil');
    }
    public function editpeminjaman(Request $request)
    {
        $peminjaman = Peminjaman::where('id',Crypt::decrypt($request->id))->first();
        return response()->json([
            'peminjaman' => $peminjaman,
        ]);
    }
    public function updatepeminjaman(Request $request)
    {
        Peminjaman::where('id',Crypt::decrypt($request->id))
                    ->update([
                        'tanggal_peminjaman'    => $request->tanggal_peminjaman,
                        'tanggal_pengembalian'  => $request->tanggal_pengembalian,
                        'jenis_peminjaman'      => $request->jenis_peminjaman,
                    ]);
        return redirect()->back()->with('message','Update Peminjaman Berhasil');
    }
    public function destroypeminjaman(Request $request)
    {
        Peminjaman::destroy(Crypt::decrypt($request->id));
        return redirect()->back()->with('message','Delete Peminjaman Berhasil');
    }
}
