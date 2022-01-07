<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class PeminjamanController extends Controller
{
    public function index()
    {
        $title = 'Peminjaman';
        return view('user.peminjaman.peminjaman',compact('title'));
    }
    public function storepeminjaman(Request $request)
    {
        // Acak Kode Peminjaman
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
        if ($request->checkout == 'all') {
            $checkout = Checkout::where('user_id', Auth::guard('user')->user()->id)
                                ->join('books', 'books.isbn', '=', 'checkouts.isbn')
                                ->join('katagoris', 'katagoris.kode_katagori', '=', 'books.jenis_buku')
                                ->get();
            for ($i=0; $i < count($checkout); $i++) {
                Peminjaman::create([
                    'user_id'       => Auth::guard('user')->user()->id,
                    'id_peminjaman' => $id_peminjaman,
                    'nama'          => Auth::guard('user')->user()->name,
                    'judul_buku'    => $checkout[$i]->judul_buku,
                    'kode_buku'     => $checkout[$i]->kode_buku,
                    'isbn'          => $checkout[$i]->isbn,
                    'no_panggil'    => 'NPL-' . Str::random(5),
                ]);
            }
            Checkout::where('user_id',Auth::guard('user')->user()->id)->delete();
        } else {
            $checkout = Checkout::where('user_id', Auth::guard('user')->user()->id)
                                ->where('checkouts.isbn', Crypt::decrypt($request->checkout))
                                ->join('books', 'books.isbn', '=', 'checkouts.isbn')
                                ->join('katagoris', 'katagoris.kode_katagori', '=', 'books.jenis_buku')
                                ->first();
            Peminjaman::create([
                'user_id'       => Auth::guard('user')->user()->id,
                'id_peminjaman' => $id_peminjaman,
                'nama'          => Auth::guard('user')->user()->name,
                'judul_buku'    => $checkout->judul_buku,
                'kode_buku'     => $checkout->kode_buku,
                'isbn'          => $checkout->isbn,
                'no_panggil'    => 'NPL-' . Str::random(5),
            ]);
            Checkout::where('isbn', Crypt::decrypt($request->checkout))->delete();
        }
        return redirect()->back()->with('message','Peminjaman Masih Dipreses Silahkan Tunggu Nomer Pangilan Anda');
    }
    public function showpeminjaman(Request $request)
    {
        $peminjaman = Peminjaman::where('id',Crypt::decrypt($request->id))->first();
        return response()->json([
            'peminjaman' => $peminjaman
        ]);
    }
}
