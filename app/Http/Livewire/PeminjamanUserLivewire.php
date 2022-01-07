<?php

namespace App\Http\Livewire;

use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PeminjamanUserLivewire extends Component
{
    public $search;
    protected $queryString = ['search'];
    public function render()
    {
        if ($this->search != null) {
            $peminjaman = Peminjaman::where('user_id',Auth::guard('user')->user()->id)
                                    ->orWhere('nama', 'LIKE', '%' . $this->search . '%')
                                    ->orWhere('judul_buku', 'LIKE', '%' . $this->search . '%')
                                    ->orWhere('kode_buku', 'LIKE', '%' . $this->search . '%')
                                    ->simplePaginate(20);
        } else {
            $peminjaman = Peminjaman::orderBy('created_at', 'DESC')->where('user_id', Auth::guard('user')->user()->id)->simplePaginate(20);
        }
        return view('livewire.peminjaman-user-livewire',compact('peminjaman'));
    }
}
