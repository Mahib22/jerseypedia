<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Product;
use App\League;

class ProductLeague extends Component
{
    use WithPagination;

    public $search, $league;
    protected $updateQueryString = ['search'];
    
    public function render()
    {
        if ($this->search) {
            $products = Product::where('league_id', $this->league->id)->where('name', 'like', '%'.$this->search.'%')->paginate(8);
        } else {
            $products = Product::where('league_id', $this->league->id)->paginate(8);
        }
        return view('livewire.product-index', [
            'products' => $products,
            'title' => 'Jersey ' . $this->league->name
        ]);
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function mount($id){
        $leagueDetail = League::find($id);

        if($leagueDetail){
            $this->league = $leagueDetail;
        }
    }
}
