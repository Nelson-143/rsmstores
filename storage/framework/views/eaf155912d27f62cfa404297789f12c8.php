<table class="table table-striped table-bordered align-middle">
    <thead class="thead-light">
        <tr>
            <th><?php echo e(__('Product')); ?></th>
            <th class="text-center"><?php echo e(__('Quantity')); ?></th>
            <th class="text-center"><?php echo e(__('Price')); ?></th>
            <th class="text-center"><?php echo e(__('SubTotal')); ?></th>
            <th class="text-center"><?php echo e(__('Action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($item->name); ?></td>
            <td>
                <form class="update-quantity-form" action="<?php echo e(route('pos.updateCartItem', $item->rowId)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-group">
                        <input type="number" class="form-control" name="qty" value="<?php echo e($item->qty); ?>" required>
                        <button type="submit" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M5 12l5 5l10 -10" />
                            </svg>
                        </button>
                    </div>
                </form>
            </td>
            <td class="text-center"><?php echo e($item->price); ?></td>
            <td class="text-center"><?php echo e($item->subtotal); ?></td>
            <td class="text-center">
                <button class="btn btn-outline-danger delete-item" data-url="<?php echo e(route('pos.deleteCartItem', $item->rowId)); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 7l16 0" />
                        <path d="M10 11l0 6" />
                        <path d="M14 11l0 6" />
                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                    </svg>
                </button>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="5" class="text-center"><?php echo e(__('Add Products')); ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <td colspan="4" class="text-end"><?php echo e(__('Total Product')); ?></td>
            <td class="text-center"><?php echo e(Cart::count()); ?></td>
        </tr>
        <tr>
            <td colspan="4" class="text-end"><?php echo e(__('Subtotal')); ?></td>
            <td class="text-center"><?php echo e(Cart::subtotal()); ?></td>
        </tr>
        <tr>
            <td colspan="4" class="text-end"><?php echo e(__('Tax')); ?></td>
            <td class="text-center"><?php echo e(Cart::tax()); ?></td>
        </tr>
        <tr>
            <td colspan="4" class="text-end"><?php echo e(__('Total')); ?></td>
            <td class="text-center"><?php echo e(Cart::total()); ?></td>
        </tr>
    </tbody>
</table><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/partials/cart_table.blade.php ENDPATH**/ ?>