<?php $__env->startSection('title' , 'Show Customer'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center mb-3">
                <div class="col">
                    <h2 class="page-title">
                        <?php echo e($customer->name); ?>

                    </h2>
                </div>
            </div>

            <?php echo $__env->make('partials._breadcrumbs', ['model' => $customer], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl"> 
            <div class="row row-cards">
                <div class="row">
                <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                                        <h3 class="card-title">
                                            <?php echo e(__('Profile Image')); ?>

                                        </h3>

                                        <img id="image-preview"
                                            class="img-account-profile mb-2"
                                            src="<?php echo e($customer->photo ? asset($customer->photo) : asset('assets/img/demo/user-placeholder.svg')); ?>"
                                            alt=""
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <?php echo e(__('Customer Details')); ?>

            </h3>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered card-table table-vcenter text-nowrap datatable">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td><?php echo e($customer->name); ?></td>
                    </tr>
                    <tr>
                        <td>Email address</td>
                        <td><?php echo e($customer->email); ?></td>
                    </tr>
                    <tr>
                        <td>Phone number</td>
                        <td><?php echo e($customer->phone); ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?php echo e($customer->address); ?></td>
                    </tr>
                    <tr>
                        <td>Account holder</td>
                        <td><?php echo e($customer->account_holder); ?></td>
                    </tr>
                    <tr>
                        <td>Account number</td>
                        <td><?php echo e($customer->account_number); ?></td>
                    </tr>
                    <tr>
                        <td>Bank name</td>
                        <td><?php echo e($customer->bank_name); ?></td>
                    </tr>
                    <?php if (\Illuminate\Support\Facades\Blade::check('role', 'Super Admin')): ?>
                    <tr>
                        <td>Number of Orders</td>
                        <td><?php echo e($orderCount); ?></td>
                    </tr>
                    <tr>
                        <td>Total Contributed</td>
                        <td><?php echo e(number_format($totalContributed, 2)); ?> <?php echo e('/='); ?></td> <!-- Replace 'Currency' with the actual currency symbol -->
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="card-footer text-end">
            <a class="btn btn-info" href="<?php echo e(route('customers.index')); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
                <?php echo e(__('Back')); ?>

            </a>

            <a class="btn btn-warning" href="<?php echo e(route('customers.edit', $customer->uuid)); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                <?php echo e(__('Edit')); ?>

            </a>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/customers/show.blade.php ENDPATH**/ ?>