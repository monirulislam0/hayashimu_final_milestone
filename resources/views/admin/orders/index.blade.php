@section('title')
    {{ config('app.name') }} | Products
@endsection
<x-admin-layout>
    <div class="row justify-content-center" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="card-title">List Of All Orders</h4>
                    </div>
                </div>
                @include('admin.includes.flash')
                <div class="card-content">
                    <div class="card-body">
                        <livewire:order.order-list />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
