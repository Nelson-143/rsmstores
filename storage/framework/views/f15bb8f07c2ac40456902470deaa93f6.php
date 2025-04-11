<?php $__env->startSection('content'); ?>
<div class="text-center">
    <div class="my-5">
        <p class="fs-h3 text-secondary">
            <?php echo e(__('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.')); ?>

        </p>
    </div>
</div>


<?php if(session('status') == 'verification-link-sent'): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(__('A new verification link has been sent to the email address you provided during registration.')); ?>

    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo e($errors->first()); ?>

    </div>
<?php endif; ?>


<form action="<?php echo e(route('verification.send')); ?>" method="POST" autocomplete="off">
    <?php echo csrf_field(); ?>
    <button type="submit" class="btn btn-primary w-100">
        <?php echo e(__('Resend Verification Email')); ?>

    </button>
</form>


<form action="<?php echo e(route('logout')); ?>" method="POST" autocomplete="off" class="mt-4">
    <?php echo csrf_field(); ?>
    <button type="submit" class="btn btn-secondary w-100">
        <?php echo e(__('Log Out')); ?>

    </button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/auth/emails/verify-email.blade.php ENDPATH**/ ?>