<!DOCTYPE html>
<html lang="en">
<head>
    <title>Invoice Create</title>
    <link rel="icon" href="<?php echo e(asset('favicon.png')); ?>" type="image/x-icon"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/invoice/css/bootstrap.min.css')); ?>">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/invoice/css/style.css')); ?>">
</head>
    <body>
        <?php
            $user=auth()->user();
        ?>



        <div class="invoice-16 invoice-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="invoice-inner-9" id="invoice_wrapper">
                            <div class="invoice-top">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="logo">
                                        <h1> <?php echo e(auth()->user()->store_name); ?></h1>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="invoice">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-info">
                                <div class="row">
                                    <div class="col-sm-6 mb-50">
                                        <div class="invoice-number">
                                            <h4 class="inv-title-1">Invoice date:</h4>
                                            <p class="invo-addr-1">
                                                <?php echo e(Carbon\Carbon::now()->format('M d, Y')); ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 mb-50">
                                        <h4 class="inv-title-1">Customer</h4>
                                        <p class="inv-from-1"><?php echo e($customer->name); ?></p>
                                        <p class="inv-from-1"><?php echo e($customer->phone); ?></p>
                                        <p class="inv-from-1"><?php echo e($customer->email); ?></p>
                                        <p class="inv-from-2"><?php echo e($customer->address); ?></p>
                                    </div>
                                    <div class="col-sm-6 text-end mb-50">
                                        <h4 class="inv-title-1">Store</h4>
                                        <p class="inv-from-1"><?php echo e(auth()->user()->store_name); ?></p>
                                        <p class="inv-from-1"><?php echo e($user->store_phone); ?></p>
                                        <p class="inv-from-1"><?php echo e($user->store_email); ?></p>
                                        <p class="inv-from-2"><?php echo e($user->store_address); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="order-summary">
                                <div class="table-outer">
                                    <table class="default-table invoice-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Item</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-center"><?php echo e($item->name); ?></td>
                                                <td class="text-center"><?php echo e($item->price); ?></td>
                                                <td class="text-center"><?php echo e($item->qty); ?></td>
                                                <td class="text-center"><?php echo e($item->subtotal); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td colspan="3" class="text-end"><strong>Subtotal</strong></td>
                                                <td class="text-center">
                                                    <strong><?php echo e(Cart::subtotal()); ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end"><strong>Tax</strong></td>
                                                <td class="text-center">
                                                    <strong><?php echo e(Cart::tax()); ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end"><strong>Total</strong></td>
                                                <td class="text-center">
                                                    <strong><?php echo e(Cart::total()); ?></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- 
         -->
                        </div>

                        <div class="invoice-btn-section clearfix d-print-none">
                            <a href="<?php echo e(url()->previous()); ?>" class="btn btn-warning">
                                <?php echo e(__('Back to previous')); ?>

                            </a>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
                                <?php echo e(__('Pay Now')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal modal-blur fade" id="modal" tabindex="-1" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <?php echo e(__('Pay Order')); ?>

                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
          
          
          
          
          
          
 <!-- Back to Previous Button -->
<form action="<?php echo e(route('invoice.create')); ?>" method="POST" style="display: inline;">
    <?php echo csrf_field(); ?>
    <button type="submit" class="btn btn-warning">
        <?php echo e(__('Back to previous')); ?>

    </button>
</form>

<!-- Order Form -->
<form action="<?php echo e(route('orders.store')); ?>" method="POST" id="order-form">
    <?php echo csrf_field(); ?>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <input type="hidden" name="customer_id" value="<?php echo e($customer->id); ?>">
                    <?php if (isset($component)) { $__componentOriginalec8e3fd2711e287224a700ddfb7f5fd5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalec8e3fd2711e287224a700ddfb7f5fd5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.index','data' => ['label' => 'Customer','name' => 'customer','value' => ''.e($customer->name).'','disabled' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Customer','name' => 'customer','value' => ''.e($customer->name).'','disabled' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalec8e3fd2711e287224a700ddfb7f5fd5)): ?>
