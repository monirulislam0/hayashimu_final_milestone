<div>
    <div class="product-cat">
        <div class="row g-3 justify-content-center">
            @foreach($categories as $category)
            <div class="col-md-6 col-lg-4 product-cat-box ">
                <div class="product-box-images">
                    <a href="{{ route('frontend.products',$category->slug) }}">
                        <div style="overflow: hidden;">
                            <img src="{{ asset('storage/'.$category->hover_image) }}" class="d-block w-100 product-images" alt="{{ $category->title }}" style="height: 220px;" />
                        </div>
                        <div class="d-flex gap-3 justify-content-between align-items-center py-2 px-4 text-white">
                            <div class="fs-5 text-overflow-ellipsis">
                                {{ $category->name }}
                            </div>
                            <div class="d-flex gap-2 text-nowrap">
                                <div>VIEW MORE</div>
                                <div>
                                    <i class="fa-solid fa-play" ></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!--<div class="product-box-text">-->
                <!--    {{ $category->name }}-->
                <!--</div>-->
            </div>
            @endforeach
            <!-- @foreach($categories as $category)-->
            <!--<div class="col-4 product-cat-box " onmouseover="changeImage('{{ asset('storage/'.$category->image) }}')">-->
            <!--    <div class="product-box-images">-->
            <!--        <a href="{{ route('frontend.products',$category->slug) }}">-->
            <!--            <div>-->
            <!--                <img src="{{ asset('storage/'.$category->hover_image) }}" class="d-block w-100" alt="{{ $category->title }}" />-->
            <!--            </div>-->
            <!--            <div class="d-flex justify-content-between align-items-center py-2 px-4 text-white">-->
            <!--                <div class="fs-5">-->
            <!--                    {{ $category->name }}-->
            <!--                </div>-->
            <!--                <div class="d-flex gap-4">-->
            <!--                    <div>VIEW MORE</div>-->
            <!--                    <div>-->
            <!--                        <i class="fa-solid fa-play"></i>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </a>-->
            <!--    </div>-->
            <!--    <div class="product-box-text">-->
            <!--        {{ $category->name }}-->
            <!--    </div>-->
            <!--</div>-->
            <!--@endforeach-->
        </div>
    </div>
</div>

