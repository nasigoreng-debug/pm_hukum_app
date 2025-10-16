<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.v_deskripsi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Data Arsip Perkara</h3>

            <div class="panel-options">
                <a href="#" data-toggle="panel">
                    <span class="collapse-icon">&ndash;</span>
                    <span class="expand-icon">+</span>
                </a>
                <a href="#" data-toggle="remove">&times;</a>
            </div>
        </div>

        <div class="panel-body">
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $("#example-3").dataTable().yadcf([{
                            column_number: 2,
                            filter_type: 'text'
                        },
                        {
                            column_number: 3,
                            filter_type: 'text'
                        },
                        {
                            column_number: 4
                        }
                    ]);
                });
            </script>

            <!-- Date Range Filter -->
            <div class="text-center">
                <form method="GET" action="/search-date-range-arsip-perkara"
                    class="form-inline justify-content-center align-items-start">
                    <div class="input-group input-group-sm mr-2">
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>
                    <span class="mx-2 align-self-center">s.d</span>
                    <div class="input-group input-group-sm mr-2">
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary mr-2">Tampilkan</button>
                    <a href="<?php echo e(route('arsip.filter', 'total')); ?>" class="btn btn-sm btn-danger">
                        <i class="fa fa-repeat"></i> Reset
                    </a>
                </form>
            </div>

            <!-- Action Buttons -->
            <div class="" style="font-size: 14px;">
                <?php if(in_array(Auth::user()->level, [1, 2])): ?>
                    <a href="<?php echo e(route('arsip.create')); ?>" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                    <a href="/arsip" class="btn btn-sm btn-danger mb-2">Kembali</a>
                <?php endif; ?>
            </div>

            <!-- Success Message -->
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

            <!-- Data Table -->
            <table class="table table-sm table-hover" id="example-3">
                <thead>
                    <tr class="replace-inputs bg-gray">
                        <th style="width: 5px;">No</th>
                        <th style="width: 30px;">Masuk</th>
                        <th style="width: 70px;">Nomor Perkara</th>
                        <th style="width: 70px;">Nomor PA</th>
                        <th style="width: 50px;">Jenis Perkara</th>
                        <th style="width: 30px;">Putus</th>
                        <th style="width: 20px;">Putusan</th>
                        <th style="width: 20px;">Bundel B</th>
                        <th style="width: 30px;">Alih Media</th>
                        <th style="width: 30px;">Action</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr class="bg-gray">
                        <th>No</th>
                        <th>Masuk</th>
                        <th>Nomor Perkara</th>
                        <th>Nomor PA</th>
                        <th>Jenis Perkara</th>
                        <th>Putus</th>
                        <th>Putusan</th>
                        <th>Bundel B</th>
                        <th>Alih Media</th>
                        <th>Action</th>
                    </tr>
                </tfoot>

                <tbody>
                    <?php $__currentLoopData = $arsip_perkara; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-start"><?php echo e($loop->iteration); ?></td>
                            <td class="text-start"><?php echo e(date('d-m-Y', strtotime($data->tgl_masuk))); ?></td>
                            <td><?php echo e($data->no_banding); ?></td>
                            <td><?php echo e($data->no_pa); ?></td>
                            <td><?php echo e($data->jenis_perkara); ?></td>
                            <td class="text-start"><?php echo e(date('d-m-Y', strtotime($data->tgl_put_banding))); ?></td>
                            <td class="text-start">
                                <?php if(empty($data->putusan)): ?>
                                    <span class="badge badge-primary">belum upload</span>
                                <?php else: ?>
                                    <a href="<?php echo e(asset('public/arsip_perkara_putusan/' . $data->putusan)); ?>"
                                        class="text-blue" target="_blank">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                            <td class="text-start">
                                <?php if(empty($data->bundel_b)): ?>
                                    <span class="badge badge-primary">belum upload</span>
                                <?php else: ?>
                                    <a href="<?php echo e(asset('public/bundel_b_arsip_perkara/' . $data->bundel_b)); ?>"
                                        class="text-blue" target="_blank">
                                        <i class="fa fa-file-archive-o"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                            <td class="text-start"><?php echo e(date('d-m-Y', strtotime($data->tgl_alih_media))); ?></td>
                            <td class="text-center" style="font-size: 14px;">
                                <?php if(Auth::user()->level == 1): ?>
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail<?php echo e($data->id); ?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="<?php echo e(route('arsip.edit', $data->id)); ?>" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form id="deleteForm" action="<?php echo e(route('arsip.destroy', $data->id)); ?>" method="POST"
                                        style="display: inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="button" onclick="confirmDelete(this)" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                <?php elseif(Auth::user()->level == 2): ?>
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail<?php echo e($data->id); ?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="<?php echo e(route('arsip.edit', $data->id)); ?>" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                <?php elseif(Auth::user()->level == 3): ?>
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail<?php echo e($data->id); ?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modals -->
    <?php $__currentLoopData = $arsip_perkara; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Modal Detail -->
        <div class="modal fade" id="detail<?php echo e($data->id); ?>" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="text-white text-center bg-success w-100">Detail Arsip Perkara</h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-small-font table-bordered table-hover">
                            <tr class="text-start border">
                                <td style="width: 200px;">Tanggal Masuk Arsip</td>
                                <td><?php echo e(date('d-m-Y', strtotime($data->tgl_masuk))); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Nomor Perkara Banding</td>
                                <td><?php echo e($data->no_banding); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Nomor Perkara TK.I</td>
                                <td><?php echo e($data->no_pa); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Jenis Perkara</td>
                                <td><?php echo e($data->jenis_perkara); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Putus Banding</td>
                                <td><?php echo e(date('d-m-Y', strtotime($data->tgl_put_banding))); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Petugas yang Menyerahkan Berkas</td>
                                <td><?php echo e($data->penyerah); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Petugas yang Menerima Berkas</td>
                                <td><?php echo e($data->penerima); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Nomor Lemari</td>
                                <td><?php echo e($data->no_lemari); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Nomor Laci</td>
                                <td><?php echo e($data->no_laci); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Nomor Box</td>
                                <td><?php echo e($data->no_box); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Alih Media</td>
                                <td><?php echo e(date('d-m-Y', strtotime($data->tgl_alih_media))); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Delete -->
        <div class="modal fade" id="delete<?php echo e($data->id); ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title"><?php echo e($data->no_banding); ?></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="/arsip/delete/<?php echo e($data->id); ?>" type="button" class="btn btn-xs btn-danger">Ya</a>
                        <button type="button" class="btn btn-xs btn-white" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\pm_hukum_app\resources\views/arsip/index.blade.php ENDPATH**/ ?>