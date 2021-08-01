<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\User;

class Checkout extends Component
{
    public $total_price, $phone_number, $address;

    public function mount(){
        if(!Auth::user()){
            return redirect()->route('login');
        }

        $this->phone_number = Auth::user()->phone_number;
        $this->address = Auth::user()->address;

        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if(!empty($order)){
            $this->total_price = $order->total_price + $order->unique_code;
        }else{
            return redirect()->route('home');
        }
    }

    public function checkout(){
        $this->validate([
            'phone_number' => 'required',
            'address' => 'required'
        ]);

        //simpan no. hp dan alamat ke data user
        $user = User::where('id', Auth::user()->id)->first();
        $user->phone_number = $this->phone_number;
        $user->address = $this->address;
        $user->update();

        //update data pesanan
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $order->status = 1;
        $order->update();

        $this->emit('addCart');
        session()->flash('message', 'Berhasil Checkout');
        return redirect()->route('history');
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
