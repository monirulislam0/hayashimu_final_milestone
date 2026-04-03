<div class="form-body">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title"
                       class="form-control @error('title') is-invalid @enderror"
                       name="title"  value="{{ old('title',(isset($service->title)) ? $service->title: '' )}}" placeholder="Enter service document name">
                @if(isset($service->id))
                    <input type="hidden" name="id" value="{{ $service->id }}">
                @endif
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <fieldset class="form-group">
                <label for="file_name">File Name</label>
                <input type="file" name="file_name" class="form-control @error('file_name') is-invalid @enderror" id="file_name">
                @error('file_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </fieldset>
            @if(isset($service->file_name))
                <iframe src="{{ asset('storage/'.$service->file_name) }}" width="600" height="400"></iframe>
            @endif
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="checkbox">
                    <input type="checkbox" class="checkbox-input" id="status"
                           name="status" {{ (isset($service->status) && $service->status) ? 'checked': '' }}>
                    <label for="status">Activation</label>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
            <a type="reset" href="{{ route('admin.services.index') }}" class="btn btn-light-secondary mr-1 mb-1">Reset</a>
        </div>
    </div>
</div>
