<div>
    <form wire:submit.prevent="setting_popup">
        <div class="media">
            <a href="javascript: void(0);">
                <img src="{{ $popup_link }}" class="rounded mr-75" alt="Site Logo" height="64" width="64">
            </a>
            <div class="media-body mt-25">
                <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                    <label for="popup" class="btn btn-sm btn-light-primary ml-50 mb-50 mb-sm-0">
                        <input id="popup" wire:model="popup" type="file" >
                    </label>
                </div>

                @error('popup')
                <p class="text-muted ml-1 mt-50 alert-danger">{{ $message }}</p>
                @enderror
                <p class="text-muted ml-1 mt-50"><small>Allowed JPG, GIF or PNG. Max
                        size of
                        200KB</small></p>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="controls">
                    <label>URL</label>
                    <input type="text" class="form-control" wire:model="popup_url"
                           placeholder="Enter URL">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="checkbox">
                    <input type="checkbox" class="checkbox-input" id="is_popup_active"
                          name="is_popup_active" wire:model.lazy="is_popup_active">
                    <label for="is_popup_active">Activation</label>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
            <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">
                <span  wire:loading wire:target="setting_popup" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Save changes
            </button>
        </div>
    </form>

</div>

