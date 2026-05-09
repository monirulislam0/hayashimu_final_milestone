<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" id="title" name="title" 
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', (isset($partnerSlider)) ? $partnerSlider->title : '') }}" 
                   placeholder="Enter partner slider title">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <label for="link" class="form-label">Link <span class="text-danger">*</span></label>
            <input type="url" id="link" name="link" 
                   class="form-control @error('link') is-invalid @enderror"
                   value="{{ old('link', (isset($partnerSlider)) ? $partnerSlider->link : '') }}" 
                   placeholder="Enter partner website link">
            @error('link')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="link_label" class="form-label">Link Label</label>
            <input type="text" id="link_label" name="link_label" 
                   class="form-control @error('link_label') is-invalid @enderror"
                   value="{{ old('link_label', (isset($partnerSlider)) ? $partnerSlider->link_label : 'Visit') }}" 
                   placeholder="Enter link label (default: Visit)">
            @error('link_label')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <label for="sorting" class="form-label">Sorting Order</label>
            <input type="number" id="sorting" name="sorting" 
                   class="form-control @error('sorting') is-invalid @enderror"
                   value="{{ old('sorting', (isset($partnerSlider)) ? $partnerSlider->sorting : 0) }}" 
                   placeholder="Enter sorting order (0 = first)">
            @error('sorting')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="logo" class="form-label">Logo <span class="text-danger">*</span></label>
            <input type="file" id="logo" name="logo" 
                   class="form-control @error('logo') is-invalid @enderror"
                   accept="image/*">
            @error('logo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <small class="text-muted">Allowed formats: JPG, JPEG, PNG, WEBP (Max 2MB)</small>
            
            @if(isset($partnerSlider) && $partnerSlider->logo)
                <div class="mt-2">
                    <label class="form-label">Current Logo:</label><br>
                    <img src="{{ asset('storage/' . $partnerSlider->logo) }}" 
                         alt="{{ $partnerSlider->title }}" 
                         class="img-thumbnail" 
                         style="max-height: 100px;">
                </div>
            @endif
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Status</label>
            <div class="mt-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="status" name="status" value="1"
                           {{ (isset($partnerSlider) && $partnerSlider->status) ? 'checked' : '' }}>
                    <label class="form-check-label" for="status">
                        Active
                    </label>
                </div>
                <input type="hidden" name="status" value="0">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                {{ isset($partnerSlider) ? 'Update Partner Slider' : 'Create Partner Slider' }}
            </button>
            <a href="{{ route('admin.partner-sliders.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</div>
