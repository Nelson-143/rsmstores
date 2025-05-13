<?php $__env->startSection('title', 'Profile Setting'); ?>

<?php $__env->startSection('content'); ?>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Account Settings - Settings
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-4">
        <?php echo $__env->make('profile.component.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <hr class="mt-0 mb-4" />

        <?php echo $__env->make('partials.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="row">
            <div class="col-lg-8">
                <!-- Currency Settings -->
                <div class="card mb-4">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title">
                                <?php echo e(__('Currency Settings')); ?>

                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('profile.currency.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="currency" class="form-label"><?php echo e(__('Select Currency')); ?></label>
                                <select class="form-select" id="currency" name="currency" required>
                                    <option value="TZS" <?php echo e(auth()->user()->account->currency === 'TZS' ? 'selected' : ''); ?>>Tanzanian Shilling (TZS)</option>
                                    <option value="KES" <?php echo e(auth()->user()->account->currency === 'KES' ? 'selected' : ''); ?>>Kenyan Shillings (KES)</option>
                                    <option value="UGX" <?php echo e(auth()->user()->account->currency === 'UGX' ? 'selected' : ''); ?>>Ugandan Shillings (UGX)</option>
                                    <option value="USD" <?php echo e(auth()->user()->account->currency === 'USD' ? 'selected' : ''); ?>>US Dollar (USD)</option>
                                    <option value="EUR" <?php echo e(auth()->user()->account->currency === 'EUR' ? 'selected' : ''); ?>>Euro (EUR)</option>
                                </select>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="activateCurrency" name="activate_currency" <?php echo e(auth()->user()->account->is_currency_active ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="activateCurrency"><?php echo e(__('Activate Currency')); ?></label>
                            </div>
                            <!-- Tax Rate Slider -->
                            <div class="mb-3 mt-3">
                                <label for="tax_rate" class="form-label"><?php echo e(__('Tax Rate (%)')); ?></label>
                                <input type="range" class="form-range" id="tax_rate" name="tax_rate" min="0" max="100" step="1" value="<?php echo e(auth()->user()->account->tax_rate ?? 0); ?>" oninput="this.nextElementSibling.value = this.value">
                                <output class="mt-2 d-block"><?php echo e(auth()->user()->account->tax_rate ?? 0); ?>%</output>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary"><?php echo e(__('Save Changes')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Change Password -->
                <div class="card mb-4">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title">
                                <?php echo e(__('Change Password')); ?>

                            </h3>
                        </div>
                    </div>
                    <?php if (isset($component)) { $__componentOriginalf9a5f060e1fbbcbc7beb643b113b10ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf9a5f060e1fbbcbc7beb643b113b10ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.index','data' => ['action' => ''.e(route('password.update')).'','method' => 'PUT']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => ''.e(route('password.update')).'','method' => 'PUT']); ?>
                        <div class="card-body">
                            <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.index','data' => ['type' => 'password','name' => 'current_password','label' => ''.e(__('Current Password')).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'password','name' => 'current_password','label' => ''.e(__('Current Password')).'','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.index','data' => ['type' => 'password','name' => 'password','label' => ''.e(__('New Password')).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'password','name' => 'password','label' => ''.e(__('New Password')).'','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input.index','data' => ['type' => 'password','name' => 'password_confirmation','label' => ''.e(__('Confirm Password')).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'password','name' => 'password_confirmation','label' => ''.e(__('Confirm Password')).'','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $attributes = $__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__attributesOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1)): ?>
<?php $component = $__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1; ?>
<?php unset($__componentOriginalc2fcfa88dc54fee60e0757a7e0572df1); ?>
<?php endif; ?>
                        </div>
                        <div class="card-footer text-end">
                            <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button.index','data' => ['type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit']); ?><?php echo e(__('Save')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf9a5f060e1fbbcbc7beb643b113b10ab)): ?>
<?php $attributes = $__attributesOriginalf9a5f060e1fbbcbc7beb643b113b10ab; ?>
<?php unset($__attributesOriginalf9a5f060e1fbbcbc7beb643b113b10ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf9a5f060e1fbbcbc7beb643b113b10ab)): ?>
<?php $component = $__componentOriginalf9a5f060e1fbbcbc7beb643b113b10ab; ?>
<?php unset($__componentOriginalf9a5f060e1fbbcbc7beb643b113b10ab); ?>
<?php endif; ?>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Two-Factor Authentication -->
                <div class="card mb-4">
                    <div class="card-header">
                        <?php echo e(__('Two-Factor Authentication')); ?>

                    </div>
                    <div class="card-body">
                        <p>
                           <?php echo e(__(' Add another level of security to your account by enabling two-factor authentication.')); ?>

                        </p>
                        <form>
                            <div class="form-check">
                                <input class="form-check-input" id="twoFactorOn" type="radio" name="twoFactor" checked="" />
                                <label class="form-check-label" for="twoFactorOn"><?php echo e(__('On')); ?></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="twoFactorOff" type="radio" name="twoFactor" />
                                <label class="form-check-label" for="twoFactorOff"><?php echo e(__('Off')); ?></label>
                            </div>
                        </form>
                    </div> 
                </div>

                <!-- Delete Account -->
                <div class="card mb-4">
                    <div class="card-header">
                        <?php echo e(__('Delete Account')); ?>

                    </div>
                    <div class="card-body">
                        <p>
                            <?php echo e(__('Deleting your account is a permanent action and cannot be undone.')); ?>

                        </p>
                        <button type="button" class="btn btn-danger-soft text-danger">
                            <?php echo e(__('I understand, delete my account')); ?>

                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-scripts'); ?>
    <script src="<?php echo e(asset('assets/js/img-preview.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/profile/settings.blade.php ENDPATH**/ ?>