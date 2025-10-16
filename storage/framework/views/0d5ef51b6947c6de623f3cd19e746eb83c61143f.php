<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.v_deskripsi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Table exporting -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Data Pengaduan</h3>

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

            <div class="text-center mb-3">
                <!-- Filter Form -->
                <form action="/search-date-range-pengaduan" method="GET" class="form-inline mb-3">
                    <div class="form-group mr-3 mb-2">
                        <label for="start_date" class="mr-2"><strong>Dari Tanggal:</strong></label>
                        <input type="date" class="form-control form-control-sm" id="start_date" name="start_date"
                            value="<?php echo e($startDate ?? ''); ?>" required>
                    </div>
                    <div class="form-group mr-3 mb-2">
                        <label for="end_date" class="mr-2"><strong>Sampai Tanggal:</strong></label>
                        <input type="date" class="form-control form-control-sm" id="end_date" name="end_date"
                            value="<?php echo e($endDate ?? ''); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mr-2 mb-2">
                        <i class="fa fa-search"></i> Tampilkan Data
                    </button>
                    <a href="/pgd_total" class="btn btn-warning btn-sm mr-2 mb-2">
                        <i class="fa fa-refresh"></i> Reset Filter
                    </a>
                </form>
            </div>
            <br>

            <div class="text-start">
                <a href="/pgd/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                <a href="/pgd_total" class="btn btn-sm btn-success mb-2">All Data</a>
                <button onclick="printTable()" class="btn btn-sm btn-warning">
                    <i class="fa fa-print"></i> Print
                </button>
                <a href="/pgd" class="btn btn-sm btn-danger mb-2">Kembali</a>
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
            <table class="table table-sm table-hover" id="example-4">
                <thead class="bg-gray">
                    <tr>
                        <th class="text-center" style="width: 20px;">No</th>
                        <th class="text-center" style="width: 80px;">Tanggal Pengaduan</th>
                        <th class="text-center" style="width: 130px;">No. Surat</th>
                        <th class="text-center" style="width: 100px;">Pelapor</th>
                        <th class="text-center" style="width: 100px;">Terlapor</th>
                        <th class="text-center" style="width: 150px;">Uraian Pengaduan</th>
                        <!-- <th class="text-center" style="width: 100px;">Ditangani Oleh</th>
                                                                                <th class="text-center" style="width: 100px;">Dis PM Hukum</th>
                                                                                <th class="text-center" style="width: 120px;">Dis Ketua</th>
                                                                                <th class="text-center" style="width: 120px;">Dis Wakil</th>
                                                                                <th class="text-center" style="width: 80px;">Dis Hatiwasda</th>
                                                                                <th class="text-center" style="width: 60px;">Tindak Lanjut</th> -->
                        <th class="text-center" style="width: 60px;">Status Pengaduan</th>
                        <th class="text-center" style="width: 60px;">Posisi Berkas</th>
                        <!-- <th class="text-center" style="width: 60px;">Tanggal Selesai</th>
                                                                                <th class="text-center" style="width: 70px;">Tanggal LHP</th> -->
                        <!-- <th class="text-center" style="width: 60px;">Surat Pengaduan</th>
                                                                                <th class="text-center" style="width: 60px;">Lampiran</th> -->
                        <th class="text-center" style="width: 80px;">Action</th>
                    </tr>
                </thead>

                <tfoot class="bg-gray">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Tanggal Pengaduan</th>
                        <th>No. Surat</th>
                        <th>Pelapor</th>
                        <th>Terlpaor</th>
                        <th>Uraian Pengaduan</th>
                        <!-- <th>Ditangani Oleh</th>
                                                                                <th>Dis PM Hukum</th>
                                                                                <th>Dis Ketua</th>
                                                                                <th>Dis Wakil</th>
                                                                                <th>Dis Hatiwasda</th>
                                                                                <th>Tindak Lanjut</th> -->
                        <th>Status Pengaduan</th>
                        <th>Posisi Berkas</th>
                        <!-- <th>Tanggal Selesai</th>
                                                                                <th>Tanggal LHP</th> -->
                        <!-- <th>Surat Pengaduan</th>
                                                                                <th>Lampiran</th> -->
                        <th>Action</th>
                    </tr>
                </tfoot>

                <tbody>
                    <?php $__currentLoopData = $pengaduan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e(date('d-m-Y', strtotime($data->tgl_terima_pgd))); ?></td>
                            <td class="text-start"><?php echo e($data->no_pgd); ?></td>
                            <td class="text-start"><?php echo e($data->pelapor); ?></td>
                            <td class="text-start"><?php echo e($data->terlapor); ?></td>
                            <td class="text-start">
                                <?php echo e($data->uraian_pgd); ?>

                            </td>
                            <!-- <td><?php echo e($data->ditangani_oleh); ?></td>
                                                                                <td><?php echo e(date('d-m-Y', strtotime($data->dis_pm_hk))); ?></td>
                                                                                <td><?php echo e(date('d-m-Y', strtotime($data->dis_kpta))); ?></td>
                                                                                <td><?php echo e(date('d-m-Y', strtotime($data->dis_wkpta))); ?></td>
                                                                                <td><?php echo e(date('d-m-Y', strtotime($data->dis_hatiwasda))); ?></td>
                                                                                <td><?php echo e(date('d-m-Y', strtotime($data->tgl_tindak_lanjut))); ?></td> -->
                            <td>

                                <?php echo e($data->status_pgd); ?>


                            </td>

                            <td>
                                <?php echo e($data->status_berkas); ?>

                            </td>
                            <td>
                                <?php if(Auth::user()->level === 1): ?>
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail<?php echo e($data->id); ?>">
                                        <i class="fa fa-eye"></i></a>
                                    </button>
                                    <a href="/pgd/edit/<?php echo e($data->id); ?>" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                        data-target="#delete<?php echo e($data->id); ?>">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                <?php elseif(Auth::user()->level === 2): ?>
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail<?php echo e($data->id); ?>">
                                        <i class="fa fa-eye"></i></a>
                                    </button>
                                    <a href="/pgd/edit/<?php echo e($data->id); ?>" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                <?php elseif(Auth::user()->level === 3): ?>
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail<?php echo e($data->id); ?>">
                                        <i class="fa fa-eye"></i></a>
                                    </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
    </div>
    <?php $__currentLoopData = $pengaduan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Modal Detail -->
        <div class="modal fade" id="detail<?php echo e($data->id); ?>" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 colspan="2" class="text-white text-center bg-success">Detail Pengaduan</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-small-font table-bordered table-hover">
                            <tr class="text-start border">
                                <td style="width: 200px;">Terima Pengaduan</td>
                                <td><?php echo e(date('d-m-Y', strtotime($data->tgl_terima_pgd))); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Nomor Pengaduan</td>
                                <td><?php echo e($data->no_pgd); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Pelapor</td>
                                <td><?php echo e($data->pelapor); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Terlapor</td>
                                <td><?php echo e($data->terlapor); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td> Uraian Pengaduan</td>
                                <td><?php echo e($data->uraian_pgd); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td> Ditangani Oleh</td>
                                <td><?php echo e($data->ditangani_oleh); ?></td>
                            </tr>

                            <?php if($data->dis_pm_hk == '0000-00-00'): ?>
                            <?php elseif($data->dis_pm_hk == ''): ?>
                            <?php else: ?>
                                <tr class="text-start border">
                                    <td>Disposisi Panitera Muda Hukum</td>
                                    <td>
                                        <?php if($data->dis_pm_hk == '0000-00-00'): ?>
                                            <span class="badge badge-danger">Belum Disposisi</span>
                                            elseif($data->dis_pm_hk=="")
                                            <span class="badge badge-danger">Belum Disposisi</span>
                                        <?php else: ?>
                                            <?php echo e(date('d-m-Y', strtotime($data->dis_pm_hk))); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <?php if($data->dis_kpta == '0000-00-00'): ?>
                            <?php elseif($data->dis_kpta == ''): ?>
                            <?php else: ?>
                                <tr class="text-start border">
                                    <td>Disposisi Ketua</td>
                                    <td>
                                        <?php if($data->dis_kpta == '0000-00-00'): ?>
                                            <span class="badge badge-danger">Disposisi terakhir oleh Panitera Muda
                                                Hukum</span>
                                        <?php elseif($data->dis_kpta == ''): ?>
                                            <span class="badge badge-danger">Disposisi terakhir oleh Panitera Muda
                                                Hukum</span>
                                        <?php else: ?>
                                            <?php echo e(date('d-m-Y', strtotime($data->dis_kpta))); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <?php if($data->dis_wkpta == '0000-00-00'): ?>
                            <?php elseif($data->dis_wkpta == ''): ?>
                            <?php else: ?>
                                <tr class="text-start border">
                                    <td>Disposisi Wakil</td>
                                    <td>
                                        <?php if($data->dis_wkpta == '0000-00-00'): ?>
                                            <span class="badge badge-danger">Disposisi terakhir oleh Ketua</span>
                                        <?php elseif($data->dis_wkpta == ''): ?>
                                            <span class="badge badge-danger">Disposisi terakhir oleh Ketua</span>
                                        <?php else: ?>
                                            <?php echo e(date('d-m-Y', strtotime($data->dis_wkpta))); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <?php if($data->dis_hatiwasda == '0000-00-00'): ?>
                            <?php elseif($data->dis_hatiwasda == ''): ?>
                            <?php else: ?>
                                <tr class="text-start border">
                                    <td>Disposisi Hatiwasda</td>
                                    <td>
                                        <?php if($data->dis_hatiwasda == '0000-00-00'): ?>
                                        <?php elseif($data->dis_hatiwasda == ''): ?>
                                        <?php else: ?>
                                            <?php echo e(date('d-m-Y', strtotime($data->dis_hatiwasda))); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <?php if($data->tgl_tindak_lanjut == '0000-00-00'): ?>
                            <?php elseif($data->tgl_tindak_lanjut == ''): ?>
                            <?php else: ?>
                                <tr class="text-start border">
                                    <td>Tindak Lanjut</td>
                                    <td>
                                        <?php if($data->tgl_tindak_lanjut == '0000-00-00'): ?>
                                        <?php elseif($data->tgl_tindak_lanjut == ''): ?>
                                        <?php else: ?>
                                            <?php echo e(date('d-m-Y', strtotime($data->tgl_tindak_lanjut))); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <tr class="text-start border">
                                <td>Status Pengaduan</td>
                                <td><?php echo e($data->status_pgd); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Posisi Berkas</td>
                                <td><?php echo e($data->status_berkas); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Selesai</td>
                                <td>
                                    <?php if($data->tgl_selesai_pgd == '0000-00-00'): ?>
                                    <?php elseif($data->tgl_selesai_pgd == ''): ?>
                                    <?php else: ?>
                                        <?php echo e(date('d-m-Y', strtotime($data->tgl_selesai_pgd))); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td> Tanggal LHP</td>
                                <td>
                                    <?php if($data->tgl_lhp == '0000-00-00'): ?>
                                    <?php elseif($data->tgl_lhp == ''): ?>
                                    <?php else: ?>
                                        <?php echo e(date('d-m-Y', strtotime($data->tgl_lhp))); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td> Surat Pengaduan</td>
                                <td>
                                    <?php if($data->surat_pgd == ''): ?>
                                    <?php else: ?>
                                        <a href="public/surat_pengaduan/<?php echo e($data->surat_pgd); ?>" class="text-blue"
                                            target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td> Lampiran</td>
                                <td>
                                    <?php if($data->lampiran == ''): ?>
                                    <?php else: ?>
                                        <a href="public/lampiran_pengaduan/<?php echo e($data->lampiran); ?>" class="text-blue"
                                            target="_blank"><i class="fa fa-file-pdf-o"></i></a>
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
                        <h6 class="modal-title"><?php echo e($data->no_pgd); ?> Perihal <?php echo e($data->uraian_pgd); ?> </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="/pgd/delete/<?php echo e($data->id); ?>" type="button" class="btn btn-sm btn-danger">Ya</a>
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

