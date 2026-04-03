<div>
    <section class="banner-three">
        <div class="container">
            <div class="row">
                @foreach($banners as $banner)
                <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="banner-three__left">
                        <div class="banner-three__inner">
                            <div class="banner-three__inner-bg"
                                 style="background-image: url({{ asset('sy/'.$banner['image']) }});">
                            </div>
                            @if($banner['name']!=null)
                            <p class="banner-three__tagline">{{ $banner['name'] }}</p>
                            @endif
                            @if($banner['title'] !=null)
                            <h3 class="banner-three__title">{{ $banner['title'] }}</h3>
                            @endif
                            <div class="banner-three__btn-box">
                                <a href="{{ $banner['redirect_url'] }}" class="banner-three__btn thm-btn">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
{{--                <div class="col-xl-3 col-lg-6 wow fadeInUp" data-wow-delay="200ms">--}}
{{--                    <div class="banner-three__middle">--}}
{{--                        <div class="banner-three__middle-inner">--}}
{{--                            <div class="banner-three__img-2">--}}
{{--                                <img src="{{ asset('frontend/images/resources/banner-three-img-2.png') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="banner-three__shape-1">--}}
{{--                                <img src="{{ asset('frontend/images/shapes/banner-three-middel-shape-1.png') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="banner-three__middle-offer">--}}
{{--                                <p>off</p>--}}
{{--                            </div>--}}
{{--                            <div class="banner-three__middle-title-box">--}}
{{--                                <p class="banner-three__middle-tagline">20%</p>--}}
{{--                                <h3 class="banner-three__middle-title">on All Healthy--}}
{{--                                    <br> Beverages</h3>--}}
{{--                            </div>--}}
{{--                            <div class="banner-three__middle-btn-box">--}}
{{--                                <a href="product-details.html" class="banner-three__middle-btn thm-btn">Shop now</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay="300ms">--}}
{{--                    <div class="banner-three__right">--}}
{{--                        <div class="banner-three__right-inner">--}}
{{--                            <div class="banner-three__right-shape-1">--}}
{{--                                <img src="{{ asset('frontend/images/shapes/banner-three-right-shape-1.png') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="banner-three__img-3">--}}
{{--                                <img src="{{ asset('frontend/images/resources/banner-three-img-3.png') }}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="banner-three__right-title-box">--}}
{{--                                <p class="banner-three__right-tagline">100% Healthy</p>--}}
{{--                                <h3 class="banner-three__right-title">Healthy <br> Organic Food</h3>--}}
{{--                            </div>--}}
{{--                            <div class="banner-three__right-btn-box">--}}
{{--                                <a href="product-details.html" class="banner-three__right-btn thm-btn">Shop now</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
</div>
