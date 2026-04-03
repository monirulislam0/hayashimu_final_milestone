@section('title')
    {{ config('app.name') }} | Products
@endsection
<x-admin-layout>
    <div class="row justify-content-center" id="basic-table">
        @include('admin.products.filter')
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="card-title">List Of Products</h4>
                        <div class="offset-md-7">
                            <a href="{{ route('admin.products.create') }}" class="btn btn-success round">Create New
                                Product</a>
                            <a href="{{ route('admin.products.export') }}" class="btn btn-primary round">Export Data</a>
                            <a href="{{ route('admin.products.import.view') }}" class="btn btn-warning round">Import</a>
                        </div>
                    </div>
                </div>
                @include('admin.includes.flash')
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Status</th>
                                    <th>Is Show Sidebar?</th>
                                    <th>ACTION</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $sl=0 @endphp
                                @foreach($products as $product)
                                    <tr>
                                        <td class="text-bold-500">{{ ++$sl }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td class="text-bold-500">
                                            @if(isset($product->categories))
                                                @foreach($product->categories as $category)
                                                    {{ $category->name }},
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="text-bold-500">{{ $product->brand }}</td>
                                        <td class="text-bold-500">{{ $product->model }}</td>
                                        <td>{{ ($product->status) ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ ($product->is_show_top_sidebar) ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{ route('admin.products.edit',$product->id ) }}" title="Edit"><i
                                                    class="badge-circle badge-circle-light-secondary bx bx-edit font-medium-1"></i></a>
                                            <a href="{{ route('admin.products.delete',$product->id ) }}"
                                               onclick="return confirm('Are you sure you want to perform this action?')"
                                               title="Delete"><i
                                                    class="badge-circle badge-circle-light-secondary bx bx-trash font-medium-1"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('frontend.product.detail',$product->slug ) }}"
                                               title="View Detail" target="_blank"><i
                                                    class="badge-circle badge-circle-light-secondary bx bx-book-open font-medium-1"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $products->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
