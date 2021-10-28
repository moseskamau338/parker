<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Zone;

class Zones extends Component
{
    public $count;

    public function mounted()
    {
        $this->count = Zone::count();
    }
    public function render()
    {
        return view('livewire.zones');
    }
}
