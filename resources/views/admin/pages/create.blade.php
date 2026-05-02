@section('title')
    {{ config('app.name') }} | Create Page
@endsection

<x-admin-layout>
    <section id="basic-vertical-layouts">
        <div class="row match-height justify-content-center">
            <div class="col-md-10 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Page</h4>
                    </div>
                    @include('admin.includes.flash')
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" 
                            action="{{ route('admin.pages.store') }}" 
                            enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    value="{{ old('title') }}" placeholder="Enter page title" required>
                                                @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <input type="text" class="form-control" id="slug" name="slug"
                                                    value="{{ old('slug') }}" placeholder="Enter page slug" required>
                                                @error('slug')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="content">Content</label>
                                                <textarea class="form-control h-2" id="description" name="content" rows="25" style="height: 500px !important;"
                                                    placeholder="Enter page content" required>{{ old('content') }}</textarea>
                                                @error('content')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="page_banner">Page Banner</label>
                                                <input type="file" class="form-control" id="page_banner"
                                                    name="page_banner" accept="image/*" onchange="previewBanner(event)">
                                                <small class="text-muted">Allowed formats: jpeg, png, jpg, gif (Max:
                                                    2MB)</small>
                                                <div id="bannerPreview" class="mt-2" style="display: none;">
                                                    <img id="bannerPreviewImg" src="#" alt="Banner Preview"
                                                        style="max-width: 200px; max-height: 100px;"
                                                        class="img-thumbnail">
                                                    <br>
                                                    <small class="text-muted">Banner preview</small>
                                                </div>
                                                @error('page_banner')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="meta_title">Meta Title</label>
                                                <input type="text" class="form-control" id="meta_title"
                                                    name="meta_title" value="{{ old('meta_title') }}"
                                                    placeholder="Enter meta title">
                                                @error('meta_title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="meta_description">Meta Description</label>
                                                <textarea class="form-control" id="page_meta_description" name="meta_description" rows="3"
                                                    placeholder="Enter meta description">{{ old('meta_description') }}</textarea>
                                                @error('meta_description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meta_keys">Meta Keywords</label>
                                                <input type="text" class="form-control" id="meta_keys"
                                                    name="meta_keys" value="{{ old('meta_keys') }}"
                                                    placeholder="Enter meta keywords">
                                                @error('meta_keys')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="meta_tags">Meta Tags</label>
                                                <input type="text" class="form-control" id="meta_tags"
                                                    name="meta_tags" value="{{ old('meta_tags') }}"
                                                    placeholder="Enter meta tags">
                                                @error('meta_tags')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sorting">Sorting Order</label>
                                                <input type="number" class="form-control" id="sorting"
                                                    name="sorting" value="{{ old('sorting', 0) }}" min="0">
                                                @error('sorting')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="1" {{ old('status', 1) ? 'selected' : '' }}>
                                                        Active</option>
                                                    <option value="0"
                                                        {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                                @error('status')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <input type="submit" value="Create Page" class="btn btn-primary mr-1 mb-1">
                                           
                                            <a href="{{ route('admin.pages.index') }}"
                                                class="btn btn-light-secondary mr-1 mb-1">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>

<script>
    function previewBanner(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('bannerPreview');
        const previewImg = document.getElementById('bannerPreviewImg');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    }
</script>
