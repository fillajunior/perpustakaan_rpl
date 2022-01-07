<?php

namespace App\Http\Controllers\Auth\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::guard('operator')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('operator.login.form');
    }
}
