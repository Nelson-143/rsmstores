<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'action',
    'method'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'action',
    'method'
]); ?>
<?php foreach (array_filter(([
    'action',
    'method'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<form action="<?php echo e($action); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field($method); ?>

    <?php echo e($slot); ?>

</form>
<?php /**PATH C:\rstoresV1R\rsmstores\resources\views/components/form/index.blade.php ENDPATH**/ ?>