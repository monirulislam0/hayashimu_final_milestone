<div class="container">
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="service-details__left">
                <ul class="service-details__category-list list-unstyled">
                    <li class="{{ ($content_view=='order' || $content_view=='detail_order') ? 'active' : '' }}"><a wire:click="changeContent('order')">Order List<span
                                class="icon-right-arrow"></span></a>
                    </li>
                    <li class="{{ ($content_view=='profile') ? 'active' : '' }}"><a wire:click="changeContent('profile')">User Profile<span
                                class="icon-right-arrow"></span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7">
            <div class="service-details__right">
                <div class="service-details__img">
                    <div class="service-details__icon">
                        <span class="icon-harvest"></span>
                    </div>
                </div>
                @if($content_view=='detail_order')
                    <h4>Order Details: #{{ $order_no }}</h4>
                    @if($details)
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($details as $order)
                                <tr>
                                    <td>{{ $order['products']['name'] }}</td>
                                    <td>{{ $order['qty'] }}</td>
                                    <td>৳{{ $order['price'] * $order['qty'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h2>No order found!</h2>
                    @endif
                @endif
                @if($content_view=='order')
                    <h4>Order List</h4>
                @if($orders)
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Order No</th>
                            <th>Total Price</th>
                            <th>Payment Status</th>
                            <th>Order Status</th>
                            <th>View Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order['order_no'] }}</td>
                            <td>৳{{ $order['grand_total'] }}</td>
                            <td>{{ $order['payment_status'] }}</td>
                            <td>{{ $order['order_status'] }}</td>
                            <td>
                                <button wire:click="viewDetail('{{ $order['id'] }}','{{ $order['order_no'] }}')" class="btn btn-primary">
                                    View Detail
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <h2>No order found!</h2>
                    @endif
                @endif

                @if($content_view=='profile')
                <div>
                <div>
                    <h4>Location</h4>
                    <button class="btn btn-success">{{ $div_name }}->{{ $dist_name }}->{{ $area_name }}</button>
                    <button class="btn btn-primary" wire:click="changeStatus">Change</button>
                    <br><br>
                    @if($change_status==1)
                    <form class="account__form" wire:submit.prevent="updateUserLocation" method="POST">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="billing_input_box">
                                    <div class="select-box">
                                        <select class="form-select wide" wire:click="selectDivUser($event.target.value)">
                                            <option>Select your area</option>
                                            @foreach($divisions as $div)
                                                <option value="{{ $div['id'] }}">{{ $div['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('area_id')
                                        <div class="alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($step==2 || $step==3 || $step==4)
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="billing_input_box">
                                        <div class="select-box">
                                            <select class="form-select wide" wire:click="selectDistUser($event.target.value)">
                                                <option>Select your area</option>
                                                @foreach($districts as $dis)
                                                    <option value="{{ $dis['id'] }}">{{ $dis['name'] }}</option>
                                                @endforeach
                                            </select>
                                            @error('area_id')
                                            <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($step==3 || $step==4)
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="billing_input_box">
                                        <div class="select-box">
                                            <select class="form-select wide" wire:click="selectAreaUser($event.target.value)">
                                                <option>Select your area</option>
                                                @foreach($areas as $area)
                                                    <option value="{{ $area['id'] }}">{{ $area['name'] }}</option>
                                                @endforeach
                                            </select>
                                            @error('area_id')
                                            <div class="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($step==4)
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="checked-box">
                                    <button class="btn btn-success">Change Location</button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </form>
                    @endif
                </div>
                <br><br>
                <form class="account__form" wire:submit.prevent="updateUser" method="POST">
                    <div class="account__form-input-box">
                        <label for="name">Name</label>
                        <input type="text" id="name" wire:model.lazy="name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="account__form-input-box">
                        <label for="email">Email</label>
                        <input type="text" id="email" wire:model.lazy="email">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="account__form-input-box">
                        <label for="address">Address</label>
                        <input type="text" id="address" wire:model.lazy="address">
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="account__form-input-box">
                        <label for="apartment">Apartment</label>
                        <input type="text" id="apartment" wire:model.lazy="apartment">
                        @error('apartment')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="account__form-input-box">
                        <label for="zip">Postal Code</label>
                        <input type="text" id="zip" wire:model.lazy="post_code">
                        @error('post_code')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="checked-box">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
