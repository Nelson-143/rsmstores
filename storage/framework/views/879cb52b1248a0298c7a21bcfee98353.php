<?php $__env->startSection('title', 'Liability Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="row row-deck row-cards">
        <!-- Financial Metrics Cards -->
        <div class="col-12">
            <div class="row row-cards">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader"><?php echo e(__('Total Liabilities')); ?></div>
                            </div>
                            <div class="h1 mb-3"><?php echo e(auth()->user()->account->currency); ?> <?php echo e(number_format($metrics['total_liabilities'], 2)); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader"><?php echo e(__('Debt-to-Income Ratio')); ?></div>
                            </div>
                            <div class="h1 mb-3"><?php echo e(number_format($metrics['debt_to_income'], 1)); ?>%</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader"><?php echo e(__('Monthly Cash Flow')); ?></div>
                            </div>
                            <div class="h1 mb-3"><?php echo e(auth()->user()->account->currency); ?> <?php echo e(number_format($metrics['cash_flow'], 2)); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="subheader"><?php echo e(__('Risk Level')); ?></div>
                            </div>
                            <div class="h1 mb-3">
                                <span class="badge bg-<?php echo e($riskAnalysis['risk_level'] == 'High' ? 'danger' : ($riskAnalysis['risk_level'] == 'Moderate' ? 'warning' : 'success')); ?>">
                                    <?php echo e($riskAnalysis['risk_level']); ?> <?php echo e(__('Risk')); ?>

                                </span>
                            </div>
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

        <!-- Liabilities Table -->
        <div class="container mt-4">
    <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title"><?php echo e(__('Liabilities')); ?></h3>
                    <div class="card-actions">
                        <a href="<?php echo e(route('loan.calculator')); ?>" class="btn btn-primary">
                            <?php echo e(__('Loan Calculator')); ?>

                        </a>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-liability">
                            <?php echo e(__('Add Liability')); ?>

                        </button>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#consolidate">
                        <?php echo e(__('Consolidate Debts')); ?>

                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Type')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                                <th><?php echo e(__('Remaining')); ?></th>
                                <th><?php echo e(__('Interest Rate')); ?></th>
                                <th><?php echo e(__('Due Date')); ?></th>
                                <th><?php echo e(__('Priority')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $liabilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $liability): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($liability->name); ?></td>
                                <td><?php echo e(ucfirst($liability->type)); ?></td>
                                <td><?php echo e(auth()->user()->account->currency); ?> <?php echo e(number_format($liability->amount, 2)); ?></td>
                                <td><?php echo e(auth()->user()->account->currency); ?> <?php echo e(number_format($liability->remaining_balance, 2)); ?></td>
                                <td><?php echo e($liability->interest_rate); ?>%</td>
                                <td><?php echo e(date('M d, Y', strtotime($liability->due_date))); ?></td>
                                <td>
                                    <span class="badge bg-<?php echo e($liability->priority == 'high' ? 'danger' : ($liability->priority == 'medium' ? 'warning' : 'success')); ?>">
                                        <?php echo e(ucfirst($liability->priority)); ?>

                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-<?php echo e($liability->remaining_balance <= 0 ? 'success' : 'warning'); ?>">
                                        <?php echo e($liability->remaining_balance <= 0 ? 'Paid' : 'Active'); ?>

                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" 
                                        data-bs-target="#payment-modal" 
                                        data-liability-id="<?php echo e($liability->id); ?>">
                                        <?php echo e(__('Pay')); ?>

                                    </button>

                                    <a href="<?php echo e(route('liabilities.history', $liability)); ?>" 
                                        class="btn btn-sm btn-info">
                                        <?php echo e(__('History')); ?>

                                    </a>
                                    <form action="<?php echo e(route('liabilities.destroy', $liability->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this liability?');"><?php echo e(__('Delete')); ?></button>
                                </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Liability Modal -->
<div class="modal modal-blur fade" id="add-liability" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo e(route('liabilities.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Add New Liability')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Name')); ?></label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Amount')); ?></label>
                        <input type="number" step="0.01" class="form-control" name="amount" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Interest Rate')); ?> (%)</label>
                        <input type="number" step="0.01" class="form-control" name="interest_rate" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Due Date')); ?></label>
                        <input type="date" class="form-control" name="due_date" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Priority')); ?>y</label>
                        <select class="form-select" name="priority">
                            <option value="high"><?php echo e(__('High')); ?></option>
                            <option value="medium" selected><?php echo e(__('Medium')); ?></option>
                            <option value="low"><?php echo e(__('Low')); ?></option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Type')); ?></label>
                        <select class="form-select" name="type">
                            <option value="formal"><?php echo e(__('Formal Loan')); ?></option>
                            <option value="informal"><?php echo e(__('Informal Debt')); ?></option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Add Liability')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Payment Modal -->
<div class="modal modal-blur fade" id="payment-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="payment-form" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Make Payment')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="liability_id" id="liability-id">
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Payment Amount')); ?></label>
                        <input type="number" step="0.01" class="form-control" name="amount" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Record Payment')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Consolidate Modal -->
<div class="modal modal-blur fade" id="consolidate" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo e(route('liabilities.consolidate')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Consolidate Debts')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Consolidation Amount')); ?></label>
                        <input type="number" name="amount" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Interest Rate')); ?> (%)</label>
                        <input type="number" name="interest_rate" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Term (Years)')); ?></label>
                        <input type="number" name="term" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Consolidate Debts')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle payment modal
    $('#payment-modal').on('show.bs.modal', function(event) {
        const button = $(event.relatedTarget);
        const liabilityId = button.data('liability-id');
        const form = document.getElementById('payment-form');
        form.action = `/liabilities/${liabilityId}/pay`;
        document.getElementById('liability-id').value = liabilityId;
    });
});

const ctx = document.getElementById('financialHealthChart').getContext('2d');
const financialHealthChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Total Liabilities', 'Total Paid', 'Cash Flow'],
        datasets: [{
            label: 'Financial Health',
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/liabilities/index.blade.php ENDPATH**/ ?>