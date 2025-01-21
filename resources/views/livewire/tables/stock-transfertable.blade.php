<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">
                {{ __('Stock Transfer') }}
            </h3>
        </div>

        <div class="card-actions btn-group">
            <div class="dropdown">
                <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <x-icon.vertical-dots />
                </a>
                <div class="dropdown-menu dropdown-menu-end" >
                
                    <a href="{{ route('stock.damaged') }}" class="dropdown-item">
                        <x-icon.plus />
                        {{ __('Create Damage Product') }}
                    </a>
                   
                </div>
            </div>
        </div>
    </div>

        <!-- Stock Transfer Form -->
        <form method="POST" action="{{ route('stock.transfer') }}" class="mb-4">
            @csrf
            <div class="row">
                <div class="col-md-3">
                <label for="product_id" class="form-label">Product</label>
<select name="product_id" class="form-control" required>
    <option value="">Select Product</option>
    @if(isset($products))
        @foreach ($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    @endif
</select>

                </div>
                <div class="col-md-3">
                    <label for="from_location" class="form-label">From Location</label>
                    <input type="text" name="from_location" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="to_location" class="form-label">To Location</label>
                    <input type="text" name="to_location" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" min="1" required>
                </div>
                <div class="col-md-1 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Transfer</button>
                </div>
            </div>
        </form>

        <!-- Stock Transfers Table -->
        <div class="table-responsive">
            <table class="table table-bordered card-table table-vcenter text-nowrap datatable">
                <thead class="thead-light">
                    <tr>
                        <th class="align-middle text-center w-1">No.</th>
                        <th class="align-middle text-center">Product</th>
                        <th class="align-middle text-center">From Location</th>
                        <th class="align-middle text-center">To Location</th>
                        <th class="align-middle text-center">Quantity</th>
                        <th class="align-middle text-center">Date</th>
                        <th class="align-middle text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($stockTransfers ?? [] as $transfer)
    <tr>
    <td class="align-middle text-center">{{ $loop->iteration }}</td>
    <td class="align-middle text-center">{{ $transfer->product->name ?? 'N/A' }}</td>
<td class="align-middle text-center">{{ $transfer->from_location ?? 'N/A' }}</td>
<td class="align-middle text-center">{{ $transfer->to_location ?? 'N/A' }}</td>
<td class="align-middle text-center">{{ $transfer->quantity ?? 0 }}</td>
<td class="align-middle text-center">{{ $transfer->created_at ? $transfer->created_at->format('Y-m-d') : 'N/A' }}</td>
<td class="align-middle text-center">
    @if($transfer && $transfer->id)
        <x-button.delete class="btn-icon" 
            route="{{ route('stock.transfer.delete', $transfer->id) }}"
    @endif 
                onclick="return confirm('Are you sure to delete this transfer?')" />
        </td>
    </tr>
@empty
    <tr>
        <td class="align-middle text-center" colspan="7">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mood-sad"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M9 10l.01 0" /><path d="M15 10l.01 0" /><path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" /></svg>            <p class="mt-2">Sorry, no stock transfers found.</p>
        </td>
    </tr>
@endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
