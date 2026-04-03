<x-app-layout>
    <main>
        <div class="container innerpage-container py-5 news-section">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $data->page_title }}</li>
                </ol>
            </nav>
            <div class="container text-white">
                <div class="d-flex align-items-center flex-column">
                    <div class="fs-4 fw-bold">
                        {{ $data->page_title }}
                    </div>
                    <div class="news-details mt-2">
                        <a href="#" class="text-decoration-none">
                            <img src="{{ asset('storage/'.$data->image) }}" alt="...">
                        </a>
                    </div>
                </div>
                <div style=" background: rgb(46, 155, 215);padding: 15px 30px; border-radius: 6px;">
                    {!! $data->content !!}
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
