<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $title = 'Pengembalian';
        return view('user.pengembalian.pengembalian',compact('title'));
    }
}
