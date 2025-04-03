<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">
                <?php echo e(__('Products')); ?>

            </h3>
        </div>

        <div class="card-actions btn-group">
            <div class="dropdown">
                <a href="#" class="btn-action dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <?php if (isset($component)) { $__componentOriginal7b39e34b8b3f551d27fba5149bc44050 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b39e34b8b3f551d27fba5149bc44050 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon.vertical-dots','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon.vertical-dots'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b39e34b8b3f551d27fba5149bc44050)): ?>
<?php $attributes = $__attributesOriginal7b39e34b8b3f551d27fba5149bc44050; ?>
<?php unset($__attributesOriginal7b39e34b8b3f551d27fba5149bc44050); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b39e34b8b3f551d27fba5149bc44050)): ?>
<?php $component = $__componentOriginal7b39e34b8b3f551d27fba5149bc44050; ?>
<?php unset($__componentOriginal7b39e34b8b3f551d27fba5149bc44050); ?>
<?php endif; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-end" >
                    <a href="<?php echo e(route('products.create')); ?>" class="dropdown-item">
                        <?php if (isset($component)) { $__componentOriginal6315a526d124ee5b3ba861082d11f72e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6315a526d124ee5b3ba861082d11f72e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon.plus','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon.plus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6315a526d124ee5b3ba861082d11f72e)): ?>
<?php $attributes = $__attributesOriginal6315a526d124ee5b3ba861082d11f72e; ?>
<?php unset($__attributesOriginal6315a526d124ee5b3ba861082d11f72e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6315a526d124ee5b3ba861082d11f72e)): ?>
<?php $component = $__componentOriginal6315a526d124ee5b3ba861082d11f72e; ?>
<?php unset($__componentOriginal6315a526d124ee5b3ba861082d11f72e); ?>
<?php endif; ?>
                        <?php echo e(__('Create Product')); ?>

                    </a>
                    <a href="<?php echo e(route('products.import.view')); ?>" class="dropdown-item">
                        <?php if (isset($component)) { $__componentOriginal6315a526d124ee5b3ba861082d11f72e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6315a526d124ee5b3ba861082d11f72e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon.plus','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon.plus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6315a526d124ee5b3ba861082d11f72e)): ?>
<?php $attributes = $__attributesOriginal6315a526d124ee5b3ba861082d11f72e; ?>
<?php unset($__attributesOriginal6315a526d124ee5b3ba861082d11f72e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6315a526d124ee5b3ba861082d11f72e)): ?>
<?php $component = $__componentOriginal6315a526d124ee5b3ba861082d11f72e; ?>
<?php unset($__componentOriginal6315a526d124ee5b3ba861082d11f72e); ?>
<?php endif; ?>
                        <?php echo e(__('Import Products')); ?>

                    </a>
                    <a href="<?php echo e(route('products.export.store')); ?>" class="dropdown-item">
                        <?php if (isset($component)) { $__componentOriginal6315a526d124ee5b3ba861082d11f72e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6315a526d124ee5b3ba861082d11f72e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon.plus','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon.plus'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6315a526d124ee5b3ba861082d11f72e)): ?>
<?php $attributes = $__attributesOriginal6315a526d124ee5b3ba861082d11f72e; ?>
<?php unset($__attributesOriginal6315a526d124ee5b3ba861082d11f72e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6315a526d124ee5b3ba861082d11f72e)): ?>
<?php $component = $__componentOriginal6315a526d124ee5b3ba861082d11f72e; ?>
<?php unset($__componentOriginal6315a526d124ee5b3ba861082d11f72e); ?>
<?php endif; ?>
                        <?php echo e(__('Export Products')); ?>

                    </a>
                </div>
            </div>
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
                    <input type="text" wire:model.live="search" class="form-control form-control-sm"
                        aria-label="Search invoice">
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
                    <th class="align-middle text-center w-1">
                        <?php echo e(__('No.')); ?>

                    </th>
                    <th scope="col" class="align-middle text-center">
                        <?php echo e(__('Image')); ?>

                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('name')" href="#" role="button">
                            <?php echo e(__('Name')); ?>

                            <?php echo $__env->make('inclues._sort-icon', ['field' => 'name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                         </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('code')" href="#" role="button">
                            <?php echo e(__('Code')); ?>

                            <?php echo $__env->make('inclues._sort-icon', ['field' => 'code'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('category_id')" href="#" role="button">
                            <?php echo e(__('Category')); ?>

                            <?php echo $__env->make('inclues._sort-icon', ['field' => 'category_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('supplier_id')" href="#" role="button">
                            <?php echo e(__('Supplier')); ?>

                            <?php echo $__env->make('inclues._sort-icon', ['field' => 'supplier_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('quantity')" href="#" role="button">
                            <?php echo e(__('Quantity')); ?>

                            <?php echo $__env->make('inclues._sort-icon', ['field' => 'quantity'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <?php echo e(__('Action')); ?>

                    </th>
                </tr>
            </thead>
            <tbody>
    <?php
        // Debugging: Log the products variable
        \Log::info('Products in view:', $products->toArray());
    ?>
  
   
    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td class="align-middle text-center">
                <?php echo e($loop->iteration); ?>

            </td>
            <td class="align-middle text-center">
                <img style="width: 90px;"
                     src="<?php echo e($product->product_image ? asset($product->product_image) : asset('assets/img/products/default.webp')); ?>"
                     alt="<?php echo e($product->name); ?>">
            </td>
            <td class="align-middle text-center">
                <?php echo e($product->name); ?>

            </td>
            <td class="align-middle text-center">
                <?php echo e($product->code); ?>

            </td>
            <td class="align-middle text-center">
                <?php echo e($product->category ? $product->category->name : '--'); ?>

            </td>
            <td class="align-middle text-center">
                <?php echo e($product->supplier ? $product->supplier->name : '--'); ?>

            </td>
            <td class="align-middle text-center">
                <?php echo e($product->quantity); ?>

            </td>
            <td class="align-middle text-center" style="width: 10%">
                <?php if (isset($component)) { $__componentOriginala791c6284c2f598d6edc351a2663ce40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala791c6284c2f598d6edc351a2663ce40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button.show','data' => ['class' => 'btn-icon','route' => ''.e(route('products.show', $product->uuid)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button.show'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-icon','route' => ''.e(route('products.show', $product->uuid)).'']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button.edit','data' => ['class' => 'btn-icon','route' => ''.e(route('products.edit', $product->uuid)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button.edit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-icon','route' => ''.e(route('products.edit', $product->uuid)).'']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button.delete','data' => ['class' => 'btn-icon','route' => ''.e(route('products.destroy', $product->uuid)).'','onclick' => 'return confirm(\'Are you sure to delete product '.e($product->name).' ?\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-icon','route' => ''.e(route('products.destroy', $product->uuid)).'','onclick' => 'return confirm(\'Are you sure to delete product '.e($product->name).' ?\')']); ?>
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
            <td class="align-middle text-center" colspan="7">
                No results found
            </td>
        </tr>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</tbody>
        </table>
    </div>

    <div class="card-footer d-flex align-items-center">
    <p class="m-0 text-secondary">
        Showing <span><?php echo e($products->firstItem()); ?></span>
        to <span><?php echo e($products->lastItem()); ?></span> of <span><?php echo e($products->total()); ?></span> entries
    </p>

    <ul class="pagination m-0 ms-auto">
        <?php echo e($products->links()); ?>

    </ul>
</div>
</div>
<?php /**PATH C:\rstoresV1R\rsmstores\resources\views/livewire/tables/product-table.blade.php ENDPATH**/ ?>