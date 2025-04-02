<?php $__env->startSection('title', 'Loan Calculation Result'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-xl">
    <div class="card shadow-sm p-4 <?php echo e($affordable ? 'border-success' : 'border-danger'); ?>" style="border: 3px solid;">
        <h3 class="mb-4 text-center <?php echo e($affordable ? 'text-success' : 'text-danger'); ?>"><?php echo e(__('Loan Calculation Result')); ?></h3>
        <div class="card-body bg-light rounded">
            <div class="row g-3">
                <!-- Loan Amount -->
                <div class="col-md-3 text-center">
                    <h5 class="fw-bold text-primary"><?php echo e(__('Loan Amount')); ?></h5>
                    <p class="fs-5"><?php echo e(auth()->user()->account->currency); ?> <?php echo e(number_format($request['amount'], 2)); ?></p>
                </div>
                <!-- Monthly Payment -->
                <div class="col-md-3 text-center">
                    <h5 class="fw-bold text-primary"><?php echo e(__('Monthly Payment')); ?></h5>
                    <p class="fs-5"><?php echo e(auth()->user()->account->currency); ?> <?php echo e(number_format($monthly_payment, 2)); ?></p>
                </div>
                <!-- Total Interest -->
                <div class="col-md-3 text-center">
                    <h5 class="fw-bold text-primary"><?php echo e(__('Total Interest')); ?></h5>
                    <p class="fs-5"><?php echo e(auth()->user()->account->currency); ?> <?php echo e(number_format($total_interest, 2)); ?></p>
                </div>
                <!-- Affordability -->
                <div class="col-md-3 text-center">
                    <h5 class="fw-bold text-primary"><?php echo e(__('Affordability')); ?></h5>
                    <p class="fs-5 <?php echo e($affordable ? 'text-success' : 'text-danger'); ?>">
                        <?php echo e($affordable ? __('Affordable ✅') : __('Not Affordable ❌')); ?>

                    </p>
                </div>
            </div>
        </div>
        <div class="mt-3 text-center">
            <a href="<?php echo e(route('loan.calculator')); ?>" class="btn btn-outline-secondary btn-lg"><?php echo e(__('Back to Calculator')); ?></a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/liabilities/calculator-result.blade.php ENDPATH**/ ?>