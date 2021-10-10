<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        $users = User::with('roles')->paginate(5);
        return view('livewire.users', compact('users'));
    }
}
