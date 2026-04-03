<?php

namespace App\Http\Livewire\Home;

use App\Models\Product;
use App\Trait\CartTrait;
use Livewire\Component;

class Feature extends Component
{
    use CartTrait;
    public function featuredAddToCart($id){
        $cart =  $this->addItem($id);
        if($cart){
            $this->emit('shoppingCartCount');
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Product added to cart successfully.']);
        }else {
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Sorry! Item out of stock.']);
        }
    }
    public function render()
    {
        $items = Product::featured()?->toArray();
        return view('livewire.home.feature',compact('items'));
    }
}
