<x-app-layout>
    <div class="container innerpage-container py-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>

        <div class="row py-4">
            <div class="col-md-10">
                <div class="fs-2 mb-3 text-white">
                    Checkout
                </div>

            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="text-white contact-details">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="billing_details">
                            <livewire:checkout.cart />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--<form class="billing_details_form" wire:submit.prevent="submitOrder">-->
        <div class="text-white contact-details">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="billing_details">
                        <div class="billing_title">
                            <h2>Shipping details</h2>
                        </div>
                        <livewire:checkout.shipping-detail/>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <livewire:checkout.cart-details />
                </div>
            </div>
        </div>
    <!--</form>-->
    </div>
</x-app-layout>

