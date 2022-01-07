<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends AppController
{
    public function index()
    {
        $title = 'Home';
        $book = Book::orderBy('judul_buku')->simplePaginate(20);
        return view('operator.home', compact(['title', 'book']));
    }
    public function getdatabuku(Request $request)
    {
        $book = Book::where('id', Crypt::decrypt($request->id))->first();
        return response()->json([
            'book' => $book
        ]);
    }
}
