@extends('layouts.tabler')

@section('title')
    Debts Management
@endsection

@section('me')
    @parent
@endsection

@section('Debts')
<!-- the main debts table ---->

<div class="container mt-4">
    <div class="row row-deck row-cards">
        <!-- Total Current Debts -->
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="card-title mb-2">Total Current Debts</h6>
                    <p class="card-text h5">{{ $totalCurrentDebts }}</p>
                    <p class="text-muted small">Unpaid or partially paid debts.</p>
                </div>
            </div>
        </div>

        <!-- Total Value of Debt -->
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="card-title mb-2">Total Value of Debt</h6>
                    <p class="card-text h5">Tsh{{ number_format($totalValueOfDebt, 2) }}</p>
                    <p class="text-muted small">Sum of all remaining balances.</p>
                </div>
            </div>
        </div>

        <!-- Total Paid Debts -->
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="card-title mb-2">Total Paid Debts</h6>
                    <p class="card-text h5">{{ $totalPaidDebts }}</p>
                    <p class="text-muted small">Fully paid debts.</p>
                </div>
            </div>
        </div>

        <!-- Total Amount Received -->
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="card-title mb-2">Total Amount Received</h6>
                    <p class="card-text h5">Tsh{{ number_format($totalAmountReceived, 2) }}</p>
                    <p class="text-muted small">Sum of all payments received.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* General card styling for consistency and readability */
.card {
    border-radius: 0.5rem; /* Rounded corners */
    font-size: 0.9rem; /* General font size */
    margin-bottom: 1rem; /* Space between cards */
}

.card-title {
    font-size: 1rem; /* Adjusted title size for better balance */
    font-weight: 600; /* Slightly bold for emphasis */
}

.card-text {
    font-size: 1.5rem; /* Main text size for prominence */
    font-weight: 700; /* Bold to make the data stand out */
    margin-bottom: 0.5rem; /* Space below main text */
}

.text-muted {
    font-size: 0.85rem; /* Slightly smaller muted text */
}
</style>


<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
         
            <div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h3 class="card-title">Customer Debts Details</h3>
            <div class="input-group input-group-flat">
                <input type="text" class="form-control" id="search-input" placeholder="Search by customer name...">
                <button type="button" class="btn btn-primary" id="search-button">Search</button>
            </div>
        </div>
        <div class="card-body">
          
        </div>
    </div>
</div>
<script>
document.getElementById('search-input').addEventListener('input', function () {
    const query = this.value.toLowerCase();
    document.querySelectorAll('#debts-table tbody tr').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(query) ? '' : 'none';
    });
});
</script>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-report">
                <i class="bi bi-plus-circle"></i> Add Debtors
            </button>
        </div>
        <div class="card-body">
          @if(session('success') || session('error') || $errors->any())
    <div class="alert alert-{{ session('success') ? 'success' : (session('error') ? 'danger' : 'danger') }}">
        @if(session('success'))
            {{ session('success') }}
        @elseif(session('error'))
            {{ session('error') }}
        @else
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endif

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
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th><input class="form-check-input" type="checkbox" aria-label="Select all invoices"></th>
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
                        <tbody id="debt">
                            @foreach ($debtsData as $debt)
                                <tr>
                                    <td><input class="form-check-input" type="checkbox" aria-label="Select"></td>
                                    <td>{{ $debt['no'] }}</td>
                                    <td>{{ $debt['customer_name'] }}</td>
                                    <td>{{ $debt['customer_set'] }}</td>
                                    <td>{{ $debt['created_date'] }}</td>
                                    <td>{{ number_format($debt['debts_amount'], 2) }}</td>
                                    <td>{{ number_format($debt['received_amount'], 2) }}</td>
                                    <td>{{ number_format($debt['balance_amount'], 2) }}</td>
                                    <td>{{ $debt['due_date'] }}</td>
                                    <td>
                                        @if($debt['balance_amount'] == 0)
                                            <span class="badge bg-success">Paid</span>
                                        @elseif($debt['due_date'] < now()->format('Y-m-d'))
                                            <span class="badge bg-danger">Overdue</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('debts.destroy', $debt['uuid']) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#paymentModal" data-debt-uuid="{{ $debt['uuid'] }}">Pay</button>
                                        <a href="{{ route('debts.history', $debt['uuid']) }}" class="btn btn-info btn-sm">Payment History</a>
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
        </div>
    </div>
</div>


<!-- Modal for adding debtors -->
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" aria-labelledby="modal-report-label" aria-hidden="true">
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
                        <label class="form-label">Customer</label>
                        <select name="customer_id" class="form-control">
                            <!-- <option value="">Personal Debt</option> Option for personal debt -->
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Customer Set</label>
                        <input type="text" name="customer_set" class="form-control" placeholder="Enter Customer Set" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="number" name="amount" class="form-control" placeholder="Amount in Debt" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Due Date</label>
                        <input type="date" name="due_date" class="form-control" required>
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
<!-- Payment Modal -->
<div class="modal modal-blur fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Make a Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="paymentForm" method="POST" action="{{ route('debts.pay') }}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="debt_uuid" id="debt_uuid" value="">
                    <div class="mb-3">
                        <label class="form-label">Amount Paid</label>
                        <input type="number" name="amount_paid" class="form-control" placeholder="Enter amount" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Pay</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>

    // Update the debt_id value when the payment modal is opened
function setDebtId(debtId) {
    document.getElementById('debt_id').value = debtId;
}
document.addEventListener('DOMContentLoaded', function () {
        var paymentModal = document.getElementById('paymentModal');
        paymentModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var debtUuid = button.getAttribute('data-debt-uuid'); // Extract info from data-* attribute
            var modalDebtUuidInput = paymentModal.querySelector('#debt_uuid');
            modalDebtUuidInput.value = debtUuid; // Update hidden input value
        });
    });
</script>

@endsection
