<link rel="shortcut icon" href="<?php echo e(asset('public/favicon/favicon.ico')); ?>">

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.v_deskripsi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Data Pengguna</h4>
                        <?php if(in_array(Auth::user()->level, [1, 2])): ?>
                            <a href="<?php echo e(route('users.create')); ?>" class="btn btn-sm btn-info">
                                <i class="fas fa-plus"></i> Tambah User
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="card-body">
                    
                    <?php if(session('pesan')): ?>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Sukses!',
                                    text: '<?php echo e(session('pesan')); ?>',
                                    timer: 3000,
                                    showConfirmButton: true,
                                    confirmButtonText: 'OK',
                                    timerProgressBar: true
                                });
                            });
                        </script>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-sm table-hover userss-table">
                            <thead class="thead-light">
                                <tr>
                                    <th width="5%" class="text-center">
                                        <input type="checkbox" class="form-check-input">
                                    </th>
                                    <th width="8%" class="text-center d-none d-md-table-cell">Foto</th>
                                    <th width="25%">Nama</th>
                                    <th width="20%" class="d-none d-md-table-cell">Username</th>
                                    <th width="15%" class="text-center">Level</th>
                                    <th width="27%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center">
                                            <input type="checkbox" class="form-check-input" name="userss-list[]"
                                                value="1">
                                        </td>
                                        <td class="text-center d-none d-md-table-cell">
                                            <?php if($data->foto_user && file_exists(public_path('storage/users/' . $data->foto_user))): ?>
                                                <img src="<?php echo e(asset('public/storage/users/' . $data->foto_user)); ?>"
                                                    alt="<?php echo e($data->name); ?>" class="rounded-circle" width="40"
                                                    height="40" style="object-fit: cover;">
                                            <?php else: ?>
                                                <div class="avatar-placeholder rounded-circle d-flex align-items-center justify-content-center bg-light mx-auto"
                                                    style="width:40px; height:40px;">
                                                    <i class="fas fa-user text-muted"></i>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="fw-bold"><?php echo e($data->name); ?></div>
                                            <small class="text-muted d-block">
                                                <?php if($data->level === 1): ?>
                                                    Administrator
                                                <?php elseif($data->level === 2): ?>
                                                    Staf
                                                <?php elseif($data->level === 3): ?>
                                                    User
                                                <?php endif; ?>
                                            </small>
                                        </td>
                                        <td class="d-none d-md-table-cell">
                                            <span class="text-muted"><?php echo e($data->username); ?></span>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="badge
                                        <?php if($data->level === 1): ?> bg-danger
                                        <?php elseif($data->level === 2): ?> bg-warning
                                        <?php elseif($data->level === 3): ?> bg-info <?php endif; ?>">
                                                <?php echo e($data->level); ?>

                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="<?php echo e(route('users.edit', $data->id)); ?>"
                                                    class="btn btn-sm btn-primary" title="Edit Profile">
                                                    <i class="fas fa-edit"></i>
                                                    <span class="d-none d-sm-inline">Edit</span>
                                                </a>

                                                <?php if($data->id !== Auth::id() && in_array(Auth::user()->level, [1, 2])): ?>
                                                    <button type="button" class="btn btn-sm btn-danger delete-btn"
                                                        data-id="<?php echo e($data->id); ?>" data-name="<?php echo e($data->name); ?>"
                                                        title="Hapus User">
                                                        <i class="fas fa-trash"></i>
                                                        <span class="d-none d-sm-inline">Hapus</span>
                                                    </button>
                                                <?php else: ?>
                                                    <button class="btn btn-sm btn-secondary" disabled
                                                        title="Tidak dapat menghapus akun sendiri atau tidak memiliki akses">
                                                        <i class="fas fa-trash"></i>
                                                        <span class="d-none d-sm-inline">Hapus</span>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
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

    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');

                    Swal.fire({
                        title: "Apakah Anda yakin?",
                        html: `User <strong>"${name}"</strong> akan dihapus secara permanen!`,
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#6c757d",
                        confirmButtonText: "Ya, hapus!",
                        cancelButtonText: "Batal",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Create and submit form dynamically
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = `<?php echo e(url('users')); ?>/${id}`;
                            form.style.display = 'none';

                            const csrfToken = document.createElement('input');
                            csrfToken.type = 'hidden';
                            csrfToken.name = '_token';
                            csrfToken.value = '<?php echo e(csrf_token()); ?>';

                            const methodField = document.createElement('input');
                            methodField.type = 'hidden';
                            methodField.name = '_method';
                            methodField.value = 'DELETE';

                            form.appendChild(csrfToken);
                            form.appendChild(methodField);
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

    <style>
        .avatar-placeholder {
            margin: 0 auto;
        }

        .table td.text-center {
            vertical-align: middle;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\pm_hukum_app\resources\views/user/index.blade.php ENDPATH**/ ?>