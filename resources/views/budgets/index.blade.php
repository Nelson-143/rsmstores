@extends('layouts.tabler')

@section('title')
    Budgets Manager
@endsection

@section('me')
    @parent
@endsection

@section('budget')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Budget Overview</h3>
        <div class="card-actions">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBudgetModal">
                Add Budget
            </button>
            <button class="btn btn-secondary ms-2" data-bs-toggle="modal" data-bs-target="#categoryModal">
                        <i class="fas fa-tags me-2"></i>Manage Categories
                    </button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Budget Summary -->
            <div class="col-md-6">
                <h4 class="mb-3">Summary</h4>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Budget
                        <span class="badge bg-primary rounded-pill">Tsh {{ number_format($budgets->sum('amount')) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Expenses
                        <span class="badge bg-danger rounded-pill">Tsh {{ number_format($expenses->sum('amount')) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Remaining
                    <span class="badge bg-success rounded-pill">Tsh {{ number_format($budgets->sum('amount') - $expenses->sum('amount')) }}</span>                    </li>
                </ul>
            </div>

            <!-- Progress -->
            <div class="col-md-6">
                <h4 class="mb-3">Progress</h4>
               <div class="progress mb-3">
    @php
        $percentage = $budgets->sum('amount') > 0 ? (($expenses->sum('amount') ?? 0) / $budgets->sum('amount')) * 100 : 0;
    @endphp
    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $percentage }}%;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
        {{ round($percentage, 2) }}%
    </div>
</div>
                <p class="text-muted">You have used {{ round($percentage, 2) }}% of your total budget.</p>
                <canvas id="growthChart"></canvas>
            </div>
        </div>

        <!-- Budget Details Table -->
        <h4 class="mt-4">Budget Details</h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Allocated</th>
                        <th>Spent</th>
                        <th>Remaining</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($budgets as $index => $budget)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $budget->category->name }}</td>
                            <td>Tsh {{ number_format($budget->amount) }}</td>
                            <td>Tsh {{ number_format($budget->spent) }}</td>
                            <td>Tsh {{ number_format($budget->amount - $budget->spent) }}</td>
                            <td>
                                <button class="btn btn-sm btn-secondary">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No budgets available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Manage Categories Modal -->
<div class="modal modal-blur fade" id="categoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage Categories</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="categoryForm" action="{{ route('budget-categories.store') }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category-name" class="form-label">Category Name</label>
                        <input type="text" id="category-name" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Create Budget Modal -->
<div class="modal modal-blur fade" id="createBudgetModal" tabindex="-1" aria-labelledby="createBudgetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBudgetModalLabel">Create Budget</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('budgets.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select id="expense-category" name="expense_category_id" class="form-select" required>
                <option value="" selected disabled>Select Expense Category</option>
                @foreach ($budgetCategories as $budgetCategory)
                    <option value="{{ $budgetCategory->id }}">{{ $budgetCategory->name }}</option>
                @endforeach
            </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Allocated Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" min="50" step="50" oninput="this.value = Math.ceil(this.value / 50) * 50" required>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('growthChart').getContext('2d');
    
    // Calculate the maximum value from the growth data
    const maxValue = Math.max(...{!! json_encode($growthData['values']) !!});
    
    // Determine the step size based on the maximum value
    const stepSize = Math.ceil(maxValue / 50) * 50; // Round up to the nearest 50

    const growthChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($growthData['dates']) !!},
            datasets: [{
                label: 'Budget Growth',
                data: {!! json_encode($growthData['values']) !!},
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            interaction: {
                intersect: false,
            },
            plugins: {
                legend: {
                    position: 'top',
                },
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Amount (Tsh)'
                    },
                    beginAtZero: true,
                    min: 0, // Start from 0
                    ticks: {
                        stepSize: stepSize, // Set the step size dynamically
                    }
                }
            }
        }
    });
</script>

@endsection
