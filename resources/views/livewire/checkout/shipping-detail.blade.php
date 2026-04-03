<div>
    <div class="row">
        <form class="billing_details_form" wire:submit.prevent="submitOrder">
        <div class="mb-3">
            <div class="row">
                <div class="col-md-12">
                    <input type="text" wire:model.lazy="name" class="form-control" placeholder="*Name" required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-md-12">
                    <input type="text" wire:model.lazy="address" class="form-control" placeholder="Address">
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-md-12">
                    <input type="text" wire:model.lazy="mobile" class="form-control" placeholder="*Mobile">
                    @error('mobile')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-md-12">
                    <input type="email" wire:model.lazy="email" class="form-control" placeholder="Email">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <textarea class="form-control" wire:model.lazy="additional_info" placeholder="Additional Information"
                      rows="4"></textarea>
            @error('message')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-block" style="width: 100%;">SUBMIT</button>
    </div>
    </form>

</div>
