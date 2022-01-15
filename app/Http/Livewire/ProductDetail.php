<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order;
use App\OrderDetail;
use App\Wishlist;

class ProductDetail extends Component
{
    public $product, $order_quantity;

    public function mount($id){
        $productDetail = Product::find($id);

        if($productDetail){
            $this->product = $productDetail;
        }
    }

    public function render()
    {
        return view('livewire.product-detail');
    }

    public function addToCart(){
        $this->validate([
            'order_quantity' => 'required'
        ]);

        //validasi jika belum login
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        //menghitung total harga
        $total_price = $this->order_quantity * $this->product->price;

        //cek apakah user punya data pesanan utama yg statusnya 0
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //menyimpan/update data pesanan utama
        if (empty($order)) {
            Order::create([
                'user_id' => Auth::user()->id,
                'total_price' => $total_price,
                'status' => 0,
                'unique_code' => mt_rand(100, 999),
            ]);

            $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $order->order_code = 'JP-'.$order->id;
            $order->update();

        } else {
            $order->total_price = $order->total_price + $total_price;
            $order->update();
        }

        //menyimpan pesanan detail
        OrderDetail::create([
            'product_id' => $this->product->id,
            'order_id' => $order->id,
            'order_quantity' => $this->order_quantity,
            'total_price' => $total_price
        ]);

        $this->emit('addCart');
        session()->flash('message', 'Berhasil Ditambahkan ke Keranjang');
        return redirect()->back();
        
    }

    public function addToWishlist(){
        //validasi jika belum login
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        //menyimpan data
        Wishlist::create([
            'product_id' => $this->product->id,
            'user_id' => Auth::user()->id
        ]);

        $this->emit('addWishlist');
        session()->flash('message', 'Berhasil Ditambahkan ke Wishlist');
        return redirect()->back();
    }
}
