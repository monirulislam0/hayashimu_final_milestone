<header>
    <div class="header-fixed">
        <div class="row header-body">
            <div class="col-6 col-md-2 header-logo p-4">
                <a href="{{ route('frontend.home') }}">
                    <img src="{{ asset('storage/'.config('settings.site_logo')) }}" alt="Logo" />
                </a>
            </div>
            <div class="col-md-9 col-lg-8 header-nav">
                <nav class="navbar navbar-expand-lg navbar-light h-100 w-100 p-0">
                    <div class="collapse navbar-collapse d-lg-flex justify-content-md-center h-100 p-0" id="navbarNav">
                        <ul class="navbar-nav h-100">
                            <li class="nav-item main-nav">
                                <a class="nav-link nav-link-names" href="{{ route('frontend.home') }}">Home</a>
                            </li>
                            <li class="nav-item main-nav">
                                <div class="d-flex justify-content-between h-md-100">
                                     <a class="nav-link nav-link-names" href="{{ route('frontend.products.all') }}">Products</a>
                                 
                                    <button class="btn btn-outline-none d-flex d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavSub" aria-controls="navbarNavSub" aria-expanded="false" aria-label="Toggle navigation navbarNavSub">
                                        <i class="fa-solid fa-caret-down fs-4 fa-caret-down-navbar" style="color: #fff; margin-top: -4px;"></i>
                                    </button>
                                </div>

                                <div class="submenu navbar-nav " id="navbarNavSub">
                                    <ul>
                                        @foreach($product_categories as $product)
                                        <li class="nav-item d-flex flex-column first-sub-item" id="first-sub-item">
                                            <div class="d-flex justify-content-between">
                                                <a class="nav-link" href="{{ route('frontend.products',$product->slug) }}">{{ $product->name }}</a>
                                                @if(count($product->children)>0)
                                                 <button class="btn btn-outline-none d-flex d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavSubChild3" aria-controls="navbarNavSubChild3" aria-expanded="false" aria-label="Toggle navigation navbarNavSubChild3" >
                                                    <i class="fa-solid fa-caret-down fs-6 fa-caret-down-navbar" style="color: #fff;"></i>
                                                </button>
                                            </div>
                                            
                                            <div class="submenu-second navbar-nav" id="navbarNavSubChild3" style="background: #222;">
                                                <ul>
                                                    @foreach($product->children as $child)
                                                    <li class="nav-item sec-nav-item"><a class="nav-link" href="{{ route('frontend.products',$child->slug) }}">{{ $child->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item main-nav">
                                <a class="nav-link nav-link-names" href="{{ route('frontend.about') }}">About Us</a>
                            </li>
                            {{-- <li class="nav-item main-nav">
                                <a class="nav-link nav-link-names" href="{{ route('frontend.service') }}">Service</a>
                            </li> --}}
                            <li class="nav-item main-nav">
                                
                                 <div class="d-flex justify-content-between h-md-100">
                                     <a class="nav-link nav-link-names" href="#">News</a>
                                 
                                    <button class="btn btn-outline-none d-flex d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavSub2" aria-controls="navbarNavSub2" aria-expanded="false" aria-label="Toggle navigation navbarNavSub2">
                                        <i class="fa-solid fa-caret-down fs-4 fa-caret-down-navbar" style="color: #fff;"></i>
                                    </button>
                                </div>
                                <div class="submenu navbar-nav" id="navbarNavSub2">
                                    <ul>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('frontend.news','new-products') }}">New Products</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="{{ route('frontend.news','exhibition-news') }}">Exhibition News</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="{{ route('frontend.news','industry-news') }}">Industry News</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="{{ route('frontend.news','company-news') }}">Company News</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item main-nav">
                                <a class="nav-link nav-link-names" href="{{ route('frontend.news','certification') }}">Certification</a>
                            </li>
                            <li class="nav-item main-nav">
                                <a class="nav-link nav-link-names" href="{{ route('frontend.contact') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-6 col-md-1 col-lg-2 d-flex justify-content-lg-center justify-content-end align-items-center gap-3">
                <div id="search-container">
                    <div class="search-btn-ctrl">
                        <div class="search-icon" id="search-icon" onclick="openSearch()">
                            <i class="fa-solid fa-magnifying-glass fs-5 searchIcon" id="searchIcon"></i>
                        </div>
                        <div class="close-search" id="close-search" onclick="closeSearch()">
                            <i class="fa-solid fa-xmark fs-5 searchCloseIcon"></i>
                        </div>
                    </div>
                    <input type="text" wire:model="filter_key" wire:keyup="filter" id="search-input" placeholder="Search...">
                    <div class="suggestion-container">
                         @if(count($suggestions) > 0)
                            <ul class="list-group mt-2">
                                @foreach($suggestions as $suggestion)
                                    <li class="list-group-item">
                                        <a href="{{ route('frontend.product.detail', ['slug' => $suggestion->slug]) }}" class="text-decoration-none">
                                            {{ $suggestion->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @elseif($noResultsMessage)
                            <div class="alert alert-info mt-2">
                                {{ $noResultsMessage }}
                            </div>
                        @endif
                    </div>
                </div>
                
                
                <div class="d-none d-lg-flex">
                    <a href="//{{ config('settings.social_facebook') }}" target="_blank">
                        <i class="fa-brands fa-facebook fs-4" style="color: #fff;"></i>
                    </a>
                </div>
                 <div class="d-none d-lg-flex">
                     <a href="//{{ config('settings.social_youtube') }}" target="_blank">
                       <i class="fa-brands fa-youtube fs-4" style="color: #fff;"></i>
                    </a>
                </div>
                <div class="d-none d-lg-flex">
                     <a href="//{{ config('settings.social_instagram') }}" target="_blank">
                       <i class="fa-brands fa-instagram fs-4" style="color: #fff;"></i>
                    </a>
                </div>
                 <div class="d-none d-lg-flex">
                     <a href="//{{ config('settings.social_linkedin') }}" target="_blank">
                       <i class="fab fa-linkedin fs-4" style="color: #fff;"></i>
                    </a>
                </div>
                <div class="d-flex d-md-none">
                   <button class="btn btn-outline-none" id="navbarMenu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars fs-4" style="color: #fff;"></i>
                   </button>
                </div>
            </div>
        </div>
    </div>
    <div class="sidenav-contact">
        <ul>
            <li class="contact-info-container">
                <i class="fa-solid fa-envelope contact-info-icon"></i>
                <div class="contact-info-overlay">
                    <a href="mailto:{{ config('settings.default_email_address') }}" style="text-decoration: none; color: #fff;">{{ config('settings.default_email_address') }}</a>
                </div>
            </li>
            <li class="contact-info-container">
                <i class="fa-solid fa-phone contact-info-icon"></i>
                <div class="contact-info-overlay">{{ config('settings.phone') }}</div>
            </li>
            <li class="contact-info-container">
                <i class="fa-solid fa-mobile-screen contact-info-icon"></i>
                <div class="contact-info-overlay" style="margin-right: -3px;">{{ config('settings.mobile') }}</div>
            </li>
            <li class="custom-fs-container"  id="backToTopBtn">
                <i class="fa-solid fa-forward-step custom-fs-icon"></i>
            </li>
        </ul>
    </div>
</header>