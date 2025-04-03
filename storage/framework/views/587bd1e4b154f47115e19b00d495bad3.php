<?php $__env->startSection('title', 'Create Purchase'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-body">
    <div class="container-xl">
        <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
        <div class="row row-cards">
            <form action="<?php echo e(route('purchases.store')); ?>" method="POST" id="purchaseForm">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo e(__('Create Purchase')); ?></h3>
                                <div class="card-actions btn-actions">
                                    <a href="<?php echo e(route('purchases.index')); ?>" class="btn-action">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M18 6l-12 12"></path>
                                            <path d="M6 6l12 12"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                        <label for="date" class="form-label required"><?php echo e(__('Purchase Date')); ?></label>
                                        <input type="date" name="date" class="form-control" value="<?php echo e(old('date') ?? now()->format('Y-m-d')); ?>" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="supplier_id" class="form-label required"><?php echo e(__('Supplier')); ?></label>
                                        <select name="supplier_id" class="form-select" required>
                                            <option value=""><?php echo e(__('Select Supplier')); ?></option>
                                            <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="reference" class="form-label required"><?php echo e(__('Reference')); ?></label>
                                        <input type="text" name="reference" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12">
                                        <label for="tax_rate" class="form-label required"> <?php echo e(__('Tax Rate')); ?>(%)</label>
                                        <input type="number" name="tax_rate" class="form-control" required min="0" step="0.01">
                                    </div>
                                </div>
                                <div id="products">
                                    <div class="row gx-3 mb-3" id="product_0">
                                        <div class="col-md-4">
                                            <label for="product_id_0" class="form-label required"><?php echo e(__('Product')); ?></label>
                                            <select name="products[0][id]" class="form-select" required onchange="updateUnitCost(this)">
                                                <option value=""><?php echo e(__('Select Product')); ?></option>
                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($product->id); ?>" data-buying-price="<?php echo e($product->buying_price); ?>"><?php echo e($product->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="quantity_0" class="form-label required"><?php echo e(__('Quantity')); ?></label>
                                            <input type="number" name="products[0][quantity]" class="form-control" required min="1">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="unitcost_0" class="form-label"><?php echo e(__('Unit Cost')); ?></label>
                                            <input type="number" name="products[0][unitcost]" class="form-control" required min="0" step="0.01" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end" style="direction:rtl">
                                <button type="submit" class="btn btn-primary"><?php echo e(__('Create Purchase')); ?></button>
                                <button type="button" id="addProduct" class="btn btn-secondary"><?php echo e(__('Add Another Product')); ?></button>
                            </div>
                            <div id="errorMessages" class="mt-3" style="display:none;">
                                <div class="alert alert-danger" role="alert"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const products = <?php echo json_encode($products, 15, 512) ?>;

    function updateUnitCost(selectElement) {
        const selectedOption = selectElement.options[selectElement.selectedIndex];
        const buyingPrice = selectedOption.getAttribute('data-buying-price');
        const productDiv = selectElement.closest('.row');
        const unitCostInput = productDiv.querySelector('input[name$="[unitcost]"]');
        unitCostInput.value = buyingPrice || '';
    }

    document.getElementById('addProduct').addEventListener('click', function () {
        const productsDiv = document.getElementById('products');
        const productCount = productsDiv.children.length;
        productsDiv.appendChild(createProductEntry(productCount));
    });

    function createProductEntry(count) {
        const newProductDiv = document.createElement('div');
        newProductDiv.classList.add('row', 'gx-3', 'mb-3');
        newProductDiv.id = `product_${count}`;

        let optionsHtml = '<option value="">Select Product</option>';
        products.forEach(product => {
            optionsHtml += `<option value="${product.id}" data-buying-price="${product.buying_price}">${product.name}</option>`;
        });

        newProductDiv.innerHTML = `
            <div class="col-md-4">
                <label for="product_id_${count}" class="form-label required">Product ${count + 1}</label>
                <select name="products[${count}][id]" class="form-select" required onchange="updateUnitCost(this)">
                    ${optionsHtml}
                </select>
            </div>
            <div class="col-md-4">
                <label for="quantity_${count}" class="form-label required">Quantity</label>
                <input type="number" name="products[${count}][quantity]" class="form-control" required min="1">
            </div>
            <div class="col-md-4">
                <label for="unitcost_${count}" class="form-label">Unit Cost</label>
                <input type="number" name="products[${count}][unitcost]" class="form-control" required min="0" step="0.01" readonly>
            </div>
        `;

        return newProductDiv;
    }

    document.getElementById('purchaseForm').addEventListener('submit', function (event) {
        const errorMessages = document.getElementById('errorMessages');
        const alertDiv = errorMessages.querySelector('.alert');
        alertDiv.innerHTML = '';
        let hasErrors = false;

        document.querySelectorAll('.row[id^="product_"]').forEach((productDiv, index) => {
            const quantity = productDiv.querySelector('input[name$="[quantity]"]').value;
            const unitcost = productDiv.querySelector('input[name$="[unitcost]"]').value;

            if (!quantity || quantity < 1) {
                hasErrors = true;
                alertDiv.innerHTML += `Product ${index + 1}: Please enter a valid quantity.<br>`;
            }
            if (!unitcost || unitcost < 0) {
                hasErrors = true;
                alertDiv.innerHTML += `Product ${index + 1}: Please enter a valid unit cost.<br>`;
            }
        });

        if (hasErrors) {
            event.preventDefault();
            errorMessages.style.display = 'block';
        } else {
            errorMessages.style.display = 'none';
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/purchases/create.blade.php ENDPATH**/ ?>