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
                        <span class="badge bg-primary rounded-pill">Tsh 1,200,000</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Expenses
                        <span class="badge bg-danger rounded-pill">Tsh 800,000</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Remaining
                        <span class="badge bg-success rounded-pill">Tsh 400,000</span>
                    </li>
                </ul>
            </div>

            <!-- Progress -->
            <div class="col-md-6">
                <h4 class="mb-3">Progress</h4>
                <div class="progress mb-3">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100">66%</div>
                </div>
                <p class="text-muted">You have used 66% of your total budget.</p>
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
                    <tr>
                        <td>1</td>
                        <td>Marketing</td>
                        <td>Tsh 500,000</td>
                        <td>Tsh 300,000</td>
                        <td>Tsh 200,000</td>
                        <td>
                            <button class="btn btn-sm btn-secondary">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Operations</td>
                        <td>Tsh 700,000</td>
                        <td>Tsh 500,000</td>
                        <td>Tsh 200,000</td>
                        <td>
                            <button class="btn btn-sm btn-secondary">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Create Budget Modal -->
<div class="modal fade" id="createBudgetModal" tabindex="-1" aria-labelledby="createBudgetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBudgetModalLabel">Create Budget</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="/budget/create">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category" name="category" required>
                    </div>
                    <div class="mb-3">
                        <label for="allocated_amount" class="form-label">Allocated Amount</label>
                        <input type="number" class="form-control" min="50" id="allocated_amount" name="allocated_amount" required>
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

@endsection