<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product;
use App\League;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'products' => Product::take(4)->get(),
            'leagues' => League::all()
        ]);
    }
}
