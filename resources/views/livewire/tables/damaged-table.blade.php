<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ __('Damaged Products') }}</h3>
    </div>

    <!-- Damaged Products Form -->
    <form method="POST" action="{{ route('stock.damaged.post') }}" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <label for="product_id" class="form-label">Product</label>
                <select name="product_id" class="form-control" required>
    @if(isset($products))
        @foreach($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    @endif
</select>
            </div>
            <div class="col-md-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" min="1" required>
            </div>
            <div class="col-md-3">
                <label for="reason" class="form-label">Reason</label>
                <input type="text" name="reason" class="form-control">
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">Record Damaged Product</button>
            </div>
        </div>
    </form>

    <!-- Damaged Products Table -->
    <div class="table-responsive">
        <table class="table table-bordered card-table table-vcenter text-nowrap datatable">
            <thead class="thead-light">
                <tr>
                    <th class="align-middle text-center">No.</th>
                    <th class="align-middle text-center">Product</th>
                    <th class="align-middle text-center">Location</th>
                    <th class="align-middle text-center">Quantity</th>
                    <th class="align-middle text-center">Reason</th>
                    <th class="align-middle text-center">Date</th>
                </tr>
            </thead>
            <tbody>
              @forelse ($damagedProducts ?? [] as $damaged)
    <tr>
        <td class="align-middle text-center">{{ $loop->iteration }}</td>
        <td class="align-middle text-center">{{ $damaged->product->name }}</td>
        <td class="align-middle text-center">{{ $damaged->location }}</td>
        <td class="align-middle text-center">{{ $damaged->quantity }}</td>
        <td class="align-middle text-center">{{ $damaged->reason ?? 'N/A' }}</td>
        <td class="align-middle text-center">{{ $damaged->created_at->format('Y-m-d') }}</td>
    </tr>
@empty
    <tr>
        <td class="align-middle text-center" colspan="6">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mood-sad"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M9 10l.01 0" /><path d="M15 10l.01 0" /><path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" /></svg>            <p class="mt-2">Sorry, no damaged products found.</p>
        </td>
    </tr>
@endforelse
            </tbody>
        </table>
    </div>
</div>