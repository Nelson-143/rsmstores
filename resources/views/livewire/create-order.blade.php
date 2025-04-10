@section('title' , 'Orders Create')
<div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('New Order') }}</h3>
                            <div class="ms-auto">
                                @for ($i = 1; $i <= 5; $i++)
                                    <button wire:click="switchTab({{ $i }})"
                                            class="btn btn-{{ $activeTab === $i ? 'success' : 'secondary' }} mx-1">
                                        Customer {{ $i }}
                                    </button>
                                @endfor
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label class="small my-1">{{ __('Date') }} <span class="text-danger">*</span></label>
                                    <input wire:model="purchaseDate" type="date" class="form-control" required>
                                </div>
                                <div class="col-md-4">
    <label class="small mb-1">{{ __('Customer') }} <span class="text-danger">*</span></label>
    <input wire:model.debounce.300ms="searchCustomer" type="text" class="form-control" placeholder="Search customers...">

    <div class="custom-dropdown" style="position: relative;">
        @if(!empty($searchCustomer) && $filteredCustomers->isNotEmpty())
            <div class="custom-dropdown-content" style="position: absolute; z-index: 1000; background: white; width: 100%; border: 1px solid #ccc;">
                @foreach($filteredCustomers as $customer)
                    <div wire:click="$set('selectedCustomers.{{ $activeTab }}', '{{ $customer->id }}')" 
                         class="custom-option" style="cursor: pointer; padding: 8px;">
                        {{ $customer->name }}
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <select wire:model="selectedCustomers.{{ $activeTab }}" class="form-control mt-2">
        <option value="pass_by">PASS BY</option>
        @foreach ($filteredCustomers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
        @endforeach
    </select>
</div>

                                <div class="col-md-4">
                                    <label class="small mb-1">{{ __('Reference') }}</label>
                                    <input type="text" class="form-control" value="ORD" readonly>
                                </div>
                            </div>

                            <div class="table-responsive">
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
                                    <tbody>
                                        @forelse ($currentCart as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td style="min-width: 170px;">
                                                    <input wire:model.defer="item.{{ $item->rowId }}.qty"
                                                           wire:change="updateCart('{{ $item->rowId }}', $event.target.value)"
                                                           type="number"
                                                           class="form-control"
                                                           min="0"
                                                           value="{{ $item->qty }}">
                                                </td>
                                                <td class="text-center">{{ $item->price }}</td>
                                                <td class="text-center">{{ $item->subtotal }}</td>
                                                <td class="text-center">
                                                    <button wire:click="removeFromCart('{{ $item->rowId }}')"
                                                            class="btn btn-icon btn-outline-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0"/><path d="M10 11l0 6"/><path d="M14 11l0 6"/><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"/><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"/></svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="5" class="text-center">{{ __('Add Products') }}</td></tr>
                                        @endforelse
                                        <tr>
                                            <td colspan="4" class="text-end">Total Product</td>
                                            <td class="text-center">{{ Cart::instance('customer' . $activeTab)->count() }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-end">Subtotal</td>
                                            <td class="text-center">{{ Cart::instance('customer' . $activeTab)->subtotal() }}</td>
                                        </tr>
                                        <tr>
                                        <td colspan="4" class="text-end">Tax</td>
                                        <td class="text-center">{{ $currentCart->sum(fn($item) => $item->options->tax * $item->qty) }}</td>
                                    </tr>
                                    <tr>
                                    <td colspan="4" class="text-end">Total</td>
                                    <td class="text-center">{{ Cart::instance('customer' . $activeTab)->subtotal() + $currentCart->sum(fn($item) => $item->options->tax * $item->qty) }}</td>
                                </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="button" class="btn btn-outline-secondary mx-1" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                Add Custom Product
                            </button>
                            <button wire:click="createOrder" class="btn btn-success {{ Cart::instance('customer' . $activeTab)->count() > 0 ? '' : 'disabled' }}">
    {{ __('Create Invoice') }}
</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">
                            List Product
                            <input wire:model="searchProduct" type="text" class="form-control float-end" placeholder="Search for products...">                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Unit</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($filteredProducts as $product)
                                            <tr>
                                                <td class="text-center">{{ $product->name }}</td>
                                                <td class="text-center">{{ $product->quantity }}</td>
                                                <td class="text-center">{{ $product->unit->name }}</td>
                                                <td class="text-center">{{ number_format($product->selling_price, 2) }}</td>
                                                <td>
                                                    <button wire:click="addToCart({{ $product->id }})"
                                                            class="btn btn-icon btn-outline-primary">
                                                        <x-icon.cart/>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="5" class="text-center">No products found!</td></tr>
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

    <!-- Custom Product Modal -->
    <div class="modal modal-blur fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product to Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addCustomProduct">
                        <div class="mb-3">
                            <label for="customProductName" class="form-label">Product Name</label>
                            <input wire:model="customProductName" type="text" class="form-control" id="customProductName" required>
                        </div>
                        <div class="mb-3">
                            <label for="customProductQuantity" class="form-label">Quantity</label>
                            <input wire:model="customProductQuantity" type="number" class="form-control" id="customProductQuantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="customProductPrice" class="form-label">Price</label>
                            <input wire:model="customProductPrice" type="number" class="form-control" id="customProductPrice" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>