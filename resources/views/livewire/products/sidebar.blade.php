<div id="fullSidebar">
    @if($is_show_top_sidebar)
    <div class="bg-white p-4 pt-3 mb-3 text-center topSidebar">
    {!!  $topSidebar->content !!}
    </div>
    @endif
    <div class="bg-white p-4 pt-3 mb-3">
        <div class="pb-3 product-sidebar-title fs-4">
            PRODUCT SEARCH
        </div>
        <div class="product-input-ctrl">

            <div id="product-search-icon">
                <i class="fa-solid fa-magnifying-glass fs-5" id="productSearchIcon"></i>
            </div>
            <input type="text" wire:model="filter_key" wire:keyup="filter" class="form-control py-2" placeholder="Search...">
             
        </div>
        @if(count($suggestions) > 0)
            <ul class="list-group mt-2">
                @foreach($suggestions as $suggestion)
                    <li class="list-group-item">
                        <a href="{{ route('frontend.product.detail', ['slug' => $suggestion->slug]) }}" class="text-decoration-none">
                            {{ $suggestion->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @elseif($noResultsMessage)
            <div class="alert alert-info mt-2">
                {{ $noResultsMessage }}
            </div>
        @endif
    </div>
   <div class="bg-white p-4 pt-3 mb-3">
    <div class="product-sidebar-title fs-4 pb-md-2">
        PRODUCT CATEGORY
        <!-- Hide the dropdown icon on larger screens -->
        <i class="fa-solid fa-caret-down fs-5 float-end d-md-none" id="sidebar-toggle" data-bs-toggle="collapse" data-bs-target="#product-sidebar" aria-expanded="false" aria-controls="product-sidebar"></i>
    </div>
    <!-- Add the "show" class to make the sidebar initially visible only on larger screens -->
    <ul class="flex-column product-sidebar collapse d-md-block" id="product-sidebar">
        @foreach($categories as $category)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend.products',$category->slug) }}">
                {{ $category->name }}
            </a>
             @if(count($category->children)>0)
            <i class="fa-solid fa-caret-down fs-5 float-end sidebar-drop" type="button" data-bs-toggle="collapse" data-bs-target="#cat_{{ $category->id }}" aria-expanded="false" aria-controls="powerTools"></i>
            <ul id="cat_{{ $category->id }}" class="accordion-collapse collapse" data-bs-parent="#product-sidebar">
                @foreach($category->children as $child)
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.products',$child->slug) }}">{{ $child->name }}</a>
                </li>
                @endforeach
            </ul>
             @endif
        </li>
        @endforeach
    </ul>
</div>
    @if($sidebarImage->extra=='active')
    <div class="bg-white p-4 pt-3 mb-3" id="imageSidebar">
        <img src="{{ asset('storage/'.$sidebarImage->image) }}" height="600px" width="100%">
    </div>
    @endif
</div>