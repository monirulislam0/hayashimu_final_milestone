@section('title')
    {{ config('app.name') }} | Create FAQ
@endsection
<x-admin-layout>
    <section id="basic-vertical-layouts">
        <div class="row match-height justify-content-center">
            <div class="col-md-10 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create FAQ</h4>
                    </div>
                    @include('admin.includes.flash')
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('admin.faqs.store') }}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="question">Question</label>
                                                <textarea class="form-control" id="question" name="question" rows="3" placeholder="Enter FAQ question" required>{{ old('question') }}</textarea>
                                                @error('question')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="answer">Answer</label>
                                                <textarea class="form-control" id="answer" name="answer" rows="5" placeholder="Enter FAQ answer" required>{{ old('answer') }}</textarea>
                                                @error('answer')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Create FAQ</button>
                                            <a href="{{ route('admin.faqs.index') }}" class="btn btn-light-secondary mr-1 mb-1">Cancel</a>
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
