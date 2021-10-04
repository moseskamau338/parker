<?php

namespace App\Http\Livewire\Zone;

use Livewire\Component;
use App\Models\Zone;

class Zones extends Component
{
    public $zones = [];

    public function mount()
    {
        $this->zones = Zone::all(['id','name']);
    }

    public function render()
    {
        return view('livewire.zone.zones');
    }
}
