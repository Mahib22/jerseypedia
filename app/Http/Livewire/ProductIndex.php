<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Product;

class ProductIndex extends Component
{
    use WithPagination;

    public $search;
    protected $updateQueryString = ['search'];
    
    public function render()
    {
        if ($this->search) {
            $products = Product::where('name', 'like', '%'.$this->search.'%')->paginate(8);
        } else {
            $products = Product::paginate(8);
        }
        return view('livewire.product-index', [
            'products' => $products
        ]);
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
