<?php

namespace App\Http\Livewire;

use App\Models\Operator;
use Livewire\Component;

class OperatorLivewire extends Component
{
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        if ($this->search != null) {
            $operator = Operator::where('name', 'LIKE', '%' . $this->search . '%')
                                ->orWhere('nik', 'LIKE', '%' . $this->search . '%')
                                ->orWhere('username', 'LIKE', '%' . $this->search . '%')
                                ->simplePaginate(20);
        } else {
            $operator   = Operator::simplePaginate(20);
        }

        return view('livewire.operator-livewire',compact('operator'));
    }
}
