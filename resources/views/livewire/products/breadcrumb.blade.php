<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>

        <li class="breadcrumb-item"><a href="{{ route('frontend.product.center') }}">Products Center</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $category_name }}</li>
    </ol>
</nav>
