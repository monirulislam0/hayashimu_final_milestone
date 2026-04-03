<?php

namespace App\Http\Livewire\Checkout;

use Livewire\Component;

class CartDetails extends Component
{
    public $carts;
    public $sub_total;
    public $delivery_charge;
    public $grand_total ;
    public function mount(){
        $this->carts = \Cart::getContent()->toArray();
        $this->sub_total = \Cart::getTotal();
        $this->delivery_charge = 60;
        $this->grand_total = $this->sub_total + $this->delivery_charge;
    }
    public function render()
    {
        return view('livewire.checkout.cart-details');
    }
}
