<x-app-layout>
    <style>
        .page-section {
            background: #ffffff;
            min-height: 100vh;
        }
        .page-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 80px 20px;
        }
        .page-title {
            text-align: center;
            color: #333;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            font-family: 'Oswald', sans-serif;
        }
        .page-content {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 40px;
            margin-top: 20px;
            line-height: 1.8;
            color: #666;
            font-family: 'Lato', sans-serif;
        }
        .breadcrumb {
            background: #f8f9fa;
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 40px;
            border: 1px solid #e9ecef;
        }
        .breadcrumb-item {
            color: #666 !important;
        }
        .breadcrumb-item a {
            color: #13C656 !important;
            text-decoration: none;
        }
        .breadcrumb-item a:hover {
            color: #0fa84a !important;
        }
        @media (max-width: 768px) {
            .page-container {
                padding: 60px 15px;
            }
            .page-title {
                font-size: 2rem;
            }
            .page-content {
                padding: 25px 20px;
            }
        }
    </style>
    
    <main class="page-section">
        <div class="container">
            <div class="page-container">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
                    </ol>
                </nav>

                <!-- Page Banner -->
                @if($page->page_banner)
                <div class="page-banner mb-4">
                    <img src="{{ asset('storage/' . $page->page_banner) }}" alt="{{ $page->title }}" class="img-fluid w-100" style="max-height: 400px; object-fit: cover;">
                </div>
                @endif

                <!-- Page Title -->
                <h1 class="page-title">{{ $page->title }}</h1>

                <!-- Page Content -->
                <div class="page-content">
                    @php
                        // Try multiple approaches to decode HTML
                        $decodedContent = $page->content;
                        
                        // First try html_entity_decode
                        $decodedContent = html_entity_decode($decodedContent, ENT_QUOTES, 'UTF-8');
                        
                        // If still has entities, try htmlspecialchars_decode
                        if (strpos($decodedContent, '&lt;') !== false) {
                            $decodedContent = htmlspecialchars_decode($decodedContent, ENT_QUOTES);
                        }
                        
                        // If still has entities, try stripslashes
                        if (strpos($decodedContent, '&lt;') !== false) {
                            $decodedContent = stripslashes($decodedContent);
                            $decodedContent = html_entity_decode($decodedContent, ENT_QUOTES, 'UTF-8');
                        }
                    @endphp
                    {!! $decodedContent !!}
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
