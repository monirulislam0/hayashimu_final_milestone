<div>
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                        <div class="brand-logo"><img class="logo" src="{{ asset('storage/'.config('settings.site_logo')) }}" /></div>
                    </a></li>
                <li class="nav-item nav-toggle"><a href="{{ route('frontend.home') }}" class="nav-link pr-0" target="_blank" ><i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="bx-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">
                <li class=" nav-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge-light-danger badge-pill badge-round float-right mr-2"></span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.orders.index') }}"><i class="bx bx-cog"></i><span class="menu-title" data-i18n="area">Orders</span></a>
                </li>
                <li class="nav-item"><a href="#"><i class="bx bx-home-alt"></i><span class="menu-title" data-i18n="Components">Home Page</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('admin.static.why-i-choose') }}"><i class="bx bx-fingerprint"></i><span class="menu-item" data-i18n="Alerts">Why I Choose</span></a>
                        </li>
                        <li><a href="{{ route('admin.static.view-more') }}"><i class="bx bxs-eyedropper"></i><span class="menu-item" data-i18n="Alerts">View More Section</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#"><i class="bx bx-info-circle"></i><span class="menu-title" data-i18n="Components">About Page</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('admin.static.about') }}"><i class="bx bx-fingerprint"></i><span class="menu-item" data-i18n="Alerts">About Content</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#"><i class="bx bx-info-circle"></i><span class="menu-title" data-i18n="Components">Static</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('admin.static.top-sidebar') }}"><i class="bx bx-cart"></i><span class="menu-item" data-i18n="Alerts">Top Sidebar</span></a>
                        <li><a href="{{ route('admin.static.sidebar-image') }}"><i class="bx bx-fingerprint"></i><span class="menu-item" data-i18n="Alerts">Sidebar Image</span></a>
                        <li><a href="{{ route('admin.static.news-banner') }}"><i class="bx bx-paragraph"></i><span class="menu-item" data-i18n="Alerts">News Banner</span></a>
                        <li><a href="{{ route('admin.static.certification-banner') }}"><i class="bx bx-paperclip"></i><span class="menu-item" data-i18n="Alerts">Certification Banner</span></a>
                        <li><a href="{{ route('admin.static.footer') }}"><i class="bx bx-football"></i><span class="menu-item" data-i18n="footer">Footer</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.categories.index') }}"><i class="bx bx-menu"></i><span class="menu-title" data-i18n="menu">Categories</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.sliders.index') }}"><i class="bx bx-album"></i><span class="menu-title" data-i18n="slider">Slider</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.products.index') }}"><i class="bx bx-check-square"></i><span class="menu-title" data-i18n="menu">Products</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.news.index') }}"><i class="bx bx-film"></i><span class="menu-title" data-i18n="news">News</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.contact-message') }}"><i class="bx bx-mail-send"></i><span class="menu-title" data-i18n="subscription">Contact Message</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.services.index') }}"><i class="bx bx-mail-send"></i><span class="menu-title" data-i18n="services">Services</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.setting') }}"><i class="bx bx-cog"></i><span class="menu-title" data-i18n="setting">Settings</span></a>
                </li>


            </ul>
        </div>
    </div>
</div>
