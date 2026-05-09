@section('title')
    {{ config('app.name') }} | Edit Partner Slider
@endsection
<x-admin-layout>
    <div class="row justify-content-center" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Partner Slider</h4>
                </div>
                @include('admin.includes.flash')
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('admin.partner-sliders.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $partnerSlider->id }}">
                            @include('admin.partner-sliders.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
