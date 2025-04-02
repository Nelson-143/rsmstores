<?php $__env->startSection('title' , 'Show Supplier'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center mb-3">
            <div class="col">
                <h2 class="page-title">
                    <?php echo e($supplier->name); ?>

                </h2>
            </div>
        </div>

        <?php echo $__env->make('partials._breadcrumbs', ['model' => $supplier], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            <?php echo e(__('Profile Image')); ?>

                        </h3>


                        <img id="image-preview"
                        class="img-account-profile mb-2"
                        src="<?php echo e($supplier->photo ? asset($supplier->photo) : asset('assets/img/demo/user-placeholder.svg')); ?>"
                        alt="Supplier Photo"
                        >

                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title">
                                <?php echo e(__('Supplier Details')); ?>

                            </h3>
                        </div>

                        <div class="card-actions">
                            <?php if (isset($component)) { $__componentOriginal92bd8517d4e8545d22abaf31073757dd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal92bd8517d4e8545d22abaf31073757dd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.action.close','data' => ['route' => ''.e(route('suppliers.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('action.close'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => ''.e(route('suppliers.index')).'']); ?>
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
                    <div class="table-responsive">
                        <table class="table table-bordered card-table table-vcenter text-nowrap datatable">
                            <tbody>
                                <tr>
                                    <td><?php echo e(__('Name')); ?></td>
                                    <td><?php echo e($supplier->name); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Email address')); ?></td>
                                    <td><?php echo e($supplier->email); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Phone number')); ?></td>
                                    <td><?php echo e($supplier->phone); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Address')); ?></td>
                                    <td><?php echo e($supplier->address); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Shop name')); ?></td>
                                    <td><?php echo e($supplier->shopname); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Type')); ?></td>
                                    <td><?php echo e($supplier->type->label()); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Account holder')); ?></td>
                                    <td><?php echo e($supplier->account_holder); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Account number')); ?></td>
                                    <td><?php echo e($supplier->account_number); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo e(__('Bank Name')); ?></td>
                                    <td><?php echo e($supplier->bank_name); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer text-end">
                        <a class="btn btn-info" href="<?php echo e(route('suppliers.index')); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
                            <?php echo e(__('Back')); ?>

                        </a>
                        <?php if (isset($component)) { $__componentOriginal33da6640cbe7d6c3a4010c7f4798eed7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal33da6640cbe7d6c3a4010c7f4798eed7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button.edit','data' => ['class' => 'btn btn-outline-warning','route' => ''.e(route('suppliers.edit', $supplier->uuid)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button.edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn btn-outline-warning','route' => ''.e(route('suppliers.edit', $supplier->uuid)).'']); ?>
                            <?php echo e(__('Edit')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal33da6640cbe7d6c3a4010c7f4798eed7)): ?>
<?php $attributes = $__attributesOriginal33da6640cbe7d6c3a4010c7f4798eed7; ?>
<?php unset($__attributesOriginal33da6640cbe7d6c3a4010c7f4798eed7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33da6640cbe7d6c3a4010c7f4798eed7)): ?>
<?php $component = $__componentOriginal33da6640cbe7d6c3a4010c7f4798eed7; ?>
<?php unset($__componentOriginal33da6640cbe7d6c3a4010c7f4798eed7); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/suppliers/show.blade.php ENDPATH**/ ?>