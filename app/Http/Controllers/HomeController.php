<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Katagori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    public function index()
    {
        $title      = 'Home';
        $book       = Book::orderBy('judul_buku')->simplePaginate(20);
        $katagori   = Katagori::all();
        return view('user.home',compact(['title','book','katagori']));
    }
    public function getdatabuku(Request $request)
    {
        $book = Book::where('id',Crypt::decrypt($request->id))->first();
        return response()->json([
            'book' => $book
        ]);
    }
}
