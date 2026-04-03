<div class="container inquire-section mt-4 bg-white p-3">
        <div class="row">
        <div class="col">
            <div class="table-responsive">
                <h2>Inquiry</h2>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Product Picture</th>
                        <th scope="col">Product Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($products as $product)
                            <td class="text-center"><a href="#"><img
                                        src="{{ asset('storage/'.$product['image']) }}" alt="{{ $product['name'] }}"
                                        class="img-fluid" style="max-width: 100px;"></a></td>
                            <td>{{ $product['name'] }}</td>
                        @endforeach
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <div class="my-4 px-3 ">
            <form wire:submit.prevent="submitInquire">
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="*Name" wire:model.lazy="name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="email" class="form-control" wire:model.lazy="email" placeholder="*Email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" wire:model.lazy="company_name" placeholder="*Company Name">
                            @error('company_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <input type="tel" class="form-control" placeholder="*Tel" wire:model.lazy="tel">
                            @error('tel')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" placeholder="*Message" rows="4" wire:model.lazy="message"></textarea>
                    @error('message')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success btn-block" style="width: 100%;">SUBMIT</button>
            </form>

        </div>
    </div>

