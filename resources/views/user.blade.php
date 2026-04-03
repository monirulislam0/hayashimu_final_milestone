<x-app-layout>
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{ asset('frontend/images/backgrounds/page-header-bg.jpg') }})">
        </div>
        <div class="page-header__ripped-paper"
             style="background-image: url({{ asset('frontend/images/shapes/page-header-ripped-paper.png') }});"></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li><span>/</span></li>
                    <li><a href="#">User</a></li>
                    <li><span>/</span></li>
                    <li>My Account</li>
                </ul>
            </div>
        </div>
    </section>
    <!--Page Header End-->


    <!--Services Details page Start-->
    <section class="service-details">
        <livewire:user.user />
    </section>
</x-app-layout>
