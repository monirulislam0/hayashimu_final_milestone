<?php

namespace App\Http\Livewire\Product;

use App\Trait\CartTrait;
use Livewire\Component;

class Add extends Component
{
    use CartTrait;
    public $product_id;
    public $qty = 1;

    public function mount($id){
       $this->product_id = $id;
    }
    public function plus(){
        $this->qty+=1;
    }
    public function minus(){
        if($this->qty>1){
            $this->qty-=1;
        }
    }
    public function add(){
        $add = $this->addItem($this->product_id,$this->qty);
        $this->emit('shoppingCartCount');
        if($add) {
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Item successfully added.']);
        }else{
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Sorry! Item out of stock.']);
        }
    }
    public function render()
    {
        return view('livewire.product.add');
    }
}
