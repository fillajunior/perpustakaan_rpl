<?php

namespace App\Http\Controllers\Operator;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PengembalianController extends AppController
{
    public function index()
    {
        $title = 'Pengembalian Buku';
        return view('admin.pengembalian.pengembalian', compact(['title']));
    }
    public function storepenegambalian(Request $request)
    {
        $request->validate([
            'id'            => 'required',
            'keterlambatan' => 'required',
            'jumlah_buku'   => 'required',
            'alamat'        => 'required',
        ]);

        $peminjaman = Peminjaman::where('id',Crypt::decrypt($request->id))->first();

        //Acak Kode Peminjaman
        $no = Pengembalian::orderBy("id_pengambalian", "DESC")->first();
        if ($no == null) {
            $id_pengambalian = 'PMB0001';
        } else {
            $nama = substr($no->id_pengambalian, 4, 4);
            $tambah = (int) $nama + 1;
            if (strlen($tambah) == 1) {
                $id_pengambalian = 'PMB' . "000" . $tambah;
            } elseif (strlen($tambah) == 2) {
                $id_pengambalian = 'PMB' . "00" . $tambah;
            } elseif (strlen($tambah) == 3) {
                $id_pengambalian = 'PMB' . "0" . $tambah;
            } else {
                $id_pengambalian = 'PMB' . $tambah;
            }
        }

        Pengembalian::create([
            'id_pengembalian'       => $id_pengambalian,
            'nama'                  => $peminjaman->nama,
            'judul_buku'            => $peminjaman->judul_buku,
            'kode_buku'             => $peminjaman->_kode_buku,
            'isbn'                  => $peminjaman->isbn,
            'tanggal_peminjaman'    => $peminjaman->tanggal_peminjaman,
            'tanggal_pengembalian'  => $peminjaman->tanggal_pengembalian,
            'keterlambatan'         => $request->keterlamabatan,
            'jumlah_buku'           => $request->jumlah_buku,
            'alamat'                => $request->alamat,
        ]);
        return redirect()->back()->with('message','Simpan Pengambalian Berhasil');
    }
    public function editpengambalian(Request $request)
    {
        $pengambalian = Pengembalian::where('id',Crypt::decrypt($request->id))->first();
        return response()->json([
            'pengambalian' => $pengambalian
        ]);
    }
    public function updatepengambalian(Request $request)
    {
        Pengembalian::where('id',Crypt::decrypt($request->id))
            ->update([
            'nama'                  => $request->nama,
            'judul_buku'            => $request->judul_buku,
            'kode_buku'             => $request->_kode_buku,
            'isbn'                  => $request->isbn,
            'tanggal_peminjaman'    => $request->tanggal_peminjaman,
            'tanggal_pengembalian'  => $request->tanggal_pengembalian,
            'keterlambatan'         => $request->keterlamabatan,
            'jumlah_buku'           => $request->jumlah_buku,
            'alamat'                => $request->alamat,
        ]);
        return redirect()->back()->with('message','Update Pengambalian Berhasil');
    }
    public function destorypengambalian(Request $request)
    {
        Pengembalian::destroy(Crypt::decrypt($request->id));
        return redirect()->back()->with('message','Update Pengambalian Berhasil');
    }
}
