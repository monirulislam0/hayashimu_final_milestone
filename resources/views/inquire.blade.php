<x-app-layout>
    <main>
        <div class="py-5 container innerpage-container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products Center</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-3">
                    <livewire:products.sidebar :is_show_top_sidebar="1"></livewire:products.sidebar>
                </div>
                <div class="col-9">
                    <livewire:products.inquire></livewire:products.inquire>
                </div>
            </div>
        </div>

    </main>
</x-app-layout>
