<x-app-layout>
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{ asset('frontend/images/backgrounds/page-header-bg.jpg') }})">
        </div>
        <div class="page-header__ripped-paper"
             style="background-image: url({{ asset('frontend/assets/images/shapes/page-header-ripped-paper.png') }});"></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li><span>/</span></li>
                    <li>Login</li>
                </ul>
                <h2>My account</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Account Start-->
    <section class="account">
        <div class="container">
            <div class="account__main-tab-box tabs-box">
                <ul class="tab-buttons clearfix list-unstyled">
                    <li data-tab="#register" class="tab-btn active-btn"><span>Login</span></li>
                </ul>
                <div class="tabs-content">
                    <div class="tab active-tab" id="register">
                        <livewire:login.form :previous_url="$previous_url"/>
                    </div>
                    <!--tab-->
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
