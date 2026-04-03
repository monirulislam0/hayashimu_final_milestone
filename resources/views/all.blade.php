<x-app-layout>
    <main>
        <div class="py-5 container innerpage-container">
            {{-- <livewire:products.breadcrumb :category_name="$category->name"></livewire:products.breadcrumb> --}}
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <livewire:products.sidebar></livewire:products.sidebar>
                </div>
                <div class="col-md-8 col-lg-9" id="productContainer">
                    <livewire:products.products/>
                </div>
            </div>
        </div>

    </main>
</x-app-layout>
