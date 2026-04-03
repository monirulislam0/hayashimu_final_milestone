<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Sl</th>
            <th>Order No</th>
            <th>Ship To</th>
            <th>Subtotal</th>
            <th>Delivery Charge</th>
            <th>Total</th>
            <th>Status</th>
            <th>ACTION</th>
        </tr>
        </thead>
        <tbody>
        @php $sl=0 @endphp
        @foreach($orders as $order)
            <tr>
                <td class="text-bold-500">{{ ++$sl }}</td>
                <td>{{ $order['order_no'] }}</td>
                <td class="text-bold-500">
                    {{ $order['shipping']['name'] }}
                    {{ $order['shipping']['mobile_no'] }}
                </td>
                <td class="text-bold-500">{{ $order['sub_total'] }}</td>
                <td>{{ $order['delivery_charge'] }}</td>
                <td>{{ $order['grand_total'] }}</td>
                <td>
                   {{ $order['order_status'] }}
                </td>
                <td>
                    <button class="btn btn-success" wire:click="view('{{ $order['id'] }}')">View Details</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
