<div>
    <section class="hot-products-three">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Checkout New Products</span>
                <h2 class="section-title__title">Today’s Hot Deal
                    <br> available now</h2>
            </div>
            <div class="row">
                <!-- Hot Products Two Single Start -->
                @foreach($items as $item)
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="hot-products__single">
                            <div class="hot-products__single-inner">
                                @if(!$item['in_stock'] || $item['stock']<=0)
                                    <div class="overlay">
                                        <p> Out Of Stock</p>
                                    </div>
                                @endif
                                <div class="hot-products__img-box">
                                    <div class="hot-products__img">
                                        <img src="{{ asset('sy/'.$item['small_image']) }}" alt="{{ $item['name'] }}">
                                    </div>
                                </div>
                                <div class="hot-products__content">
                                    <h3 class="hot-products__title"><a href="{{ route('frontend.product.detail',$item['slug']) }}">{{ $item['name'].'-'.$item['unit'] }}</a></h3>
                                    <p class="hot-products__price">	৳{{ $item['price'] }}</p>
                                    <div class="hot-products__btn-box">
                                        <a wire:click="featuredAddToCart('{{ $item['id'] }}')" class="hot-products__btn thm-btn">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

