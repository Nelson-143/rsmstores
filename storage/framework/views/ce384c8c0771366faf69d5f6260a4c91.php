<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>User Locations</h5>
            </div>
            <div class="card-body">
                <div id="usersMap" style="height: 500px;"></div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Top Locations</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <?php $__currentLoopData = $topLocations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($location->city); ?></td>
                        <td><?php echo e($location->country); ?></td>
                        <td class="text-end"><?php echo e($location->user_count); ?> users</td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('after_scripts'); ?>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    // Initialize map
    const map = L.map('usersMap').setView([20, 0], 2);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    
    // Add user markers
    <?php $__currentLoopData = $usersWithGeo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($user->latitude && $user->longitude): ?>
            L.marker([<?php echo e($user->latitude); ?>, <?php echo e($user->longitude); ?>])
                .bindPopup(`
                    <b><?php echo e($user->name); ?></b><br>
                    <?php echo e($user->store_name); ?><br>
                    <?php echo e($user->store_address); ?>

                `)
                .addTo(map);
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('after_styles'); ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<style>
    #usersMap { 
        border-radius: 5px;
        border: 1px solid #eee;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(backpack_view('blank'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/vendor/backpack/crud/users_map.blade.php ENDPATH**/ ?>