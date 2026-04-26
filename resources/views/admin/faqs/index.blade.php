@section('title')
    {{ config('app.name') }} | FAQs
@endsection
<x-admin-layout>
    <div class="row justify-content-center" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="card-title">List Of FAQs</h4>
                        <div class="offset-md-8">
                            <a href="{{ route('admin.faqs.create') }}" class="btn btn-success round">Create New FAQ</a>
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
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $sl=0 @endphp
                                @foreach($faqs as $faq)
                                    <tr>
                                        <td class="text-bold-500">{{ ++$sl }}</td>
                                        <td>{{ Str::limit($faq->question, 50) }}</td>
                                        <td>{{ Str::limit($faq->answer, 100) }}</td>
                                        <td>{{ $faq->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.faqs.edit', $faq) }}"><i
                                                    class="badge-circle badge-circle-light-secondary bx bx-edit font-medium-1"></i></a>
                                            <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link p-0" onclick="return confirm('Are you sure you want to delete this FAQ?')">
                                                    <i class="badge-circle badge-circle-light-secondary bx bx-trash font-medium-1"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $faqs->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
