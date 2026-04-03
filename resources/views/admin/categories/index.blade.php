@section('title')
    {{ config('app.name') }} | Categories
@endsection
<x-admin-layout>
    <div class="row justify-content-center" id="basic-table">
        @include('admin.categories.filter')
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="card-title">List Of Categories</h4>
                        <div class="offset-md-8">
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-success round">Create New Category</a>
                        </div>
                    </div>
                </div>
                @include('admin.includes.flash')
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Parent</th>
                                    <th>Sorting</th>
                                    <th>Featured?</th>
                                    <th>Menu? </th>
                                    <th>Status</th>
                                    <th>Is Show Sidebar?</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $sl=0 @endphp
                                @foreach($categories as $category)
                                    <tr>
                                        <td class="text-bold-500">{{ ++$sl }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td class="text-bold-500">{{ isset($category->parent->name) ? $category->parent->name: '' }}</td>
                                        <td>{{ $category->sorting }}</td>
                                        <td>{{ ($category->featured) ? 'Yes' : 'Not' }}</td>
                                        <td>{{ ($category->menu) ? 'Yes' : 'Not' }}</td>
                                        <td>{{ ($category->status) ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ ($category->is_show_top_sidebar) ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit',$category->id ) }}"><i
                                                    class="badge-circle badge-circle-light-secondary bx bx-edit font-medium-1"></i></a>
                                            <a href="{{ route('admin.categories.delete',$category->id ) }}"
                                               onclick="return confirm('Are you sure you want to perform this action?')"><i
                                                    class="badge-circle badge-circle-light-secondary bx bx-trash font-medium-1"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
