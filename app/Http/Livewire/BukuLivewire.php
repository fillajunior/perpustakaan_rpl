<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class BukuLivewire extends Component
{
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        if ($this->search != null) {
            $book   = Book::where('kode_buku', 'LIKE' ,'%' . $this->search . '%')
                        ->orWhere('judul_buku', 'LIKE' ,'%' . $this->search . '%')
                        ->orWhere('pengarang', 'LIKE' ,'%' . $this->search . '%')
                        ->orWhere('penerbit', 'LIKE' ,'%' . $this->search . '%')
                        ->simplePaginate(50);
        } else {
            $book   = Book::orderBy('judul_buku')->simplePaginate(50);
        }

        return view('livewire.buku-livewire',compact(['book']));
    }
}
