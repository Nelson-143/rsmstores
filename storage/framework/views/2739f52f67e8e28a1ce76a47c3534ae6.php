<?php $__env->startSection('title', 'Customer Order Details'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e(__('Customer Order Details')); ?></h3>
                    </div>
                    
                    <div class="card-body">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-4">
                                <label for="order_date" class="small my-1">
                                    <?php echo e(__('Order Date')); ?>

                                </label>
                                <input name="order_date" id="order_date" type="date"
                                       class="form-control"
                                       value="<?php echo e($order->created_at->format('Y-m-d')); ?>"
                                       readonly>
                            </div>

                            <div class="col-md-4">
                                <label class="small mb-1" for="customer_name">
                                    <?php echo e(__('Customer Name')); ?>

                                </label>
                                <input type="text" class="form-control"
                                       id="customer_name"
                                       name="customer_name"
                                       value="<?php echo e($order->customer->name ?? 'N/A'); ?>"
                                       readonly>
                            </div>

                            <div class="col-md-4">
                                <label class="small mb-1" for="reference"><?php echo e(__('Reference')); ?></label>
                                <input type="text" class="form-control"
                                       id="reference"
                                       name="reference"
                                       value="<?php echo e($order->reference); ?>"
                                       readonly>
                            </div>
                        </div>

                        <!-- Order Items Table -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Product')); ?></th>
                                        <th class="text-center"><?php echo e(__('Quantity')); ?></th>
                                        <th class="text-center"><?php echo e(__('Price')); ?></th>
                                        <th class="text-center"><?php echo e(__('SubTotal')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->product->name ?? 'N/A'); ?></td>
                                            <td class="text-center"><?php echo e($item->quantity ?? '0'); ?></td>
                                            <td class="text-center"><?php echo e(number_format($item->unitcost, 2)); ?></td>
                                            <td class="text-center"><?php echo e(number_format($item->total, 2)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Order Total -->
                        <div class="row mt-4">
                            <div class="col-md-6 offset-md-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="text-end"><?php echo e(__('Total')); ?></th>
                                        <td class="text-end"><?php echo e(number_format($order->total, 2)); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/orders/show.blade.php ENDPATH**/ ?>