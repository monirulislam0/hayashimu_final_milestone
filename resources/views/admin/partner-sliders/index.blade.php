@section('title')
    {{ config('app.name') }} | Partner Sliders
@endsection
<x-admin-layout>
    <div class="row justify-content-center" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="card-title">List Of Partner Sliders</h4>
                        <div class="offset-md-8">
                            <a href="{{ route('admin.partner-sliders.create') }}" class="btn btn-success round">Create New Partner Slider</a>
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
                                    <th>Logo</th>
                                    <th>Title</th>
                                    <th>Link</th>
                                    <th>Link Label</th>
                                    <th>Status</th>
                                    <th>Sorting</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $sl=0 @endphp
                                @foreach($partnerSliders as $partnerSlider)
                                    <tr>
                                        <td class="text-bold-500">{{ ++$sl }}</td>
                                        <td>
                                            @if($partnerSlider->logo)
                                                <img src="{{ asset('storage/' . $partnerSlider->logo) }}" alt="{{ $partnerSlider->title }}" height="60px">
                                            @else
                                                <span class="text-muted">No Logo</span>
                                            @endif
                                        </td>
                                        <td>{{ $partnerSlider->title }}</td>
                                        <td>
                                            <a href="{{ $partnerSlider->link }}" target="_blank" class="text-decoration-none">
                                                {{ Str::limit($partnerSlider->link, 30) }}
                                            </a>
                                        </td>
                                        <td>{{ $partnerSlider->link_label }}</td>
                                        <td>
                                            <span class="badge {{ $partnerSlider->status ? 'bg-success' : 'bg-danger' }}">
                                                {{ $partnerSlider->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>{{ $partnerSlider->sorting }}</td>
                                        <td>
                                            <a href="{{ route('admin.partner-sliders.edit', $partnerSlider->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                                <i class="bx bx-edit"></i> Edit
                                            </a>
                                            <a href="{{ route('admin.partner-sliders.delete', $partnerSlider->id) }}"
                                               class="btn btn-sm btn-outline-danger"
                                               onclick="return confirm('Are you sure you want to delete this partner slider?')">
                                                <i class="bx bx-trash"></i> Delete
                                            </a>
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
