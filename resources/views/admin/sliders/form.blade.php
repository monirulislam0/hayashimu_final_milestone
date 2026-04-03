<div class="form-body">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="first-name-vertical">Name</label>
                <input type="text" id="first-name-vertical"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name"  value="{{ old('name',(isset($slider->name)) ? $slider->name: '' )}}" placeholder="Enter slider name">
                @if(isset($slider->id))
                    <input type="hidden" name="id" value="{{ $slider->id }}">
                @endif
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="first-name-vertical">Title</label>
                <input type="text" id="first-title-vertical"
                       class="form-control @error('title') is-invalid @enderror"
                       name="title"  value="{{ old('title',(isset($slider->title)) ? $slider->title: '' )}}" placeholder="Enter slider title">
                @if(isset($slider->id))
                    <input type="hidden" name="id" value="{{ $slider->id }}">
                @endif
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="first-name-vertical">Redirect URL</label>
                <input type="text" id="first-url-vertical"
                       class="form-control @error('redirect_url') is-invalid @enderror"
                       name="redirect_url"  value="{{ old('redirect_url',(isset($slider->redirect_url)) ? $slider->redirect_url: '' )}}" placeholder="Enter redirect url">
                @if(isset($slider->id))
                    <input type="hidden" name="id" value="{{ $slider->id }}">
                @endif
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="type">Slider/Banner</label>
                <select class="form-control @error('sorting') is-invalid @enderror" id="type" name="type">
                    <option value="0" {{ old('type',(isset($slider->type) && $slider->type==\App\Enums\SliderStatusEnum::HOME_SLIDER->value) ? 'selected': '') }}>Home Page Slider</option>
                    <option value="1" {{ old('type',(isset($slider->type) && $slider->type==\App\Enums\SliderStatusEnum::HOME_BANNER->value) ? 'selected': '') }}>Home Page Banner</option>
                    <option value="2" {{ old('type',(isset($slider->type) && $slider->type==\App\Enums\SliderStatusEnum::ABOUT_SLIDER->value) ? 'selected': '') }}>About Page Slider</option>
                </select>
                @if(isset($slider->id))
                    <input type="hidden" name="id" value="{{ $slider->id }}">
                @endif
                @error('type')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="sorting">Sorting</label>
                <input type="text" id="sorting"
                       class="form-control @error('sorting') is-invalid @enderror"
                       name="sorting"  value="{{ old('sorting',(isset($slider->sorting)) ? $slider->sorting: '' )}}" placeholder="Enter slider/banner sort">
                @if(isset($slider->id))
                    <input type="hidden" name="id" value="{{ $slider->id }}">
                @endif
                @error('sorting')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <fieldset class="form-group">
                <label for="image">Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </fieldset>
            @if(isset($slider->image))
                <img src="{{ asset('storage/'.$slider->image) }}" width="100px">
            @endif
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="checkbox">
                    <input type="checkbox" class="checkbox-input" id="status"
                           name="status" {{ (isset($slider->status) && $slider->status) ? 'checked': '' }}>
                    <label for="status">Activation</label>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
            <a type="reset" href="{{ route('admin.sliders.index') }}" class="btn btn-light-secondary mr-1 mb-1">Reset</a>
        </div>
    </div>
</div>
