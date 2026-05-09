<x-app-layout>
    
    <style>
    .product-card {
        border: 1px solid #e9ecef;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: white;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .product-image-container {
        position: relative;
        overflow: hidden;
    }
    
    .discount-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #dc3545;
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: bold;
        z-index: 1;
    }
    
    .product-title a {
        font-size: 14px;
        line-height: 1.4;
    }
    
    .product-title a:hover {
        color: #007bff !important;
    }
    
    .price-info {
        font-size: 16px;
        font-weight: 600;
    }
    
    .product-meta {
        font-size: 12px;
        opacity: 0.8;
    }
    
    /* Our Partners Section Styles */
    .our-partners-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }
    
    .partners-carousel {
        position: relative;
        overflow: hidden;
        padding: 20px 0;
    }
    
    .partners-slider {
        display: flex;
        transition: transform 0.5s ease;
    }
    
    .partner-slide {
        flex: 0 0 auto;
        margin: 0 15px;
    }
    
    .partner-item {
        background: white;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        min-width: 200px;
        max-width: 200px;
    }
    
    .partner-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    
    .partner-logo-wrapper {
        width: 120px;
        height: 120px;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        border-radius: 8px;
        padding: 10px;
    }
    
    .partner-logo {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        filter: grayscale(100%);
        transition: filter 0.3s ease;
    }
    
    .partner-item:hover .partner-logo {
        filter: grayscale(0%);
    }
    
    .partner-placeholder {
        color: #6c757d;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }
    
    .partner-info {
        margin-top: 15px;
    }
    
    .partner-title {
        font-size: 16px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
    }
    
    .partner-link-label {
        font-size: 14px;
        color: #007bff;
        background: #e3f2fd;
        padding: 4px 12px;
        border-radius: 20px;
        display: inline-block;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .product-card {
            margin-bottom: 15px;
        }
        
        .product-image-container img {
            height: 150px !important;
        }
        
        .partner-slide {
            margin: 0 10px;
        }
        
        .partner-item {
            min-width: 160px;
            max-width: 160px;
            padding: 15px;
        }
        
        .partner-logo-wrapper {
            width: 100px;
            height: 100px;
        }
    }
    
    @media (max-width: 576px) {
        .product-card {
            margin-bottom: 10px;
        }
        
        .product-title {
            font-size: 13px;
        }
        
        .price-info {
            font-size: 14px;
        }
        
        .partner-slide {
            margin: 0 8px;
        }
        
        .partner-item {
            min-width: 140px;
            max-width: 140px;
            padding: 12px;
        }
        
        .partner-logo-wrapper {
            width: 80px;
            height: 80px;
        }
        
        .partner-title {
            font-size: 14px;
        }
        
        .partner-link-label {
            font-size: 12px;
            padding: 3px 8px;
        }
    }
    </style>
    
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
        
        <!-- Top Selling Products Section -->
        @if($featuredProducts->count() > 0)
        <div class="top-selling-section bg-white py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold mb-3">Top Selling</h2>
                    <p class="text-muted">Discover our most popular and recommended products</p>
                </div>
                
                <div class="row g-4 mb-5">
                    @forelse($featuredProducts as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="product-card h-100">
                            <div class="product-image-container">
                                <a href="{{ route('frontend.product.detail', $product->slug) }}">
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="img-fluid w-100" 
                                         style="height: 200px; object-fit: cover;">
                                </a>
                                @if($product->discount > 0)
                                <div class="discount-badge">
                                    -{{ $product->discount }}%
                                </div>
                                @endif
                            </div>
                            <div class="product-info p-3">
                                <h6 class="product-title mb-2">
                                    <a href="{{ route('frontend.product.detail', $product->slug) }}" 
                                       class="text-decoration-none text-dark">
                                        {{ Str::limit($product->name, 30) }}
                                    </a>
                                </h6>
                                <div class="price-info mb-2">
                                    @if($product->discount > 0)
                                        <span class="text-muted text-decoration-line-through">
                                            ${{ number_format($product->price, 2) }}
                                        </span>
                                        <span class="text-danger fw-bold ms-2">
                                            ${{ number_format($product->price - ($product->price * $product->discount / 100), 2) }}
                                        </span>
                                    @else
                                        <span class="text-primary fw-bold">
                                            ${{ number_format($product->price, 2) }}
                                        </span>
                                    @endif
                                </div>
                                <div class="product-meta">
                                    <small class="text-muted">
                                        @if($product->brand)
                                            <i class="fa-solid fa-tag me-1"></i>{{ $product->brand }}
                                        @endif
                                        @if($product->model)
                                            <span class="ms-2"><i class="fa-solid fa-cube me-1"></i>{{ $product->model }}</span>
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No featured products available at the moment.</p>
                    </div>
                    @endforelse
                </div>
                
                <!-- Explore More Button -->
                <div class="text-center">
                    <a href="{{ route('frontend.products.all') }}" 
                       class="btn btn-primary btn-lg px-5 py-3">
                        <i class="fa-solid fa-shopping-bag me-2"></i>
                        Explore More
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
<!-- Our Partners Section -->
        @if($partnerSliders->count() > 0)
        <div class="our-partners-section py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold mb-3">Our Partners</h2>
                    <p class="text-muted">Trusted by leading companies worldwide</p>
                </div>
                
                <div class="partners-carousel">
                    <div class="partners-slider">
                        @foreach($partnerSliders as $partner)
                        <div class="partner-slide">
                            <div class="partner-item">
                                <a href="{{ $partner->link }}" target="_blank" class="text-decoration-none">
                                    <div class="partner-logo-wrapper">
                                        @if($partner->logo)
                                            <img src="{{ asset('storage/' . $partner->logo) }}" 
                                                 alt="{{ $partner->title }}" 
                                                 class="partner-logo">
                                        @else
                                            <div class="partner-placeholder">
                                                <i class="fa-solid fa-building fa-2x"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="partner-info">
                                        <h6 class="partner-title">{{ $partner->title }}</h6>
                                        <span class="partner-link-label">{{ $partner->link_label }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        
    </main>
</x-app-layout>

<!-- Partner Slider JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.partners-slider');
    if (slider) {
        let currentPosition = 0;
        let slideWidth = 230; // Width of each slide including margin
        let visibleSlides = Math.floor(slider.parentElement.offsetWidth / slideWidth);
        let totalSlides = slider.children.length;
        let autoPlayInterval;
        
        function moveSlider(direction) {
            const maxPosition = -(totalSlides - visibleSlides) * slideWidth;
            
            if (direction === 'next') {
                currentPosition = Math.max(currentPosition - slideWidth, maxPosition);
            } else {
                currentPosition = Math.min(currentPosition + slideWidth, 0);
            }
            
            slider.style.transform = `translateX(${currentPosition}px)`;
        }
        
        function startAutoPlay() {
            autoPlayInterval = setInterval(() => {
                if (currentPosition <= -(totalSlides - visibleSlides) * slideWidth) {
                    currentPosition = 0;
                } else {
                    moveSlider('next');
                }
            }, 3000); // Change slide every 3 seconds
        }
        
        function stopAutoPlay() {
            clearInterval(autoPlayInterval);
        }
        
        // Navigation buttons
        const carousel = document.querySelector('.partners-carousel');
        const prevBtn = document.createElement('button');
        const nextBtn = document.createElement('button');
        
        prevBtn.innerHTML = '<i class="fa-solid fa-chevron-left"></i>';
        nextBtn.innerHTML = '<i class="fa-solid fa-chevron-right"></i>';
        
        prevBtn.className = 'partner-nav-btn partner-prev';
        nextBtn.className = 'partner-nav-btn partner-next';
        
        carousel.appendChild(prevBtn);
        carousel.appendChild(nextBtn);
        
        prevBtn.addEventListener('click', () => {
            moveSlider('prev');
            stopAutoPlay();
            startAutoPlay();
        });
        
        nextBtn.addEventListener('click', () => {
            moveSlider('next');
            stopAutoPlay();
            startAutoPlay();
        });
        
        // Touch support for mobile
        let startX = 0;
        let isDragging = false;
        
        slider.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            isDragging = true;
            stopAutoPlay();
        });
        
        slider.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            e.preventDefault();
            const currentX = e.touches[0].clientX;
            const diffX = startX - currentX;
            
            if (Math.abs(diffX) > 50) {
                if (diffX > 0) {
                    moveSlider('next');
                } else {
                    moveSlider('prev');
                }
                isDragging = false;
                startAutoPlay();
            }
        });
        
        slider.addEventListener('touchend', () => {
            isDragging = false;
            startAutoPlay();
        });
        
        // Start autoplay
        startAutoPlay();
        
        // Pause on hover
        carousel.addEventListener('mouseenter', stopAutoPlay);
        carousel.addEventListener('mouseleave', startAutoPlay);
        
        // Handle window resize
        window.addEventListener('resize', () => {
            visibleSlides = Math.floor(slider.parentElement.offsetWidth / slideWidth);
            currentPosition = 0;
            slider.style.transform = `translateX(0px)`;
        });
    }
});
</script>

<style>
.partner-nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: #007bff;
    color: white;
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,123,255,0.3);
}

.partner-nav-btn:hover {
    background: #0056b3;
    transform: translateY(-50%) scale(1.1);
}

.partner-prev {
    left: 10px;
}

.partner-next {
    right: 10px;
}

@media (max-width: 768px) {
    .partner-nav-btn {
        width: 35px;
        height: 35px;
        font-size: 12px;
    }
    
    .partner-prev {
        left: 5px;
    }
    
    .partner-next {
        right: 5px;
    }
}
</style>
