<?php

namespace App\Http\Livewire\Shifts;

use App\Models\Handover;
use Livewire\Component;

class Handovers extends Component
{
    public $handovers = [];

    public function mounted()
    {
        $this->handovers = Handover::all();
    }
    public function render()
    {
        return view('livewire.shifts.handovers');
    }
}
