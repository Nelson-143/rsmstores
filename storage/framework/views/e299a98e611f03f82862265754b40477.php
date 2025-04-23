<?php $__env->startSection('title', 'Orders Create'); ?>
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

                            <h3>Cart (Tab <?php echo e($activeTab); ?>)</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $currentCart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->name); ?></td>
                                            <td><?php echo e(number_format($item->price, 2)); ?></td>
                                            <td>
                                                <input type="number" wire:model.debounce.500ms="cartQty.<?php echo e($item->rowId); ?>"
                                                       value="<?php echo e($item->qty); ?>" min="1" class="form-control w-25 d-inline"
                                                       wire:change="updateCart('<?php echo e($item->rowId); ?>', $event.target.value)">
                                            </td>
                                            <td><?php echo e(number_format($item->subtotal, 2)); ?></td>
                                            <td>
                                                <button wire:click="removeFromCart('<?php echo e($item->rowId); ?>')" class="btn btn-icon btn-danger btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
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
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-end">Subtotal</td>
                                        <td class="text-center"><?php echo e(number_format(Cart::instance('customer' . $activeTab)->subtotalFloat(), 2)); ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end">Tax (<?php echo e($taxRate); ?>%)</td>
                                        <td class="text-center"><?php echo e(number_format($currentCart->sum(fn($item) => $item->options->tax * $item->qty), 2)); ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end">Total</td>
                                        <td class="text-center"><?php echo e(number_format(Cart::instance('customer' . $activeTab)->subtotalFloat() + $currentCart->sum(fn($item) => $item->options->tax * $item->qty), 2)); ?></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="card-footer text-end">
                                <button type="button" class="btn btn-outline-secondary mx-1" data-bs-toggle="modal" data-bs-target="#addProductModal">
                                    Add Custom Product
                                </button>
                                <button wire:click="createOrder" class="btn btn-success <?php echo e($currentCart->count() > 0 ? '' : 'disabled'); ?>">
                                    <?php echo e(__('Create Invoice')); ?>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">
                            <h3 class="card-title">Product List</h3>
                            <div class="ms-auto">
                                <div class="btn-group">
                                    <button wire:click="toggleProductView('all')"
                                            class="btn btn-<?php echo e($productView === 'all' ? 'primary' : 'outline-primary'); ?>">
                                        All Products
                                    </button>
                                    <button wire:click="toggleProductView('shelf')"
                                            class="btn btn-<?php echo e($productView === 'shelf' ? 'primary' : 'outline-primary'); ?>">
                                        Shelf Products
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <input wire:model.debounce.500ms="searchProduct" type="text" class="form-control mb-3" placeholder="Search for products..." style="width: 100%;">
                            <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
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
                                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $filteredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php
                                                $shelfProduct = $productView === 'shelf' ? $shelfProducts[$index] : null;
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo e($product->name); ?></td>
                                                <td class="text-center">
                                                    <!--[if BLOCK]><![endif]--><?php if($productView === 'shelf' && $shelfProduct): ?>
                                                        <div class="input-group w-100">
                                                            <input type="number" step="0.01"
                                                                   wire:model.debounce.500ms="shelfQuantities.<?php echo e($product->id); ?>"
                                                                   class="form-control">
                                                            <button wire:click="updateShelfStock(<?php echo e($product->id); ?>, <?php echo e($shelfQuantities[$product->id] ?? 0); ?>)"
                                                                    class="btn btn-primary btn-sm">Update</button>
                                                        </div>
                                                        <small>(Current: <?php echo e(number_format($shelfProduct->quantity, 2)); ?>)</small>
                                                    <?php else: ?>
                                                        <?php echo e(number_format($product->quantity, 2)); ?>

                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                </td>
                                                <td class="text-center">
                                                    <!--[if BLOCK]><![endif]--><?php if($productView === 'shelf' && $shelfProduct): ?>
                                                        <?php echo e($shelfProduct->unit_name); ?>

                                                    <?php else: ?>
                                                        <?php echo e($product->unit ? $product->unit->name : 'Piece'); ?>

                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                </td>
                                                <td class="text-center">
                                                    <!--[if BLOCK]><![endif]--><?php if($productView === 'shelf' && $shelfProduct): ?>
                                                        <?php echo e(number_format($shelfProduct->unit_price, 2)); ?>

                                                    <?php else: ?>
                                                        <?php echo e(number_format($product->selling_price, 2)); ?>

                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                </td>
                                                <td class="text-center">
                                                    <!--[if BLOCK]><![endif]--><?php if($productView === 'shelf' && $shelfProduct): ?>
                                                        <button wire:click="addToCart(<?php echo e($product->id); ?>, <?php echo e($shelfProduct->id); ?>)"
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
                                                    <?php else: ?>
                                                        <button wire:click="addToShelf(<?php echo e($product->id); ?>)"
                                                                class="btn btn-icon btn-outline-secondary btn-sm">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-category-plus">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                                <path d="M4 4h6v6h-6zm10 0h6v6h-6zm-10 10h6v6h-6zm10 3h6m-3 -3v6" />
                                                            </svg>
                                                        </button>
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
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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

    <div class="modal modal-blur fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Custom Product</h5>
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
</div>
<?php /**PATH C:\rstoresV1R\rsmstores\resources\views/livewire/create-order.blade.php ENDPATH**/ ?>