{{--@dd($category->image);--}}
<div class="form-body">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="first-name-vertical">Name</label>
                <input type="text" id="first-name-vertical"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name"  value="{{ old('name',(isset($category->name)) ? $category->name: '' )}}" placeholder="Enter category name">
                @if(isset($category->id))
                    <input type="hidden" name="id" value="{{ $category->id }}">
                @endif
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="title_one">Parent Name</label>
                <select name="parent_id" class="select2 form-control" id="parent_id">
                    <option value="">Select a parent name</option>
                    @foreach($parents as $parent)
                        <option value="{{ $parent->id }}" {{ (isset($category->parent_id) && $category->parent_id==$parent->id) ? 'selected':'' }}>{{ $parent->name }}</option>
                    @endforeach
                </select>
                @if(isset($category->id))
                    <input type="hidden" name="id" value="{{ $category->id }}">
                @endif
                @error('parent_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="sorting">Sorting</label>
                <input type="number" id="sorting"
                       class="form-control @error('sorting') is-invalid @enderror"
                       name="sorting"  value="{{ old('sorting',(isset($category->sorting)) ? $category->sorting: '' )}}" placeholder="Enter sorting">
                @if(isset($category->id))
                    <input type="hidden" name="id" value="{{ $category->id }}">
                @endif
                @error('sorting')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">
                    {{ old('description',(isset($category->description)) ? $category->description: '' )}}
                </textarea>
                @if(isset($category->id))
                    <input type="hidden" name="id" value="{{ $category->id }}">
                @endif
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <fieldset class="form-group">
                <label for="basicInputFile">Image</label>
                <div class="custom-file">
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                </div>
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </fieldset>
            @if(isset($category->image))
                <img src="{{ asset('storage/'.$category->image) }}" width="100px">
            @endif
        </div>
        <div class="col-12">
            <fieldset class="form-group">
                <label for="basicInputFile">Hover Image</label>
                <div class="custom-file">
                    <input type="file" name="hover_image" class="form-control @error('hover_image') is-invalid @enderror" id="hover_image">
                </div>
                @error('hover_image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </fieldset>
            @if(isset($category->image))
                <img src="{{ asset('storage/'.$category->hover_image) }}" width="100px">
            @endif
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="checkbox">
                    <input type="checkbox" class="checkbox-input" id="status"
                           name="status" {{ (isset($category->status) && $category->status) ? 'checked': '' }}>
                    <label for="status">Activation</label>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="checkbox">
                    <input type="checkbox" class="checkbox-input" id="featured" name="featured"
                        {{ (isset($category->featured) && $category->featured) ? 'checked': '' }}
                    >
                    <label for="featured">Is Featured?</label>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="checkbox">
                    <input type="checkbox" class="checkbox-input" id="menu" name="menu"
                        {{ (isset($category->menu) && $category->menu) ? 'checked': '' }}
                    >
                    <label for="menu">Is Menu?</label>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="checkbox">
                    <input type="checkbox" class="checkbox-input" id="sidebar" name="is_show_top_sidebar"
                        {{ (isset($category->is_show_top_sidebar) && $category->is_show_top_sidebar) ? 'checked': '' }}
                    >
                    <label for="sidebar">Is Show Top Sidebar?</label>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
            <a type="reset" href="{{ route('admin.categories.index') }}" class="btn btn-light-secondary mr-1 mb-1">Reset</a>
        </div>
    </div>
</div>
