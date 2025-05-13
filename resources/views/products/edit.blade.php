@extends('layouts.tabler')
@section('title' , 'Edit Product')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center mb-3">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Edit Product') }}
                    </h2>
                </div>
            </div>

            @include('partials._breadcrumbs', ['model' => $product])
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">

                <form action="{{ route('products.update', $product->uuid) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">
                                        {{ __('Product Image') }}
                                    </h3>

                                    <img class="img-account-profile mb-2"
                                        src="{{ $product->product_image ? asset('storage/'.$product->product_image) : asset('assets/img/products/default.webp') }}"
                                        alt="" id="image-preview">




                                    <div class="small font-italic text-muted mb-2">
                                        JPG or PNG no larger than 2 MB
                                    </div>

                                    <input type="file" accept="image/*" id="image" name="product_image"
                                        class="form-control @error('product_image') is-invalid @enderror"
                                        onchange="previewImage();">

                                    @error('product_image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">
                                        {{ __('Product Details') }}
                                    </h3>

                                    <div class="row row-cards">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">
                                                    {{ __('Name') }}
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <input type="text" id="name" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Product name" value="{{ old('name', $product->name) }}">

                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="category_id" class="form-label">
                                                   {{ __('Product category') }}
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <select name="category_id" id="category_id"
                                                    class="form-select @error('category_id') is-invalid @enderror">
                                                    <span class="text-danger">*</span>
                                                    <option selected="" disabled="">{{ __('Select a category') }}:</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            @if (old('category_id', $product->category_id) == $category->id) selected="selected" @endif>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('category_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="supplier_id" class="form-label">
                                                    {{ __('Product supplier') }}
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <select name="supplier_id" id="supplier_id"
                                                    class="form-select @error('supplier_id') is-invalid @enderror">
                                                    <option selected="" disabled="">{{ __('Select a supplier') }}:</option>
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}"
                                                            @if (old('supplier_id', $product->supplier_id) == $supplier->id) selected="selected" @endif>
                                                            {{ $supplier->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('supplier_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="unit_id">
                                                    {{ __('Unit') }}
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <select name="unit_id" id="unit_id"
                                                    class="form-select @error('unit_id') is-invalid @enderror">
                                                    <option selected="" disabled="">
                                                        {{ __('Select a unit') }}:
                                                    </option>

                                                    @foreach ($units as $unit)
                                                        <option value="{{ $unit->id }}"
                                                            @if (old('unit_id', $product->unit_id) == $unit->id) selected="selected" @endif>
                                                            {{ $unit->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('unit_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="buying_price">
                                                    {{ __('Buying Price') }}
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <input type="text" id="buying_price" name="buying_price"
                                                    class="form-control @error('buying_price') is-invalid @enderror"
                                                    placeholder="0"
                                                    value="{{ old('buying_price', $product->buying_price) }}">

                                                @error('buying_price')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="selling_price" class="form-label">
                                                    {{ __('Selling Price') }}
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <input type="text" id="selling_price" name="selling_price"
                                                    class="form-control @error('selling_price') is-invalid @enderror"
                                                    placeholder="0"
                                                    value="{{ old('selling_price', $product->selling_price) }}">

                                                @error('selling_price')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
<!-- Update this part of your HTML to include a template -->
<div class="col-sm-6 col-md-6">
    <div class="mb-3">
        <label class="form-label">{{ __('Quantity') }}</label>
        <input class="form-control" name="quantity" type="text" readonly value="{{ old('quantity', $product->quantity) }}" style="color: var(--tblr-secondary); background-color: var(--tblr-bg-surface-secondary); opacity: 1;">
    </div>
</div>
<div class="col-sm-6 col-md-6">
    <div class="mb-3">
        <label class="form-label">{{ __('Locations') }}</label>
        <div id="locationFields">
            @foreach($product->productLocations as $index => $location)
                <div class="row mb-2 align-items-end location-row">
                    <div class="col-md-6">
                        <select name="location_ids[]" class="form-select" required>
                            @foreach(\App\Models\Location::where('account_id', auth()->user()->account_id)->get() as $loc)
                                <option value="{{ $loc->id }}" {{ $location->location_id == $loc->id ? 'selected' : '' }}>{{ $loc->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <input type="number" name="quantities[]" value="{{ $location->quantity }}" class="form-control" min="0" required>
                    </div>
                    <div class="col-md-1" @if($index == 0) style="display: none;" @endif>
                        <button type="button" class="btn btn-danger btn-sm remove-location">-</button>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Template for new rows (hidden) -->
        <template id="location-row-template">
            <div class="row mb-2 align-items-end location-row">
                <div class="col-md-6">
                    <select name="location_ids[]" class="form-select" required>
                        @foreach(\App\Models\Location::where('account_id', auth()->user()->account_id)->get() as $loc)
                            <option value="{{ $loc->id }}">{{ $loc->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <input type="number" name="quantities[]" value="" class="form-control" min="0" required>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger btn-sm remove-location">-</button>
                </div>
            </div>
        </template>
        
        <button type="button" class="btn btn-secondary mt-2" id="addLocation">Add Location</button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle Add Location button click
    document.getElementById('addLocation').addEventListener('click', function() {
        // Get the template content
        const template = document.getElementById('location-row-template');
        if (!template) {
            console.error('Template not found');
            return;
        }
        
        // Create a new row from the template
        const newRow = template.content.cloneNode(true);
        
        // Add event listener to the remove button
        const removeBtn = newRow.querySelector('.remove-location');
        if (removeBtn) {
            removeBtn.addEventListener('click', function() {
                this.closest('.location-row').remove();
            });
        }
        
        // Add the new row to the locations container
        document.getElementById('locationFields').appendChild(newRow);
    });
    
    // Set up event listeners for existing remove buttons
    document.querySelectorAll('.remove-location').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.location-row').remove();
        });
    });
});
</script>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="quantity_alert" class="form-label">
                                                    {{ __('Quantity Alert') }}
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <input type="number" id="quantity_alert" name="quantity_alert"
                                                    class="form-control @error('quantity_alert') is-invalid @enderror"
                                                    min="0" placeholder="0"
                                                    value="{{ old('quantity_alert', $product->quantity_alert) }}">

                                                @error('quantity_alert')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="tax" class="form-label">
                                                    {{ __('Tax') }}
                                                </label>

                                                <input type="number" id="tax" name="tax"
                                                    class="form-control @error('tax') is-invalid @enderror"
                                                    min="0" placeholder="0"
                                                    value="{{ old('tax', $product->tax) }}">

                                                @error('tax')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="tax_type">
                                                    {{ __('Tax Type') }}
                                                </label>

                                                <select name="tax_type" id="tax_type"
                                                    class="form-select @error('tax_type') is-invalid @enderror">
                                                    @foreach (\App\Enums\TaxType::cases() as $taxType)
                                                        <option value="{{ $taxType->value }}"
                                                            @selected(old('tax_type', $product->tax_type) == $taxType->value)>
                                                            {{ $taxType->label() }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                @error('tax_type')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--expr-->
                                      <div class="col-sm-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="expire_date_toggle">
                                                    {{ __('Enable Expiration Date') }}
                                                </label>
                                                <input type="checkbox" name="expire_date_toggle" id="expire_date_toggle" class="form-check-input">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6" id="expire_date_field" style="display: none;">
                                            <x-input type="date"
                                                    label="Expire Date"
                                                    name="expire_date"
                                                    id="expire_date"
                                                    value="{{ old('expire_date') }}"
                                            />
                                        </div>

                                        <script>
                                            document.getElementById('expire_date_toggle').addEventListener('change', function() {
                                                var expireDateField = document.getElementById('expire_date_field');
                                                if (this.checked) {
                                                    expireDateField.style.display = 'block';
                                                } else {
                                                    expireDateField.style.display = 'none';
                                                }
                                            });
                                        </script>

                                        <div class="col-md-12">
                                            <div class="mb-3 mb-0">
                                                <label for="notes" class="form-label">
                                                    {{ __('Notes') }}
                                                </label>

                                                <textarea name="notes" id="notes" rows="5" class="form-control @error('notes') is-invalid @enderror"
                                                    placeholder="Product notes">{{ old('notes', $product->notes) }}</textarea>

                                                @error('notes')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>`
                                    </div>
                                </div>

                                <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit" >
                                        {{ __('Update') }}
                                    </button>

                                    <a class="btn btn-danger" href="{{ route('products.index') }}">
                                        {{ __('Cancel') }}
                                    </a>
                                </div>
                            </div>
                        </div>



                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@pushonce('page-scripts')
    <script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endpushonce
