@section('title')
    {{ config('app.name') }} | Contact Message
@endsection
<x-admin-layout>
    <div class="row justify-content-center" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h4 class="card-title">List of all Message</h4>
                    </div>
                </div>
                @include('admin.includes.flash')
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Company</th>
                                    <th>Message</th>
                                    <th>Product</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $sl=0 @endphp
                                @foreach($messages as $message)
                                    <tr>
                                        <td class="text-bold-500">{{ ++$sl }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->mobile }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->country_name }}</td>
                                        <td>{{ $message->company_name }}</td>
                                        <td>{{ $message->message }}</td>
                                        <td>
                                            @php $sl=0 @endphp
                                            @foreach($message->products as $product)
                                              {{ ++$sl .':'.$product->name }}
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $messages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
