<div>
    @if(isset($errorMessage) && $errorMessage)
        <span class="text-danger">{{ $errorMessage }}</span>
    @endif
    <div class="account__main-tab-inner">
        @if($step==1)
            <form class="account__form" wire:submit.prevent="submit_mobile" method="POST">
                <div class="account__form-input-box">
                    <input type="text" placeholder="Enter Your mobile no: 01xxxxxxxxx" wire:model.lazy="mobile_no">
                    @error('mobile_no')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="account__form-btn-box">
                    <button type="submit"  class="thm-btn account__form-btn">Login now</button>
                </div>
            </form>
        @else
            <form class="account__form" wire:submit.prevent="submit_otp" method="POST">
                <div class="account__form-input-box">
                    <input type="text" placeholder="Enter OTP" wire:model.lazy="otp">
                </div>
                <div class="account__form-btn-box">
                    <button type="submit" class="thm-btn account__form-btn">Login now</button>
                </div>
            </form>
            @endif
    </div>
</div>
