<?php

namespace App\Http\Livewire;

use App\Models\Katagori;
use Livewire\Component;

class KatagoriLivewire extends Component
{
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        if ($this->search != null) {
            $katagori       = Katagori::where('nama_katagori', 'LIKE', '%' . $this->search . '%')->simplePaginate(20);
        } else {
            $katagori   = Katagori::simplePaginate(20);
        }
        return view('livewire.katagori-livewire',compact('katagori'));
    }
}
