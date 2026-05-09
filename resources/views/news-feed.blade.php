<x-app-layout>
    <main class="bg-white">
        <div class="container py-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="color: #000 !important;"><a href="{{ route('frontend.home') }}" style="color: #000 !important;">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #000 !important;">News Feed</li>
                </ol>
            </nav>
            
            <div class="text-center mb-5">
                <h1 class="fw-light">News Feed</h1>
                <p class="text-muted">Latest updates and announcements</p>
            </div>

            <div class="row g-4">
                @forelse($news as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100 position-relative">
                        <!-- News Type Badge -->
                        <div class="position-absolute top-0 start-0 m-3 z-1">
                            <span class="badge bg-primary text-white text-uppercase px-3 py-2">
                                {{ ucfirst(str_replace('-', ' ', $item->news_type)) }}
                            </span>
                        </div>
                        
                        <!-- Image Section -->
                        <div class="overflow-hidden" style="height: 200px; border-bottom: 3px solid #f8f9fa;">
                            <a href="{{ route('frontend.news.detail', ['type' => $item->news_type, 'slug' => $item->slug]) }}">
                                <img src="{{ asset('storage/' . $item->image) }}" 
                                     alt="{{ $item->title }}" 
                                     class="img-fluid w-100 h-100" 
                                     style="object-fit: cover; transition: transform 0.3s ease;">
                            </a>
                        </div>
                        
                        <!-- Content Section -->
                        <div class="card-body d-flex flex-column p-4" style="border-left: 4px solid #007bff; background: #fafbfc;">
                            <div class="border-bottom pb-3 mb-3">
                                <h5 class="card-title fw-light mb-2">
                                    <a href="{{ route('frontend.news.detail', ['type' => $item->news_type, 'slug' => $item->slug]) }}" 
                                       class="text-decoration-none text-dark">
                                        {{ Str::limit($item->title, 60) }}
                                    </a>
                                </h5>
                                <div class="text-muted small">
                                    <i class="fa-regular fa-calendar-days"></i>
                                    <span class="px-2">{{ $item->published_date }}</span>
                                    @if($item->author)
                                        <i class="fa-regular fa-user"></i>
                                        <span class="px-2">{{ $item->author }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <p class="card-text text-muted flex-grow-1 mb-3">
                                {{ Str::limit(strip_tags($item->short), 120) }}
                            </p>
                            
                            <div class="mt-auto">
                                <a href="{{ route('frontend.news.detail', ['type' => $item->news_type, 'slug' => $item->slug]) }}" 
                                   class="btn btn-outline-primary btn-sm">
                                    Read More →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <div class="text-muted">
                        <h5 class="fw-light">No news articles found</h5>
                        <p>Check back later for the latest updates.</p>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($news->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $news->links('vendor.pagination.bootstrap-4') }}
            </div>
            @endif
        </div>
    </main>
</x-app-layout>
