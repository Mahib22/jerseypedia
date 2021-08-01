<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Order;

class History extends Component
{
    public $orders;

    public function render()
    {
        if (Auth::user()) {
            $this->orders = Order::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
        }

        return view('livewire.history');
    }
}
