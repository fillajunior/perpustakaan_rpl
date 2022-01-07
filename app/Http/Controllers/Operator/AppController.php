<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:operator');

        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('operator')->user();
            return $next($request);
        });
    }
}
