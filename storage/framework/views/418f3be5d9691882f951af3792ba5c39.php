<?php $__env->startSection('title'); ?>
   <?php echo e(__(' Branch')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="page-header d-flex justify-content-between align-items-center">
        <h2 class="page-title"><?php echo e(__('Branch Management')); ?></h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#branchModal" @click="resetForm">
            <i class="ti ti-plus"></i> <?php echo e(__('Add Branch')); ?>

        </button>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card mt-4">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th><?php echo e(__('Name')); ?></th>
                        <th><?php echo e(__('Status')); ?></th>
                        <th><?php echo e(__('Actions')); ?></th>
                    </tr>
                </thead>
                <tbody>
    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($branch->account_id == auth()->user()->account_id): ?>
            <tr>
                <td><?php echo e($branch->name); ?></td>
                <td>
                    <span class="badge <?php echo e($branch->status == 'active' ? 'bg-success' : 'bg-danger'); ?>">
                        <?php echo e(ucfirst($branch->status)); ?>

                    </span>
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <?php echo e(__('Actions')); ?>

                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item text-warning" href="#" onclick="editBranch(<?php echo e(json_encode($branch)); ?>)">
                                    <i class="ti ti-edit"></i> <?php echo e(__('Edit')); ?>

                                </a>
                            </li>
                            <li>
                                <form action="<?php echo e(route('branches.destroy', $branch->id)); ?>" method="POST" onsubmit="return confirm('Are you sure?')">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="ti ti-trash"></i> <?php echo e(__('Disable')); ?>

                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>

            </table>
        </div>
    </div>
</div>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<!-- Branch Modal -->
<div class="modal modal-blur fade" id="branchModal" tabindex="-1" aria-labelledby="branchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="branchModalLabel"><?php echo e(__('Add Branch')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="branchForm" action="<?php echo e(route('branches.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="branch_id" id="branch_id">

    <div class="modal-body">
        <div class="mb-3">
            <label class="form-label"><?php echo e(__('Branch Name')); ?></label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="mb-3">
            <label class="form-label"><?php echo e(__('Status')); ?></label>
            <select class="form-select" name="status" id="status">
                <option value="active"><?php echo e(__('Active')); ?></option>
                <option value="disabled"><?php echo e(__('Disabled')); ?></option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
        <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
    </div>
</form>
        </div>
    </div>
</div>
<script>
    function editBranch(branch) {
        document.getElementById('branch_id').value = branch.id;
        document.getElementById('name').value = branch.name;
        document.getElementById('status').value = branch.status;

        document.getElementById('branchModalLabel').textContent = "Edit Branch";
        var modal = new bootstrap.Modal(document.getElementById('branchModal'));
        modal.show();
    }
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.tabler', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\rstoresV1R\rsmstores\resources\views/branches/index.blade.php ENDPATH**/ ?>