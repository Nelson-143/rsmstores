<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">
                {{ __('Orders') }}
            </h3>
        </div>

        <div class="card-actions">
            <x-action.create route="{{ route('pos.index') }}" />
        </div>
    </div>

    <div class="card-body border-bottom py-3">
        <div class="d-flex">
            <div class="text-secondary">
                Show
                <div class="mx-2 d-inline-block">
                    <select wire:model.live="perPage" class="form-select form-select-sm" aria-label="result per page">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="25">25</option>
                    </select>
                </div>
                entries
            </div>
            <div class="ms-auto text-secondary">
                Search:
                <div class="ms-2 d-inline-block">
                    <input type="text" wire:model.live="search" class="form-control form-control-sm"
                        aria-label="Search invoice">
                </div>
            </div>
        </div>
    </div>

    <x-spinner.loading-spinner />

    <div class="table-responsive">
        <table wire:loading.remove class="table table-bordered card-table table-vcenter text-nowrap datatable">
            <thead class="thead-light">
                <tr>
                    <th class="align-middle text-center w-1">
                        {{ __('No.') }}
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('invoice_no')" href="#" role="button">
                            {{ __('Invoice No.') }}
                            @include('inclues._sort-icon', ['field' => 'invoice_no'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('customer_id')" href="#" role="button">
                            {{ __('Customer') }}
                            @include('inclues._sort-icon', ['field' => 'customer_id'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('order_date')" href="#" role="button">
                            {{ __('Date') }}
                            @include('inclues._sort-icon', ['field' => 'order_date'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('payment_type')" href="#" role="button">
                            {{ __('Paymet') }}
                            @include('inclues._sort-icon', ['field' => 'payment_type'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('total')" href="#" role="button">
                            {{ __('Total') }}
                            @include('inclues._sort-icon', ['field' => 'total'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('order_status')" href="#" role="button">
                            {{ __('Status') }}
                            @include('inclues._sort-icon', ['field' => 'order_status'])
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        {{ __('Action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <td class="align-middle text-center">
                            {{ $loop->iteration }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $order->invoice_no }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $order->customer->name }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $order->order_date->format('d-m-Y') }}
                        </td>
                        <td class="align-middle text-center">
                            {{ $order->payment_type }}
                        </td>
                        <td class="align-middle text-center">
                        {{ auth()->user()->account->currency }}{{ ($order->total) }}
                        </td>
                        <td class="align-middle text-center">
    <x-status dot
        color="{{ $order->order_status === \App\Enums\OrderStatus::COMPLETE ? 'green' : ($order->order_status === \App\Enums\OrderStatus::PENDING ? 'orange' : 'gray') }}"
        class="text-uppercase">
        {{ $order->order_status->label() }}
    </x-status>
</td>
                        <td class="align-middle text-center">
                            <x-button.show class="btn-icon" route="{{ route('orders.show', $order->uuid) }}" />
                            <x-button.print class="btn-icon" route="{{ route('order.downloadInvoice', $order->uuid) }}" />

                            <!-- Form for Approval -->
                            @if ($order->order_status === \App\Enums\OrderStatus::PENDING)
                                <form action="{{ route('orders.approve', $order->uuid) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-icon btn-success" onclick="return confirm('Are you sure you want to approve this order?')">
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-check" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l5 5l10 -10" />
                                    </svg>
                                                                    </button>
                                </form>
                            @endif

                            @if ($order->order_status === \App\Enums\OrderStatus::PENDING)
                                <x-button.delete class="btn-icon" route="{{ route('orders.cancel', $order) }}"
                                    onclick="return confirm('Are you sure to cancel invoice no. {{ $order->invoice_no }} ?')" />
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="align-middle text-center" colspan="8">
                            No results found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer d-flex align-items-center">
        <p class="m-0 text-secondary">
            Showing <span>{{ $orders->firstItem() }}</span> to <span>{{ $orders->lastItem() }}</span> of
            <span>{{ $orders->total() }}</span> entries
        </p>

        <ul class="pagination m-0 ms-auto">
            {{ $orders->links() }}
        </ul>
    </div>
</div>
@push('scripts')
<script>
    function approveOrder(uuid) {
        if (confirm('Are you sure you want to approve this order?')) {
            fetch(`/orders/${uuid}/approve`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload(); // Reload the page to reflect the changes
                } else {
                    alert('Failed to approve the order.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while approving the order.');
            });
        }
    }
</script>
@endpush
