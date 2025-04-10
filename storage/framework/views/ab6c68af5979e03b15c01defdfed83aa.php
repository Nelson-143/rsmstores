<?php $__env->startSection('title'); ?>
    <?php echo e(__('Budgets Manager')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('me'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('me'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('budget'); ?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?php echo e(__('Budget Overview')); ?></h3>
        <div class="card-actions">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBudgetModal">
               <?php echo e(__(' Add Budget')); ?>

            </button>
            <button class="btn btn-secondary ms-2" data-bs-toggle="modal" data-bs-target="#categoryModal">
                        <i class="fas fa-tags me-2"></i><?php echo e(__('Manage Categories')); ?>

                    </button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Budget Summary -->
            <div class="col-md-6">
                <h4 class="mb-3"><?php echo e(__('Summary')); ?></h4>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo e(__('Total Budget')); ?>

                        <span class="badge bg-primary rounded-pill"> <?php echo e(auth()->user()->account->currency); ?> <?php echo e(number_format($budgets->sum('amount'))); ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo e(__('Expenses')); ?>

                        <span class="badge bg-danger rounded-pill"> <?php echo e(auth()->user()->account->currency); ?><?php echo e(number_format($expenses->sum('amount'))); ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo e(__('Remaining')); ?>

                    <span class="badge bg-success rounded-pill"> <?php echo e(auth()->user()->account->currency); ?> <?php echo e(number_format($budgets->sum('amount') - $expenses->sum('amount'))); ?></span>                    </li>
                </ul>
            </div>

            <!-- Progress -->
            <div class="col-md-6">
                <h4 class="mb-3"><?php echo e(__('Progress')); ?></h4>
               <div class="progress mb-3">
    <?php
        $percentage = $budgets->sum('amount') > 0 ? (($expenses->sum('amount') ?? 0) / $budgets->sum('amount')) * 100 : 0;
    ?>
    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo e($percentage); ?>%;" aria-valuenow="<?php echo e($percentage); ?>" aria-valuemin="0" aria-valuemax="100">
        <?php echo e(round($percentage, 2)); ?>%
    </div>
</div>
                <p class="text-muted"><?php echo e(__('You have used')); ?> <?php echo e(round($percentage, 2)); ?>% <?php echo e(__('of your total budget')); ?>.</p>
                <canvas id="growthChart"></canvas>
            </div>
        </div>

        <!-- Budget Details Table -->
        <h4 class="mt-4"><?php echo e(__('Budget Details')); ?></h4>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('Category')); ?></th>
                        <th><?php echo e(__('Allocated')); ?></th>
                        <th><?php echo e(__('Spent')); ?></th>
                        <th><?php echo e(__('Remaining')); ?></th>
                        <th><?php echo e(__('Action')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $budgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $budget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($budget->category->name); ?></td>
                            <td> <?php echo e(auth()->user()->account->currency); ?> <?php echo e(number_format($budget->amount)); ?></td>
                            <td> <?php echo e(auth()->user()->account->currency); ?> <?php echo e(number_format($budget->spent)); ?></td>
                            <td> <?php echo e(auth()->user()->account->currency); ?> <?php echo e(number_format($budget->amount - $budget->spent)); ?></td>
                            <td>
                                <button class="btn btn-sm btn-secondary"><?php echo e(__('Edit')); ?></button>
                                <button class="btn btn-sm btn-danger"><?php echo e(__('Delete')); ?></button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6">No budgets available.</td>
                        </tr>
                    <?php endif; ?>
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
                <h5 class="modal-title"><?php echo e(__('Manage Categories')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="categoryForm" action="<?php echo e(route('budget-categories.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category-name" class="form-label"><?php echo e(__('Category Name')); ?></label>
                        <input type="text" id="category-name" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
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
                <h5 class="modal-title" id="createBudgetModalLabel"><?php echo e(__('Create Budget')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="<?php echo e(route('budgets.store')); ?>">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category_id" class="form-label"><?php echo e(__('Category')); ?></label>
                        <select id="budget-category" name="budget_category_id" class="form-select" required>
                            <option value="" selected disabled><?php echo e(__('')); ?></option>
                            <?php $__currentLoopData = $budgetCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $budgetCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($budgetCategory->id); ?>"><?php echo e($budgetCategory->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label"><?php echo e(__('Allocated Amount')); ?></label>
                        <input type="number" class="form-control" id="amount" name="amount" min="50" step="50" oninput="this.value = Math.ceil(this.value / 50) * 50" required>
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label"><?php echo e(__('Start Date')); ?></label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label"><?php echo e(__('End Date')); ?></label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('growthChart').getContext('2d');
    
    // Calculate the maximum value from the growth data
    const maxValue = Math.max(...<?php echo json_encode($growthData['values']); ?>);
    
    // Determine the step size based on the maximum value
    const stepSize = Math.ceil(maxValue / 50) * 50; // Round up to the nearest 50

    const growthChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($growthData['dates']); ?>,
            datasets: [{
                label: 'Budget Growth',
                data: <?php echo json_encode($growthData['values']); ?>,
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
                        text: 'Amount  <?php echo e(auth()->user()->account->currency); ?>'
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

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/budgets/index.blade.php ENDPATH**/ ?>