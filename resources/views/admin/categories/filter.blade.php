<div class="col-12">
    <div class="card">
        <form method="GET" action="{{ route('admin.categories.index') }}">
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
                        <label for="category">Parent Category</label>
                        <select class="form-control" name="parent_id" id="category">
                            <option value=" ">Select a parent category</option>
                            @foreach($parents as $category)
                                <option value="{{ $category->id }}" {{ (isset($old_data['parent_id']) && $old_data['parent_id']==$category->id) ? 'selected' :'' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
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
                    <div class="form-group">
                        <label for="menu_status">Menu Status</label>
                        <select name="menu_status" class="form-control" id="menu_status">
                            <option value=" ">Select menu status</option>
                            <option value="1" {{ (isset($old_data['menu_status']) && $old_data['menu_status']==1) ? 'selected' :'' }}>Active</option>
                            <option value="0" {{ (isset($old_data['menu_status']) && $old_data['menu_status']==0) ? 'selected' :'' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="featured_status">Feature Status</label>
                        <select name="featured_status" class="form-control" id="featured_status">
                            <option value=" ">Select sidebar status</option>
                            <option value="1" {{ (isset($old_data['featured_status']) && $old_data['featured_status']==1) ? 'selected' :'' }}>Active</option>
                            <option value="0" {{ (isset($old_data['featured_status']) && $old_data['featured_status']==0) ? 'selected' :'' }}>Inactive</option>
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
