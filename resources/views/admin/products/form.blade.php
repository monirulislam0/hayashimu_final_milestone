<div class="form-body">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name',(isset($product->name)) ? $product->name: '' )}}"
                       placeholder="Enter product name">
                @if(isset($product->id))
                    <input type="hidden" name="id" value="{{ $product->id }}">
                @endif
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <select class="select2 form-control" name="categories[]" multiple="multiple">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        @if(isset($product->id))
                            @php
                                $check = in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : ''
                            @endphp
                        @else
                            @php
                                $check=''
                            @endphp
                        @endif
                        <option value="{{ $category->id }}" {{ $check }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @if(isset($product->id))
                    <input type="hidden" name="id" value="{{ $product->id }}">
                @endif
                @error('categories')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" id="model"
                       class="form-control @error('model') is-invalid @enderror"
                       name="model" value="{{ old('price',(isset($product->model)) ? $product->model: '' )}}"
                       placeholder="Enter product model">
                @if(isset($product->id))
                    <input type="hidden" name="id" value="{{ $product->id }}">
                @endif
                @error('model')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" id="brand"
                       class="form-control @error('brand') is-invalid @enderror"
                       name="brand" value="{{ old('brand',(isset($product->brand)) ? $product->brand: '' )}}"
                       placeholder="Enter product brand name">
                @if(isset($product->id))
                    <input type="hidden" name="id" value="{{ $product->id }}">
                @endif
                @error('brand')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="emi_text">EMI Text</label>
                <input type="text" id="emi_text"
                       class="form-control @error('emi_text') is-invalid @enderror"
                       name="emi_text"
                       value="{{ old('emi_text',(isset($product->emi_text)) ? $product->emi_text: '' )}}"
                       placeholder="Enter product emi text">
                @if(isset($product->id))
                    <input type="hidden" name="id" value="{{ $product->id }}">
                @endif
                @error('emi_text')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <input type="hidden" name="is_attribute" value="1">
                <label>Add Product Attributes</label>
                <div id="attributeInputs">
                    @if(isset($product->product_attribute))
                        @php
                            $product_attr = json_decode($product->product_attribute);
                        @endphp
                        @if($product_attr)
                            @foreach($product_attr as $key=>$attr)
                                <div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="attribute">Attribute:</label>
                                            <input type="text" name="attributes[]" class="form-control"
                                                   value="{{ $key }}" required>
                                        </div>
                                        <div class="col-3">
                                            <label for="value">Value:</label>
                                            <input type="text" name="values[]" value="{{ $attr }}" class="form-control"
                                                   required>
                                        </div>
                                        <div class="col-2">
                                            <button type="button" onclick="removeAttributes(this)"
                                                    class="btn btn-danger" style="margin-top: 24px"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endif
                </div>
                <button type="button" onclick="addAttribute()" class="btn btn-primary">Add Attribute</button>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price"
                       class="form-control @error('price') is-invalid @enderror"
                       name="price" value="{{ old('price',(isset($product->price)) ? $product->price: '' )}}"
                       placeholder="Enter product price">
                @if(isset($product->id))
                    <input type="hidden" name="id" value="{{ $product->id }}">
                @endif
                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="first-name-vertical">Discount</label>
                <input type="text" id="first-name-vertical"
                       class="form-control @error('discount') is-invalid @enderror"
                       name="discount"
                       value="{{ old('discount',(isset($product->discount)) ? $product->discount: '' )}}"
                       placeholder="Enter discount">
                @if(isset($product->id))
                    <input type="hidden" name="id" value="{{ $product->id }}">
                @endif
                @error('discount')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="text" id="stock"
                       class="form-control @error('stock') is-invalid @enderror"
                       name="stock"
                       value="{{ old('stock',(isset($product->stock)) ? $product->stock: '' )}}"
                       placeholder="Enter stock">
                @if(isset($product->id))
                    <input type="hidden" name="id" value="{{ $product->id }}">
                @endif
                @error('stock')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="unit">Unit</label>
                <input type="text" id="unit"
                       class="form-control @error('unit') is-invalid @enderror"
                       name="unit" value="{{ old('unit',(isset($product->unit)) ? $product->unit: '' )}}"
                       placeholder="Enter product unit">
                @if(isset($product->id))
                    <input type="hidden" name="id" value="{{ $product->id }}">
                @endif
                @error('unit')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <fieldset class="form-group">
                <label for="image">Image</label>
                <div class="custom-file">
                    <input type="file" name="image"
                           class="form-control @error('image') is-invalid @enderror" id="image">
                    <label for="image">Choose file</label>
                </div>
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </fieldset>
            @if(isset($product->image))
                <img src="{{ asset('storage/'.$product->image) }}" width="100px">
            @endif
        </div>
        <div class="col-12">
            <fieldset class="form-group">
                <label for="pdf_file">PDF File</label>
                <div class="custom-file">
                    <input type="file" name="pdf_file"
                           class="form-control @error('pdf_file') is-invalid @enderror" id="pdf_file">
                    <label for="image">Choose file</label>
                </div>
                @error('pdf_file')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </fieldset>
            @if(isset($product->pdf_file))
                <iframe src="{{ asset('storage/'.$product->pdf_file) }}" width="100" height="100"
                        style="border:1px solid #666;"></iframe>
            @endif
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="checkbox">
                    <input type="checkbox" class="checkbox-input" id="status"
                           name="status" {{ (isset($product->status) && $product->status) ? 'checked': '' }}>
                    <label for="status">Activation</label>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="checkbox">
                    <input type="checkbox" class="checkbox-input" id="featured" name="featured"
                        {{ (isset($product->featured) && $product->featured) ? 'checked': '' }}
                    >
                    <label for="featured">Is Featured?</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <div class="checkbox">
                    <input type="checkbox" class="checkbox-input" id="new_item" name="new_item"
                        {{ (isset($product->new_item) && $product->new_item) ? 'checked': '' }}
                    >
                    <label for="new_item">Is New Item?</label>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <div class="checkbox">
                    <input type="checkbox" class="checkbox-input" id="in_stock" name="in_stock"
                        {{ (isset($product->in_stock) && $product->in_stock) ? 'checked': '' }}
                    >
                    <label for="in_stock">In Stock?</label>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <div class="checkbox">
                    <input type="checkbox" class="checkbox-input" id="is_show_top_sidebar" name="is_show_top_sidebar"
                        {{ (isset($product->is_show_top_sidebar) && $product->is_show_top_sidebar) ? 'checked': '' }}
                    >
                    <label for="is_show_top_sidebar">Is Show Top Sidebar?</label>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
            <a type="reset" href="{{ route('admin.products.index') }}"
               class="btn btn-light-secondary mr-1 mb-1">Reset</a>
        </div>
    </div>
</div>
