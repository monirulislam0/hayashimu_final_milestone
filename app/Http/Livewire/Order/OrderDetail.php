<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderStatusNotification;
use Livewire\Component;

class OrderDetail extends Component
{
    public array $order = [];
    public int $order_id;
    public string $order_status;

    public function mount($id){
        $this->order_id = $id;
        $this->order = Order::with(['shipping'=>function($q){
                $q->select('id','name','mobile_no','email','address','apartment','zip');
        }])
            ->with(['order_details'=>function($q){
                $q->with('products:id,name');
            }])
            ->where('id',$id)
            ->first()?->toArray();

        $this->order_status = $this->order['order_status'];
    }

    public function changeOrderStatus($status){
        $order = Order::find($this->order_id);
        $order->update(['order_status'=>$status]);
        $this->order_status = $order->order_status;
        $message = 'Order '.$status.' Successfully';
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => $message]);
    }
    public function render()
    {
        return view('livewire.order.order-detail');
    }
}
