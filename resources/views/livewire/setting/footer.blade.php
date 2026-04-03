<div>
    <form wire:submit.prevent="setting_footer" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>Footer Copyright Text</label>
                    <input type="text" class="form-control"
                           placeholder="Copyright text"
                           wire:model.lazy="footer_copyright_text"
                    >
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>SEO Meta Title</label>
                    <input type="text" class="form-control"
                           placeholder="SEO meta title"
                           wire:model.lazy="seo_meta_title"
                    >
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label>SEO Meta Title</label>
                    <textarea class="form-control" wire:model.lazy="seo_meta_description" rows="5">

                    </textarea>
                </div>
            </div>
            <div
                class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                <button type="submit"
                        class="btn btn-primary glow mr-sm-1 mb-1">

                    <span wire:loading wire:target="setting_footer" class="spinner-border spinner-border-sm"
                          role="status" aria-hidden="true"></span>
                    Save changes
                </button>
                <button type="reset" class="btn btn-light mb-1">Cancel
                </button>
            </div>
        </div>
    </form>
</div>

