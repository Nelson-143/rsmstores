@extends('layouts.tabler')
@section('title', 'Create Order')

@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title">{{ __('New Order') }}</h3>
                            <div class="customer-tabs mt-3">
                                @for ($i = 1; $i <= 5; $i++)
                                    <button class="btn customer-tab me-2 {{ $i === 1 ? 'btn-success active' : 'btn-danger' }}" 
                                            data-customer-tab="{{ $i }}" 
                                            onclick="switchCustomer({{ $i }})">
                                        <span class="customer-name-{{ $i }}">Customer {{ $i }}</span>
                                    </button>
                                @endfor
                            </div>
                        </div>
                        <div class="card-actions btn-actions">
                            <x-action.close route="{{ route('orders.index') }}"/>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row gx-3 mb-3">
                            @include('partials.session')
                            <div class="col-md-4">
                                <label for="purchase_date" class="small my-1">
                                    {{ __('Date') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <input name="purchase_date" id="purchase_date" type="date"
                                       class="form-control example-date-input @error('purchase_date') is-invalid @enderror"
                                       value="{{ old('purchase_date') ?? now()->format('Y-m-d') }}"
                                       required>
                            </div>

                            <div class="col-md-4">
                                <label class="small mb-1" for="customer_id">
                                    {{ __('Customer') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select customer-select" id="customer_id_1" data-tab="1">
                                    <option selected="" disabled="">Select a customer:</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="small mb-1" for="reference">{{ __('Reference') }}</label>
                                <input type="text" class="form-control"
                                       id="reference"
                                       name="reference"
                                       value="ORD"
                                       readonly>
                            </div>
                        </div>

                        <!-- Cart tables container -->
                        <div id="cart-tables-container">
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="cart-table" id="cart-table-{{ $i }}" style="{{ $i > 1 ? 'display: none;' : '' }}">
                                    <table class="table table-striped table-bordered align-middle">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Product') }}</th>
                                                <th class="text-center">{{ __('Quantity') }}</th>
                                                <th class="text-center">{{ __('Price') }}</th>
                                                <th class="text-center">{{ __('SubTotal') }}</th>
                                                <th class="text-center">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cart-items-{{ $i }}">
                                            <!-- Cart items will be dynamically loaded here -->
                                        </tbody>
                                    </table>
                                </div>
                            @endfor
                        </div>

                        <div class="card-footer text-end">
                            <button type="button" class="btn btn-success" onclick="showPaymentModal()">
                                {{ __('Create Invoice') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Modal -->
            <div class="modal fade" id="paymentModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Payment Method</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form id="paymentForm" method="POST" action="{{ route('invoice.create') }}">
                                @csrf
                                <input type="hidden" name="active_customer" id="active_customer">
                                <select class=" form-select mb-3" name="payment_method" required>
                                    <option value="cash">Cash</option>
                                    <option value="debt">Debt</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Confirm Payment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">
                        List Product
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered align-middle">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Unit</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $product)
                                        <tr>
                                            <td class="text-center">{{ $product->name }}</td>
                                            <td class="text-center">{{ $product->quantity }}</td>
                                            <td class="text-center">{{ $product->unit->name }}</td>
                                            <td class="text-center">{{ number_format($product->selling_price, 2) }}</td>
                                            <td>
                                                <div class="d-flex">
                          <button type="button" class="btn btn-icon btn-outline-primary" onclick="addToCart('{{ $product->id }}')">
    <x-icon.cart/>
</button>
                                                        <x-icon.cart/>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <th colspan="5" class="text-center">Data not found!</th>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let activeCustomerTab = 1;

// Switch between customer tabs
function switchCustomer(tabNumber) {
    $('.customer-tab').removeClass('btn-success active').addClass('btn-danger');
    $(`.customer-tab[data-customer-tab="${tabNumber}"]`).removeClass('btn-danger').addClass('btn-success active');
    
    $('.cart-table').hide();
    $(`#cart-table-${tabNumber}`).show();
    
    activeCustomerTab = tabNumber;
    loadCustomerCart(tabNumber);
}

// Load customer cart items
function loadCustomerCart(tabNumber) {
    $.ajax({
        url: '{{ route("pos.getCustomerCart", "") }}/' + tabNumber,
        type: 'GET',
        success: function(response) {
            updateCartTable(response.cartItems, tabNumber);
        }
    });
}

// Update cart table
function updateCartTable(cartItems, tabNumber) {
    let cartTableBody = $(`#cart-items-${tabNumber}`);
    cartTableBody.empty(); // Clear existing items

    if (cartItems.length > 0) {
        cartItems.forEach(item => {
            cartTableBody.append(`
                <tr>
                    <td>${item.name}</td>
                    <td style="min-width: 170px;">
                        <form action="{{ route('pos.updateCartItem', '') }}/${item.rowId}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="number" class="form-control" name="qty" required value="${item.qty}">
                                <input type="hidden" class="form-control" name="product_id" value="${item.id}">
                                <div class="input-group-append text-center">
                                    <button type="submit" class="btn btn-icon btn-success border-none" data-toggle="tooltip" data-placement="top" title="Submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td class="text-center">${item.price}</td>
                    <td class="text-center">${item.subtotal}</td>
                    <td class="text-center">
                        <form action="{{ route('pos .deleteCartItem', '') }}/${item.rowId}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-icon btn-outline-danger" onclick="return confirm('Are you sure you want to delete this record?')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </button>
                        </form>
                    </td>
                </tr>
            `);
        });
    } else {
        cartTableBody.append('<tr><td colspan="5" class="text-center">No items in cart</td></tr>');
    }
}

// Add product to cart using AJAX
function addToCart(productId) {
    $.ajax({
        url: '{{ route("pos.addCartItem", "") }}/' + productId,
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            customer_tab: activeCustomerTab
        },
        success: function(response) {
            updateCartTable(response.cartItems, activeCustomerTab);
        }
    });
}

// Show payment modal
function showPaymentModal() {
    $('#active_customer').val(activeCustomerTab);
    $('#paymentModal').modal('show');
}

// Handle customer selection
$('.customer-select').change(function() {
    const tabNumber = $(this).data('tab');
    const customerName = $(this).find('option:selected').text();
    $(`.customer-name-${tabNumber}`).text(customerName);
});

// Initial load
$(document).ready(function() {
    switchCustomer(1);
});
</script>
@endpush