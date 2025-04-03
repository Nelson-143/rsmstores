<?php $__env->startSection('title', 'Show Purchase'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-body">
    <div class="container-xl">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">
                            <?php echo e(__('Purchase Details')); ?>

                        </h3>
                    </div>

                    <div class="card-actions btn-actions">
                        <div class="dropdown">
                            <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                    <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                    <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="<?php echo e(route('purchases.edit', $purchase->uuid)); ?>"
                                    class="dropdown-item text-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                        <path d="M13.5 6.5l4 4" />
                                    </svg>
                                    <?php echo e(__('Edit Purchase')); ?>

                                </a>

                                <?php if($purchase->status === \App\Enums\PurchaseStatus::PENDING): ?>
                                    <form action="<?php echo e(route('purchases.update', $purchase->uuid)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('put'); ?>

                                        <button type="submit" class="dropdown-item text-success"
                                            onclick="return confirm('Are you sure you want to approve this purchase?')">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-check" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l5 5l10 -10" />
                                            </svg>

                                            <?php echo e(__('Approve Purchase')); ?>

                                        </button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if (isset($component)) { $__componentOriginal92bd8517d4e8545d22abaf31073757dd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92bd8517d4e8545d22abaf31073757dd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.action.close','data' => ['route' => ''.e(route('purchases.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('action.close'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => ''.e(route('purchases.index')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal92bd8517d4e8545d22abaf31073757dd)): ?>
<?php $attributes = $__attributesOriginal92bd8517d4e8545d22abaf31073757dd; ?>
<?php unset($__attributesOriginal92bd8517d4e8545d22abaf31073757dd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92bd8517d4e8545d22abaf31073757dd)): ?>
<?php $component = $__componentOriginal92bd8517d4e8545d22abaf31073757dd; ?>
<?php unset($__componentOriginal92bd8517d4e8545d22abaf31073757dd); ?>
<?php endif; ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row row-cards mb-3">
                        <div class="col">
                            <label for="date" class="small mb-1">
                                <?php echo e(__('Order Date')); ?>

                            </label>

                            <input type="text" id="date" class="form-control"
                                value="<?php echo e(\Carbon\Carbon::parse($purchase->date)->format('d-m-Y')); ?>" disabled>
                        </div>

                        <div class="col">
                            <label for="purchase_no" class="small mb-1">
                                <?php echo e(__('Purchase No.')); ?>

                            </label>
                            <input type="text" id="purchase_no" class="form-control"
                                value="<?php echo e($purchase->purchase_no); ?>" disabled>
                        </div>

                        <div class="col">
                            <label for="supplier" class="small mb-1">
                                <?php echo e(__('Supplier')); ?>

                            </label>
                            <input type="text" id="supplier" class="form-control"
                                value="<?php echo e($purchase->supplier->name); ?>" disabled>
                        </div>

                        <div class="col">
                            <label for="create_by" class="small mb-1">
                                <?php echo e(__('Created By')); ?>

                            </label>
                            <input type="text" id="create_by" class="form-control"
                                value="<?php echo e($purchase->createdBy->name ?? null); ?>" disabled>
                        </div>
                    </div>

                    <div class="col-lg-12">
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="align-middle text-center">No.</th>
                    <th scope="col" class="align-middle text-center"><?php echo e(__('Photo')); ?></th>
                    <th scope="col" class="align-middle text-center"><?php echo e(__('Product Name')); ?></th>
                    <th scope="col" class="align-middle text-center"><?php echo e(__('Product Code')); ?></th>
                    <th scope="col" class="align-middle text-center"><?php echo e(__('Previous Stock')); ?></th>
                    <th scope="col" class="align-middle text-center"><?php echo e(__('Stock During Purchase')); ?></th>
                    <th scope="col" class="align-middle text-center"><?php echo e(__('Quantity Bought')); ?></th>
                    <th scope="col" class="align-middle text-center"><?php echo e(__('Unit Price')); ?></th>
                    <th scope="col" class="align-middle text-center"><?php echo e(__('Total')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $purchase->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="align-middle text-center"><?php echo e($loop->iteration); ?></td>
                        <td class="align-middle justify-content-center text-center">
                            <div style="max-height: 80px; max-width: 80px;">
                                <img class="img-fluid"
                                    src="<?php echo e($item->product->product_image ? asset($item->product->product_image) : asset('assets/img/products/default.webp')); ?>">
                            </div>
                        </td>
                        <td class="align-middle text-center"><?php echo e($item->product->name); ?></td>
                        <td class="align-middle text-center">
                            <span class="badge bg-indigo-lt"><?php echo e($item->product->code); ?></span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="badge bg-warning-lt"><?php echo e($item->previous_stock); ?></span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="badge bg-primary-lt"><?php echo e($item->current_stock); ?></span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="badge bg-primary-lt"><?php echo e($item->quantity); ?></span>
                        </td>
                        <td class="align-middle text-center"><?php echo e(number_format($item->unitcost, 2)); ?></td>
                        <td class="align-middle text-center"><?php echo e(number_format($item->total, 2)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="align-middle text-end" colspan="8"><?php echo e(__('Total')); ?></td>
                    <td class="align-middle text-center"><?php echo e(number_format($purchase->details->sum('total'), 2)); ?></td>
                </tr>
                <tr>
                    <td class="align-middle text-end" colspan="8"><?php echo e(__('Taxes')); ?></td>
                    <td class="align-middle text-center"><?php echo e(number_format($purchase->total_amount - ($purchase->details->sum('total')), 2)); ?></td>
                </tr>
                <tr>
                    <td class="align-middle text-end" colspan="8"><?php echo e(__('Grand Total')); ?></td>
                    <td class="align-middle text-center"><?php echo e(number_format($purchase->total_amount, 2)); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
                </div>
                <div class="card-footer">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/purchases/show.blade.php ENDPATH**/ ?>