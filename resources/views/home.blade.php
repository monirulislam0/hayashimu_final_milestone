<x-app-layout>
    
    <main>
        <livewire:inc.slider></livewire:inc.slider>
        <div class="main-body">
            
            <div>
                <div class="text-center fs-2 mb-3 fw-bold text-white" style="text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.7);">
                    PRODUCT CATEGORY
                </div>
                <livewire:inc.categories></livewire:inc.categories>
            </div>
        </div>
        <livewire:inc.why-choose :page_type="$page_type"></livewire:inc.why-choose>
        <div class="details-section">
            <livewire:inc.view-more></livewire:inc.view-more>
        </div>
    </main>
</x-app-layout>
