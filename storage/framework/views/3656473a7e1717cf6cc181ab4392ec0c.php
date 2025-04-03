<?php $__env->startSection('title'); ?>
    <?php echo e(__('Debts Management')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('me'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('me'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Debts'); ?>
<!-- the main debts table ---->
<?php if (\Illuminate\Support\Facades\Blade::check('role', 'Super Admin')): ?>
<div class="container mt-4">
    <div class="row row-deck row-cards">
        <!-- Total Current Debts -->
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="card-title mb-2"><?php echo e(__('Total Current Debts')); ?></h6>
                    <p class="card-text h5"><?php echo e($totalCurrentDebts); ?></p>
                    <p class="text-muted small"><?php echo e(__('Unpaid or partially paid debts')); ?>.</p>
                </div>
            </div>
        </div>

        <!-- Total Value of Debt -->
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="card-title mb-2"><?php echo e(__('Total Value of Debt')); ?></h6>
                    <p class="card-text h5"><?php echo e(auth()->user()->account->currency); ?>,<?php echo e(number_format($totalValueOfDebt, 2)); ?></p>
                    <p class="text-muted small"><?php echo e(__('Sum of all remaining balances')); ?>.</p>
                </div>
            </div>
        </div>

        <!-- Total Paid Debts -->
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="card-title mb-2"><?php echo e(__('Total Paid Debts')); ?></h6>
                    <p class="card-text h5"><?php echo e($totalPaidDebts); ?></p>
                    <p class="text-muted small"><?php echo e(__('Fully paid debts')); ?>.</p>
                </div>
            </div>
        </div>

        <!-- Total Amount Received -->
        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="card-title mb-2"><?php echo e(__('Total Amount Received')); ?></h6>
                    <p class="card-text h5"> <?php echo e(auth()->user()->account->currency); ?>,<?php echo e(number_format($totalAmountReceived, 2)); ?></p>
                    <p class="text-muted small"><?php echo e(__('Sum of all payments received')); ?>.</p>
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
<?php endif; ?>

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
         
            <div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h3 class="card-title"><?php echo e(__('Customer Debts Details')); ?></h3>
            <div class="input-group input-group-flat">
                <input type="text" class="form-control" id="search-input" placeholder="Search by customer name...">
                <button type="button" class="btn btn-primary" id="search-button"><?php echo e(__('Search')); ?></button>
            </div>
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
                <i class="bi bi-plus-circle"></i> <?php echo e(__('Add Debtors')); ?>

            </button>
        </div>
        <div class="card-body">
          <?php if(session('success') || session('error') || $errors->any()): ?>
    <div class="alert alert-<?php echo e(session('success') ? 'success' : (session('error') ? 'danger' : 'danger')); ?>">
        <?php if(session('success')): ?>
            <?php echo e(session('success')); ?>

        <?php elseif(session('error')): ?>
            <?php echo e(session('error')); ?>

        <?php else: ?>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>
    </div>
<?php endif; ?>

            <?php if($debts->isEmpty()): ?>
                <div class="text-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="currentColor" class="mx-auto mb-3">
                        <path stroke="none" d="M0 0h24V0z" fill="none" />
                        <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-5 9.86a4.5 4.5 0 0 0 -3.214 1.35a1 1 0 1 0 1.428 1.4a2.5 2.5 0 0 1 3.572 0a1 1 0 0 0 1.428 -1.4a4.5 4.5 0 0 0 -3.214 -1.35zm-2.99 -4.2l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm6 0l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007z" />
                    </svg>
                    <p class="text-xl font-semibold">Sorry, no data was found</p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th><input class="form-check-input" type="checkbox" aria-label="Select all invoices"></th>
                                <th>No.</th>
                                <th><?php echo e(__('Customer Name')); ?></th>
                                <th><?php echo e(__('Customer Set')); ?></th>
                                <th><?php echo e(__('Created Date')); ?></th>
                                <th><?php echo e(__('Debts Amount')); ?></th>
                                <th><?php echo e(__('Received Amount')); ?></th>
                                <th><?php echo e(__('Balance Amount')); ?></th>
                                <th><?php echo e(__('Due Date')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody id="debt">
                            <?php $__currentLoopData = $debtsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $debt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox" aria-label="Select"></td>
                                    <td><?php echo e($debt['no']); ?></td>
                                    <td><?php echo e($debt['customer_name']); ?></td>
                                    <td><?php echo e($debt['customer_set']); ?></td>
                                    <td><?php echo e($debt['created_date']); ?></td>
                                    <td><?php echo e(number_format($debt['debts_amount'], 2)); ?></td>
                                    <td><?php echo e(number_format($debt['received_amount'], 2)); ?></td>
                                    <td><?php echo e(number_format($debt['balance_amount'], 2)); ?></td>
                                    <td><?php echo e($debt['due_date']); ?></td>
                                    <td>
                                        <?php if($debt['balance_amount'] == 0): ?>
                                            <span class="badge bg-success"><?php echo e(__('Paid')); ?></span>
                                        <?php elseif($debt['due_date'] < now()->format('Y-m-d')): ?>
                                            <span class="badge bg-danger"><?php echo e(__('Overdue')); ?></span>
                                        <?php else: ?>
                                            <span class="badge bg-warning text-dark"><?php echo e(__('Pending')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <form action="<?php echo e(route('debts.destroy', $debt['uuid'])); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm"><?php echo e(__('Delete')); ?></button>
                                        </form>
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#paymentModal" data-debt-uuid="<?php echo e($debt['uuid']); ?>">Pay</button>
                                        <a href="<?php echo e(route('debts.history', $debt['uuid'])); ?>" class="btn btn-info btn-sm">Payment History<?php echo e(__('')); ?></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
            <p class="m-0 text-secondary"> <?php echo e(__('Showing')); ?><span>1</span> <?php echo e(__('to')); ?> <span><?php echo e($debts->count()); ?></span> <?php echo e(__('of')); ?><span><?php echo e($debts->count()); ?></span> entries</p>
        </div>
    </div>
</div>


<!-- Modal for adding debtors -->
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" aria-labelledby="modal-report-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-report-label"><?php echo e(__('Create A Debtor')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('debts.store')); ?>" method="POST" id="create-debtor-form">
                <?php echo csrf_field(); ?> <!-- Add CSRF token for security -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Customer')); ?></label>
                        <select name="customer_id" class="form-control">
                            <!-- <option value="">Personal Debt</option> Option for personal debt -->
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Customer Set')); ?></label>
                        <input type="text" name="customer_set" class="form-control" placeholder="Enter Customer Set" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Amount')); ?></label>
                        <input type="number" name="amount" class="form-control" placeholder="Amount in Debt" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Due Date')); ?></label>
                        <input type="date" name="due_date" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Create New Debtor')); ?></button>
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
                <h5 class="modal-title" id="paymentModalLabel"><?php echo e(__('Make a Payment')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="paymentForm" method="POST" action="<?php echo e(route('debts.pay')); ?>">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" name="debt_uuid" id="debt_uuid" value="">
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Amount Paid')); ?></label>
                        <input type="number" name="amount_paid" class="form-control" placeholder="Enter amount" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Pay')); ?></button>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/debts/index.blade.php ENDPATH**/ ?>