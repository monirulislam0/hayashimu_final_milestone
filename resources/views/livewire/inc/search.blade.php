<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
<div class="search-popup__content">
    <form action="{{ route('frontend.search') }}" method="POST">
        @csrf
        <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
        <input type="text" id="search" wire:mode="key" name="key" placeholder="I am looking for ..." />
        <button type="submit" aria-label="search submit" class="thm-btn">
            <i class="icon-magnifying-glass"></i>
        </button>
    </form>
</div>
</div>
