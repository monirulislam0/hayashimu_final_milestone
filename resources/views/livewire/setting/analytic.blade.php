<div>
    <form wire:submit.prevent="setting_analytic" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>Google Analytics</label>
                    <textarea class="form-control" wire:model.lazy="google_analytics" rows="5">

                    </textarea>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label>Google Tag Manager</label>
                    <textarea class="form-control" wire:model.lazy="google_tag_manager" rows="5">

                    </textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Facebook Pixel</label>
                    <textarea class="form-control" wire:model.lazy="facebook_pixels" rows="5">

                    </textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Messenger Script</label>
                    <textarea class="form-control" wire:model.lazy="messenger_script" rows="5">

                    </textarea>
                </div>
            </div>
            <div
                class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                <button type="submit"
                        class="btn btn-primary glow mr-sm-1 mb-1">

                    <span wire:loading wire:target="setting_analytic" class="spinner-border spinner-border-sm"
                          role="status" aria-hidden="true"></span>
                    Save changes
                </button>
            </div>
        </div>
    </form>
</div>
