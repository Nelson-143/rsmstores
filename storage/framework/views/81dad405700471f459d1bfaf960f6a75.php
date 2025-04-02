<?php $__env->startSection('title', 'Loan Calculator'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-xl">
    <div class="card shadow-sm p-4">
        <h3 class="mb-4 text-center"><?php echo e(__('Loan Calculator')); ?></h3>
        <h5 class="text-muted text-center"><?php echo e(__('Check if the loan is affordable for your business')); ?></h5>
        <form action="<?php echo e(route('calculate.loan')); ?>" method="POST" class="mt-4">
            <?php echo csrf_field(); ?>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold"><?php echo e(__('Loan Amount')); ?></label>
                    <input type="number" name="amount" class="form-control" placeholder="Enter loan amount" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold"><?php echo e(__('Interest Rate')); ?> (%)</label>
                    <input type="number" name="interest_rate" class="form-control" placeholder="e.g., 5" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold"><?php echo e(__('Term (Years)')); ?></label>
                    <input type="number" name="term" class="form-control" placeholder="e.g., 3" required>
                </div>
            </div>
            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-success btn-lg w-50"><?php echo e(__('Calculate')); ?></button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/liabilities/calculator.blade.php ENDPATH**/ ?>