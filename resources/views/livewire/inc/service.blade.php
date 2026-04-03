<div>
    <div class="row py-5">
        <div class="col-md-8">
            <div class="fs-2 mb-3 text-white">
                DOWNLOAD
            </div>
            <div class="aboutus-text-body d-flex flex-column gap-4 text-white">
                <div>
                    HAYASHIMU MACHINERY CO., LTD, established in 2018, is a professional supplier of Tools & Hardware products in China, and is mainly engaged in providing Power Tools, Bench Tools, Power Tools Accessories, Hand Tools, Air Tools, Water Pumps, Generators, Welding Machine and Safety Products.
                </div>
            </div>

            <div class=" download-input-ctrl">
                <div id="download-search-icon">
                    <i class="fa-solid fa-magnifying-glass fs-5" id="downloadSearchIcon"></i>
                </div>
                <input type="text" id="download-search-input" name="download-search-input" placeholder="Download Search..." autocomplete="off">
            </div>

        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3 download-image">
            <img src="{{ asset('frontend/images/downlowd1.webp') }}" alt="...">
        </div>
    </div>
    <div class="mt-5 bg-white rounded download-card">
        <div class="row g-3 p-3 pt-0">
            @foreach($services as $service)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1">
                                <img src="{{ asset('frontend/images/pro23.png') }}" alt="..." class="d-block w-100">
                            </div>
                            <div class="col-10 d-flex align-items-center">
                                {{ $service->title }}
                            </div>
                            <div class="col-1 d-flex justify-content-center align-items-center" wire:click="download('{{ $service->id }}')">
                                <i class="fa-solid fa-download fs-4"></i>
                            </div>
                            <!--<div class="col-1 d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#fileDownloadModal_{{ $service->id }}">-->
                            <!--    <i class="fa-solid fa-download fs-4"></i>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @foreach($services as $service)
    <!-- Modal -->
    <div class="modal fade" id="fileDownloadModal_{{ $service->id }}" tabindex="-1" aria-labelledby="fileDownloadModalLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fileDownloadModalLabel">File Download</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Please enter your password:</p>
                    <div class="input-group mb-3">
                        <input type="password" wire:model="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                        <button class="btn btn-primary" type="button" wire:click="download('{{ $service->id }}')">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
