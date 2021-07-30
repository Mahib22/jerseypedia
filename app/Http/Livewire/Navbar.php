<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\League;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.navbar', [
            'leagues' => League::all()
        ]);
    }
}
