<x-app-layout>
    <main class="page-section">
        <div class="container">
            <div class="page-container">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Certification</li>
                    </ol>
                </nav>

                <!-- Page Title -->
                <h1 class="page-title">Certification</h1>

                <!-- Page Content -->
                <div class="page-content">
                    <div class="text-center py-5">
                        <div class="mb-4">
                            <i class="fa-solid fa-certificate fa-3x text-primary mb-3"></i>
                            <h3 class="fw-bold">Our Certifications</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="mb-3">Quality Standards</h5>
                                <p class="text-muted">
                                    <i class="fa-solid fa-check-circle me-2"></i> ISO 9001:2015 Quality Management System<br>
                                    <i class="fa-solid fa-check-circle me-2"></i> ISO 14001:2015 Environmental Management System<br>
                                    <i class="fa-solid fa-check-circle me-2"></i> OHSAS 18001:2007 Occupational Health and Safety
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="mb-3">Certifications</h5>
                                <p class="text-muted">
                                    <i class="fa-solid fa-award me-2"></i> Industry Leading Manufacturer<br>
                                    <i class="fa-solid fa-award me-2"></i> Quality Excellence Award 2023<br>
                                    <i class="fa-solid fa-award me-2"></i> Safety Compliance Certificate
                                </p>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <h4 class="fw-bold mb-3">Commitment to Quality</h4>
                            <p class="text-muted">
                                We are committed to maintaining the highest standards of quality and safety in all our operations. Our certifications reflect our dedication to excellence and continuous improvement in manufacturing processes and workplace safety.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
