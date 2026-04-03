<div>
    <form wire:submit.prevent="setting_update" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label>Site Name</label>
                        <input type="text" class="form-control" wire:model="site_name" placeholder="Site Name" >
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label>Site Title</label>
                        <input type="text" class="form-control" wire:model="site_title"
                               placeholder="Site Title">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label>Phone</label>
                        <input type="text" class="form-control" wire:model="mobile"
                               placeholder="Mobile Number">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label>Fax</label>
                        <input type="text" class="form-control" wire:model="phone"
                               placeholder="phone number">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label>Default Email Address</label>
                        <input type="email" class="form-control" wire:model="default_email_address"
                               placeholder="Default  Email Address" >
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label>Address</label>
                        <input type="text" class="form-control" wire:model="address_1"
                               placeholder="Address (Section One)">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label>Address (Section Two)</label>
                        <input type="text" class="form-control" wire:model="address_2"
                               placeholder="Address (Section Two)">
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">
                    <span  wire:loading wire:target="setting_update" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Save changes
                </button>
            </div>
        </div>
    </form>
</div>
