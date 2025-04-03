<?php $__env->startSection('title', 'Expenses'); ?>

<?php $__env->startSection('me'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('me'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('matumizi'); ?>
<div class="container-xl">
    <!-- Page Header -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title"><?php echo e(__('Expense Management')); ?></h2>
                <div class="text-muted mt-1"><?php echo e(__('Track and manage your business expenses')); ?></div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addExpenseModal">
                        <i class="fas fa-plus me-2"></i><?php echo e(__('Add Expense')); ?>

                    </button>
                    <button class="btn btn-secondary ms-2" data-bs-toggle="modal" data-bs-target="#categoryModal">
                        <i class="fas fa-tags me-2"></i><?php echo e(__('Manage Categories')); ?>

                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="filter-category" class="form-label"><?php echo e(__('Category')); ?></label>
            <select id="expense-category" name="expense_category_id" class="form-select" required>
                <option value="" selected disabled><?php echo e(__('Select Expense Category')); ?></option>
                <?php $__currentLoopData = $expenseCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expenseCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($expenseCategory->id); ?>"><?php echo e($expenseCategory->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

        </div>
        <div class="col-md-4">
            <label for="filter-date-from" class="form-label"><?php echo e(__('From Date')); ?></label>
            <input type="date" id="filter-date-from" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="filter-date-to" class="form-label"><?php echo e(__('To Date')); ?></label>
            <input type="date" id="filter-date-to" class="form-control">
        </div>
        <div class="col-md-12 mt-2">
            <button class="btn btn-secondary w-100" onclick="filterExpenses()"><?php echo e(__('Apply Filters')); ?></button>
        </div>
    </div>

    <!-- Expense Trends Chart -->
    <div class="card mb-4">
    <div class="card-header">
        <h3 class="card-title"><?php echo e(__('Expense Trends')); ?></h3>
    </div>
    <div class="card-body">
        <canvas id="expenseTrendsChart"></canvas>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Expense Table -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?php echo e(__('Expense Records')); ?></h3>
        </div>
        <div class="table-responsive">
            <table class="table table-vcenter card-table" id="expensesTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th><?php echo e(__('Category')); ?></th>
                        <th><?php echo e(__('Amount')); ?></th>
                        <th><?php echo e(__('Description')); ?></th>
                        <th><?php echo e(__('Date')); ?></th>
                        <th><?php echo e(__('Attachment')); ?></th>
                        <th><?php echo e(__('Action')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($expense->category->name); ?></td>
                            <td><?php echo e(number_format($expense->amount, 2)); ?></td>
                            <td><?php echo e($expense->description); ?></td>
                        <td><?php echo e($expense->expense_date); ?>

                        </td>
                        <td>
                                <?php if($expense->attachment): ?>
                                    <a href="<?php echo e(asset('storage/'.$expense->attachment)); ?>" class="btn btn-sm btn-link" target="_blank">View<?php echo e(__('')); ?></a>
                                <?php else: ?>
                                    N/A
                                <?php endif; ?>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-danger" onclick="deleteExpense('<?php echo e($expense->id); ?>')">Delete<?php echo e(__('')); ?></button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                <p>No expenses found</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <?php echo e($expenses->links()); ?>

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
            <form id="categoryForm" action="<?php echo e(route('expense-categories.store')); ?>" method="POST">
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
<!-- Add Expense Modal -->
<div class="modal modal-blur fade" id="addExpenseModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__('Add Expense')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="expenseForm" action="<?php echo e(route('expenses.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <!-- Category -->
                    <div class="mb-3">
                        <label for="expense-category" class="form-label"><?php echo e(__('Category')); ?></label>
                        <select id="expense-category" name="expense_category_id" class="form-select" required>
                        <option value="" selected disabled><?php echo e(__('Select Expense Category')); ?></option>
                        <?php $__currentLoopData = $expenseCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expenseCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($expenseCategory->id); ?>"><?php echo e($expenseCategory->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                    </div>

                    <!-- Amount -->
                    <div class="mb-3">
                        <label for="expense-amount" class="form-label"><?php echo e(__('Amount')); ?></label>
                        <input type="number" step="0.01" id="expense-amount" name="amount" class="form-control" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="expense-description" class="form-label"><?php echo e(__('Description')); ?></label>
                        <textarea id="expense-description" name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <!-- Date -->
                    <div class="mb-3">
                        <label for="expense-date" class="form-label"><?php echo e(__('Expense Date')); ?></label>
                        <input type="date" id="expense-date" name="expense_date" class="form-control" required>
                    </div>

                    <!-- Attachment (Optional) -->
                    <div class="mb-3">
                        <label for="expense-attachment" class="form-label"><?php echo e(__('Attachment (Optional)')); ?></label>
                        <input type="file" id="expense-attachment" name="attachment" class="form-control">
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Save Expense')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function filterExpenses() {
        const category = document.getElementById('filter-category').value;
        const dateFrom = document.getElementById('filter-date-from').value;
        const dateTo = document.getElementById('filter-date-to').value;

        let url = `/expenses?category=${category}&date_from=${dateFrom}&date_to=${dateTo}`;
        window.location.href = url;
    }

    function deleteExpense(id) {
        if (confirm('Are you sure you want to delete this expense?')) {
            fetch(`/expenses/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
            })
            .then(response => {
                if (response.ok) {
                    alert('Expense deleted successfully!');
                    location.reload();
                } else {
                    alert('Failed to delete the expense.');
                }
            });
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const ctx = document.getElementById('expenseTrendsChart').getContext('2d');
        const expenseTrendsData = <?php echo json_encode($expenseTrendsData, 15, 512) ?>;

        // Validate and prepare data
        if (!Array.isArray(expenseTrendsData)) {
            console.error('Invalid data format:', expenseTrendsData);
            expenseTrendsData = [];
        }

        const labels = expenseTrendsData.length ? expenseTrendsData.map(item => item?.date || 'Unknown') : ['No Data'];
        const data = expenseTrendsData.length ? expenseTrendsData.map(item => item?.total || 0) : [0];

        // Debugging: Log data to the console
        console.log('Raw Data:', expenseTrendsData);
        console.log('Labels:', labels);
        console.log('Data:', data);

        // Initialize the chart
        const expenseTrendsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Expenses',
                    data: data,
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    tension: 0.4,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 0,
                        suggestedMax: Math.max(...data, 100) // Ensure visibility even with low data
                    }
                },
                plugins: {
                    legend: { position: 'top' },
                    title: { display: true, text: 'Expense Trends Over Time' },
                },
            },
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/expenses/index.blade.php ENDPATH**/ ?>