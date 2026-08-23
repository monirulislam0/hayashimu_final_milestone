<div>
    <div class="container">
        {!! $data?->content !!}
        <div class="details-button">
            <div>
                <a href="{{ route('frontend.about') }}" class="btn fs-4 details-btn-ctrl" style="background-color: #fff; color: #000; padding: 10px 60px; font-weight: bold; font-family: 'Oswald', sans-serif;">VIEW MORE <i class="fa-solid fa-circle-play" style="color: #2b9cd2 !important; margin-left: 10px;"></i></a>
            </div>
            <div>
                <a href="//{{ config('settings.social_facebook') }}" target="_blank" class="btn fs-4 details-btn-ctrl" style="background-color: #fff; color: #000; padding: 10px 60px; font-weight: bold; font-family: 'Oswald', sans-serif;">HAYASHIMU<i class="fa-brands fa-facebook" style="color: #22A1A7 !important; margin-left: 10px;"></i></a>
            </div>
        </div>
    </div>
</div>
