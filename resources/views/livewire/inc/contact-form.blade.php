<div>

{{--    <form>--}}
        <div class="mb-3">
            @if($success_message)
                <p class="text-warning">{{ $success_message }}</p>
            @endif
            <div class="row">
                <div class="col">
                    <input type="text" wire:model.lazy="name" class="form-control" placeholder="*Name" required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <input type="tel" wire:model.lazy="mobile" class="form-control" placeholder="Tel" required>
                    @error('mobile')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <input type="email" wire:model.lazy="email" class="form-control" placeholder="*Email" required>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <input type="text" wire:model.lazy="country_name" class="form-control" placeholder="*Country/Region" required>
                    @error('country_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <textarea class="form-control" wire:model.lazy="message" placeholder="Message" rows="4" required></textarea>
            @error('message')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" wire:click="submit" class="btn btn-primary btn-block" style="width: 100%;">SUBMIT</button>
{{--    </form>--}}
</div>
