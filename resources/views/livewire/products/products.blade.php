<div class="row g-3 products-items">
    @if($products->count()>0)
    @foreach($products as $product)
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="p-1 d-flex justify-content-center">
                <a href="{{ route('frontend.product.detail',$product->slug) }}"><img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="height: 250px;"></a>
            </div>
            <div class="card-body d-flex flex-column align-items-center">
                <div class="text-overflow-ctrl text-overflow-ctrl-1">
                    <a href="{{ route('frontend.product.detail',$product->slug) }}" class="text-dark text-decoration-none">{{ $product->name }}</a>
                </div>
                <div class="font-normal">
                    Model: {{ $product->model }}
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{ $products->links('vendor.pagination.bootstrap-4') }}
        @endif
</div>
@if (!empty($cat_desc))
    <div class="font-lato text-dark mt-4 bg-white">
        <div class="p-3 ">
            {!! $cat_desc !!}
        </div>
    </div>
@endif