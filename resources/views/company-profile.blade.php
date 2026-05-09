<x-app-layout>
    <main class="page-section">
        <div class="container">
            <div class="page-container">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Company Profile</li>
                    </ol>
                </nav>

                <!-- Page Title -->
                <h1 class="page-title">Company Profile</h1>

                <!-- Page Content -->
                <div class="page-content">
                    <div class="text-center py-5">
                        <div class="mb-4">
                            <i class="fa-solid fa-building fa-3x text-primary mb-3"></i>
                            <h3 class="fw-bold">Company Information</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="mb-3">Company Name</h5>
                                <p class="text-muted">{{ config('settings.company_name') }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="mb-3">Contact Information</h5>
                                <p class="text-muted">
                                    <i class="fa-solid fa-envelope me-2"></i>{{ config('settings.default_email_address') }}<br>
                                    <i class="fa-solid fa-phone me-2"></i>{{ config('settings.phone') }}<br>
                                    <i class="fa-solid fa-map-marker-alt me-2"></i>{{ config('settings.address') }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <h4 class="fw-bold mb-3">About Our Company</h4>
                            <p class="text-muted">
                                {{ config('settings.about_company') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
