<x-app-layout>
    <main>
        <div class="container innerpage-container py-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Inquire</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    <div class="error-page__inner">
                        <div class="error-page__title-box">
                            <div class="error-page__title-img-1">
                                <img src="{{ asset('frontend/images/order-complete.png') }}" alt=""/>
                            </div>
                        </div>
                        <h3 class="error-page__tagline">Your Inquire is successfully submitted!</h3>
                        <p class="error-page__text">We will communicate with you very soon.</p>
                        <a style="margin-top:20px;" href="{{ route('frontend.home') }}" class="thm-btn error-page__btn">Back
                            to Shop</a>

                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </main>
</x-app-layout>
