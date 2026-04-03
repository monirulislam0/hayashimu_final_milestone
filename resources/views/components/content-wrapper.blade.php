
<div class="content-wrapper">
    <div class="content-header row">
        @if(isset($pageTitle) && isset($pageSubTitle))
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h5 class="content-header-title float-left pr-1 mb-0">{{ $pageTitle }}</h5>
                        <div class="breadcrumb-wrapper col-12">
                            <p>{{ $pageSubTitle }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
