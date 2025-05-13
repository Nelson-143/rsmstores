 <nav class="nav nav-borders">
     <a class="nav-link " href="<?php echo e(route('profile.edit')); ?>"><?php echo e(__('Profile')); ?></a>
     <?php if (\Illuminate\Support\Facades\Blade::check('role', 'Super Admin')): ?>
     <a class="nav-link active " href="<?php echo e(route('profile.settings')); ?>"><?php echo e(__('Settings')); ?></a>
     <a class="nav-link " href="<?php echo e(route('profile.store.settings')); ?>"><?php echo e(__('Store')); ?></a>
        <a class="nav-link text-danger" href="<?php echo e(route('liabilities.index')); ?>"><b><?php echo e(__('Liabilities')); ?>💰</b></a>
     <?php endif; ?>
 </nav>
<?php /**PATH C:\rstoresV1R\rsmstores\resources\views/profile/component/menu.blade.php ENDPATH**/ ?>