<section id="decks">
    <div class="row match-height">
        <div class="col-12">
            <div class="card-deck-wrapper">
                <div class="card-deck">
                    <div class="row no-gutters">
                        <div class="col-md-7 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Shipping Address</h4>
                                        <small class="card-text">Name: {{ $order['shipping']['name'] }}</small><br>
                                        <small class="card-text">Mobile: {{ $order['shipping']['mobile_no'] }}</small><br>
                                        <small class="card-text">Email: {{ $order['shipping']['email'] }} </small><br>
                                        <small class="card-text">Address: {{ $order['shipping']['address'] }} </small><br>
                                        <small class="card-text">Additional Info: {{ $order['shipping']['apartment'] }} </small>
{{--                                        <small class="card-text">Zip: {{ $order['shipping']['zip'] }}</small>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Billing Address</h4>
                                        <small class="card-text">Invoice: #{{ $order['order_no'] }}</small>
                                        <small class="card-text">Payment Method: #{{ $order['payment_method'] }}</small>
                                        <small class="card-text">  Payment Status: #{{ $order['payment_status'] }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Product name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                @php $sl=0 @endphp
                @foreach($order['order_details'] as $detail)
                    <tr>
                        <td class="text-bold-500">{{ ++$sl }}</td>
                        <td>{{ $detail['products']['name']??null }}</td>
                        <td class="text-bold-500">{{ $detail['qty'] }}</td>
                        <td class="text-bold-500">{{ $detail['price'] * $detail['qty']  }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Sub Total</td>
                    <td class="text-bold-500">{{ $order['sub_total'] }}</td>
                </tr>
                <tr>
                    <td colspan="3">Delivery Charge</td>
                    <td class="text-bold-500">{{ $order['delivery_charge'] }}</td>
                </tr>
                <tr>
                    <td colspan="3">Total</td>
                    <td class="text-bold-500">{{ $order['grand_total'] }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-7">
            <button wire:click="changeOrderStatus('Accepted')" class="btn btn-success" {{ ($order_status=='Pending') ? '':'disabled' }}>
                <span  wire:loading wire:target="changeOrderStatus('Accepted')" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Accepted
            </button>
            <button wire:click="changeOrderStatus('Processing')" class="btn btn-success" {{ ($order_status=='Accepted') ? '':'disabled' }}>
                <span  wire:loading wire:target="changeOrderStatus('Processing')" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Processing
            </button>
            <button wire:click="changeOrderStatus('Shipped')" class="btn btn-success" {{ ($order_status=='Processing') ? '':'disabled' }}>
                <span  wire:loading wire:target="changeOrderStatus('Shipped')" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Shipped
            </button>
            <button wire:click="changeOrderStatus('Delivered')" class="btn btn-success" {{ ($order_status=='Shipped') ? '':'disabled' }}>
                <span  wire:loading wire:target="changeOrderStatus('Delivered')" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Delivered
            </button>
            <button wire:click="changeOrderStatus('Canceled')" class="btn btn-danger" {{ ($order_status=='Shipped' || $order_status=='Delivered' || $order_status=='Canceled' ) ? 'disabled':'' }}>
                <span  wire:loading wire:target="changeOrderStatus('Canceled')" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Canceled
            </button>
        </div>
    </div>
</section>
<!-- Decks section end -->
