<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ManagementUserController extends AppController
{
    public function index()
    {
        $title = 'Management Pengunjung';
        $user = User::simplePaginate(20);
        return view('admin.managementuser.user',compact(['title','user']));
    }

    public function edituser(Request $request)
    {
        $user   = User::where('id', Crypt::decrypt($request->id))->first();
        return response()->json([
            'user'  => $user,
        ]);
    }
    public function destroyuser(Request $request)
    {
        User::where('user_id', Crypt::decrypt($request->id))->delete();
        return redirect()->back()->with('message', 'Hapus User Berhasil');
    }
}
