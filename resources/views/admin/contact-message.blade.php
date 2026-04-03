@section('title')
    {{ config('app.name') }} | Contact Message
@endsection
<x-admin-layout>
    <div class="row justify-content-center" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="card-title">Contact Messages</h4>
                    </div>
                </div>
                @include('admin.includes.flash')
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive" style="max-height: 70vh; overflow-y: auto;">
                            <table class="table table-striped table-hover">
                                <thead class="thead-light">
                                <tr>
                                    <th style="width: 60px;">Sl</th>
                                    <th style="width: 150px;">Name</th>
                                    <th style="width: 120px;">Mobile</th>
                                    <th style="width: 180px;">Email</th>
                                    <th style="max-width: 300px;">Message</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $sl=0 @endphp
                                @foreach($messages as $message)
                                    <tr>
                                        <td class="text-bold-500">{{ ++$sl }}</td>
                                        <td style="max-width: 150px; word-wrap: break-word;">{{ $message->name }}</td>
                                        <td style="max-width: 120px; word-wrap: break-word;">{{ $message->mobile }}</td>
                                        <td style="max-width: 180px; word-wrap: break-word;">{{ $message->email }}</td>
                                        <td style="max-width: 300px; word-wrap: break-word;">{{ Str::limit($message->message, 100) }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="{{ route('admin.contact-message.view', $message->id) }}" class="btn btn-sm btn-info" title="View Details">
                                                    <i class="bx bx-show"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.contact-message.delete', $message->id) }}" onsubmit="return confirm('Are you sure you want to delete this message?')" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $messages->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
