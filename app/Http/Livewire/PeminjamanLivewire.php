<?php

namespace App\Http\Livewire;

use App\Models\Peminjaman;
use Livewire\Component;

class PeminjamanLivewire extends Component
{
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        if ($this->search != null) {
            $peminjaman = Peminjaman::where('nama', 'LIKE', '%' . $this->search . '%')
                                ->orWhere('judul_buku', 'LIKE', '%' . $this->search . '%')
                                ->orWhere('kode_buku', 'LIKE', '%' . $this->search . '%')
                                ->simplePaginate(20);
        } else {
            $peminjaman = Peminjaman::orderBy('created_at','DESC')->simplePaginate(20);
        }
        return view('livewire.peminjaman-livewire',compact('peminjaman'));
    }
}
