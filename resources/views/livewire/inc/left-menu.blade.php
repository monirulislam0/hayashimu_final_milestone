<div class="main-slider-three__categories-box">
    <div class="main-slider-three__categories">
        <h3 class="main-slider-three__categories-title">All Categories</h3>
        <ul class="main-slider-three__categories-list list-unstyled">
            @foreach($categories as $category)
            <li><a href="{{ route('frontend.products',$category['slug']) }}"><i class="{{ $category['icon'] }}"></i> {{ $category['name'] }}<span
                        class="fas fa-angle-right"></span></a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
