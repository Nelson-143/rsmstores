<?php $__env->startSection('title' , 'Create Order'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                         <div>
                            <h3 class="card-title">
                                <?php echo e(__('New Order')); ?>

                            </h3>
                            <!-- <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addProductModal">
    <lord-icon src="https://cdn.lordicon.com/ggirntso.json" trigger="hover" style="width:30px;height:30px"></lord-icon>
    <span class="ms-2">Add Wingzz!</span>
</button> -->
                        </div>
        <!-- <?php for($i = 1; $i <= 5; $i++): ?>
            <button 
                class="btn btn-<?php echo e($i === 1 ? 'success' : 'secondary'); ?> customer-switcher" 
                data-customer-id="customer<?php echo e($i); ?>"
                id="customer-tab-<?php echo e($i); ?>"
                data-bs-toggle="tab" 
                href="#customer-<?php echo e($i); ?>" 
                role="tab" 
                aria-controls="customer-<?php echo e($i); ?>" 
                aria-selected="<?php echo e($i === 1 ? 'true' : 'false'); ?>">
                Customer <?php echo e($i); ?>

            </button>
        <?php endfor; ?> -->
    </div>
    <div class="tab-content">
        <?php for($i = 1; $i <= 5; $i++): ?>
            <div class="tab-pane fade <?php echo e($i === 1 ? 'show active' : ''); ?>" id="customer-<?php echo e($i); ?>" role="tabpanel" aria-labelledby="customer-tab-<?php echo e($i); ?>">
                <form action="<?php echo e(route('invoice.create')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row gx-3 mb-3">
                            <?php echo $__env->make('partials.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="col-md-4">
                                <label for="purchase_date" class="small my-1">
                                    <?php echo e(__('Date')); ?>

                                    <span class="text-danger">*</span>
                                </label>

                                <input name="purchase_date" id="purchase_date" type="date"
                                       class="form-control example-date-input <?php $__errorArgs = ['purchase_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(old('purchase_date') ?? now()->format('Y-m-d')); ?>"
                                       required
                                >

                                <?php $__errorArgs = ['purchase_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-4">
    <label class="small mb-1" for="customer_id">
        <?php echo e(__('Customer')); ?>

        <span class="text-danger">*</span>
    </label>

    <style>
        .dropdown-container {
            position: relative;
        }

        .form-select {
            position: relative;
            z-index: 1;
            display: none; /* Hide the original select */
        }

        .form-control {
            margin-bottom: 10px;
        }

        .custom-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 2;
            display: none;
            border: 1px solid #ccc;
            background: white;
            max-height: 200px;
            overflow-y: auto;
        }

        .custom-dropdown.open {
            display: block;
        }

        .custom-option {
            padding: 8px;
            cursor: pointer;
        }

        .custom-option:hover {
            background-color: #f0f0f0;
        }
    </style>

    <div class="dropdown-container">
        <input type="text" class="form-control" id="customer-search" placeholder="Search for customers...">
        <div class="custom-dropdown" id="customer-dropdown">
            <div class="custom-option" data-value="pass_by" selected>PASS BY</div>
            <div class="custom-option" data-value="" disabled>Select a customer:</div>
            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="custom-option" data-value="<?php echo e($customer->id); ?>">
                    <?php echo e($customer->name); ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <input type="hidden" id="customer_id" name="customer_id" value="pass_by">
    </div>

    <script>
        const searchInput = document.getElementById('customer-search');
        const dropdown = document.getElementById('customer-dropdown');
        const customerIdInput = document.getElementById('customer_id');

        searchInput.addEventListener('input', function () {
            const query = this.value.toLowerCase().trim();
            dropdown.classList.add('open');
            dropdown.querySelectorAll('.custom-option').forEach(option => {
                option.style.display = option.textContent.toLowerCase().includes(query) ? '' : 'none';
            });
        });

        searchInput.addEventListener('focus', function () {
            dropdown.classList.add('open');
        });

        searchInput.addEventListener('blur', function () {
            // Delay to allow click event to register
            setTimeout(() => {
                dropdown.classList.remove('open');
            }, 200);
        });

        dropdown.addEventListener('click', function (event) {
            if (event.target.classList.contains('custom-option')) {
                const selectedValue = event.target.getAttribute('data-value').trim();
                const selectedText = event.target.textContent.trim();

                // Set the hidden input value
                customerIdInput.value = selectedValue;

                // Set the search input value
                searchInput.value = selectedText;

                // Close the dropdown
                dropdown.classList.remove('open');
            }
        });
    </script>

    <?php $__errorArgs = ['customer_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="invalid-feedback">
        <?php echo e($message); ?>

    </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>


                            <div class="col-md-4">
                                <label class="small mb-1" for="reference">
                                    <?php echo e(__('Reference')); ?>

                                </label>

                                <input type="text" class="form-control"
                                       id="reference"
                                       name="reference"
                                       value="ORD"
                                       readonly
                                >

                                <?php $__errorArgs = ['reference'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered align-middle">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col"><?php echo e(__('Product')); ?></th>
                                        <th scope="col" class="text-center"><?php echo e(__('Quantity')); ?></th>
                                        <th scope="col" class="text-center"><?php echo e(__('Price')); ?></th>
                                        <th scope="col" class="text-center"><?php echo e(__('SubTotal')); ?></th>
                                        <th scope="col" class="text-center">
                                            <?php echo e(__('Action')); ?>

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <?php echo e($item->name); ?>

                                        </td>
                                        <td style="min-width: 170px;">
                                            <form></form>
                                            <form action="<?php echo e(route('pos.updateCartItem', $item->rowId)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="qty" required value="<?php echo e(old('qty', $item->qty)); ?>">
                                                    <input type="hidden" class="form-control" name="product_id" value="<?php echo e($item->id); ?>">

                                                    <div class="input-group-append text-center">
                                                        <button type="submit" class="btn btn-icon btn-success border-none" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sumbit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <?php echo e($item->price); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php echo e($item->subtotal); ?>

                                        </td>
                                        <td class="text-center">
                                            <form action="<?php echo e(route('pos.deleteCartItem', $item->rowId)); ?>" method="POST">
                                                <?php echo method_field('delete'); ?>
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-icon btn-outline-danger " onclick="return confirm('Are you sure you want to delete this record?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <td colspan="5" class="text-center">
                                        <?php echo e(__('Add Products')); ?>

                                    </td>
                                    <?php endif; ?>

                                    <tr>
                                        <td colspan="4" class="text-end">
                                            Total Product
                                        </td>
                                        <td class="text-center">
                                            <?php echo e(Cart::count()); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end">Subtotal</td>
                                        <td class="text-center">
                                            <?php echo e(Cart::subtotal()); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end">Tax</td>
                                        <td class="text-center">
                                            <?php echo e(Cart::tax()); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end">Total</td>
                                        <td class="text-center">
                                            <?php echo e(Cart::total()); ?>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <!-- the xif -->
                    <?php
    $outOfStock = false;
    foreach ($carts as $item) {
        // Check if the product exists in the inventory
        $product = \App\Models\Product::find($item->id);

        // Skip stock check for custom products (products not in the inventory)
        if (!$product) {
            continue;
        }

        // Check if the product is out of stock
        if ($product->quantity == 0) {
            $outOfStock = true;
            break;
        }
    }
?>
                    <script>
                        $(document).on('change', '.product-quantity', function() {
                            var selectedQty = parseInt($(this).val());
                            var availableStock = parseInt($(this).closest('tr').data('stock'));

                            if (selectedQty > availableStock) {
                                $('.add-list').prop('disabled', true);
                            } else {
                                $('.add-list').prop('disabled', false);
                            }
                        });
                    </script>

                    <div class="card-footer text-end">

                        <button type="submit" class="btn btn-success add-list mx-1 <?php echo e(Cart::count() > 0 && !$outOfStock ? '' : 'disabled'); ?>">
                            <?php echo e(__('Create Invoice')); ?>

                        </button>
                    </div>
                </form>
            </div>
        <?php endfor; ?>
    </div>
</div>

<script>
    document.querySelectorAll('.customer-switcher').forEach(button => {
        button.addEventListener('click', function () {
            document.querySelectorAll('.customer-switcher').forEach(btn => btn.classList.remove('btn-success'));
            this.classList.add('btn-success');
        });
    });
</script>
            </div>


            <div class="col-lg-5">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">
                        List Product
                        <input type="text" class="form-control float-end" id="product-search" placeholder="Search for products...">
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered align-middle">
                                    <thead class="thead-light">
                                        
                                        <tr>
                                            
                                            <th scope="col">Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Unit</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tbody id="product-list">
                                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>







                                            <td class="text-center">
                                                <?php echo e($product->name); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($product->quantity); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e($product->unit->name); ?>

                                            </td>
                                            <td class="text-center">
                                                <?php echo e(number_format($product->selling_price, 2)); ?>

                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <form action="<?php echo e(route('pos.addCartItem', $product)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                                                        <input type="hidden" name="name" value="<?php echo e($product->name); ?>">
                                                        <input type="hidden" name="selling_price" value="<?php echo e($product->selling_price); ?>">

                                                        <button type="submit" class="btn btn-icon btn-outline-primary">
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
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <th colspan="6" class="text-center" >
                                                Data not found!
                                            </th>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal modal-blur fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add Product to Cart</h5>
                <lord-icon
                    src="https://cdn.lordicon.com/ercyvufy.json"
                    trigger="in"
                    delay="1300"
                    state="in-share"
                    colors="primary:#000000"
                    style="width:30px;height:30px">
                </lord-icon>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('pos.addCartItem')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="is_custom_product" value="1"> <!-- Flag for custom product -->
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="productQuantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="productQuantity" name="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="productPrice" name="selling_price" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php if (! $__env->hasRenderedOnce('9788df4c-1ded-46dc-b3aa-54f88d5187da')): $__env->markAsRenderedOnce('9788df4c-1ded-46dc-b3aa-54f88d5187da');
$__env->startPush('page-scripts'); ?>
    <script src="<?php echo e(asset('assets/js/img-preview.js')); ?>"></script>
    <script>
    document.querySelectorAll('.customer-switcher').forEach(button => {
        button.addEventListener('click', function () {
            document.querySelectorAll('.customer-switcher').forEach(btn => btn.classList.remove('btn-success'));
            this.classList.add('btn-success');
        });
    });

    document.getElementById('product-search').addEventListener('input', function () {
        const query = this.value.toLowerCase();
        document.querySelectorAll('#product-list tr').forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(query) ? '' : 'none';
        });
    });
</script>
<?php $__env->stopPush(); endif; ?>



<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/orders/create.blade.php ENDPATH**/ ?>