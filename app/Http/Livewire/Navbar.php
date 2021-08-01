<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\League;
use App\Order;
use App\OrderDetail;

class Navbar extends Component
{
    public $total = 0;

    protected $listeners = [
        'addCart' => 'updateCart'
    ];

    public function updateCart(){
        if (Auth::user()) {
            $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if($order){
                $this->total = OrderDetail::where('order_id', $order->id)->count();
            }
        }
    }

    public function mount(){
        if (Auth::user()) {
            $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if($order){
                $this->total = OrderDetail::where('order_id', $order->id)->count();
            }
        }
    }

    public function render()
    {
        return view('livewire.navbar', [
            'leagues' => League::all(),
            'order_quantity' => $this->total,
        ]);
    }
}
