<div>
    <div class="carousel-multiple-container">
        <div class="container">
            <div class="row">
            <div id="multipleCarousel" class="carousel carousel-multiple slide" data-bs-ride="carousel" data-bs-pause="none">
                 <!-- Indicators -->
                <div class="carousel-indicators square" style="bottom: -45px">
                    @php $sl=0 @endphp
                    @foreach($sliders as $slider)
                        <button data-bs-target="#multipleCarousel" data-bs-slide-to="{{ $sl }}" class="{{ ($sl==0)?'active':'' }}"></button>
                        @php $sl++ @endphp
                    @endforeach
                </div>
                <div class="carousel-inner carousel-inner-multiple" role="listbox">
                    @php $sl=0 @endphp
                    @foreach($sliders as $slider)
                        @php $sl++@endphp
                    <div class="carousel-item {{ ($sl==1)?'active':'' }}">
                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-img ">
                                    <a href="{{ $slider->redirect_url }}"><img src="{{ asset('storage/'.$slider->image) }}" class="img-fluid" style="height: 210px;"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
{{--                    <div class="carousel-item">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-img px-1">--}}
{{--                                    <img src="dist/images/multi-2.webp" class="img-fluid">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="carousel-item">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-img px-1">--}}
{{--                                    <img src="dist/images/multi-1.webp" class="img-fluid">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="carousel-item">--}}
{{--                        <div class="col-md-4 ">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-img px-1">--}}
{{--                                    <img src="dist/images/multi-2.webp" class="img-fluid">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="carousel-item">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-img px-1">--}}
{{--                                    <img src="dist/images/multi-1.webp" class="img-fluid">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="carousel-item">--}}
{{--                        <div class="col-md-4 ">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-img px-1">--}}
{{--                                    <img src="dist/images/multi-2.webp" class="img-fluid">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}-->
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
