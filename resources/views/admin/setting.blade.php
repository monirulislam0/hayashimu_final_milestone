@section('title')
    {{ config('app.name') }} | Settings
@endsection
<x-admin-layout>
    <div class="content-body">
        <section id="page-account-settings">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0 pills-stacked">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" id="account-pill-general"
                                       data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                        <i class="bx bx-cog"></i>
                                        <span>General</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="pill-site-logo"
                                       data-toggle="pill" href="#site_logo" aria-expanded="false">
                                        <i class="bx bx-album"></i>
                                        <span>Site Logo</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="account-pill-social"
                                       data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                        <i class="bx bxl-twitch"></i>
                                        <span>Social links</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="account-pill-footer"
                                       data-toggle="pill" href="#account-vertical-footer" aria-expanded="false">
                                        <i class="bx bx-link"></i>
                                        <span>Footer & SEO</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="account-pill-analytics"
                                       data-toggle="pill" href="#account-vertical-analytics" aria-expanded="false">
                                        <i class="bx bxl-google"></i>
                                        <span>Analytics</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                                 aria-labelledby="account-pill-general" aria-expanded="true">
                                                <livewire:setting.general-setting></livewire:setting.general-setting>
                                            </div>
                                            <div class="tab-pane fade " id="site_logo" role="tabpanel"
                                                 aria-labelledby="pill-site-logo" aria-expanded="false">
                                                <livewire:setting.site-logo></livewire:setting.site-logo>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-social" role="tabpanel"
                                                 aria-labelledby="account-pill-social" aria-expanded="false">
                                                <livewire:setting.social></livewire:setting.social>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-footer" role="tabpanel"
                                                 aria-labelledby="account-pill-footer" aria-expanded="false">
                                                <livewire:setting.footer></livewire:setting.footer>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-analytics" role="tabpanel"
                                                 aria-labelledby="account-pill-analytics" aria-expanded="false">
                                                <livewire:setting.analytic></livewire:setting.analytic>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-admin-layout>
