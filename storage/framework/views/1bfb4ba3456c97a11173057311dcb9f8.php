<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">
                <?php echo e(__('Customers')); ?>

            </h3>
        </div>

        <div class="card-actions">
            <?php if (isset($component)) { $__componentOriginalba2e1302df9546d76bee34e04e318642 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba2e1302df9546d76bee34e04e318642 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.action.create','data' => ['route' => ''.e(route('customers.create')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('action.create'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => ''.e(route('customers.create')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalba2e1302df9546d76bee34e04e318642)): ?>
<?php $attributes = $__attributesOriginalba2e1302df9546d76bee34e04e318642; ?>
<?php unset($__attributesOriginalba2e1302df9546d76bee34e04e318642); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba2e1302df9546d76bee34e04e318642)): ?>
<?php $component = $__componentOriginalba2e1302df9546d76bee34e04e318642; ?>
<?php unset($__componentOriginalba2e1302df9546d76bee34e04e318642); ?>
<?php endif; ?>
        </div>
    </div>

    <div class="card-body border-bottom py-3">
        <div class="d-flex">
            <div class="text-secondary">
                Show
                <div class="mx-2 d-inline-block">
                    <select wire:model.live="perPage" class="form-select form-select-sm" aria-label="result per page">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="25">25</option>
                    </select>
                </div>
                entries
            </div>
            <div class="ms-auto text-secondary">
                Search:
                <div class="ms-2 d-inline-block">
                    <input type="text" wire:model.live="search" class="form-control form-control-sm" aria-label="Search invoice">
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($component)) { $__componentOriginal3ecbb299d928ab1b0c1204ffec825529 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3ecbb299d928ab1b0c1204ffec825529 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.spinner.loading-spinner','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('spinner.loading-spinner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3ecbb299d928ab1b0c1204ffec825529)): ?>
<?php $attributes = $__attributesOriginal3ecbb299d928ab1b0c1204ffec825529; ?>
<?php unset($__attributesOriginal3ecbb299d928ab1b0c1204ffec825529); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3ecbb299d928ab1b0c1204ffec825529)): ?>
<?php $component = $__componentOriginal3ecbb299d928ab1b0c1204ffec825529; ?>
<?php unset($__componentOriginal3ecbb299d928ab1b0c1204ffec825529); ?>
<?php endif; ?>

    <div class="table-responsive">
        <table wire:loading.remove class="table table-bordered card-table table-vcenter text-nowrap datatable">
            <thead class="thead-light">
            <tr>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('id')" href="#" role="button">
                        <?php echo e(__('Id')); ?>

                        <?php echo $__env->make('inclues._sort-icon', ['field' => 'id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('name')" href="#" role="button">
                        <?php echo e(__('Name')); ?>

                        <?php echo $__env->make('inclues._sort-icon', ['field' => 'name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('email')" href="#" role="button">
                        <?php echo e(__('Email')); ?>

                        <?php echo $__env->make('inclues._sort-icon', ['field' => 'email'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <a wire:click.prevent="sortBy('created_at')" href="#" role="button">
                        <?php echo e(__('Created at')); ?>

                        <?php echo $__env->make('inclues._sort-icon', ['field' => 'Created_at'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </a>
                </th>
                <th scope="col" class="align-middle text-center">
                    <?php echo e(__('Action')); ?>

                </th>
            </tr>
            </thead>
            <tbody>
            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="align-middle text-center">
                        <?php echo e($loop->index); ?>

                    </td>
                    <td class="align-middle text-center">
                        <?php echo e($customer->name); ?>

                    </td>
                    <td class="align-middle text-center">
                        <?php echo e($customer->email); ?>

                    </td>
                    <td class="align-middle text-center">
                        <?php echo e($customer->created_at->diffForHumans()); ?>

                    </td>
                    <td class="align-middle text-center">
                        <?php if (isset($component)) { $__componentOriginala791c6284c2f598d6edc351a2663ce40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala791c6284c2f598d6edc351a2663ce40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button.show','data' => ['class' => 'btn-icon','route' => ''.e(route('customers.show', $customer->uuid)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button.show'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-icon','route' => ''.e(route('customers.show', $customer->uuid)).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala791c6284c2f598d6edc351a2663ce40)): ?>
<?php $attributes = $__attributesOriginala791c6284c2f598d6edc351a2663ce40; ?>
<?php unset($__attributesOriginala791c6284c2f598d6edc351a2663ce40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala791c6284c2f598d6edc351a2663ce40)): ?>
<?php $component = $__componentOriginala791c6284c2f598d6edc351a2663ce40; ?>
<?php unset($__componentOriginala791c6284c2f598d6edc351a2663ce40); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal33da6640cbe7d6c3a4010c7f4798eed7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal33da6640cbe7d6c3a4010c7f4798eed7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button.edit','data' => ['class' => 'btn-icon','route' => ''.e(route('customers.edit', $customer->uuid)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button.edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-icon','route' => ''.e(route('customers.edit', $customer->uuid)).'']); ?>
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
                        <?php if (isset($component)) { $__componentOriginalc9f266a4795c6091a36d539e9ac3ca65 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc9f266a4795c6091a36d539e9ac3ca65 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button.delete','data' => ['class' => 'btn-icon','route' => ''.e(route('customers.destroy', $customer->uuid)).'','onclick' => 'return confirm(\'Are you sure to remove '.e($customer->name).' ?\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-icon','route' => ''.e(route('customers.destroy', $customer->uuid)).'','onclick' => 'return confirm(\'Are you sure to remove '.e($customer->name).' ?\')']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc9f266a4795c6091a36d539e9ac3ca65)): ?>
<?php $attributes = $__attributesOriginalc9f266a4795c6091a36d539e9ac3ca65; ?>
<?php unset($__attributesOriginalc9f266a4795c6091a36d539e9ac3ca65); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc9f266a4795c6091a36d539e9ac3ca65)): ?>
<?php $component = $__componentOriginalc9f266a4795c6091a36d539e9ac3ca65; ?>
<?php unset($__componentOriginalc9f266a4795c6091a36d539e9ac3ca65); ?>
<?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td class="align-middle text-center" colspan="8">
                        No results found
                    </td>
                </tr>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>

    <div class="card-footer d-flex align-items-center">
        <p class="m-0 text-secondary">
            Showing <span><?php echo e($customers->firstItem()); ?></span> to <span><?php echo e($customers->lastItem()); ?></span> of <span><?php echo e($customers->total()); ?></span> entries
        </p>

        <ul class="pagination m-0 ms-auto">
            <?php echo e($customers->links()); ?>

        </ul>
    </div>
</div>
<?php /**PATH C:\rstoresV1R\rsmstores\resources\views/livewire/tables/customer-table.blade.php ENDPATH**/ ?>