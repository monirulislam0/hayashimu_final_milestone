<div>
    <form wire:submit.prevent="setting_upload">
        <div class="media">
            <a href="javascript: void(0);">
                <img src="{{ $site_logo_link }}" class="rounded mr-75" alt="Site Logo" height="64" width="64">
            </a>
            <div class="media-body mt-25">
                <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                    <label for="select-files" class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0">
                        <input id="select-files" wire:model="site_logo" type="file">
                    </label>
                </div>

                @error('site_logo')
                <p class="text-muted ml-1 mt-50 alert-danger">{{ $message }}</p>
                @enderror
                <p class="text-muted ml-1 mt-50"><small>Allowed JPG, GIF or PNG. Max
                        size of
                        200KB</small></p>
            </div>
        </div>
        <div class="media">
            <a href="javascript: void(0);">
                <img src="{{ $site_favicon_link }}" class="rounded mr-75" alt="Site Favicon" height="64" width="64">
            </a>
            <div class="media-body mt-25">
                <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                    <label for="site_favicon" class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0">
                        <input id="site_favicon" wire:model="site_favicon" type="file">
                    </label>
                </div>
                @error('site_favicon')
                <p class="text-muted ml-1 mt-50 alert-danger">{{ $message }}</p>
                @enderror
                <p class="text-muted ml-1 mt-50"><small>Allowed JPG, GIF or PNG. Max
                        size of
                        200kB</small></p>
            </div>
        </div>
        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
            <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">
                <span  wire:loading wire:target="setting_upload" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Save changes
            </button>
        </div>
    </form>

</div>
