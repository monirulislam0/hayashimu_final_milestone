@section('title')
    {{ config('app.name') }} | Why I Choose
@endsection
<x-admin-layout>
    <section id="basic-vertical-layouts">
        <div class="row match-height justify-content-center">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ 'Why I Choose?' }}</h4>
                    </div>
                    @include('admin.includes.flash')
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab-content">
                                            <form class="form form-vertical" action="{{ route('admin.static.why-i-choose.update') }}"  method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInputFile">Background Image</label>
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
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Add line</label>
                                                        <div id="contents">
                                                            @if(isset($data->content) && $data->content!=null)
                                                                @php
                                                                    $contents = json_decode($data->content);
                                                                @endphp
                                                            @if(!empty($contents))
                                                                @foreach($contents as $content)
                                                                    <div>
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <label for="icon">Icon:</label>
                                                                                <input type="file" name="icon[]" class="form-control" value="">
                                                                                <input type="hidden" name="icon_url[]"  value="{{ $content->icon }}">
                                                                                <img src="{{ asset('storage/'.$content->icon) }}" height="100px" style="background: #0b0f13">
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <label for="title">Title:</label>
                                                                                <input type="text" name="title[]" value="{{ $content->title }}" class="form-control" required>
                                                                            </div>
                                                                            <div class="col-1">
                                                                                <button type="button" onclick="removeContent(this)" class="btn btn-danger" style="margin-top: 24px"><i class="fa fa-trash"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                            @endif
                                                        </div>
                                                        <button type="button" onclick="addContent()" class="btn btn-primary">Add Line</button>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <fieldset class="form-group">
                                                        <label for="video">Video </label>
                                                        <div class="custom-file">
                                                            <input type="file" name="video" class="form-control @error('video') is-invalid @enderror" id="video">
                                                        </div>
                                                        @error('video')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </fieldset>
                                                    @if(isset($data->extra))
                                                        <video width="540" height="310" controls>
                                                            <source src="{{ asset('storage/'.$data->extra) }}" type="video/mp4">
                                                        </video>
                                                    @endif
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
