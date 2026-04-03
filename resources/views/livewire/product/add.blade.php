<div>
    <div class="product-details__quantity">
        <h3 class="product-details__quantity-title">Choose quantity</h3>
        <div class="quantity-box">
            <button type="button" class="sub" wire:click="minus"><i class="fa fa-minus"></i></button>
            <input type="number"  wire:model="qty" />
            <button type="button" class="add" wire:click="plus"><i class="fa fa-plus"></i></button>
        </div>
    </div>
    <div class="product-details__buttons">
        <div class="product-details__buttons-2">
            <a wire:click="add" class="thm-btn">Add to cart</a>
        </div>
    </div>
</div>
