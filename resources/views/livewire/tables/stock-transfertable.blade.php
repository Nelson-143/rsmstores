<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">{{ __('Stock Transfer') }}</h4>
        <div class="btn-group">
            <div class="dropdown">
                <a href="#" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <x-icon.vertical-dots />
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{ route('stock.damaged') }}" class="dropdown-item">
                        <x-icon.plus /> {{ __('Create Damage Product') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stock Transfer Form -->
    <form method="POST" action="{{ route('stock.transfer') }}" class="card-body mb-0">
        @csrf
        <div class="row g-3">
            <div class="col-md-3">
                <label for="product_id" class="form-label">{{ __('Product') }}</label>
    <select name="product_id" class="form-select" required>
 

    @if (isset($products) && $products->isNotEmpty())
        @foreach ($products as $product)
            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                {{ $product->name }}
            </option>
        @endforeach
    @else
        <option value="" disabled selected>{{ __('No products available') }}</option>
    @endif
</select>

<!--
Other places to debug for related error:
1. Check if the $products variable is being passed to the view from the controller.
2. Verify if the $products variable is a collection of products and not empty.
3. Ensure that the product model has the 'id' and 'name' attributes.
4. Check the database to see if there are any products available.
5. Verify if there are any errors in the product model or the database query that retrieves the products.
-->
            </div>
            <div class="col-md-3">
                <label for="from_location" class="form-label">{{ __('From Location') }}</label>
                <input type="text" name="from_location" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="to_location" class="form-label">{{ __('To Location') }}</label>
                <input type="text" name="to_location" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label for="quantity" class="form-label">{{ __('Quantity') }}</label>
                <input type="number" name="quantity" class="form-control" min="1" required>
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">{{ __('Transfer') }}</button>
            </div>
        </div>
    </form>

    <!-- Stock Transfers Table -->
    <div class="table-responsive card-table-container">
        <table class="table table-bordered table-hover datatable">
            <thead class="table-light">
                <tr>
                    <th class="text-center">{{ __('No.') }}</th>
                    <th class="text-center">{{ __('Product') }}</th>
                    <th class="text-center">{{ __('From Location') }}</th>
                    <th class="text-center">{{ __('To Location') }}</th>
                    <th class="text-center">{{ __('Quantity') }}</th>
                    <th class="text-center">{{ __('Date') }}</th>
                    <th class="text-center">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
    @forelse ($stockTransfers ?? [] as $transfer)
        <tr>
            <td class="align-middle text-center">{{ $loop->iteration }}</td>
            <td class="align-middle text-center">
                {{ optional($transfer->product)->name ?? 'N/A' }}
            </td>
            <td class="align-middle text-center">{{ $transfer->from_location ?? 'N/A' }}</td>
            <td class="align-middle text-center">{{ $transfer->to_location ?? 'N/A' }}</td>
            <td class="align-middle text-center">{{ $transfer->quantity ?? 0 }}</td>
            <td class="align-middle text-center">
                {{ $transfer->created_at ? $transfer->created_at->format('Y-m-d') : 'N/A' }}
            </td>
            <td class="align-middle text-center">
                @if ($transfer && $transfer->id)
                    <x-button.delete class="btn-icon" 
                        route="{{ route('stock.transfer.delete', $transfer->id) }}"
                        onclick="return confirm('{{ __('Are you sure to delete this transfer?') }}')" />
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center py-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-mood-sad">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                    <path d="M9 10l.01 0" />
                    <path d="M15 10l.01 0" />
                    <path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" />
                </svg>
                <p class="mt-2">{{ __('Sorry, no stock transfers found.') }}</p>
            </td>
        </tr>
    @endforelse
</tbody>
        </table>
    </div>
</div>