<?php

namespace App\Http\Livewire\Home;

use App\Models\Product;
use App\Trait\CartTrait;
use Livewire\Component;

class NewItem extends Component
{
    use CartTrait;
    public function itemAddToCart($id){
      $cart =  $this->addItem($id);
      if($cart){
          $this->emit('shoppingCartCount');
          $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Product added to cart successfully.']);
      }else {
          $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Sorry! Item Out Of Stock!.']);
      }
    }
    public function render()
    {
        $items = Product::newItem()?->toArray();
        return view('livewire.home.new-item',compact('items'));
    }
}
