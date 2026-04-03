<?php

namespace App\Http\Livewire\Checkout;

use App\Mail\OrderSubmitMail;
use App\Models\Area;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipping;
use App\Models\User;
use App\Models\UserDetail;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderSubmitNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShippingDetail extends Component
{

    public $mobile;
    public $email;
    public $name;
    public $address;
    public $additional_info;

    public $carts;
    public $sub_total;
    public $delivery_charge;
    public $grand_total;

    public $recipients = [];
    public $notificaiton_data = [];

    public function mount()
    {


        $this->carts = \Cart::getContent()->toArray();
        $this->sub_total = \Cart::getTotal();
        $this->delivery_charge = 0;
        $this->grand_total = $this->sub_total + $this->delivery_charge;
    }

    public function submitOrder()
    {
            $this->validate([
                'name' => 'required|string|max:100',
                'mobile' => 'required|numeric|digits:11',
                'email' => 'nullable|email|max:255',
                'address' => 'nullable|string|max:255',
                'additional_info' => 'nullable|string|max:255',
            ]);


            DB::transaction(function () {
                try {
                    //Insert Shipping Data
                    $shipping = new Shipping();
                    $shipping->name = $this->name;
                    $shipping->mobile_no = $this->mobile;
                    $shipping->address = $this->address;
                    $shipping->email = $this->email;
                    $shipping->apartment = $this->additional_info;
                    $shipping->save();

                    $shipping_id = $shipping->id;

                    //Insert Order Table Data
                    $order = new Order();
                    $order->shipping_id = $shipping_id;
                    $order->order_no = $this->getOrderId();
                    $order->shipping_method = 'Delivery';
                    $order->payment_method = 'COD';
                    $order->payment_status = 'Pending';
                    $order->order_status = 'Pending';
                    $order->sub_total = $this->sub_total;
                    $order->delivery_charge = $this->delivery_charge;
                    $order->grand_total = $this->grand_total;
                    $order->is_active = true;
                    $order->save();

                    //Insert Order Detail Data
                    foreach ($this->carts as $cart) {
                        $order_details = new OrderDetail();
                        $order_details->order_id = $order->id;
                        $order_details->product_id = $cart['attributes']['product_id'];
                        $order_details->qty = $cart['quantity'];
                        $order_details->price = $cart['price'];
                        $order_details->save();
                        DB::table('products')->where('id', $cart['attributes']['product_id'])->decrement('stock', $cart['quantity']);
                    }
//                    $admin_mail = config('settings.default_email_address');
//                    $this->recipients = [$shipping->email, $admin_mail];
//                    $this->notificaiton_data = ['user_name' => $this->name, 'order_id' => $order->id];
                    DB::commit();
                    \Cart::clear();
//                    Mail::to($this->email)
//                        ->cc($this->recipients)
//                        ->send(new OrderSubmitMail($this->notificaiton_data));
                    $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Order has been successfully submitted.']);
                    return redirect(route('frontend.order.complete', $order->order_no));
                } catch (Exception $e) {
                    DB::rollBack();
                    $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => $e]);
                    throw $e;
                }
            });

        }

    public function getOrderId()
    {
        $lastOrder = Order::orderBY('id', 'DESC')->first();
        if ($lastOrder != null) {
            $last = $lastOrder->order_no;
        } else {
            $last = 100000;
        }

        $new_no = $last + 1;
        return $new_no;
    }

    public function render()
    {
        return view('livewire.checkout.shipping-detail');
    }
}
