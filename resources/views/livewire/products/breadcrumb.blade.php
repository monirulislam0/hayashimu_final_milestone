<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item" style="color: #000 !important;  "><a style="color: #000 !important; href="{{ route('frontend.home') }}">Home</a></li>

        <li class="breadcrumb-item" style="color: #000 !important;"><a style="color: #000 !important; href="{{ route('frontend.product.center') }}">Products Center</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="color: #000 !important;">{{ $category_name }}</li>
    </ol>
</nav>
