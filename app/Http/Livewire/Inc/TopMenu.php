<?php

namespace App\Http\Livewire\Inc;

use App\Models\Product;
use App\Models\Category;
use App\Trait\CartTrait;
use Livewire\Component;

class TopMenu extends Component
{
    public $product_categories;
    public $filter_key;
    public $suggestions = [];
    public $noResultsMessage = '';
    public function mount(){
       $this->product_categories = Category::menu();
    }
    public function filter(){
        $this->suggestions = [];
        
        $this->suggestions = Product::where('name', 'like', '%' . $this->filter_key . '%')->limit(8)->get();
        
        if (count($this->suggestions) === 0) {
            $this->noResultsMessage = 'No products available.';
        } else {
            $this->noResultsMessage = '';
        }
        
        $this->emit('filter_products',$this->filter_key);
    }
    public function render()
    {
        return view('livewire.inc.top-menu');
    }
}
