<?php $__env->startSection('title' , 'Orders Create'); ?>
<div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo e(__('New Order')); ?></h3>
                            <div class="ms-auto">
                                <!--[if BLOCK]><![endif]--><?php for($i = 1; $i <= 5; $i++): ?>
                                    <button wire:click="switchTab(<?php echo e($i); ?>)"
                                            class="btn btn-<?php echo e($activeTab === $i ? 'success' : 'secondary'); ?> mx-1">
                                        Customer <?php echo e($i); ?>

                                    </button>
                                <?php endfor; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <div class="card-body">
                            <!--[if BLOCK]><![endif]--><?php if(session('success')): ?>
                                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><?php if(session('error')): ?>
                                <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label class="small my-1"><?php echo e(__('Date')); ?> <span class="text-danger">*</span></label>
                                    <input wire:model="purchaseDate" type="date" class="form-control" required>
                                </div>
                                <div class="col-md-4">
    <label class="small mb-1"><?php echo e(__('Customer')); ?> <span class="text-danger">*</span></label>
    <input wire:model.debounce.300ms="searchCustomer" type="text" class="form-control" placeholder="Search customers...">

    <div class="custom-dropdown" style="position: relative;">
        <!--[if BLOCK]><![endif]--><?php if(!empty($searchCustomer) && $filteredCustomers->isNotEmpty()): ?>
            <div class="custom-dropdown-content" style="position: absolute; z-index: 1000; background: white; width: 100%; border: 1px solid #ccc;">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $filteredCustomers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div wire:click="$set('selectedCustomers.<?php echo e($activeTab); ?>', '<?php echo e($customer->id); ?>')" 
                         class="custom-option" style="cursor: pointer; padding: 8px;">
                        <?php echo e($customer->name); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <select wire:model="selectedCustomers.<?php echo e($activeTab); ?>" class="form-control mt-2">
        <option value="pass_by">PASS BY</option>
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $filteredCustomers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </select>
</div>

                                <div class="col-md-4">
                                    <label class="small mb-1"><?php echo e(__('Reference')); ?></label>
                                    <input type="text" class="form-control" value="ORD" readonly>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__('Product')); ?></th>
                                            <th class="text-center"><?php echo e(__('Quantity')); ?></th>
                                            <th class="text-center"><?php echo e(__('Price')); ?></th>
                                            <th class="text-center"><?php echo e(__('SubTotal')); ?></th>
                                            <th class="text-center"><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $currentCart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($item->name); ?></td>
                                                <td style="min-width: 170px;">
                                                    <input wire:model.defer="item.<?php echo e($item->rowId); ?>.qty"
                                                           wire:change="updateCart('<?php echo e($item->rowId); ?>', $event.target.value)"
                                                           type="number"
                                                           class="form-control"
                                                           min="0"
                                                           value="<?php echo e($item->qty); ?>">
                                                </td>
                                                <td class="text-center"><?php echo e($item->price); ?></td>
                                                <td class="text-center"><?php echo e($item->subtotal); ?></td>
                                                <td class="text-center">
                                                    <button wire:click="removeFromCart('<?php echo e($item->rowId); ?>')"
                                                            class="btn btn-icon btn-outline-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0"/><path d="M10 11l0 6"/><path d="M14 11l0 6"/><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"/><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"/></svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr><td colspan="5" class="text-center"><?php echo e(__('Add Products')); ?></td></tr>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        <tr>
                                            <td colspan="4" class="text-end">Total Product</td>
                                            <td class="text-center"><?php echo e(Cart::instance('customer' . $activeTab)->count()); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-end">Subtotal</td>
                                            <td class="text-center"><?php echo e(Cart::instance('customer' . $activeTab)->subtotal()); ?></td>
                                        </tr>
                                        <tr>
                                        <td colspan="4" class="text-end">Tax</td>
                                        <td class="text-center"><?php echo e($currentCart->sum(fn($item) => $item->options->tax * $item->qty)); ?></td>
                                    </tr>
                                    <tr>
                                    <td colspan="4" class="text-end">Total</td>
                                    <td class="text-center"><?php echo e(Cart::instance('customer' . $activeTab)->subtotal() + $currentCart->sum(fn($item) => $item->options->tax * $item->qty)); ?></td>
                                </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="button" class="btn btn-outline-secondary mx-1" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                Add Custom Product
                            </button>
                            <button wire:click="createOrder" class="btn btn-success <?php echo e(Cart::instance('customer' . $activeTab)->count() > 0 ? '' : 'disabled'); ?>">
    <?php echo e(__('Create Invoice')); ?>

</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">
                            List Product
                            <input wire:model="searchProduct" type="text" class="form-control float-end" placeholder="Search for products...">                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Unit</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $filteredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td class="text-center"><?php echo e($product->name); ?></td>
                                                <td class="text-center"><?php echo e($product->quantity); ?></td>
                                                <td class="text-center"><?php echo e($product->unit->name); ?></td>
                                                <td class="text-center"><?php echo e(number_format($product->selling_price, 2)); ?></td>
                                                <td>
                                                    <button wire:click="addToCart(<?php echo e($product->id); ?>)"
                                                            class="btn btn-icon btn-outline-primary">
                                                        <?php if (isset($component)) { $__componentOriginalc07988cb09c611e8f891a1cea7c75c66 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc07988cb09c611e8f891a1cea7c75c66 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon.cart','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon.cart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc07988cb09c611e8f891a1cea7c75c66)): ?>
<?php $attributes = $__attributesOriginalc07988cb09c611e8f891a1cea7c75c66; ?>
<?php unset($__attributesOriginalc07988cb09c611e8f891a1cea7c75c66); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc07988cb09c611e8f891a1cea7c75c66)): ?>
<?php $component = $__componentOriginalc07988cb09c611e8f891a1cea7c75c66; ?>
<?php unset($__componentOriginalc07988cb09c611e8f891a1cea7c75c66); ?>
<?php endif; ?>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr><td colspan="5" class="text-center">No products found!</td></tr>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Product Modal -->
    <div class="modal modal-blur fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product to Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addCustomProduct">
                        <div class="mb-3">
                            <label for="customProductName" class="form-label">Product Name</label>
                            <input wire:model="customProductName" type="text" class="form-control" id="customProductName" required>
                        </div>
                        <div class="mb-3">
                            <label for="customProductQuantity" class="form-label">Quantity</label>
                            <input wire:model="customProductQuantity" type="number" class="form-control" id="customProductQuantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="customProductPrice" class="form-label">Price</label>
                            <input wire:model="customProductPrice" type="number" class="form-control" id="customProductPrice" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/livewire/create-order.blade.php ENDPATH**/ ?>