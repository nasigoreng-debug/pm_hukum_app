<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.v_deskripsi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="panel panel-default container">

        <div class="panel-heading">
            <div class="panel-title">
                Ubah Data Pengaduan
            </div>
        </div>

        <div class="panel-body">

            <form action="/pgd/update/<?php echo e($pengaduan->id); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Tanggal Terima</label>
                                <input type="date" class="form-control <?php $__errorArgs = ['tgl_terima_pgd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($pengaduan->tgl_terima_pgd); ?>" name="tgl_terima_pgd" autofocus>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['tgl_terima_pgd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Nomor Pengaduan</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['no_pgd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($pengaduan->no_pgd); ?>" name="no_pgd">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['no_pgd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Pelapor</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['pelapor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($pengaduan->pelapor); ?>" name="pelapor">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['pelapor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Terlapor</label>
                                <select name="terlapor" class="form-control <?php $__errorArgs = ['terlapor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="<?php echo e($pengaduan->terlapor); ?>" selected><?php echo e($pengaduan->terlapor); ?></option>
                                    <option>Bandung</option>
                                    <option>Bekasi</option>
                                    <option>Bogor</option>
                                    <option>Ciamis</option>
                                    <option>Cianjur</option>
                                    <option>Cibadak</option>
                                    <option>Cibinong</option>
                                    <option>Cikarang</option>
                                    <option>Cimahi</option>
                                    <option>Cirebon</option>
                                    <option>Depok</option>
                                    <option>Garut</option>
                                    <option>Indramayu</option>
                                    <option>Karawang</option>
                                    <option>Kota Banjar</option>
                                    <option>Kota Tasikmalaya</option>
                                    <option>Kuningan</option>
                                    <option>Majalengka</option>
                                    <option>Ngamprah</option>
                                    <option>Purwakarta</option>
                                    <option>Soreang</option>
                                    <option>Subang</option>
                                    <option>Sukabumi</option>
                                    <option>Sumber</option>
                                    <option>Sumedang</option>
                                    <option>Tasikmalaya</option>
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['terlapor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Uraian Pengaduan</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['uraian_pgd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($pengaduan->uraian_pgd); ?>" name="uraian_pgd">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['uraian_pgd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Ditangani Oleh</label>
                                <select name="ditangani_oleh"
                                    class="form-control <?php $__errorArgs = ['ditangani_oleh'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="<?php echo e($pengaduan->ditangani_oleh); ?>" selected>
                                        <?php echo e($pengaduan->ditangani_oleh); ?></option>
                                    <option> Badan Pengawas MARI </option>
                                    <option> Pengadilan Tingkat Banding </option>
                                    <option> Pengadilan Tingkat Pertama </option>
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['ditangani_oleh'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Disposisi Panmud Hukum</label>
                                <input type="date" class="form-control <?php $__errorArgs = ['dis_pm_hk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($pengaduan->dis_pm_hk); ?>" name="dis_pm_hk">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['dis_pm_hk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Disposisi Ketua</label>
                                <input type="date" class="form-control <?php $__errorArgs = ['dis_kpta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($pengaduan->dis_kpta); ?>" name="dis_kpta">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['dis_kpta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Disposisi Wakil</label>
                                <input type="date" class="form-control <?php $__errorArgs = ['dis_wkpta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($pengaduan->dis_wkpta); ?>" name="dis_wkpta">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['dis_wkpta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Disposisi Hatiwasda</label>
                                <input type="date" class="form-control <?php $__errorArgs = ['dis_hatiwasda'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($pengaduan->dis_hatiwasda); ?>" name="dis_hatiwasda">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['dis_hatiwasda'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Tindak Lanjut</label>
                                <input type="date" class="form-control <?php $__errorArgs = ['tgl_tindak_lanjut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($pengaduan->tgl_tindak_lanjut); ?>" name="tgl_tindak_lanjut">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['tgl_tindak_lanjut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Status Pengaduan</label>
                                <select name="status_pgd" class="form-control <?php $__errorArgs = ['status_pgd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    autofocus>
                                    <option value="<?php echo e($pengaduan->status_pgd); ?>" selected><?php echo e($pengaduan->status_pgd); ?>

                                    </option>
                                    <option> Disposisi </option>
                                    <option> Klarifikasi </option>
                                    <option> Telaah Berkas </option>
                                    <option> Pemeriksaan oleh TIM </option>
                                    <option> Selesai </option>
                                    <option> Diarsipkan </option>
                                    <option> Tidak dapat ditindaklanjuti </option>
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['status_pgd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Status Berkas</label>
                                <select name="status_berkas"
                                    class="form-control <?php $__errorArgs = ['status_berkas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autofocus>
                                    <option value="<?php echo e($pengaduan->status_berkas); ?>" selected>
                                        <?php echo e($pengaduan->status_berkas); ?></option>
                                    <option> Ketua </option>
                                    <option> Wakil Ketua </option>
                                    <option> Hakim Tinggi Pengawas </option>
                                    <option> Panitera </option>
                                    <option> Panitera Muda Hukum </option>
                                    <option> Petugas Pengaduan </option>
                                    <option> Pengadilan Agama Terlapor</option>
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['status_berkas'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Tanggal Selesai</label>
                                <input type="date" class="form-control <?php $__errorArgs = ['tgl_selesai_pgd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($pengaduan->tgl_selesai_pgd); ?>" name="tgl_selesai_pgd">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['tgl_selesai_pgd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Tanggal LHP</label>
                                <input type="date" class="form-control <?php $__errorArgs = ['tgl_lhp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($pengaduan->tgl_lhp); ?>" name="tgl_lhp">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['tgl_lhp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <!-- File Upload Section -->
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Surat Pengaduan Saat Ini</label>
                                <div class="form-control-plaintext"><?php echo e($pengaduan->surat_pgd); ?></div>
                                <label class="mt-2">Ganti Surat Pengaduan</label>
                                <input type="file"
                                    class="form-control form-control-sm <?php $__errorArgs = ['surat_pgd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="surat_pgd">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['surat_pgd'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Lampiran Saat Ini</label>
                                <div class="form-control-plaintext"><?php echo e($pengaduan->lampiran); ?></div>
                                <label class="mt-2">Ganti Lampiran</label>
                                <input type="file"
                                    class="form-control form-control-sm <?php $__errorArgs = ['lampiran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="lampiran">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['lampiran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <button class="btn btn-success">Simpan Perubahan</button>
                            <a href="/pgd_total" class="btn btn-info">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\pm_hukum_app\resources\views//pengaduan/v_edit_pengaduan.blade.php ENDPATH**/ ?>