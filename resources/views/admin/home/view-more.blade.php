@section('title')
    {{ config('app.name') }} | Why I Choose
@endsection
<x-admin-layout>
    <section id="basic-vertical-layouts">
        <div class="row match-height justify-content-center">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    @include('admin.includes.flash')
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab-content">
                                        <form class="form form-vertical" action="{{ route('admin.static.view-more.update') }}"  method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="description">Content</label>
                                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="description">
                                                    {{ old('content',(isset($data->content)) ? $data->content: '' )}}
                                                    </textarea>
                                                    @error('content')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
