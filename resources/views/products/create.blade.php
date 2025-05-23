@extends('layouts.tabler')
@section('title' , 'Create Product')


@section('content')
<div class="page-body">
    <div class="container-xl">
        <x-alert/>

        <div class="row row-cards">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{ __('Product Image') }}
                                </h3>

                                <img class="img-account-profile mb-2" src="{{ asset('assets/img/products/default.webp') }}" alt="" id="image-preview" />

                                <div class="small font-italic text-muted mb-2">
                                    JPG or PNG no larger than 2 MB
                                </div>

                                <input
                                    type="file"
                                    accept="image/*"
                                    id="image"
                                    name="product_image"
                                    class="form-control @error('product_image') is-invalid @enderror"
                                    onchange="previewImage();"
                                >

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
                            <div class="card-header">
                                <div>
                                    <h3 class="card-title">
                                        {{ __('Product Create') }}
                                    </h3>
                                </div>

                                <div class="card-actions">
                                    <a href="{{ route('products.index') }}" class="btn-action">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M18 6l-12 12"></path><path d="M6 6l12 12"></path></svg>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row row-cards">
                                    <div class="col-md-12">

                                        <x-input name="name"
                                                 id="name"
                                                 placeholder="Product name"
                                                 value="{{ old('name') }}"
                                        />
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">
                                                Product category
                                                <span class="text-danger">*</span>
                                            </label>

                                            @if ($categories->count() === 1)
                                                <select name="category_id" id="category_id"
                                                        class="form-select @error('category_id') is-invalid @enderror"
                                                        readonly
                                                >
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" selected>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select name="category_id" id="category_id"
                                                        class="form-select @error('category_id') is-invalid @enderror"
                                                >
                                                    <option selected="" disabled="">
                                                        Select a category:
                                                    </option>

                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected="selected" @endif>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif

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
                                                Product supplier
                                                <span class="text-danger">*</span>
                                            </label>

                                            @if ($suppliers->count() === 1)
                                                <select name="supplier_id" id="supplier_id"
                                                        class="form-select @error('supplier_id') is-invalid @enderror"
                                                        readonly
                                                >
                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}" selected>
                                                            {{ $supplier->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select name="supplier_id" id="supplier_id"
                                                        class="form-select @error('supplier_id') is-invalid @enderror">
                                                    <option selected="" disabled="">
                                                        Select a Supllier:
                                                    </option>

                                                    @foreach ($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}" @if(old('supplier_id') == $supplier->id) selected="selected" @endif>
                                                            {{ $supplier->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif

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
                                                    Unit
                                                    <span class="text-danger">*</span>
                                                </label>

                                                @if ($units->count() === 1)
                                                    <select name="unit_id" id="unit_id"  
                                                            class="form-select @error('unit_id') is-invalid @enderror"
                                                            readonly
                                                    >
                                                        @foreach ($units as $unit)
                                                            <option value="{{ $unit->id }}" selected>
                                                                {{ $unit->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <select name="unit_id" id="unit_id"
                                                            class="form-select @error('unit_id') is-invalid @enderror"
                                                    >
                                                        <option selected="" disabled="">
                                                            Select a Unit:
                                                        </option>

                                                        @foreach ($units as $unit)
                                                            <option value="{{ $unit->id }}" @if(old('unit_id') == $unit->id) selected="selected" @endif>{{ $unit->name }}</option>
                                                        @endforeach
                                                    </select>
                                                @endif

                                                @error('unit_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>


                                    <div class="col-sm-6 col-md-6">
                                        <x-input type="number"
                                                 label="Buying Price"
                                                 name="buying_price"
                                                 id="buying_price"
                                                 placeholder="0"
                                                 value="{{ old('buying_price') }}"
                                        />
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input type="number"
                                                 label="Selling Price"
                                                 name="selling_price"
                                                 id="selling_price"
                                                 placeholder="0"
                                                 value="{{ old('selling_price') }}"
                                        />
                                    </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Locations') }}</label>
                                    <div id="locationFields">
                                        <div class="row mb-2 align-items-end">
                                            <div class="col-md-6">
                                                <select name="location_ids[]" class="form-select" required>
                                                    @foreach(\App\Models\Location::where('account_id', auth()->user()->account_id)->get() as $location)
                                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="number" name="quantities[]" class="form-control" min="0" required>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-danger btn-sm remove-location">-</button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-2" id="addLocation">Add Location</button>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Total Quantity') }}</label>
                                    <input type="text" name="total_quantity" class="form-control" value="{{ old('total_quantity', 0) }}" readonly>
                                </div>
                            </div>

                            <script>
                               document.addEventListener('DOMContentLoaded', function() {
    // Handle Add Location button click
    document.getElementById('addLocation').addEventListener('click', function() {
        const locationFields = document.getElementById('locationFields');
        const newField = locationFields.children[0].cloneNode(true);
        
        // Clear the quantity input
        newField.querySelector('input[name="quantities[]"]').value = '';
        
        // Show the remove button for cloned fields
        newField.querySelector('.col-md-1').style.display = 'block';
        
        // Add event listener to the remove button
        newField.querySelector('.remove-location').addEventListener('click', function() {
            this.closest('.row').remove();
            updateTotalQuantity();
        });
        
        // Add event listener to quantity input
        newField.querySelector('input[name="quantities[]"]').addEventListener('input', updateTotalQuantity);
        
        locationFields.appendChild(newField);
    });

    // Set up event listeners for existing remove buttons and quantity inputs
    document.querySelectorAll('.remove-location').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.row').remove();
            updateTotalQuantity();
        });
    });

    document.querySelectorAll('input[name="quantities[]"]').forEach(input => {
        input.addEventListener('input', updateTotalQuantity);
    });

    // Function to update total quantity
    function updateTotalQuantity() {
        let total = 0;
        document.querySelectorAll('input[name="quantities[]"]').forEach(input => {
            const value = parseInt(input.value) || 0;
            total += value;
        });
        document.querySelector('input[name="total_quantity"]').value = total;
    }
});
                            </script>
                                    <div class="col-sm-6 col-md-6">
                                        <x-input type="number"
                                                 label="Code"
                                                 name="code"
                                                 id="code"
                                                 placeholder="Enter unique product code"
                                                 value="{{ old('code') }}"
                                        />
                                    </div>


                                    <div class="col-sm-6 col-md-6">
                                        <x-input type="number"
                                                 label="Quantity Alert"
                                                 name="quantity_alert"
                                                 id="quantity_alert"
                                                 placeholder="0"
                                                 value="{{ old('quantity_alert') }}"
                                        />
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input type="number"
                                                 label="Tax"
                                                 name="tax"
                                                 id="tax"
                                                 placeholder="0"
                                                 value="{{ old('tax') }}"
                                        />
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="tax_type">
                                                {{ __('Tax Type') }}
                                            </label>

                                            <select name="tax_type" id="tax_type"
                                                    class="form-select @error('tax_type') is-invalid @enderror"
                                            >
                                                @foreach(\App\Enums\TaxType::cases() as $taxType)
                                                <option value="{{ $taxType->value }}" @selected(old('tax_type') == $taxType->value)>
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
                                        <div class="mb-3">
                                            <label for="notes" class="form-label">
                                                {{ __('Notes') }}
                                            </label>

                                            <textarea name="notes"
                                                      id="notes"
                                                      rows="5"
                                                      class="form-control @error('notes') is-invalid @enderror"
                                                      placeholder="Product notes"
                                            ></textarea>

                                            @error('notes')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-end">
                                <x-button.save type="submit">
                                    {{ __('Save') }}
                                </x-button.save>

                                <a class="btn btn-warning" href="{{ url()->previous() }}">
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
