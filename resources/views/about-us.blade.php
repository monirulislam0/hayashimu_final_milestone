<x-app-layout>
    <style>
        .background_image{
            background-image: url("{{ asset('storage/'.$content->image) }}");
        }
    </style>
    <main>
        <video id="aboutus-video" width="100%" autoplay muted loop>
            <source src="{{ asset('storage/'.$content->extra) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div class="aboutus-bg background_image">
            <div class="container innerpage-container py-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>

                <div class="row py-5">
                    <div class="col-md-8" style="background-color: #00000066">
                        {!! $content->content !!}
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
        <livewire:inc.why-choose :page_type="$page_type"></livewire:inc.why-choose>
        <livewire:inc.about-slider></livewire:inc.about-slider>
    </main>
</x-app-layout>

