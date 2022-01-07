<?php

namespace App\Http\Controllers\Auth\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function form()
    {
        if (Auth::guard('operator')->check()) {
            return redirect(route('operator.dashboard'));
        }
        $title = "Login";
        return view('operator.auth', compact('title'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = ['username' => $request->username, 'password' => $request->password];

        if (Auth::guard('operator')->attempt($credentials, $request->remember_me))
            return redirect()->route('operator.dashboard');

        return redirect()->route('operator.login.form')->with(['error' => "Kata sandi dan username tidak cocok"]);
    }
}
