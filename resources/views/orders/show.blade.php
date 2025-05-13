@extends('layouts.tabler')
@section('title', 'Customer Order Details')

@section('content')
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Customer Order Details') }}</h3>
                    </div>
                    
                    <div class="card-body">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-4">
                                <label for="order_date" class="small my-1">
                                    {{ __('Order Date') }}
                                </label>
                                <input name="order_date" id="order_date" type="date"
                                       class="form-control"
                                       value="{{ $order->created_at->format('Y-m-d') }}"
                                       readonly>
                            </div>

                            <div class="col-md-4">
                                <label class="small mb-1" for="customer_name">
                                    {{ __('Customer Name') }}
                                </label>
                                <input type="text" class="form-control"
                                       id="customer_name"
                                       name="customer_name"
                                       value="{{ $order->customer->name ?? 'N/A' }}"
                                       readonly>
                            </div>

                            <div class="col-md-4">
                                <label class="small mb-1" for="reference">{{ __('Reference') }}</label>
                                <input type="text" class="form-control"
                                       id="reference"
                                       name="reference"
                                       value="{{ $order->reference ?? 'N/A' }}"
                                       readonly>
                            </div>
                        </div>

                        <!-- Order Items Table -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th>{{ __('Product') }}</th>
                                        <th>{{ __('Location') }}</th>
                                        <th class="text-center">{{ __('Quantity') }}</th>
                                        <th class="text-center">{{ __('Price') }}</th>
                                        <th class="text-center">{{ __('SubTotal') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Regular Order Details -->
                                    @foreach ($order->details as $detail)
                                        <tr>
                                            <td>{{ $detail->product->name ?? $detail->name ?? 'N/A' }}</td>
                                            <td>{{ optional($detail->product->productLocations->where('location_id', $detail->location_id)->first())->location->name ?? 'N/A' }}</td>
                                            <td class="text-center">{{ $detail->quantity ?? '0' }}</td>
                                            <td class="text-center">{{ number_format($detail->unitcost, 2) }}</td>
                                            <td class="text-center">{{ number_format($detail->total, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    <!-- Custom Order Details -->
                                    @foreach ($order->customOrderDetails as $customDetail)
                                        <tr>
                                            <td>{{ $customDetail->name }} (Custom)</td>
                                            <td>{{ optional($customDetail->location)->name ?? 'N/A' }}</td>
                                            <td class="text-center">{{ $customDetail->quantity }}</td>
                                            <td class="text-center">{{ number_format($customDetail->unitcost, 2) }}</td>
                                            <td class="text-center">{{ number_format($customDetail->total, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    <!-- Summary rows -->
                                    <tr class="bg-light">
                                        <td colspan="4" class="text-end fw-bold">{{ __('Subtotal') }}</td>
                                        <td class="text-center">
                                            {{ number_format($order->details->sum('total') + $order->customOrderDetails->sum('total'), 2) }}
                                        </td>
                                    </tr>
                                    @if($order->discount_amount > 0)
                                        <tr class="bg-light">
                                            <td colspan="4" class="text-end fw-bold">{{ __('Discount') }}</td>
                                            <td class="text-center">-{{ number_format($order->discount_amount, 2) }}</td>
                                        </tr>
                                    @endif
                                    @if($order->vat > 0)
                                        <tr class="bg-light">
                                            <td colspan="4" class="text-end fw-bold">{{ __('Tax') }}</td>
                                            <td class="text-center">{{ number_format($order->vat, 2) }}</td>
                                        </tr>
                                    @endif
                                    <tr class="table-active">
                                        <td colspan="4" class="text-end fw-bold h5">{{ __('Total') }}</td>
                                        <td class="text-center fw-bold h5">{{ number_format($order->total, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Order Total -->
                        <div class="row mt-4">
                            <div class="col-md-6 offset-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="text-end">{{ __('Total') }}</th>
                                        <td class="text-end">{{ number_format($order->total, 2) }}</td>
                                    </tr>
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