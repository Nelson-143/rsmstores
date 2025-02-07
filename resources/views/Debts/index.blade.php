@extends('layouts.tabler')

@section('title')
    Debts Management 
@endsection

@section('me')
    @parent
@endsection

@section('Debts')
<!-- the main debts table ---->
<div class="col-12">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Customer Debts</h3>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-report">
                <i class="bi bi-plus-circle"></i> Add Debtors
            </button>
        </div>
        @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

      <!-- Modal for adding debtors -->
<div class="modal fade" id="modal-report" tabindex="-1" aria-labelledby="modal-report-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-report-label">Create A Debtor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('debts.store') }}" method="POST" id="create-debtor-form">
                @csrf <!-- Add CSRF token for security -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Customer Name</label>
                        <input type="text" name="customer_name" class="form-control" placeholder="Name of Customer in Debt" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label class="form-label">Customer Set</label>
                            <input type="text" name="customer_set" class="form-control" placeholder="What do you owe?" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label">Reporting Period</label>
                            <input type="date" name="reporting_period" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Amount in Debt</label>
                        <input type="number" name="amount_in_debt" class="form-control" placeholder="Tsh.00/=" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Amount Received</label>
                        <input type="number" name="amount_received" class="form-control" placeholder="Leave empty if not Received">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Additional Information</label>
                        <textarea name="additional_info" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create New Debtor</button>
                </div>
            </form>
        </div>
    </div>
</div>

        <div class="card-body">
            @if($debts->isEmpty())
                <div class="text-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="currentColor" class="mx-auto mb-3">
                        <path stroke="none" d="M0 0h24V0z" fill="none" />
                        <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-5 9.86a4.5 4.5 0 0 0 -3.214 1.35a1 1 0 1 0 1.428 1.4a2.5 2.5 0 0 1 3.572 0a1 1 0 0 0 1.428 -1.4a4.5 4.5 0 0 0 -3.214 -1.35zm-2.99 -4.2l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm6 0l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007z" />
                    </svg>
                    <p class="text-xl font-semibold">Sorry, no data was found</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="w-1">
                                    <input class="form-check-input" type="checkbox" aria-label="Select all invoices">
                                </th>
                                <th>No.</th>
                                <th>Customer Name</th>
                                <th>Customer Set</th>
                                <th>Created Date</th>
                                <th>Debts Amount</th>
                                <th>Received Amount</th>
                                <th>Balance Amount</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($debts as $debt)
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox" aria-label="Select">
                                    </td>
                                    <td>{{ $debt['no'] }}</td>
                                    <td>{{ $debt['customer_name'] }}</td>
                                    <td>{{ $debt['customer_set'] }}</td>
                                    <td>{{ $debt['created_date'] }}</td>
                                    <td>{{ number_format($debt['debts_amount'], 2) }}</td>
                                    <td>{{ number_format($debt['received_amount'], 2) }}</td>
                                    <td>{{ number_format($debt['balance_amount'], 2) }}</td>
                                    <td>{{ $debt['due_date'] }}</td>
                                    <td>
                                        @if($debt->amount - $debt->amount_paid == 0)
                                            <span class="badge bg-success">Paid</span>
                                        @elseif($debt->due_date < now())
                                            <span class="badge bg-danger">Overdue</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('debts.edit', $debt['id']) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('debts.destroy', $debt['id']) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
<div class="card-footer d-flex justify-content-between align-items-center">
    <p class="m-0 text-secondary">Showing <span>1</span> to <span>{{ $debts->count() }}</span> of <span>{{ $debts->count() }}</span> entries</p>
{{ $debts->count() }}
</div>
    </div>
</div>
@endsection