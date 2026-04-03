@section('title')
    {{ config('app.name') }} | Categories
@endsection
<x-admin-layout>
    <section id="basic-vertical-layouts">
        <div class="row match-height justify-content-center">
            <div class="col-md-10 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ 'Create Category' }}</h4>
                    </div>
                    @include('admin.includes.flash')
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('admin.categories.update') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                @include('admin.categories.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin-layout>
