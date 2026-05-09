@section('title')
    {{ config('app.name') }} | News
@endsection
<x-admin-layout>
    <div class="row justify-content-center" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="card-title">List Of News</h4>
                        <div class="offset-md-8">
                            <a href="{{ route('admin.news.create') }}" class="btn btn-success round">Create New News</a>
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
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $sl=0 @endphp
                                @foreach($news as $data)
                                    <tr>
                                        <td class="text-bold-500">{{ ++$sl }}</td>
                                        <td><img src="{{ asset('storage/'.$data->image) }}" height="80px"></td>
                                        <td>{{ $data->title }}</td>
                                        <td>
                                            @if($data->news_type == \App\Enums\NewsTypeEnum::NEW_PRODUCTS->value)
                                                New Products News
                                            @elseif($data->news_type == \App\Enums\NewsTypeEnum::INDUSTRY_NEWS->value)
                                                Industry News
                                            @elseif($data->news_type==\App\Enums\NewsTypeEnum::EXHIBITION_NEWS->value)
                                                Exhibition News
                                            @elseif($data->news_type==\App\Enums\NewsTypeEnum::COMPANY_NEWS->value)
                                                Company News
                                            @elseif($data->news_type==\App\Enums\NewsTypeEnum::CERTIFICATION->value)
                                                Certification
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" 
                                                       id="featured_{{ $data->id }}" 
                                                       {{ $data->is_featured ? 'checked' : '' }}
                                                       onchange="toggleFeatured({{ $data->id }}, this.checked)">
                                                <label class="form-check-label" for="featured_{{ $data->id }}">
                                                    {{ $data->is_featured ? 'Yes' : 'No' }}
                                                </label>
                                            </div>
                                        </td>
                                        <td>{{ ($data->status) ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{ route('admin.news.edit',$data->id ) }}" class="btn btn-sm btn-outline-primary me-1"><i
                                                    class="bx bx-edit"></i> Edit</a>
                                            <a href="{{ route('admin.news.delete',$data->id ) }}"
                                               class="btn btn-sm btn-outline-danger"
                                               onclick="return confirm('Are you sure you want to delete this news item?')"><i
                                                    class="bx bx-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $news->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

<script>
function toggleFeatured(newsId, isFeatured) {
    fetch(`/admin/news/${newsId}/toggle-featured`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            is_featured: isFeatured
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update the label text
            const label = document.querySelector(`label[for="featured_${newsId}"]`);
            label.textContent = isFeatured ? 'Yes' : 'No';
        } else {
            alert('Error updating featured status');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error updating featured status');
    });
}
</script>
