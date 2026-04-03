<?php

namespace App\Http\Livewire\Checkout;

use Livewire\Component;

class Cart extends Component
{
    public $carts;
    public $total;
    public $grand_total;
    public $delivery_charge;
    public function mount(){
        $this->carts = \Cart::getContent()->toArray();
        $this->total = \Cart::getTotal();
        $this->delivery_charge = 60;
        $this->grand_total = $this->total + $this->delivery_charge;

    }

    public function updateCart($param, $id)
    {
        if ($param == 0) {
            \Cart::update($id, array(
                'quantity' => -1,
            ));
        } else {
            \Cart::update($id, array(
                'quantity' => 1,
            ));
        }
        $this->carts = \Cart::getContent()->toArray();
        $this->total = \Cart::getTotal();
        $this->grand_total = $this->total + $this->delivery_charge;
        $this->emit('shoppingCartCount');
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Item quantity successfully update to  cart.']);
    }
    public function removeItem($id)
    {
        \Cart::remove($id);
        $this->carts = \Cart::getContent()->toArray();
        $this->total = \Cart::getTotal();
        $this->grand_total = $this->total + $this->delivery_charge;
        $this->emit('shoppingCartCount');
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Item successfully removed from cart.']);
    }
    public function render()
    {
        return view('livewire.checkout.cart');
    }
}
