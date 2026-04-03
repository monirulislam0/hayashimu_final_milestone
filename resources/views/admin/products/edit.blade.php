@section('title')
    {{ config('app.name') }} | Products
@endsection
<x-admin-layout>
    <section id="basic-vertical-layouts">
        <div class="row match-height justify-content-center">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ 'Edit Products' }}</h4>
                    </div>
                    @include('admin.includes.flash')
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-3">
                                <div class="tile p-0">
                                    <ul class="nav flex-column nav-tabs user-tabs">
                                        <li class="nav-item"><a class="nav-link {{ (session()->get('active_tab')=='general')? 'active' : '' }}" href="#general" data-toggle="tab">General</a></li>
                                        <li class="nav-item"><a class="nav-link {{ (session()->get('active_tab')=='images')? 'active' : '' }}" href="#images" data-toggle="tab">Images</a></li>
                                        <li class="nav-item"><a class="nav-link {{ (session()->get('active_tab')=='description')? 'active' : '' }}" href="#description_tab" data-toggle="tab">Description</a></li>
                                        <li class="nav-item"><a class="nav-link {{ (session()->get('active_tab')=='meta')? 'active' : '' }}" href="#meta_tab" data-toggle="tab">Meta Description</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                            <div class="tab-content">
                                <div class="tab-pane {{ (session()->get('active_tab')=='general')? 'active' : '' }}" id="general">
                                    <form class="form form-vertical" action="{{ route('admin.products.update') }}"  method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @include('admin.products.form')
                                    </form>
                                </div>
                                <div class="tab-pane {{ (session()->get('active_tab')=='images')? 'active' : '' }}" id="images">
                                    <h2>Images</h2>
                                    @include('admin.products.includes.image')
                                </div>
                                <div class="tab-pane {{ (session()->get('active_tab')=='description')? 'active' : '' }}" id="description_tab">
                                    <h2>Description</h2>
                                    @include('admin.products.includes.description')
                                </div>
                                <div class="tab-pane {{ (session()->get('active_tab')=='meta')? 'active' : '' }}" id="meta_tab">
                                    <h2>Meta Description</h2>
                                    @include('admin.products.includes.meta')
                                </div>
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
