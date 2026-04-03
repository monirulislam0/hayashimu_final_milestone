<x-app-layout>
    <main>
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
                    CART
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="text-white contact-details">
            <div class="row">
                <section class="cart-page">
                    <livewire:checkout.cart />
                </section>
                <a  href="{{ route('frontend.checkout') }}" class="btn btn-primary btn-block" style="width: 100%;">CHECKOUT</a>
            </div>
        </div>
    </div>
    </main>
</x-app-layout>
