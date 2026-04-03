<form class="form form-vertical" action="{{ route('admin.products.description') }}" method="post">
    @csrf
    <div class="col-12">
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                      id="description">
                    {!!  old('description',(isset($product->description)) ? $product->description: '' )!!}
                </textarea>
            @if(isset($product->id))
                <input type="hidden" name="id" value="{{ $product->id }}">
            @endif
            <input type="hidden" name="is_tab" value="1">
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
        <a type="reset" href="{{ route('admin.products.index') }}"
           class="btn btn-light-secondary mr-1 mb-1">Reset</a>
    </div>
</form>
