<div class="slider-margin-ctrl">
    <div id="carouselFirstIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-pause="none">
        <div class="carousel-indicators circle">
            @php $sl=-1 @endphp
            @foreach($top_sliders as $slider)
                @php $sl++ @endphp
            <button type="button" data-bs-target="#carouselFirstIndicators" data-bs-slide-to="{{ $sl }}" class="{{ ($sl==0)? 'active':'' }}" aria-current="{{ ($sl==0)? 'true':'' }}" aria-label="{{ $slider->title }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @php $sl=0 @endphp
            @foreach($top_sliders as $slider)
                @php $sl++ @endphp
            <div class="carousel-item {{ ($sl==1)?'active':'' }}">
                <a href="{{ $slider->redirect_url }}"><img src="{{ asset('storage/'.$slider->image) }}" class="d-block w-100" alt="{{ $slider->title }}"></a>
            </div>
            @endforeach
        </div>
    </div>
    <div>
        <div class="second-carousel-container">
            <div id="carouselSecondIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-pause="none">
                <div class="carousel-indicators square">
                    @php $sl=0 @endphp
                    @foreach($down_sliders->chunk(2) as $sliders)
                    <button type="button" data-bs-target="#carouselSecondIndicators" data-bs-slide-to="{{ $sl }}" class="{{ ($sl==0) ? 'active':'' }}" aria-current="{{ ($sl==0)?'true':'' }}" aria-label=""></button>
                    @php $sl++ @endphp
                    @endforeach
                </div>
                <div class="carousel-inner slider-center">
                    @php $sl=0 @endphp
                    @foreach($down_sliders->chunk(2) as $sliders)
                    <div class="carousel-item {{ ($sl==0) ? 'active':'' }} ">
                        <div class="d-flex gap-2 mb-5">
                            @foreach($sliders as $slider)
                            <div>
                                <a href="{{ $slider->redirect_url }}"><img src="{{ asset('storage/'.$slider->image) }}" class="d-block w-100" alt="{{ $slider->title }}"></a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                     @php $sl++ @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
