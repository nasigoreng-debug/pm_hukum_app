<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.v_deskripsi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="panel panel-default container">

        <div class="panel-heading">
            <div class="panel-title">
                Ubah Data Bank Putusan
            </div>
        </div>

        <div class="panel-body">

            <form action="<?php echo e(route('bankput.update', $bankputs->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row">
                    <!-- left column -->
                    <div class="col">
                        <!-- general form elements -->
                        <div class="row col-margin">
                            <div class="col-xs-6">
                                <label>Nomor Perkara Banding</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['no_banding'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($bankputs->no_banding); ?>" name="no_banding" autofocus readonly>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['no_banding'];
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
                            <div class="col-xs-6">
                                <label>Tanggal Putus Banding</label>
                                <input type="date" class="form-control <?php $__errorArgs = ['tgl_put_banding'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($bankputs->tgl_put_banding ? \Carbon\Carbon::parse($bankputs->tgl_put_banding)->format('Y-m-d') : ''); ?>" name="tgl_put_banding">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['tgl_put_banding'];
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
                            <div class="col-xs-6">
                                <label for="jenis_perkara">Jenis Perkara</label>
                                <select name="jenis_perkara" type="text"
                                    class="form-control <?php $__errorArgs = ['jenis_perkara'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option><?php echo e($bankputs->jenis_perkara); ?></option>
                                    <option> Asal Usul Anak </option>
                                    <option> Cerai Gugat </option>
                                    <option> Cerai Talak </option>
                                    <option> Dispensasi Kawin </option>
                                    <option> Ekonomi Syariah </option>
                                    <option> Ganti Rugi terhadap Wali </option>
                                    <option> Hak-hak Bekas Isteri </option>
                                    <option> Harta Bersama </option>
                                    <option> Hibah </option>
                                    <option> Isbath Nikah </option>
                                    <option> Izin Kawin </option>
                                    <option> Izin Poligami </option>
                                    <option> Kelalaian Kewajiban Suami/Isteri </option>
                                    <option> Kewarisan </option>
                                    <option> Lain-lain </option>
                                    <option> Nafkah Anak oleh Ibu </option>
                                    <option> P3HP/Penetapan Ahli Waris </option>
                                    <option> Pembatalan Perkawinan </option>
                                    <option> Pencabutan Kekuasaan Orang Tua </option>
                                    <option> Pencabutan Kekuasaan Wali </option>
                                    <option> Pencegahan Perkawinan </option>
                                    <option> Pengesahan Anak/Pengangkatan Anak </option>
                                    <option> Penguasaan Anak/Hadlonah </option>
                                    <option> Penolakan Kawin Campuran </option>
                                    <option> Penolakan Perkawinan oleh PPN </option>
                                    <option> Penunjukan Orang Lain Sbg Wali </option>
                                    <option> Perwalian </option>
                                    <option> Wakaf </option>
                                    <option> Wali Adhol </option>
                                    <option> Wasiat </option>
                                    <option> Zakat/Infaq/Shodaqoh </option>
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['jenis_perkara'];
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
                            <div class="col-xs-6">
                                <label for="status_putus">Status Putusan</label>
                                <select name="status_putus" type="text"
                                    class="form-control <?php $__errorArgs = ['status_putus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option><?php echo e($bankputs->status_putus); ?></option>
                                    <option> Menguatkan </option>
                                    <option> Membatalkan </option>
                                    <option> Memperbaiki </option>
                                    <option> Tidak Dapat Diterima </option>
                                    <option> Dicabut </option>
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['status_putus'];
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
                            <div class="col-xs-6">
                                <label for="keterangan">Keterangan</label>
                                <select name="keterangan" type="text"
                                    class="form-control <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option><?php echo e($bankputs->keterangan); ?></option>
                                    <option> e-Court </option>
                                    <option> Non e-Court </option>
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['keterangan'];
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
                            <div class="col-xs-6">
                                <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                    <label>Putusan</label>
                                    <div><?php echo e($bankputs->put_rtf); ?></div>
                                </div>
                                <div class="">
                                    <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                        <label>Ganti Putusan</label>
                                        <input type="file"
                                            class="form-control form-control-sm <?php $__errorArgs = ['put_rtf'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e($bankputs->put_rtf); ?>" name="put_rtf">
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                            <?php $__errorArgs = ['put_rtf'];
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
                            <div class="col-xs-6">
                                <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                    <label>Anonimasi</label>
                                    <div><?php echo e($bankputs->put_anonim); ?></div>
                                </div>
                                <div class="">
                                    <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                        <label>Ganti Anonimasi</label>
                                        <input type="file"
                                            class="form-control form-control-sm <?php $__errorArgs = ['put_anonim'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e($bankputs->put_anonim); ?>" name="put_anonim">
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                            <?php $__errorArgs = ['put_anonim'];
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
                            <div class="col-xs-12">
                                <button class="btn btn-sm btn-success">Simpan</button>
                                <a href="/bankput" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\pm_hukum_app\resources\views/bank_putusan/edit.blade.php ENDPATH**/ ?>