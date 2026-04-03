@section('title')
    {{ config('app.name') }} | Sliders
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
                                        <td>{{ ($data->status) ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{ route('admin.news.edit',$data->id ) }}"><i
                                                    class="badge-circle badge-circle-light-secondary bx bx-edit font-medium-1"></i></a>
                                            <a href="{{ route('admin.news.delete',$data->id ) }}"
                                               onclick="return confirm('Are you sure you want to perform this action?')"><i
                                                    class="badge-circle badge-circle-light-secondary bx bx-trash font-medium-1"></i></a>
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
