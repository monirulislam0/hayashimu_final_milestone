@section('title')
    {{ config('app.name') }} | Pages
@endsection
<x-admin-layout>
    <div class="row justify-content-center" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="card-title">List Of Pages</h4>
                        <div class="offset-md-8">
                            <a href="{{ route('admin.pages.create') }}" class="btn btn-success round">Create New Page</a>
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
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Banner</th>
                                    <th>Status</th>
                                    <th>Sorting</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $sl=0 @endphp
                                @foreach($pages as $page)
                                    <tr>
                                        <td class="text-bold-500">{{ ++$sl }}</td>
                                        <td>{{ $page->title }}</td>
                                        <td>{{ $page->slug }}</td>
                                        <td>
                                            @if($page->page_banner)
                                                <img src="{{ asset('storage/' . $page->page_banner) }}" alt="Banner" style="max-width: 50px; max-height: 30px;" class="img-thumbnail">
                                            @else
                                                <span class="text-muted">No Banner</span>
                                            @endif
                                        </td>
                                        <td>{{ ($page->status) ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $page->sorting }}</td>
                                        <td>{{ $page->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.pages.edit', $page) }}"><i
                                                    class="badge-circle badge-circle-light-secondary bx bx-edit font-medium-1"></i></a>
                                            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link p-0" onclick="return confirm('Are you sure you want to delete this page?')">
                                                    <i class="badge-circle badge-circle-light-secondary bx bx-trash font-medium-1"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $pages->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
