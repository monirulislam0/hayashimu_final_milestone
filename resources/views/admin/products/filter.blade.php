<div class="col-12">
    <div class="card">
        <form method="GET" action="{{ route('admin.products.index') }}">
            @csrf
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name"
                               class="form-control"
                               name="name" value="{{ $old_data['name']??null }}"
                               placeholder="Enter product name">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category_id" id="category">
                            <option value=" ">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (isset($old_data['category_id']) && $old_data['category_id']==$category->id) ? 'selected' :'' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="brand_name">Brand Name</label>
                        <input type="text" id="brand_name"
                               class="form-control @error('brand_name') is-invalid @enderror"
                               name="brand_name" value="{{ $old_data['brand_name']??null }}"
                               placeholder="Enter brand name">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="model_name">Model Name</label>
                        <input type="text" id="model_name"
                               class="form-control @error('model_name') is-invalid @enderror"
                               name="model_name" value="{{ $old_data['model_name'] ??null }}"
                               placeholder="Enter model name">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value=" ">Select status</option>
                            <option value="1" {{ ( isset($old_data['status']) && $old_data['status']==1) ? 'selected' :'' }}>Active</option>
                            <option value="0" {{ ( isset($old_data['status']) && $old_data['status']==0) ? 'selected' :'' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="sidebar_status">Sidebar Status</label>
                        <select name="sidebar_status" class="form-control" id="sidebar_status">
                            <option value=" ">Select sidebar status</option>
                            <option value="1" {{ (isset($old_data['sidebar_status']) && $old_data['sidebar_status']==1) ? 'selected' :'' }}>Active</option>
                            <option value="0" {{ (isset($old_data['sidebar_status']) && $old_data['sidebar_status']==0) ? 'selected' :'' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group"><br>
                        <input type="submit" id="submit"
                               class="btn btn-primary"
                               name="search" value="Search">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
