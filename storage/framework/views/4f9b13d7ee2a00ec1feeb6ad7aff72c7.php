<?php $__env->startSection('title'); ?>
    <?php echo e(__('Payments History')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1><?php echo e(__('Payment History for')); ?> <?php echo e($debt->customer->name ?? 'Personal Debt'); ?></h1>
    <?php if($payments->isEmpty()): ?>
        <p>No payment history found.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th><?php echo e(__('Date')); ?></th>
                    <th><?php echo e(__('Amount Paid')); ?></th>
                    <th><?php echo e(__('Account Holder')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(\Carbon\Carbon::parse($payment->paid_at)->toFormattedDateString()); ?></td>
                        <td> <?php echo e(auth()->user()->account->currency); ?><?php echo e(number_format($payment->amount_paid, 2)); ?></td>
                        <td><?php echo e($payment->account->customer->name ?? ($debt->customer->name ?? 'Personal Debt')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/debts/history.blade.php ENDPATH**/ ?>