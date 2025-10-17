<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.v_deskripsi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Basic Setup -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Data Bank Putusan</h3>

            <div class="panel-options">
                <a href="#" data-toggle="panel">
                    <span class="collapse-icon">&ndash;</span>
                    <span class="expand-icon">+</span>
                </a>
                <a href="#" data-toggle="remove">
                    &times;
                </a>
            </div>
        </div>
        <div class="panel-body">

            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $("#example-4").dataTable({
                        dom: "<'row'<'col-sm-5'l><'col-sm-7'Tf>r>" +
                            "t" +
                            "<'row'<'col-xs-6'i><'col-xs-6'p>>",
                        tableTools: {
                            sSwfPath: "assets/js/datatables/tabletools/copy_csv_xls_pdf.swf"
                        }
                    });
                });
            </script>
            <td class="text-center" style="font-size: 5px;">
                <?php if(Auth::user()->level === 1): ?>
                    <a href="<?php echo e(route('bankput.create')); ?>" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                <?php elseif(Auth::user()->level === 2): ?>
                    <a href="<?php echo e(route('bankput.create')); ?>" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                <?php elseif(Auth::user()->level === 3): ?>
                <?php endif; ?>
            </td>

            

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

            <table class="table table-sm table-hover" id="example-4">
                <thead class="bg-gray">
                    <tr>
                        <th style="width: 5px;">No</th>
                        <!-- <th style="width: 30px;">Tanggal Register</th> -->
                        <th style="width: 70px;">Nomor Banding</th>
                        <th style="width: 30px;">Jenis Perkara</th>
                        <!-- <th style="width: 70px;">Pembanding</th>
                                <th style="width: 70px;">Terbanding</th> -->
                        <th style="width: 30px;">Putus</th>
                        <th style="width: 30px;">Status</th>
                        <th style="width: 20px;">Putusan</th>
                        <th style="width: 30px;">Anonimasi</th>
                        <th style="width: 30px;">Keterangan</th>
                        <th style="width: 50px;">Action</th>
                    </tr>
                </thead>

                <tfoot class="bg-gray">
                    <tr>
                        <th>No</th>
                        <!-- <th>Tanggal Register</th> -->
                        <th>Nomor Banding</thyle=>
                        <th>Jenis Perkara</th>
                        <!-- <th>Pembanding</th>
                                <th>Terbanding</th> -->
                        <th>Putus</th>
                        <th>Status</th>
                        <th>Putusan</th>
                        <th>Anonimasi</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>

                <tbody>
                    <?php $__currentLoopData = $bankputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($loop->iteration); ?></td>

                            <td><?php echo e($data->no_banding); ?></td>
                            <td><?php echo e($data->jenis_perkara); ?></td>
                            <td class="text-center">
                                <?php if($data->tgl_put_banding == ''): ?>
                                    "-"
                                <?php else: ?>
                                    <?php echo e(date('d-m-Y', strtotime($data->tgl_put_banding))); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e($data->status_putus); ?></td>
                            <td class="text-center">
                                <?php if($data->put_rtf == ''): ?>
                                <?php else: ?>
                                    <a href="public/bank_putusan_rtf/<?php echo e($data->put_rtf); ?>" class="text-blue"
                                        target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if($data->put_anonim == ''): ?>
                                <?php else: ?>
                                    <a href="public/bank_putusan_anonim/<?php echo e($data->put_anonim); ?>" class="text-blue"
                                        target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($data->keterangan); ?></td>
                            <!-- <td class="text-center"></td> -->
                            <td class="text-center" style="font-size: 5px;">
                                <?php if(Auth::user()->level === 1): ?>
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail<?php echo e($data->id); ?>"
                                        style="padding: 2px 5px; font-size: 8px; margin: 1px;">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="<?php echo e(route('bankput.edit', $data->id)); ?>" class="btn btn-warning btn-xs"
                                        style="padding: 2px 5px; font-size: 8px; margin: 1px;">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form id="deleteForm" action="<?php echo e(route('bankput.destroy', $data->id)); ?>"
                                        method="POST" style="display: inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="button" onclick="confirmDelete()" class="btn btn-danger btn-xs"
                                            style="padding: 2px 5px; font-size: 8px; margin: 1px;">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                <?php elseif(Auth::user()->level === 2): ?>
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail<?php echo e($data->id); ?>"
                                        style="padding: 2px 5px; font-size: 8px; margin: 1px;">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="<?php echo e(route('bankput.edit', $data->id)); ?>" class="btn btn-warning btn-xs"
                                        style="padding: 2px 5px; font-size: 8px; margin: 1px;">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                <?php elseif(Auth::user()->level === 3): ?>
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail<?php echo e($data->id); ?>"
                                        style="padding: 2px 5px; font-size: 8px; margin: 1px;">
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
    <?php $__currentLoopData = $bankputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Modal Detail -->
        <div class="modal fade" id="detail<?php echo e($data->id); ?>" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 colspan="2" class="text-white text-center bg-success">Detail Bank Putusan</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-small-font table-bordered table-hover">

                            <tr class="text-start border">
                                <td>Tanggal Putus Banding</td>
                                <td><?php echo e(date('d-m-Y', strtotime($data->tgl_put_banding))); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Putusan Akhir</td>
                                <td>
                                    <?php if($data->put_rtf == ''): ?>
                                        ""
                                    <?php else: ?>
                                        <a href="\public\storage\bankput\rtf\<?php echo e($data->put_rtf); ?>" class="text-blue"
                                            target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td>Putusan Anonimasi</td>
                                <td>
                                    <?php if($data->put_anonim == ''): ?>
                                        ""
                                    <?php else: ?>
                                        <a href="\public\storage\bankput\anonim\<?php echo e($data->put_anonim); ?>"
                                            class="text-blue" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->

        <!-- Modal Hapus -->
        <div class="modal fade" id="delete<?php echo e($data->id); ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title"><?php echo e($data->no_banding); ?> </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="<?php echo e(route('bankput.destroy', $data->id)); ?>" type="button"
                            class="btn btn-sm btn-danger">Ya</a>
                        <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\pm_hukum_app\resources\views/bank_putusan/index.blade.php ENDPATH**/ ?>