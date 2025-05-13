<?php $__env->startSection('title', 'Manage Shelf Products'); ?>
<div>
    <!--Shelf view-->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?php echo e(__('Manage Shelf Products')); ?></h3>
                    <div class="card-actions">
                        <button type="button" class="btn btn-info me-2" data-bs-toggle="modal" data-bs-target="#logsModal">
                            <?php echo e(__('View Logs')); ?>

                        </button>
                        <a href="<?php echo e(route('pos.index')); ?>" class="btn btn-secondary">
                            <?php echo e(__('Back to POS')); ?>

                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!--[if BLOCK]><![endif]--><?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <!--[if BLOCK]><![endif]--><?php if(session('error')): ?>
                        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <div class="mb-3">
                        <h4><?php echo e(__('Add New Shelf Product')); ?></h4>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label"><?php echo e(__('Product')); ?></label>
                                <select wire:model="newShelfProduct.product_id" class="form-select">
                                    <option value=""><?php echo e(__('Select a product')); ?></option>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </select>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newShelfProduct.product_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            
                            <div class="col-md-2">
                                <label class="form-label"><?php echo e(__('Unit Name')); ?></label>
                                <input type="text" wire:model="newShelfProduct.unit_name" class="form-control">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newShelfProduct.unit_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            
                            <div class="col-md-2">
                                <label class="form-label"><?php echo e(__('Unit Price')); ?></label>
                                <input type="number" step="0.01" wire:model="newShelfProduct.unit_price" class="form-control">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newShelfProduct.unit_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            
                            <div class="col-md-2">
                                <label class="form-label"><?php echo e(__('Conversion Factor')); ?></label>
                                <input type="number" step="0.01" wire:model="newShelfProduct.conversion_factor" class="form-control">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newShelfProduct.conversion_factor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            
                            <div class="col-md-2">
                                <label class="form-label"><?php echo e(__('Quantity')); ?></label>
                                <input type="number" step="0.01" wire:model="newShelfProduct.quantity" class="form-control">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newShelfProduct.quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            
                            <div class="col-md-1 d-flex align-items-end">
                                <button wire:click="addShelfProduct" class="btn btn-primary">
                                    <?php echo e(__('Add')); ?>

                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Unit Name</th>
                                    <th>Unit Price</th>
                                    <th>Conversion Factor</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $shelfProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $shelfProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr wire:key="shelf-product-<?php echo e($id); ?>">
        <td><?php echo e($shelfProduct['product']['name'] ?? 'N/A'); ?></td>
        <td>
            <input type="text" 
                   wire:model="shelfProducts.<?php echo e($id); ?>.unit_name"
                   class="form-control">
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ["shelfProducts.{$id}.unit_name"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </td>
        <td>
            <input type="number" step="0.01"
                   wire:model.debounce.500ms="shelfProducts.<?php echo e($id); ?>.unit_price"
                   class="form-control">
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ["shelfProducts.{$id}.unit_price"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </td>
        <td>
            <input type="number" step="0.01"
                   wire:model.debounce.500ms="shelfProducts.<?php echo e($id); ?>.conversion_factor"
                   class="form-control">
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ["shelfProducts.{$id}.conversion_factor"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </td>
        <td>
            <input type="number" step="0.01"
                   wire:model.debounce.500ms="shelfProducts.<?php echo e($id); ?>.quantity"
                   class="form-control">
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ["shelfProducts.{$id}.quantity"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </td>
        <td>
            <button wire:click="updateShelfProduct(<?php echo e($id); ?>)" 
                    class="btn btn-primary btn-sm me-1">
                Update
            </button>
            <button wire:click="removeShelfProduct(<?php echo e($id); ?>)" 
                    class="btn btn-danger btn-sm">
                Remove
            </button>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </tbody>
                        </table>
                    </div>

                    <!-- Debugging Output -->
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Logs Modal -->
    <div class="modal modal-blur fade" id="logsModal" tabindex="-1" aria-labelledby="logsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logsModalLabel"><?php echo e(__('Shelf Stock Logs')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity Change</th>
                                    <th>Action</th>
                                    <th>User</th>
                                    <th>Notes</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($log->shelfProduct->product->name ?? 'N/A'); ?></td>
                                        <td><?php echo e(number_format($log->quantity_change, 2)); ?></td>
                                        <td><?php echo e(ucfirst($log->action)); ?></td>
                                        <td><?php echo e($log->user->name ?? 'Unknown'); ?></td>
                                        <td><?php echo e($log->notes); ?></td>
                                        <td><?php echo e($log->created_at->format('Y-m-d H:i:s')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="text-center"><?php echo e(__('No logs found')); ?></td>
                                    </tr>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\rstoresV1R\rsmstores\resources\views/livewire/shelf-products.blade.php ENDPATH**/ ?>