<!-- Print -->

<script type="text/javascript">
    // Fungsi untuk print SEMUA data - Versi Sederhana
    function printTable() {
        var printWindow = window.open('', '_blank', 'width=1000,height=700');

        // Ambil data langsung dari PHP (semua data)
        var allData = <?php echo json_encode($pengaduan, 15, 512) ?>;

        var tableContent = `
            <!DOCTYPE html>
            <html>
            <head>
                <title>Data Pengaduan</title>
                <style>
                    body { font-family: Arial; margin: 20px; color: #000; }
                    .print-header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #000; padding-bottom: 10px; }
                    .print-header h2 { margin: 0; }
                    .print-info { margin-bottom: 15px; display: flex; justify-content: space-between; }
                    table { width: 100%; border-collapse: collapse; margin-top: 15px; font-size: 11px; }
                    th, td { border: 1px solid #000; padding: 6px; text-align: left; }
                    th { background-color: #f2f2f2; font-weight: bold; }
                    .text-center { text-align: center; }
                    @media  print { body { margin: 15px; } }
                </style>
            </head>
            <body>
                <div class="print-header">
                    <h2>REGISTER PENGADUAN</h2>
                </div>

                <div class="print-info">
                    <div><strong>Tanggal Cetak:</strong> ${new Date().toLocaleDateString('id-ID')}</div>
                    <div><strong>Jumlah:</strong> ${allData.length} </div>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pengaduan</th>
                            <th>No. Surat</th>
                            <th>Pelapor</th>
                            <th>Terlapor</th>
                            <th>Uraian Pengaduan</th>
                            <th>Status</th>
                            <th>Posisi Berkas</th>
                        </tr>
                    </thead>
                    <tbody>
        `;

        // Loop melalui semua data dari PHP
        allData.forEach(function(data, index) {
            tableContent += `
                <tr>
                    <td class="text-center">${index + 1}</td>
                    <td>${formatDateForPrint(data.tgl_terima_pgd)}</td>
                    <td>${data.no_pgd}</td>
                    <td>${data.pelapor}</td>
                    <td>${data.terlapor}</td>
                    <td>${data.uraian_pgd}</td>
                    <td>${data.status_pgd}</td>
                    <td>${data.status_berkas}</td>
                </tr>
            `;
        });

        tableContent += `
                    </tbody>
                </table>

                <div style="margin-top: 30px; text-align: right;">
                    <p>Mengetahui,</p>
                    <br><br><br>
                    <p><strong>_________________________</strong></p>
                    <p>Penanggung Jawab</p>
                </div>

                <script>
                    function formatDateForPrint(dateString) {
                        if (!dateString) return '';
                        try {
                            const date = new Date(dateString);
                            return date.toLocaleDateString('id-ID');
                        } catch (e) {
                            return dateString;
                        }
                    }
                <\/script>
            </body>
            </html>
        `;

        printWindow.document.write(tableContent);
        printWindow.document.close();

        setTimeout(function() {
            printWindow.print();
        }, 500);
    }

    // Function helper untuk format tanggal
    function formatDateForPrint(dateString) {
        if (!dateString || dateString === '0000-00-00') return '';
        try {
            const date = new Date(dateString);
            return date.toLocaleDateString('id-ID');
        } catch (e) {
            return dateString;
        }
    }
</script>

<?php echo $__env->make('layouts.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\pm_hukum_app\resources\views//pengaduan/v_pengaduan.blade.php ENDPATH**/ ?>