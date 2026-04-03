@section('title')
    {{ config('app.name') }} | Services
@endsection
<x-admin-layout>
    <div class="row justify-content-center" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="card-title">List Of Services</h4>
                        <div class="offset-md-8">
                            <a href="{{ route('admin.services.create') }}" class="btn btn-success round">Create New Service Documents</a>
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
                                    <th>File Name</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $sl=0 @endphp
                                @foreach($services as $service)
                                    <tr>
                                        <td class="text-bold-500">{{ ++$sl }}</td>
                                        <td>{{ $service->title }}</td>
                                        <td>{{ $service->file_name }}</td>
                                        <td>{{ ($service->status) ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{ route('admin.services.edit',$service->id ) }}"><i
                                                    class="badge-circle badge-circle-light-secondary bx bx-edit font-medium-1"></i></a>
                                            <a href="{{ route('admin.services.delete',$service->id ) }}"
                                               onclick="return confirm('Are you sure you want to perform this action?')"><i
                                                    class="badge-circle badge-circle-light-secondary bx bx-trash font-medium-1"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
