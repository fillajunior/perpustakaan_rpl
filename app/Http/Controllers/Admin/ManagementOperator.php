<?php

namespace App\Http\Controllers\Admin;

use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ManagementOperator extends AppController
{
    public function index()
    {
        $title      = 'Menagament Operator';
        return view('admin.managementuser.operator',compact(['title']));
    }
    public function storeoperator(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'username'      => 'required',
            'password'      => 'required',
            'nik'           => 'required',
            'tanggal_lahir' => 'required',
            'alamat'        => 'required',
            'jenis_kelamin' => 'required',
        ]);

        if ($request->jenis_kelamin == 1) {
            $kelamin = 'laki-laki';
        } else {
            $kelamin = 'perempuan';
        }

        Operator::create([
            'name'          => $request->name,
            'username'      => $request->username,
            'password'      => Hash::make($request->password),
            'nik'           => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat'        => $request->alamat,
            'jenis_kelamin' => $kelamin,
        ]);
        return redirect()->back()->with('message','Tambah Operator Berhasil');
    }
    public function editoperator(Request $request)
    {
        $operator   = Operator::where('id',Crypt::decrypt($request->id))->first();
        return response()->json([
            'operator'  => $operator,
        ]);
    }
    public function updateoperator(Request $request)
    {
        if ($request->jenis_kelamin == 1) {
            $kelamin = 'laki-laki';
        } else {
            $kelamin = 'perempuan';
        }

        Operator::where('id', Crypt::decrypt($request->id))
            ->update([
            'nama'          => $request->nama,
            'nik'           => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat'        => $request->alamat,
            'jenis_kelamin' => $kelamin,
        ]);

        return redirect()->back()->with('message','Ubah Operator Berhasil');
    }
    public function destroyoperator(Request $request)
    {
        Operator::where('user_id', Crypt::decrypt($request->id))->delete();
        return redirect()->back()->with('message','Hapus Operator Berhasil');
    }
}
