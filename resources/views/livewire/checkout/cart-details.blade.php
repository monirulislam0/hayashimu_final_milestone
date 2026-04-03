<div class="your_order">
    <h2>Your order</h2>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="order_table_box">
                <table class="order_table_detail">
                    <thead class="order_table_head">
                    <tr>
                        <th>Product</th>
                        <th></th>
                        <th class="right">Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carts as $cart)
                    <tr>
                        <td class="pro__title">{{ $cart['name'] }}*{{ $cart['quantity'] }}</td>
                        <td></td>
                        <td class="pro__price right">৳ {{ $cart['price']*$cart['quantity'] }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="pro__title" colspan="2">Subtotal</td>
                        <td class="pro__price">৳ {{ $sub_total }}</td>
                    </tr>
                    <tr>
                        <td class="pro__title" colspan="2">Shipping</td>
                        <td class="pro__price">৳ {{ $delivery_charge }}</td>
                    </tr>
                    <tr>
                        <td class="pro__title" colspan="2">Total</td>
                        <td class="pro__price">৳ {{ $grand_total }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
     <div class="form-check mt-3">
        <input class="form-check-input" type="radio" name="paymentMethod" id="cashOnDelivery" value="cashOnDelivery" checked>
        <label class="form-check-label" for="cashOnDelivery">
          Cash On Delivery
        </label>
      </div>
</div>
