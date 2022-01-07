<?php

namespace App\Http\Controllers\Operator;

use App\Models\Katagori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KatagoriController extends AppController
{
    public function index()
    {
        $title      = 'Katagori';
        $katagori   = Katagori::simplePaginate(20);
        return view('admin.catagories.catagories',compact(['title','katagori']));
    }
    public function storekatagori(Request $request)
    {
        $request->validate([
            'katagori' => 'required'
        ]);

        //Acak Kode Katagori
        $no = Katagori::orderBy("kode_katagori", "DESC")->first();
        if ($no == null) {
            $kode_katagori = 'KTR0001';
        } else {
            $nama = substr($no->kode_katagori, 4, 4);
            $tambah = (int) $nama + 1;
            if (strlen($tambah) == 1) {
                $kode_katagori = 'KTR' . "000" . $tambah;
            } elseif (strlen($tambah) == 2) {
                $kode_katagori = 'KTR' . "00" . $tambah;
            } elseif (strlen($tambah) == 3) {
                $kode_katagori = 'KTR' . "0" . $tambah;
            } else {
                $kode_katagori = 'KTR' . $tambah;
            }
        }

        Katagori::create([
            'kode_katagori' => $kode_katagori,
            'nama_katagori' => $request->katagori,
        ]);

        return redirect()->back()->with('message','Tambah Katagori Berhasil');
    }
    public function editkatagori(Request $request)
    {
        $katagori = Katagori::where('id', Crypt::decrypt($request->id))->first();
        return response()->json([
            'katagori' => $katagori
        ]);
    }
    public function updatekatagori(Request $request)
    {
        Katagori::where('id', Crypt::decrypt($request->id))
            ->update([
                'nama_katagori' => $request->katagori
            ]);
        return redirect()->back()->with('message','Ubah Katagori Berhasil');
    }
    public function destroykatagori(Request $request)
    {
        Katagori::destroy(Crypt::decrypt($request->id));
        return redirect()->back()->with('message','Hapus Katagori Berhasil');
    }
}
