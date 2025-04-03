<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'header',
    'content',
    'footer',
    'title',
    'actions'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'header',
    'content',
    'footer',
    'title',
    'actions'
]); ?>
<?php foreach (array_filter(([
    'header',
    'content',
    'footer',
    'title',
    'actions'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div <?php echo e($attributes->class(['card'])); ?>>

    <?php if(isset($header)): ?>
        <div <?php echo e($header->attributes->class(['card-header'])); ?>>
            <?php if(isset($title)): ?>
                <div>
                    <h3 class="card-title">
                        <?php echo e($title); ?>

                    </h3>
                </div>
            <?php endif; ?>

            <?php echo e($header); ?>


            <?php if(isset($actions)): ?>
                <div class="card-actions">
                    <?php echo e($actions); ?>

                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if(isset($content)): ?>
        <div <?php echo e($content->attributes->class(['card-body'])); ?>>
            <?php echo e($content); ?>

        </div>
    <?php endif; ?>

    <?php if(isset($slot)): ?>
        <?php echo e($slot); ?>

    <?php endif; ?>

    <?php if(isset($footer)): ?>
        <div <?php echo e($footer->attributes->class(['card-footer'])); ?>>
            <?php echo e($footer); ?>

        </div>
   <?php endif; ?>
</div>
<?php /**PATH C:\rstoresV1R\rsmstores\resources\views/components/card/index.blade.php ENDPATH**/ ?>