<div>
    <div class="bg-white p-3 font-lato">
        <div class="row">
            <div class="col-md-6 d-flex flex-column">
                <div class="productImage">
                    <img id="expandedImg"  src="{{ asset('storage/'.$images[0]['image_link']) }}" alt="..." class="img-fluid border expandedImg">
                    <div id="myresult" class="img-zoom-result"></div>
                </div>
                <div class="row p-3 d-flex justify-content-center">
                    @if(!empty($images))
                        @foreach($images as $image)
                    <div class="col-2_5 p-0">
                        <img src="{{ asset('storage/'.$image['image_link']) }}" alt="..." class="img-fluid border imgLinkProducts" onmouseover="productImgOpen(this);">
                    </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="fs-4 fw-bold">{{ $product['name'] }} @if(!$product['in_stock'])<span class="out-of-stock">Out Of Stock</span>@endif</div>
                @if($product['emi_text']!=null)
                <div class="my-2 fs-6 fw-bold text-info">{{ $product['emi_text'] }}</div>
                @endif
                <div class="mb-2">Model: {{ strtoupper($product['model']) }}</div>
                <div class="mb-3">Brand: {{ strtoupper($product['brand']) }}</div>
                <!--<div class="product-details">-->
                <!--    <span class="priceElement discounted-price">32000.00</span>-->
                <!--    <span class="priceElement price">28800.00</span>-->
                <!--</div>-->
                <div class="product-details-table">
                    @php $attributes = json_decode($product['product_attribute']) @endphp
                    @if($attributes)
                    <ul class="list-unstyled">
                        @foreach($attributes as $key=>$value)
                        <li>
                            <div class="row">
                                <div class="col-4">{{ $key }}:</div>
                                <div class="col-8 right-text-table">{{ $value }}</div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="row">
                        <div class="col-8">
                            <button class="btn btn-white border border-primary w-100 rounded-4 text-primary py-2 product-details-btn " wire:click="product_add_to_cart('{{ $product['id'] }}')">Add to Basket<i class="fa-solid fa-cart-plus"></i></button>
                            <button class="btn btn-white border border-primary w-100 rounded-4 text-primary py-2 product-details-btn " wire:click="inquire('{{ $product['id'] }}')">Inquire</button>
                        </div>
                    </div>
                </div>
                <div class="mt-3 product-social-icons d-flex justify-content-center col-md-8">
                    <x-share-button slug="{{ url('product/'.$product['slug']) }}" title="{{ $product['name'] }}"></x-share-button>
                </div>

            </div>

        </div>
        <div class="border mt-5">
            <div class="d-flex gap-1">
                <div class="bg-eee">
                    <button class="btn pDescriptionBtn tablinksProducts active" onclick="openProductTab(event, 'description')">Product Description</button>
                </div>
                @if($product['pdf_file']!=null)
                <div class="bg-eee">
                    <button class="btn pDescriptionBtn tablinksProducts" onclick="openProductTab(event, 'downloadPDF')">PDF Database</button>
                </div>
                @endif
            </div>
            <div class="p-2 tabcontentProducts" id="description" style="display: block;">
                {!! $product['description'] !!}
            </div>
            @if($product['pdf_file']!=null)
            <div class="p-2 tabcontentProducts" id="downloadPDF" style="display: none;">
                <a href="{{ asset('storage/'.$product['pdf_file']) }}" class="btn btn-primary bg-info" download>Download</a>
            </div>
            @endif
        </div>
    </div>

    @if(!empty($related_products))
    <div class="bg-white mt-5 shadow p-3">
        <div class="d-flex justify-content-center fs-4 textColor mb-3">
            RELATED PRODUCTS
        </div>
        <div class="row g-3">
            @foreach($related_products as $rel)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body"><a href="{{ route('frontend.product.detail',$rel['slug']) }}"><img src="{{ asset('storage/'.$rel->image) }}" alt="{{ $rel->name }}" class="img-fluid"></a></div>
                </div>
                <a href="{{ route('frontend.product.detail',$rel['slug']) }}" class="<fs-4 fw-bold">{{ $rel->name }}</a>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
