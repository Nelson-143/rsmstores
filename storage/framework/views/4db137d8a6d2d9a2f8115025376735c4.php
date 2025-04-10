<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">
                <?php echo e(__('Orders')); ?>

            </h3>
        </div>

        <div class="card-actions">
            <?php if (isset($component)) { $__componentOriginalba2e1302df9546d76bee34e04e318642 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba2e1302df9546d76bee34e04e318642 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.action.create','data' => ['route' => ''.e(route('pos.index')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('action.create'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => ''.e(route('pos.index')).'']); ?>
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
                        <a wire:click.prevent="sortBy('invoice_no')" href="#" role="button">
                            <?php echo e(__('Invoice No.')); ?>

                            <?php echo $__env->make('inclues._sort-icon', ['field' => 'invoice_no'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('customer_id')" href="#" role="button">
                            <?php echo e(__('Customer')); ?>

                            <?php echo $__env->make('inclues._sort-icon', ['field' => 'customer_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('order_date')" href="#" role="button">
                            <?php echo e(__('Date')); ?>

                            <?php echo $__env->make('inclues._sort-icon', ['field' => 'order_date'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('payment_type')" href="#" role="button">
                            <?php echo e(__('Paymet')); ?>

                            <?php echo $__env->make('inclues._sort-icon', ['field' => 'payment_type'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('total')" href="#" role="button">
                            <?php echo e(__('Total')); ?>

                            <?php echo $__env->make('inclues._sort-icon', ['field' => 'total'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <a wire:click.prevent="sortBy('order_status')" href="#" role="button">
                            <?php echo e(__('Status')); ?>

                            <?php echo $__env->make('inclues._sort-icon', ['field' => 'order_status'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </a>
                    </th>
                    <th scope="col" class="align-middle text-center">
                        <?php echo e(__('Action')); ?>

                    </th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="align-middle text-center">
                            <?php echo e($loop->iteration); ?>

                        </td>
                        <td class="align-middle text-center">
                            <?php echo e($order->invoice_no); ?>

                        </td>
                        <td class="align-middle text-center">
                            <?php echo e($order->customer->name); ?>

                        </td>
                        <td class="align-middle text-center">
                            <?php echo e($order->order_date->format('d-m-Y')); ?>

                        </td>
                        <td class="align-middle text-center">
                            <?php echo e($order->payment_type); ?>

                        </td>
                        <td class="align-middle text-center">
                        <?php echo e(auth()->user()->account->currency); ?><?php echo e(($order->total)); ?>

                        </td>
                        <td class="align-middle text-center">
    <?php if (isset($component)) { $__componentOriginal51ed764111e345fc11534f121cfeb451 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal51ed764111e345fc11534f121cfeb451 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status.index','data' => ['dot' => true,'color' => ''.e($order->order_status === \App\Enums\OrderStatus::COMPLETE ? 'green' : ($order->order_status === \App\Enums\OrderStatus::PENDING ? 'orange' : 'gray')).'','class' => 'text-uppercase']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['dot' => true,'color' => ''.e($order->order_status === \App\Enums\OrderStatus::COMPLETE ? 'green' : ($order->order_status === \App\Enums\OrderStatus::PENDING ? 'orange' : 'gray')).'','class' => 'text-uppercase']); ?>
        <?php echo e($order->order_status->label()); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal51ed764111e345fc11534f121cfeb451)): ?>
<?php $attributes = $__attributesOriginal51ed764111e345fc11534f121cfeb451; ?>
<?php unset($__attributesOriginal51ed764111e345fc11534f121cfeb451); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal51ed764111e345fc11534f121cfeb451)): ?>
<?php $component = $__componentOriginal51ed764111e345fc11534f121cfeb451; ?>
<?php unset($__componentOriginal51ed764111e345fc11534f121cfeb451); ?>
<?php endif; ?>
</td>
                        <td class="align-middle text-center">
                            <?php if (isset($component)) { $__componentOriginala791c6284c2f598d6edc351a2663ce40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala791c6284c2f598d6edc351a2663ce40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button.show','data' => ['class' => 'btn-icon','route' => ''.e(route('orders.show', $order->uuid)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button.show'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-icon','route' => ''.e(route('orders.show', $order->uuid)).'']); ?>
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
                            <?php if (isset($component)) { $__componentOriginal7d06eb147f2f5d27afa5db8c4763c07c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7d06eb147f2f5d27afa5db8c4763c07c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button.print','data' => ['class' => 'btn-icon','route' => ''.e(route('order.downloadInvoice', $order->uuid)).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button.print'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-icon','route' => ''.e(route('order.downloadInvoice', $order->uuid)).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7d06eb147f2f5d27afa5db8c4763c07c)): ?>
<?php $attributes = $__attributesOriginal7d06eb147f2f5d27afa5db8c4763c07c; ?>
<?php unset($__attributesOriginal7d06eb147f2f5d27afa5db8c4763c07c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7d06eb147f2f5d27afa5db8c4763c07c)): ?>
<?php $component = $__componentOriginal7d06eb147f2f5d27afa5db8c4763c07c; ?>
<?php unset($__componentOriginal7d06eb147f2f5d27afa5db8c4763c07c); ?>
<?php endif; ?>

                            <!-- Form for Approval -->
                            <!--[if BLOCK]><![endif]--><?php if($order->order_status === \App\Enums\OrderStatus::PENDING): ?>
                                <form action="<?php echo e(route('orders.approve', $order->uuid)); ?>" method="POST" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('POST'); ?>
                                    <button type="submit" class="btn btn-icon btn-success" onclick="return confirm('Are you sure you want to approve this order?')">
                                        <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-check" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l5 5l10 -10" />
                                    </svg>
                                                                    </button>
                                </form>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                            <!--[if BLOCK]><![endif]--><?php if($order->order_status === \App\Enums\OrderStatus::PENDING): ?>
                                <?php if (isset($component)) { $__componentOriginalc9f266a4795c6091a36d539e9ac3ca65 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc9f266a4795c6091a36d539e9ac3ca65 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button.delete','data' => ['class' => 'btn-icon','route' => ''.e(route('orders.cancel', $order)).'','onclick' => 'return confirm(\'Are you sure to cancel invoice no. '.e($order->invoice_no).' ?\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'btn-icon','route' => ''.e(route('orders.cancel', $order)).'','onclick' => 'return confirm(\'Are you sure to cancel invoice no. '.e($order->invoice_no).' ?\')']); ?>
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
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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
            Showing <span><?php echo e($orders->firstItem()); ?></span> to <span><?php echo e($orders->lastItem()); ?></span> of
            <span><?php echo e($orders->total()); ?></span> entries
        </p>

        <ul class="pagination m-0 ms-auto">
            <?php echo e($orders->links()); ?>

        </ul>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script>
    function approveOrder(uuid) {
        if (confirm('Are you sure you want to approve this order?')) {
            fetch(`/orders/${uuid}/approve`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload(); // Reload the page to reflect the changes
                } else {
                    alert('Failed to approve the order.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while approving the order.');
            });
        }
    }
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\rstoresV1R\rsmstores\resources\views/livewire/tables/order-table.blade.php ENDPATH**/ ?>