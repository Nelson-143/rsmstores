    <?php if(session()->has('success')): ?>
        <div class="col-12">
            <div class="alert alert-success " role="alert">
                <div class="alert-icon-content">
                    <div class="alert-icon-content">
                        <?php echo e(session('success')); ?>

                    </div>
                </div>
            </div>
        </div>
    <?php elseif(session()->has('error')): ?>
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                <div class="alert-icon-content">
                    <div class="alert-icon-content">
                        <?php echo e(session('error')); ?>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php /**PATH C:\rstoresV1R\rsmstores\resources\views/partials/session.blade.php ENDPATH**/ ?>