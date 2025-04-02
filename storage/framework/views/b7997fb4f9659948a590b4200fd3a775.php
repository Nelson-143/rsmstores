<?php $__env->startSection('title' , 'Suppliers'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-body">
        <div class="container-xl">
            <?php if($suppliers->isEmpty()): ?>
            <div class="alert alert-warning">
                <h3 class="mb-1">No suppliers available</h3>
                <p>It seems there are no suppliers available at the moment. Try adding new suppliers later.</p>
                <a href="<?php echo e(route('suppliers.create')); ?>" class="btn btn-primary">Add Supplier</a>
            </div>
            <?php else: ?>
            <div class="container-xl">
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <h3 class="mb-1">Success</h3>
                        <p><?php echo e(session('success')); ?></p>

                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                <?php endif; ?>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('tables.supplier-table');

$__html = app('livewire')->mount($__name, $__params, 'lw-3522312492-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
        <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/suppliers/index.blade.php ENDPATH**/ ?>