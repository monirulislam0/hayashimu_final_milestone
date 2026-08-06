<div>
    {{-- <footer>
        <div class="footer-ctrl">
            <div class="container footer-ctrl-container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row " id="unset-width">
                            
                            {!! $footerContent?->content !!}

                            <div class="col-md-6 mt-2">
                                <div class="fs-4" style="color: #000;">
                                    CONTACT US
                                </div>
                                <ul class="d-flex flex-column gap-3">
                                    <li>
                                        <img src="{{ asset('frontend/images/Emali1.webp') }}" alt="..." width="40" />
                                        <strong>Email: </strong><a href="mailto:{{ config('settings.default_email_address') }}">{{ config('settings.default_email_address') }}</a>
                                    </li>
                                    <li>
                                        <img src="{{ asset('frontend/images/tel.webp') }}" alt="..." width="40" />
                                        <strong>Telephone: </strong>{{ config('settings.mobile') }}
                                    </li>
                                    <li>
                                        <strong>WE'RE OPEN: </strong>Saturday – Thursday, 9am – 5:30pm (except govt. holidays)
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 mt-5">
                        <div class="fs-4" style="color: #000;">
                            GET IN TOUCH
                        </div>
                        <div class="details-form">
                            <div>
                                Innovative tool solutions provider offering a full range of quality tools. Quick shipping available, OEM welcome, to enhance your competitiveness.
                            </div>
                            <div class="mt-3">
                                <livewire:inc.contact-form></livewire:inc.contact-form>
                            </div>
                        </div>
                        <div class="mt-3 d-flex flex-column align-items-center">
                            <strong>WE ARE AVAILABLE IN SOCIAL MEDIA</strong>
                            <ul class="d-flex gap-2 mt-2 social-links">
                                <li>
                                    <a href="//{{ config('settings.social_facebook') }}" target="_blank"><i class="fab fa-facebook fs-3"></i></a>
                                </li>
                                <li>
                                    <a href="//{{ config('settings.social_youtube') }}" target="_blank"><i class="fab fa-youtube fs-3"></i></a>
                                </li>
                                <li>
                                    <a href="//{{ config('settings.social_instagram') }}" target="_blank"><i class="fab fa-instagram fs-3"></i></a>
                                </li>
                                <li>
                                    <a href="//{{ config('settings.social_linkedin') }}" target="_blank"><i class="fab fa-linkedin fs-3"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center py-5">
                Copyright ©&nbsp;2011&nbsp;{{ config('settings.footer_copyright_text') }}
            </div>
        </div>
    </footer> --}}

    <!-- Secondary Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <!-- Related Companies -->
                <div class="col-12 col-md-4">
                    <h5>Related Companies</h5>
                    <ul>
                        <li><a href="#">Company 1</a></li>
                        <li><a href="#">Company 2</a></li>
                        <li><a href="#">Company 3</a></li>
                    </ul>
                </div>

                <!-- Product -->
                <div class="col-12 col-md-4 footer-col">
                    <h5>Product</h5>
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                <li><a href="{{ route('frontend.product.center') }}">All Products</a></li>
                                <li><a href="{{ route('frontend.home') }}">Featured Products</a></li>
                                <li><a href="#">Category 1</a></li>
                                <li><a href="#">Category 2</a></li>
                                <li><a href="#">Category 3</a></li>
                                <li><a href="#">Category 4</a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li><a href="#">Category 5</a></li>
                                <li><a href="#">Category 6</a></li>
                                <li><a href="#">Category 7</a></li>
                                <li><a href="#">Category 8</a></li>
                                <li><a href="#">Category 9</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Contact Us -->
                <div class="col-12 col-md-4 footer-col">
                    <h5>Contact Us</h5>
                    <ul>
                        <li><i class="bi bi-telephone-fill me-2"></i>Tel : {{ config('settings.mobile') }}</li>
                        <li><i class="bi bi-envelope-fill me-2"></i>E-mail : {{ config('settings.default_email_address') }}</li>
                        <li><i class="bi bi-whatsapp me-2"></i>WhatsApp : {{ config('settings.whatsapp') ?? 'https://www.linkedin.com/feed/' }}</li>
                        <li><i class="bi bi-geo-alt-fill me-2"></i>Add : {{ config('settings.address') ?? 'No.1058, Taoyao Village, Lipu Town, Zhuji City, Zhejiang Province, China.' }}</li>
                    </ul>
                    <div class="social-icons mt-3">
                        <a href="//{{ config('settings.social_facebook' , 'https://www.facebook.com/hayashimu.machinery') }}" target="_blank"><i class="fab fa-facebook"></i></a>
                        {{-- <a href="//{{ config('settings.social_twitter') ?? '#' }}" target="_blank"><i class="fab fa-twitter"></i></a> --}}
                        <a href="//{{ config('settings.social_linkedin', 'https://www.linkedin.com/feed/') }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="//{{ config('settings.social_youtube', 'https://www.youtube.com/@HayashimuLTD') }}" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="//{{ config('settings.social_instagram', 'https://www.instagram.com/hayashimu.machinery') }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <style>
        .site-footer {
            /* match header background */
            background-color: #F5F6F7;
            color: #000;
            border-top: 3px solid #22A1A7;
            padding: 40px 0 30px;
        }
        .site-footer a {
            color: #000;
            text-decoration: none;
        }
        .site-footer a:hover {
            color: #22A1A7;
        }
        .site-footer h5 {
            color: #000;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .site-footer ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }
        .site-footer ul li {
            margin-bottom: 12px;
            font-size: 14px;
        }
        .site-footer .footer-col {
            border-left: 1px solid rgba(0,0,0,0.15);
            padding-left: 25px;
        }
        @media (max-width: 767.98px) {
            .site-footer .footer-col {
                border-left: none;
                padding-left: 0;
                margin-top: 30px;
                border-top: 1px solid rgba(0,0,0,0.15);
                padding-top: 20px;
            }
        }
        .social-icons a {
            width: 34px;
            height: 34px;
            border-radius: 6px;
            background-color: transparent;
            color: #6b7280;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 8px;
            transition: all 0.18s ease;
            border: 1px solid rgba(0,0,0,0.04);
        }
        .social-icons a:hover {
            background-color: #22A1A7;
            color: #fff;
            border-color: #22A1A7;
        }
        .social-icons a i { transition: color 0.18s ease }
        .social-icons a:hover i { color: #fff !important }
    </style>
</div>
