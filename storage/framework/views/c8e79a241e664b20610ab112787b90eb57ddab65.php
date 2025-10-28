<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.v_deskripsi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="panel panel-default container">

        <div class="panel-heading">
            <div class="panel-title">
                Tambah Data Peraturan
            </div>
        </div>

        <div class="panel-body">

            <form action="/himper/insert" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <!-- left column -->
                    <div class="col">
                        <!-- general form elements -->
                        <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label for="jenis_peraturan">Jenis Peraturan</label>
                                <select name="jenis_peraturan"
                                    class="form-control <?php $__errorArgs = ['jenis_peraturan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option><?php echo e(old('jenis_peraturan')); ?></option>
                                    <option> Undang-Undang (UU)</option>
                                    <option> Peraturan Pemerintah Pengganti Undang-undang (PERPU)</option>
                                    <option> Peraturan Pemerintah (PP) </option>
                                    <option> Instruksi Presiden (INPRES)</option>
                                    <option> Peraturan Mahkamah Agung (PERMA)</option>
                                    <option> Surat Edaran Mahkamah Agung (SEMA)</option>
                                    <option> Surat Keputusan Ketua Mahkamah Agung (SK KMA)</option>
                                    <option> Surat Keputusan Sekretaris Mahkamah Agung (SK SEKMA)</option>
                                    <option> Surat Edaran Direktur Jenderal Badan Peradilan Agama (SE Dirjen Badilag)
                                    </option>
                                    <option> Surat Keputusan Direktur Jenderal Badan Peradilan Agama (SK Dirjen Badilag)
                                    </option>
                                    <option> Surat Edaran Ketua Pengadilan Tinggi Agama Bandung (SE KPTA Bandung)</option>
                                    <option> Surat Keputusan Ketua Pengadilan Tinggi Agama Bandung (SK KPTA Bandung)
                                    </option>
                                    <option> Peraturan lainnya</option>
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['jenis_peraturan'];
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
                                <label>Nomor Peraturan</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['no_peraturan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('no_peraturan')); ?>" name="no_peraturan">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['no_peraturan'];
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
                                <label>Tahun</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['tahun'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('tahun')); ?>" name="tahun">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['tahun'];
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
                                <label>Tanggal Peraturan</label>
                                <input type="date" class="form-control <?php $__errorArgs = ['tgl_peraturan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('tgl_peraturan')); ?>" name="tgl_peraturan">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['tgl_peraturan'];
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
                                <label>Tentang</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['tentang'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('tentang')); ?>" name="tentang">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['tentang'];
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
                                <label>Dokumen</label>
                                <input type="file" class="form-control <?php $__errorArgs = ['dokumen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('dokumen')); ?>" name="dokumen">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['dokumen'];
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
                            <div class="form-group">
                                <button class="btn btn-success">Simpan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <a href="/himper" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\pm_hukum_app\resources\views//jdih/v_add_jdih.blade.php ENDPATH**/ ?>