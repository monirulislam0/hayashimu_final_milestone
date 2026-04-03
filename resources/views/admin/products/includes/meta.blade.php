<form class="form form-vertical" action="{{ route('admin.products.meta') }}" method="POST">
    @csrf
    <div class="form-group mt-4" id="add-recipient">
        <label for="meta_tag">Meta Tags</label>
        <div class="tagsinput-tag" data-type="static-sms">
            <input type="text" class="form-control h-auto meta_tag ad-recipient" name="meta_tags" value="{{ old('meta_tags',(isset($product->meta_tags)) ? $product->meta_tags: '' )}}" data-role="tagsinput">
            <span class="text-danger number_validation_msg"></span>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="meta_title">Meta Title</label>
            <input type="text" id="meta_title"
                   class="form-control h-auto @error('meta_title') is-invalid @enderror"
                   name="meta_title" value="{{ old('meta_title',(isset($product->meta_title)) ? $product->meta_title: '' )}}"
                   placeholder="Enter meta title">
            @if(isset($product->id))
                <input type="hidden" name="id" value="{{ $product->id }}">
            @endif
            @error('meta_title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="description">Meta Description</label>
            <textarea class="form-control h-auto @error('meta_description') is-invalid @enderror" name="meta_description"
                      id="meta_description">
                    {!! old('meta_description',(isset($product->meta_description)) ? $product->meta_description: '' )!!}
                </textarea>
            @if(isset($product->id))
                <input type="hidden" name="id" value="{{ $product->id }}">
            @endif
            <input type="hidden" name="is_tab" value="1">
            @error('meta_description')
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
