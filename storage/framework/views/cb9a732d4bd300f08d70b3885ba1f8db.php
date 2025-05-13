<?php $__env->startSection('title' , 'Show Product'); ?>

<?php $__env->startSection('content'); ?>

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center mb-3">
                <div class="col">
                    <h2 class="page-title">
                        <?php echo e($product->name); ?>

                    </h2>
                </div>
            </div>

            <?php echo $__env->make('partials._breadcrumbs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="page-body">
        
        <div class="container-xl">
                     
            <div class="row row-cards">
            <?php if($product->expire_date): ?>
                    <?php
                        $expireDate = \Carbon\Carbon::parse($product->expire_date);
                        $now = \Carbon\Carbon::now();
                        $diffInDays = $now->diffInDays($expireDate, false);
                    ?>

                    <?php if($diffInDays < 0): ?>
                        <div class="alert alert-danger">
                            <?php echo e(__('This product has expired.')); ?>

                        </div>
                    <?php elseif($diffInDays <= 7): ?>
                        <div class="alert alert-warning">
                            <?php echo e(__('This product will expire in')); ?> <?php echo e($diffInDays); ?> <?php echo e(__('days')); ?>.
                        </div>
                    <?php elseif($diffInDays <= 30): ?>
                        <div class="alert alert-info">
                            <?php echo e(__('This product will expire in')); ?> <?php echo e($diffInDays); ?> <?php echo e(__('days')); ?>.
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    <?php echo e(__('Product Image')); ?>

                                </h3>

                                
                                    <img style="width: 90px;"
                                    src="<?php echo e(asset($product->product_image)); ?>"
                                    alt="<?php echo e($product->name); ?>">
                            </div>
                        </div>
                    </div>
                    <!---
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    Product Code
                                </div>
                                <div class="row row-cards">
                                    <div class="col-md-6">
                                        <label class="small mb-1">
                                            Product code
                                        </label>

                                        <div class="form-control">
                                            <?php echo e($product->code); ?>

                                        </div>
                                    </div>

                                    <div class="col-md-6 align-middle">
                                        <label class="small mb-1">
                                            Barcode
                                        </label>

                                        <div class="mt-1">
                                            <?php echo $barcode; ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    --->

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <?php echo e(__('Product Details')); ?>

                                </h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered card-table table-vcenter text-nowrap datatable">
                                    <tbody>
                                        <tr>
                                            <td><?php echo e(__('Name')); ?></td>
                                            <td><?php echo e($product->name); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(__('Slug')); ?></td>
                                            <td><?php echo e($product->slug); ?></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-secondary">Code</span></td>
                                            <td><?php echo e($product->code); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Barcode</td>
                                            <td><?php echo $barcode; ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(__('Category')); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('categories.show', $product->category)); ?>"
                                                    class="badge bg-blue-lt">
                                                    <?php echo e($product->category->name); ?>

                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(__('Unit')); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('units.show', $product->unit)); ?>"
                                                    class="badge bg-blue-lt">
                                                    <?php echo e($product->unit->short_code); ?>

                                                </a>
                                            </td>
                                        </tr>
                                        <!-- the product Quantity based  locations --> 
                                       <tr>
                                            <td><?php echo e(__('Quantity')); ?></td>
                                            <td>
                                                <?php echo e($product->quantity); ?>

                                                <?php if($product->productLocations->count() > 0): ?>
                                                    <button type="button" class="btn btn-sm btn-secondary ms-2" data-bs-toggle="collapse" data-bs-target="#locationBreakdown-<?php echo e($product->id); ?>">Details</button>
                                                    <div id="locationBreakdown-<?php echo e($product->id); ?>" class="collapse">
                                                        <ul class="list-unstyled mt-2">
                                                            <?php $__currentLoopData = $product->productLocations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><?php echo e($location->location->name); ?>: <?php echo e($location->quantity); ?> units</li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(__('Quantity Alert')); ?></td>
                                            <td>
                                                <span class="badge bg-red-lt">
                                                    <?php echo e($product->quantity_alert); ?>

                                                </span>
                                            </td>
                                        </tr>
                                        <?php if (\Illuminate\Support\Facades\Blade::check('role', 'Super Admin')): ?>
                                        <tr>
                                            <td><?php echo e(__('Buying Price')); ?></td>
                                            <td><?php echo e($product->buying_price); ?></td>
                                        </tr>
                                        <?php endif; ?>
                                        <tr>
                                            <td><?php echo e(__('Selling Price')); ?></td>
                                            <td><?php echo e($product->selling_price); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(__('Tax')); ?></td>
                                            <td>
                                                <span class="badge bg-red-lt">
                                                    <?php echo e($product->tax); ?> %
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(__('Tax Type')); ?></td>
                                            <td><?php echo e($product->tax_type); ?></td>
                                        </tr>
                                       <tr>
                                            <td><?php echo e(__('Expire Date')); ?></td>
                                            <td>
                                                <span class="badge bg-red-lt">
                                                    <?php echo e($product->expire_date); ?>

                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(__('Notes')); ?></td>
                                            <td><?php echo e($product->notes); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer text-end">
                                <a class="btn btn-info" href="<?php echo e(url()->previous()); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l14 0" />
                                        <path d="M5 12l6 6" />
                                        <path d="M5 12l6 -6" />
                                    </svg>
                                    <?php echo e(__('Back')); ?>

                                </a>
                               
                                <a class="btn btn-warning" href="<?php echo e(route('products.edit', $product->uuid)); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                        <path d="M13.5 6.5l4 4" />
                                    </svg>
                                    <?php echo e(__('Edit')); ?>

                                </a>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/products/show.blade.php ENDPATH**/ ?>