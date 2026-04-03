<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use Livewire\Component;

class OrderList extends Component
{
    public $orders = [];

    public function mount()
    {
        $this->orders = Order::where('is_active', 1)
            ->with('user:id,name,phone')
            ->with('shipping:id,name,mobile_no')
            ->select('id', 'user_id', 'shipping_id', 'order_no', 'order_status', 'sub_total', 'delivery_charge', 'grand_total')
            ->orderBy('id', 'DESC')
            ->orderByRaw("
                CASE
                    WHEN order_status = 'Pending' THEN 1
                    WHEN order_status = 'Accepted' THEN 2
                    WHEN order_status = 'Processing' THEN 3
                    WHEN order_status = 'Shipped' THEN 4
                    WHEN order_status = 'Delivered' THEN 5
                    WHEN order_status = 'Canceled' THEN 6
                    END
                ")
            ->get()?->toArray();
    }

    public function view($id)
    {
        return redirect(route('admin.orders.view', $id));
    }

    public function render()
    {
        return view('livewire.order.order-list');
    }
}
