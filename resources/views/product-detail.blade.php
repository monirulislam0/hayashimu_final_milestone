<x-app-layout>
    <main style="background-color: #fff;">
        <div class="py-5 container innerpage-container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}" class="text-black">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('frontend.product.center') }}" class="text-black">Products Center</a></li>
                    <li class="breadcrumb-item active text-black" aria-current="page" style="color:black !important">Detail</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-3 d-none d-md-block">
                    <livewire:products.sidebar :is_show_top_sidebar="$product['is_show_top_sidebar']"></livewire:products.sidebar>
                </div>
                <div class="col-12 col-md-9">
                    <livewire:products.detail :product="$product"></livewire:products.detail>
                </div>
            </div>
        </div>

    </main>
</x-app-layout>
