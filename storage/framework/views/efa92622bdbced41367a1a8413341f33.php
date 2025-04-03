<?php $__env->startSection('title'); ?>
    <?php echo e(__('Team Logs')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('me'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('me'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Damage'); ?>
<div class="container">
    <h2><?php echo e(__('Activity Logs for your Team')); ?></h2>
    <table class="table">
        <thead>
            <tr>
                <th><?php echo e(__('Date')); ?></th>
                <th><?php echo e(__('User')); ?></th>
                <th><?php echo e(__('Activity')); ?></th>
                <th><?php echo e(__('Details')); ?></th>  
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($activity->created_at); ?></td>
                    <td><?php echo e($activity->causer->name); ?></td>
                    <td><?php echo e($activity->description); ?></td>
                    <td>
                        <?php if($activity->properties->isNotEmpty()): ?>
                            <?php echo e(json_encode($activity->properties)); ?>

                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($activities->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/admin/team/logs.blade.php ENDPATH**/ ?>