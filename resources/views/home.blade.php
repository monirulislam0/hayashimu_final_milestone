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
        
        <!-- Featured News Section -->
        @if($featuredNews->count() > 0)
        <div class="featured-news-section bg-white py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold mb-3">Featured News</h2>
                    <p class="text-muted">Stay updated with our latest announcements and updates</p>
                </div>
                
                <div class="row g-4 mb-5">
                    @forelse($featuredNews as $news)
                    <div class="col-lg-4 col-md-6">
                        <div class="news-card h-100 position-relative">
                            <!-- News Type Badge -->
                            <div class="position-absolute top-0 start-0 m-3 z-1">
                                <span class="badge bg-primary text-white text-uppercase px-3 py-2">
                                    {{ ucfirst(str_replace('-', ' ', $news->news_type)) }}
                                </span>
                            </div>
                            
                            <!-- Image Section -->
                            <div class="overflow-hidden" style="height: 200px;">
                                <a href="{{ route('frontend.news.detail', ['type' => $news->news_type, 'slug' => $news->slug]) }}">
                                    <img src="{{ asset('storage/' . $news->image) }}" 
                                         alt="{{ $news->title }}" 
                                         class="img-fluid w-100 h-100" 
                                         style="object-fit: cover; transition: transform 0.3s ease;">
                                </a>
                            </div>
                            
                            <!-- Content Section -->
                            <div class="card-body p-4" style="border-left: 4px solid #007bff; background: #fafbfc;">
                                <div class="border-bottom pb-3 mb-3">
                                    <h5 class="fw-light mb-2">
                                        <a href="{{ route('frontend.news.detail', ['type' => $news->news_type, 'slug' => $news->slug]) }}" 
                                           class="text-decoration-none text-dark">
                                            {{ Str::limit($news->title, 60) }}
                                        </a>
                                    </h5>
                                    <div class="text-muted small">
                                        <i class="fa-regular fa-calendar-days"></i>
                                        <span class="px-2">{{ $news->published_date }}</span>
                                        @if($news->author)
                                            <i class="fa-regular fa-user"></i>
                                            <span class="px-2">{{ $news->author }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <p class="text-muted mb-3">
                                    {{ Str::limit(strip_tags($news->short), 100) }}
                                </p>
                                
                                <div>
                                    <a href="{{ route('frontend.news.detail', ['type' => $news->news_type, 'slug' => $news->slug]) }}" 
                                       class="btn btn-outline-primary btn-sm">
                                        Read More →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No featured news available at the moment.</p>
                    </div>
                    @endforelse
                </div>
                
                <!-- Read More Button -->
                <div class="text-center">
                    <a href="{{ route('frontend.news.feed') }}" 
                       class="btn btn-primary btn-lg px-5 py-3">
                        <i class="fa-solid fa-newspaper me-2"></i>
                        Read More News
                    </a>
                </div>
            </div>
        </div>
        @endif
        <livewire:inc.why-choose :page_type="$page_type"></livewire:inc.why-choose>
        <div class="details-section">
            <livewire:inc.view-more></livewire:inc.view-more>
        </div>
    </main>
</x-app-layout>