<?php $attributes = $__attributesOriginalec8e3fd2711e287224a700ddfb7f5fd5; ?>
<?php unset($__attributesOriginalec8e3fd2711e287224a700ddfb7f5fd5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalec8e3fd2711e287224a700ddfb7f5fd5)): ?>
<?php $component = $__componentOriginalec8e3fd2711e287224a700ddfb7f5fd5; ?>
<?php unset($__componentOriginalec8e3fd2711e287224a700ddfb7f5fd5); ?>
<?php endif; ?>
                </div>
            </div> 
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="payment_type" class="form-label required"><?php echo e(__('Payment')); ?></label>
                    <select class="form-control <?php $__errorArgs = ['payment_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="payment_type" name="payment_type" onchange="toggleForms(this)">
                        <option selected="" disabled="">Select a payment:</option>
                        <option value="HandCash">HandCash</option>
                        <option value="Cheque">Cheque</option>
                        <option value="Due">Due</option>
                    </select>
                    <?php $__errorArgs = ['payment_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="col-lg-12">
                <label for="pay" class="form-label required"><?php echo e(__('Pay Now')); ?></label>
                <input type="number" id="pay" name="pay" class="form-control <?php $__errorArgs = ['pay'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(Cart::total()); ?>" required>
                <?php $__errorArgs = ['pay'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn me-auto" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
        <button class="btn btn-primary" type="submit"><?php echo e(__('Pay')); ?></button>
    </div>
</form>

<form action="<?php echo e(route('pos.storeDebt')); ?>" method="POST" id="debt-form">
    <?php echo csrf_field(); ?>
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <input type="hidden" name="customer_id" value="<?php echo e($customer->id); ?>">
                    <?php if (isset($component)) { $__componentOriginalec8e3fd2711e287224a700ddfb7f5fd5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalec8e3fd2711e287224a700ddfb7f5fd5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.index','data' => ['label' => 'Customer','name' => 'customer','value' => ''.e($customer->name).'','disabled' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Customer','name' => 'customer','value' => ''.e($customer->name).'','disabled' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalec8e3fd2711e287224a700ddfb7f5fd5)): ?>
<?php $attributes = $__attributesOriginalec8e3fd2711e287224a700ddfb7f5fd5; ?>
<?php unset($__attributesOriginalec8e3fd2711e287224a700ddfb7f5fd5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalec8e3fd2711e287224a700ddfb7f5fd5)): ?>
<?php $component = $__componentOriginalec8e3fd2711e287224a700ddfb7f5fd5; ?>
<?php unset($__componentOriginalec8e3fd2711e287224a700ddfb7f5fd5); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="payment_type" class="form-label required"><?php echo e(__('Payment')); ?></label>
                    <select class="form-control <?php $__errorArgs = ['payment_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="payment_type" name="payment_type" onchange="toggleForms(this)">
                        <option selected="" disabled="">Select a payment:</option>
                        <option value="HandCash">HandCash</option>
                        <option value="Cheque">Cheque</option>
                        <option value="Due">Due</option>
                    </select>
                    <?php $__errorArgs = ['payment_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="customer_set" class="form-label required"><?php echo e(__('Customer Set')); ?></label>
                    <input type="text" id="customer_set" name="customer_set" class="form-control <?php $__errorArgs = ['customer_set'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="Order Goods" required>
                    <?php $__errorArgs = ['customer_set'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="due_date" class="form-label required"><?php echo e(__('Due Date')); ?></label>
                    <input type="date" id="due_date" name="due_date" class="form-control <?php $__errorArgs = ['due_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                    <?php $__errorArgs = ['due_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="col-lg-12">
                <label for="amount" class="form-label required"><?php echo e(__('Amount')); ?></label>
                <input type="number" id="amount" name="amount" class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(Cart::total()); ?>" required>
                <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn me-auto" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
        <button class="btn btn-primary" type="submit"><?php echo e(__('Create Debt')); ?></button>
    </div>
</form>

<script>
function toggleForms(select) {
    const orderForm = document.getElementById('order-form');
    const debtForm = document.getElementById('debt-form');

    if (select.value === 'Due') {
        orderForm.style.display = 'none';
        debtForm.style.display = 'block';
    } else {
        orderForm.style.display = 'block';
        debtForm.style.display = 'none';
    }
}
</script>



                </div>
            </div>
        </div>
  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
</html>
<?php /**PATH C:\rstoresV1R\rsmstores\resources\views/invoices/create.blade.php ENDPATH**/ ?>