<x-app-layout>
    <main>
        <div class="container innerpage-container py-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Download</li>
                </ol>
            </nav>
            <livewire:inc.service></livewire:inc.service>
        </div>
    </main>
</x-app-layout>
