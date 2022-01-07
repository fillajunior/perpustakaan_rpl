<?php

namespace App\Http\Livewire;

use App\Models\Pengembalian;
use Livewire\Component;

class PengembalianLivewire extends Component
{
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        if ($this->search != null) {
            $pengembalian = Pengembalian::where('nama', 'LIKE', '%' . $this->search . '%')
                                    ->orWhere('judul_buku', 'LIKE', '%' . $this->search . '%')
                                    ->orWhere('kode_buku', 'LIKE', '%' . $this->search . '%')
                                    ->simplePaginate(20);
        } else {
            $pengembalian = Pengembalian::orderBy('created_at', 'DESC')->simplePaginate(20);
        }
        return view('livewire.pengembalian-livewire',compact('pengembalian'));
    }
}
