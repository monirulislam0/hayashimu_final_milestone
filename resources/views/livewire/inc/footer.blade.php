<div>
    <footer>
        <div class="footer-ctrl">
            <div class="container footer-ctrl-container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row " id="unset-width">
                            {!! $footerContent?->content !!}
                            <div class="col-md-6 mt-2">
                                <div class="fs-4" style="color: #FEA620;">
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
                        <div class="fs-4" style="color: #FEA620;">
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
    </footer>
</div>
