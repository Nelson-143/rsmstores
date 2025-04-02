


<?php $__env->startSection('header'); ?>
    <div class="container-fluid">
        <h2>
            <span class="text-capitalize"><?php echo e($title); ?></span>
        </h2>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Users</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Registered On</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($user->id); ?></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->username); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td>
                                            <span class="badge badge-<?php echo e($user->role == 'SuperAdmin' ? 'danger' : ($user->role == 'Admin' ? 'warning' : 'info')); ?>">
                                                <?php echo e($user->role); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-<?php echo e($user->status == 'active' ? 'success' : 'secondary'); ?>">
                                                <?php echo e($user->status); ?>

                                            </span>
                                        </td>
                                        <td><?php echo e($user->created_at->format('Y-m-d H:i')); ?></td>
                                        <td>
                                            <a href="<?php echo e(url(config('backpack.base.route_prefix') . '/custom-users/' . $user->id)); ?>" 
                                               class="btn btn-sm btn-link">
                                                <i class="la la-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_scripts'); ?>
<script>
    $(document).ready(function() {
        // Initialize DataTable for better user experience
        $('.table').DataTable({
            responsive: true,
            pageLength: 25,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search users..."
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(backpack_view('blank'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/admin/users/index.blade.php ENDPATH**/ ?>