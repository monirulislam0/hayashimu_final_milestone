<x-app-layout>
    <main>
        <div class="container innerpage-container py-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>

            <div class="row py-4">
                <div class="col-md-10">
                    <div class="fs-2 mb-3 text-white">
                        CONTACT US
                    </div>
                    <div class="aboutus-text-body d-flex flex-column gap-4 text-white">
                        If you have any questions, please contact us through the following contact information and fill in the form, and we will reply you in time.
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="text-white contact-details">
                <div class="row">
                    <div class="col-md-4 py-3">
                        <div class="d-flex gap-5">
                            <div class="contact-details-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div>
                                <div class="fs-4">
                                    EMAIL
                                </div>
                                <div class="contact-details-text">
                                    <a href="mailto:fixtec@fixtectools.com">{{ config('settings.default_email_address') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 py-3">
                        <div class="d-flex gap-5">
                            <div class="contact-details-icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <div class="fs-4">
                                    TELEPHONE
                                </div>
                                <div class="contact-details-text">
                                    {{ config('settings.mobile') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 py-3">
                        <div class="d-flex gap-5">
                            <div class="contact-details-icon">
                                <i class="fa-solid fa-print"></i>
                            </div>
                            <div>
                                <div class="fs-4">
                                    FAX
                                </div>
                                <div class="contact-details-text">
                                    {{ config('settings.phone') }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 py-3">
                        <div class="d-flex gap-5">
                            <div class="contact-details-icon">
                                <i class="fa-solid fa-signs-post"></i>
                            </div>
                            <div>
                                <div class="fs-4">
                                    ADDRESS
                                </div>
                                <div class="contact-details-text">
                                    {{ config('settings.address_1') }}, {{ config('settings.address_2') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 contact-details-form">
                <livewire:inc.contact-form></livewire:inc.contact-form>
            </div>
        </div>
    </main>
</x-app-layout>
