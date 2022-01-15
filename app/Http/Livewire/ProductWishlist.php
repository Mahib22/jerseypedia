<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Wishlist;

class ProductWishlist extends Component
{
    public $wishlists;

    public function render()
    {
        if (Auth::user()) {
            $this->wishlists = Wishlist::where('user_id', Auth::user()->id)->get();
        }

        return view('livewire.product-wishlist');
    }
}
