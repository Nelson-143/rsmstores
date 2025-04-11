<?php $__env->startSection('title'); ?>
    <?php echo e(__('Your Team')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <!-- Page Header -->
    <div class="page-header d-flex justify-content-between  mb-4">
        <div>
            <h2 class="page-title"><?php echo e(__('Team Management')); ?></h2>
            <p class="text-muted mb-0"><?php echo e(__('Manage your team with a glance and ease')); ?>.</p>
            <div class="d-flex flex-row">
    <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#userModal">
        <i class="ti ti-circle-plus"></i> <?php echo e(__('Add Team Member')); ?>

    </button>
    <a class="btn btn-primary" href="<?php echo e(route('admin.team.logs.show')); ?>">
        <i class="ti ti-eye"></i> <?php echo e(__('View Team Logs')); ?>

    </a>
</div>

    <!-- Success Message -->
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Users Table -->
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="ps-4"><?php echo e(__('Name')); ?></th>
                        <th><?php echo e(__('Email')); ?></th>
                        <th><?php echo e(__('Role')); ?></th>
                        <th class="text-end pe-4"><?php echo e(__('Actions')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="align-middle">
                            <td class="ps-4"><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td>
                                <span class="badge bg-info"><?php echo e($user->roles->pluck('name')->implode(', ')); ?></span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <?php echo e(__('Actions')); ?>

                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item text-warning" href="#" onclick="editUser(<?php echo e(json_encode($user)); ?>)">
                                                <i class="ti ti-edit me-2"></i> <?php echo e(__('Edit')); ?>

                                            </a>
                                        </li>
                                        <li>
                                            <form action="<?php echo e(route('admin.team.destroy', $user->id)); ?>" method="POST" onsubmit="return confirm('Are you sure?')">
                                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="dropdown-item text-danger">
                                                    <i class="ti ti-trash me-2"></i> <?php echo e(__('Delete')); ?>

                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- User Modal (Create / Edit) -->
<div class="modal modal-blur fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel"><?php echo e(__('Add User')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="userForm" action="<?php echo e(route('admin.team.storeOrUpdate')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="user_id" id="user_id">

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Name')); ?></label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Email')); ?></label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Password')); ?></label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><?php echo e(__('Role')); ?></label>
                        <select class="form-select" name="role" id="role" required>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                    <button type="submit" class="btn btn-primary" id="submitButton"><?php echo e(__('Save')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function editUser(user) {
        document.getElementById('user_id').value = user.id;
        document.getElementById('name').value = user.name;
        document.getElementById('email').value = user.email;
        document.getElementById('password').value = "";
        document.getElementById('role').value = user.roles[0]?.name || "";

        document.getElementById('userModalLabel').textContent = "Edit User";
        document.getElementById('submitButton').textContent = "Update User";

        var modal = new bootstrap.Modal(document.getElementById('userModal'));
        modal.show();
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/admin/team/index.blade.php ENDPATH**/ ?>