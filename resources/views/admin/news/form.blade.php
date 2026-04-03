<div class="form-body">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="type">News Type</label>
                <select class="form-control @error('news_type') is-invalid @enderror" id="news_type" name="news_type">
                    <option value="{{ \App\Enums\NewsTypeEnum::NEW_PRODUCTS->value }}" {{ old('news_type',(isset($news->news_type) && $news->news_type==\App\Enums\NewsTypeEnum::NEW_PRODUCTS->value) ? 'selected': '') }}>New Products</option>
                    <option value="{{ \App\Enums\NewsTypeEnum::INDUSTRY_NEWS->value }}" {{ old('news_type',(isset($news->news_type) && $news->news_type==\App\Enums\NewsTypeEnum::INDUSTRY_NEWS->value) ? 'selected': '') }}>Industry News</option>
                    <option value="{{ \App\Enums\NewsTypeEnum::NEW_PRODUCTS->value }}" {{ old('news_type',(isset($news->news_type) && $news->news_type==\App\Enums\NewsTypeEnum::EXHIBITION_NEWS->value) ? 'selected': '') }}>Exhibition News</option>
                    <option value="{{ \App\Enums\NewsTypeEnum::COMPANY_NEWS->value }}" {{ old('news_type',(isset($news->news_type) && $news->news_type==\App\Enums\NewsTypeEnum::COMPANY_NEWS->value) ? 'selected': '') }}>Company News</option>
                    <option value="{{ \App\Enums\NewsTypeEnum::CERTIFICATION->value }}" {{ old('news_type',(isset($news->news_type) && $news->news_type==\App\Enums\NewsTypeEnum::CERTIFICATION->value) ? 'selected': '') }}>Certification</option>
                </select>
                @if(isset($news->id))
                    <input type="hidden" name="id" value="{{ $news->id }}">
                @endif
                @error('news_type')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="first-name-vertical">Title</label>
                <input type="text" id="first-title-vertical"
                       class="form-control @error('title') is-invalid @enderror"
                       name="title"  value="{{ old('title',(isset($news->title)) ? $news->title: '' )}}" placeholder="Enter news title">
                @if(isset($news->id))
                    <input type="hidden" name="id" value="{{ $news->id }}">
                @endif
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="first-author-vertical">Author Name</label>
                <input type="text" id="first-author-vertical"
                       class="form-control @error('author') is-invalid @enderror"
                       name="author"  value="{{ old('author',(isset($news->author)) ? $news->author: '' )}}" placeholder="Enter author">
                @if(isset($news->id))
                    <input type="hidden" name="id" value="{{ $news->id }}">
                @endif
                @error('author')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="origin">Origin</label>
                <input type="text" id="origin"
                       class="form-control @error('origin') is-invalid @enderror"
                       name="origin"  value="{{ old('origin',(isset($news->origin)) ? $news->origin: '' )}}" placeholder="Enter origin">
                @if(isset($news->id))
                    <input type="hidden" name="id" value="{{ $news->id }}">
                @endif
                @error('origin')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="published_date">Published Date</label>
                <input type="text" id="published_date"
                       class="form-control @error('published_date') is-invalid @enderror"
                       name="published_date"  value="{{ old('published_date',(isset($news->published_date)) ? $news->published_date: '' )}}" placeholder="Enter published date">
                @if(isset($news->id))
                    <input type="hidden" name="id" value="{{ $news->id }}">
                @endif
                @error('published_date')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="sorting">Sorting</label>
                <input type="text" id="sorting"
                       class="form-control @error('sorting') is-invalid @enderror"
                       name="sorting"  value="{{ old('sorting',(isset($news->sorting)) ? $news->sorting: '' )}}" placeholder="Enter news sort">
                @if(isset($news->id))
                    <input type="hidden" name="id" value="{{ $news->id }}">
                @endif
                @error('sorting')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <fieldset class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </fieldset>
            @if(isset($news->image))
                <img src="{{ asset('storage/'.$news->image) }}" width="100px">
            @endif
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="short_desc">Short</label>
                <textarea class="form-control @error('short') is-invalid @enderror" name="short" id="short_desc">
                    {{ old('short',(isset($news->short)) ? $news->short: '' )}}
                </textarea>
                @if(isset($news->id))
                    <input type="hidden" name="id" value="{{ $news->id }}">
                @endif
                @error('short')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control @error('detail') is-invalid @enderror" name="detail" id="description">
                    {{ old('detail',(isset($news->detail)) ? $news->detail: '' )}}
                </textarea>
                @if(isset($news->id))
                    <input type="hidden" name="id" value="{{ $news->id }}">
                @endif
                @error('detail')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="checkbox">
                    <input type="checkbox" class="checkbox-input" id="status"
                           name="status" {{ (isset($news->status) && $news->status) ? 'checked': '' }}>
                    <label for="status">Activation</label>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
            <a type="reset" href="{{ route('admin.news.index') }}" class="btn btn-light-secondary mr-1 mb-1">Reset</a>
        </div>
    </div>
</div>
