<table class="table table-striped table-bordered align-middle">
    <thead class="thead-light">
        <tr>
            <th><?php echo e(__('Name')); ?></th>
            <th><?php echo e(__('Quantity')); ?></th>
            <th><?php echo e(__('Unit')); ?></th>
            <th><?php echo e(__('Price')); ?></th>
            <th><?php echo e(__('Action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr class="product-item">
            <td><?php echo e($product->name); ?></td>
            <td class="text-center"><?php echo e($product->quantity); ?></td>
            <td class="text-center"><?php echo e($product->unit->name); ?></td>
            <td class="text-center"><?php echo e(number_format($product->selling_price, 2)); ?></td>
            <td class="text-center">
                <form class="add-to-cart-form" action="<?php echo e(route('pos.addCartItem', $product)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                    <input type="hidden" name="name" value="<?php echo e($product->name); ?>">
                    <input type="hidden" name="selling_price" value="<?php echo e($product->selling_price); ?>">
                    <button type="submit" class="btn btn-outline-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M17 17h-11v-14h-2" />
                            <path d="M6 5l14 1l-1 7h-13" />
                        </svg>
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="5" class="text-center"><?php echo e(__('No products found')); ?></td>
        </tr>
        <?php endif; ?>
    </tbody>
</table><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/partials/product_list.blade.php ENDPATH**/ ?>