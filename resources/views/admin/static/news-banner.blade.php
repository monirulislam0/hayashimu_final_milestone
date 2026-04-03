@section('title')
    {{ config('app.name') }} | Sidebar Image
@endsection
<x-admin-layout>
    <section id="basic-vertical-layouts">
        <div class="row match-height justify-content-center">
            <div class="col-md-10 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    @include('admin.includes.flash')
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('admin.static.news-banner.update') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <fieldset class="form-group">
                                                <label for="basicInputFile">Image</label>
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                                                </div>
                                                @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            @if(isset($data->image))
                                                <img src="{{ asset('storage/'.$data->image) }}" width="100px">
                                            @endif
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
