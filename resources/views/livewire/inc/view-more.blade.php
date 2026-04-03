<div>
    <div class="container">
        {!! $data?->content !!}
        <div class="details-button">
            <div>
                <a href="{{ route('frontend.about') }}" class="btn view-btn fs-4 details-btn-ctrl">VIEW MORE <i class="fa-solid fa-circle-play" style="color: #2b9cd2; margin-left: 10px;"></i></a>
            </div>
            <div>
                <a href="//{{ config('settings.social_facebook') }}" target="_blank"class="btn details-btn-ctrl fs-4 fix-btn">HAYASHIMU<i class="fa-brands fa-facebook" style="color: #ffffff; margin-left: 10px;"></i></a>
            </div>
        </div>
    </div>
</div>
