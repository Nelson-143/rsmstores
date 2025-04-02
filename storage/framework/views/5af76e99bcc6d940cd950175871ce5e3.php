

<ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
    <?php $__currentLoopData = request()->breadcrumbs()->segments(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $segment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="breadcrumb-item">
            <a href="<?php echo e($segment->url()); ?>">
                <?php echo e(optional($segment->model())->title ?: $segment->name()); ?>

            </a>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ol>
<?php /**PATH C:\rstoresV1R\rsmstores\resources\views/partials/_breadcrumbs.blade.php ENDPATH**/ ?>