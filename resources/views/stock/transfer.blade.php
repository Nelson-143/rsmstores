@extends('layouts.tabler')

@section('title')
    Stock Transfer
@endsection

@section('me')
    @parent
@endsection

@section('stocktrans')
<!-- Stock Transfer Page -->
<div class="page-body">
    <div class="container-xl">
        <!-- No Products Available Alert -->
        @if ($products->isEmpty())
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-warning shadow-sm p-4 rounded" role="alert">
                        <h3 class="mb-3 text-center">No Products Available</h3>
                        <p class="text-muted text-center">
                            It seems there are no products available at the moment. Try adding new products later.
                        </p>
                        <div class="d-flex justify-content-center gap-3 mt-3">
                            <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
                            <a href="{{ route('products.import.view') }}" class="btn btn-success">Import Products</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <!-- Success Alert -->
                @if (session('success'))
                    <div class="col-md-12">
                        <div class="alert alert-success shadow-sm p-4 rounded" role="alert">
                            <h3 class="mb-3">Success</h3>
                            <p>{{ session('success') }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                <!-- Stock Transfer Table -->
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Stock Transfer</h4>
                            <div class="btn-group" role="group">
                                <a href="{{ route('products.create') }}" class="btn btn-primary me-2">Add Product</a>
                                <a href="{{ route('products.import.view') }}" class="btn btn-success">Import Products</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @livewire('tables.stock-transfertable')
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection