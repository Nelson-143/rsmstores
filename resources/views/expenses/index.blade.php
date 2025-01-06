@extends('layouts.tabler')

@section('title')
    Expences 
@endsection
@section('me')
    @parent
@endsection

@section('matumizi')

<div class="container-xl">
    <!-- Page Header -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Expense Management
                </h2>
                <div class="text-muted mt-1">Track and manage your business expenses</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addExpenseModal">
                        <i class="fas fa-plus me-2"></i>Add Expense
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="filter-category" class="form-label">Category</label>
            <select id="filter-category" class="form-select">
                <option value="">All Categories</option>
                <option value="1">Office Supplies</option>
                <option value="2">Travel</option>
                <option value="3">Utilities</option>
                <!-- Add categories dynamically -->
            </select>
        </div>
        <div class="col-md-4">
            <label for="filter-date" class="form-label">Date</label>
            <input type="date" id="filter-date" class="form-control">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button class="btn btn-secondary w-100">Filter</button>
        </div>
    </div>

    <!-- Expense Table -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Expense Records</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Attachment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dynamically load expenses -->
                    <tr>
                        <td>1</td>
                        <td>Travel</td>
                        <td>$500.00</td>
                        <td>Business trip to New York</td>
                        <td>2025-01-03</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-link">View</a>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="icon icon-tabler icons-tabler-file-x">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-16a2 2 0 0 1 2 -2h7l5 5v13a2 2 0 0 1 -2 2z" />
                                <path d="M9.5 12.5l5 5m0 -5l-5 5" />
                            </svg>
                            <p>No expenses found</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Expense Modal -->
<div class="modal modal-blur fade" id="addExpenseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Expense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('expenses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="expense-category" class="form-label">Category</label>
                        <select id="expense-category" name="category_id" class="form-select" required>
                            <option value="">Select a category</option>
                            <option value="1">Office Supplies</option>
                            <option value="2">Travel</option>
                            <option value="3">Utilities</option>
                            <!-- Add categories dynamically -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="expense-amount" class="form-label">Amount</label>
                        <input type="number" step="0.01" id="expense-amount" name="amount" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="expense-description" class="form-label">Description</label>
                        <textarea id="expense-description" name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="expense-date" class="form-label">Date</label>
                        <input type="date" id="expense-date" name="expense_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="expense-attachment" class="form-label">Attachment</label>
                        <input type="file" id="expense-attachment" name="attachment" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Expense</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection