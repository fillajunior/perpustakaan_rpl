<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $title = 'Checkout Buku';
        $checkout = Checkout::where('user_id',Auth::guard('user')->user()->id)
                            ->join('books','books.isbn','=','checkouts.isbn')
                            ->join('katagoris', 'katagoris.kode_katagori','=','books.jenis_buku')
                            ->paginate(20);
        return view('user.checkout',compact(['title','checkout']));
    }
    public function storecheckout(Request $request)
    {
        Checkout::create([
            'user_id' => Auth::guard('user')->user()->id,
            'isbn' => $request->isbn,
        ]);
        return redirect()->back()->with('message','Buku Sudah Dimasukan Kedalam Keranjang');
    }
}
