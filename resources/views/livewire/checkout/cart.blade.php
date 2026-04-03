<div class="container">
    <h2>PRODUCTS</h2>
    <div class="table-responsive">
        <table class="table cart-table">
            <thead>
            <tr>
                <th>Item</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Remove</th>
            </tr>
            </thead>
            <tbody>
            @foreach($carts as $cart)
            <tr>
                <td>
                    <div class="product-box">
                        <div class="img-box">
                            <img src="{{ asset('storage/'.$cart['attributes']['image']) }}" alt="" height="100x">
                        </div>
                    </div>
                </td>
                <td>{{ $cart['name'] }}</td>
                <td>৳{{ $cart['price'] }}</td>
                <td>
                    <div class="quantity-box">
                        <button type="button" class="sub"  wire:click="updateCart(0,'{{$cart['id']}}')"><i class="fa fa-minus"></i></button>
                        <input type="number" id="product-1" value="{{ $cart['quantity'] }}" />
                        <button type="button" class="add" wire:click="updateCart(1,'{{$cart['id']}}')"><i class="fa fa-plus"></i></button>
                    </div>
                </td>
                <td>
                    ৳{{ $cart['price']*$cart['quantity'] }}
                </td>
                <td>
                    <div class="cross-icon">
                        <i class="fa fa-trash remove-icon" wire:click="removeItem('{{ $cart['id']  }}')"></i>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>


{{--    <div class="row">--}}
{{--        <div class="col-xl-8 col-lg-7">--}}
{{--            <form action="#" class="default-form cart-cupon__form">--}}
{{--                <input type="text" placeholder="Enter coupon code" class="cart-cupon__input">--}}
{{--                <button class="thm-btn" type="submit">--}}
{{--                    <span>Apply coupon</span>--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--        <div class="col-xl-4 col-lg-5">--}}
{{--            <ul class="cart-total list-unstyled">--}}
{{--                <li>--}}
{{--                    <span>Subtotal</span>--}}
{{--                    <span>৳ {{ $total }}</span>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <span>Shipping cost</span>--}}
{{--                    <span>৳ {{ $delivery_charge }}</span>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <span>Total</span>--}}
{{--                    <span class="cart-total-amount">৳{{ $grand_total }}</span>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <div class="cart-page__buttons">--}}
{{--                <div class="cart-page__buttons-1">--}}
{{--                    <a href="#" class="thm-btn">Update</a>--}}
{{--                </div>--}}
{{--                <div class="cart-page__buttons-2">--}}
{{--                    <a href="{{ route('frontend.checkout') }}" class="thm-btn">Checkout</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
