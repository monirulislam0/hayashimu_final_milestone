<div>
    <form wire:submit.prevent="setting_social" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>Facebook</label>
                    <input type="text" class="form-control"
                           placeholder="Add Facebook link"
                           wire:model.lazy="social_facebook"
                    >
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Youtube</label>
                    <input type="text" class="form-control"
                           placeholder="Add youtube link"
                           wire:model.lazy = "social_youtube"
                    >
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>LinkedIn</label>
                    <input type="text" class="form-control"
                           placeholder="Add Linkedin link"
                           wire:model.lazy="social_linkedin"
                    >
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Instagram</label>
                    <input type="text"  class="form-control"
                           placeholder="Add instagram link link"
                           wire:model.lazy="social_instagram"
                    >
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Twitter</label>
                    <input type="text"  class="form-control"
                           placeholder="Add twitter link link"
                           wire:model.lazy="social_twitter"
                    >
                </div>
            </div>
            <div
                class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                <button type="submit"
                        class="btn btn-primary glow mr-sm-1 mb-1">
                    <span wire:loading wire:target="setting_social" class="spinner-border spinner-border-sm"
                          role="status" aria-hidden="true"></span>

                    Save
                    changes
                </button>
                <button type="reset" class="btn btn-light mb-1">Cancel
                </button>
            </div>
        </div>
    </form>
</div>
