<!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
<div class="nav-item dropdown">
    <a href="#" class="nav-link" data-bs-toggle="dropdown" aria-label="Show notifications">
        <lord-icon src="https://cdn.lordicon.com/lznlxwtc.json" trigger="hover" colors="primary:black" style="width:20px;height:20px"></lord-icon>
<span class="badge bg-red"><?php echo e($notifications->where('read_at', null)->count()); ?></span>
    <div class="dropdown-menu dropdown-menu-end">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Notifications</h3>
                <button class="btn btn-link" onclick="markAllAsRead()">Mark all as read</button>
            </div>
            <div class="list-group">
                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong><?php echo e($notification->data['title']); ?></strong>
                                <p><?php echo e($notification->data['message']); ?></p>
                            </div>
                            <div>
                                <button onclick="markNotificationAsRead('<?php echo e($notification->id); ?>')">Mark as read</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\rstoresV1R\rsmstores\resources\views/components/notification-panel.blade.php ENDPATH**/ ?>