<?php

namespace App\Http\Livewire;

use App\Models\Receipt;
use Livewire\Component;

class Receipts extends Component
{

    public $count = 0;

    public function render()
    {
         $this->count = Receipt::all()->count();
        return view('livewire.receipts');
    }
}
