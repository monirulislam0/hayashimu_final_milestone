<form action="" class="dropzone" id="dropzone" style="border: 2px dashed rgba(0,0,0,0.3)">
    <input type="hidden" name="product_id"  value="{{ $product->id }}">
    {{ csrf_field() }}
</form>
<div class="row d-print-none mt-2">
    <div class="col-12 text-right">
        <button class="btn btn-success" type="button" id="uploadButton">
            <i class="fa fa-fw fa-lg fa-upload"></i>Upload Images
        </button>
    </div>
</div>
@if ($product->images)
    <hr>
    <div class="row">
        @foreach($product->images as $image)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body image-container">
                        <img src="{{ asset('storage/'.$image->image_link) }}" id="brandLogo" class="img-fluid" alt="img">
{{--                        <input type="radio" name="default_image" value=""  onclick="changeDefaultImage({{ $image->id }})" {{ ($image->default_image == 1) ? 'checked' : '' }}>Default<br>--}}
                        <a class="card-link float-right text-danger trash-icon" href="{{ route('admin.products.images.delete',$image->id) }}">
                            <i class="fa fa-trash fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

