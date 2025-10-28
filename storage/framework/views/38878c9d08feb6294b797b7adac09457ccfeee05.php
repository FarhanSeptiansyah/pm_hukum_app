<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.v_deskripsi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="panel-title">
                Ubah Data Putusan retensi
            </div>
        </div>

        <div class="panel-body">

            <form action="/retensi/update/<?php echo e($retensi->id); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <!-- left column -->
                    <div class="col">
                        <!-- general form elements -->
                        <div class="row col-margin">

                            <!-- /.card-header -->
                            <div class="col-xs-2">
                                <label>Pengadilan Agama Pengaju</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['pa_pengaju'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($retensi->pa_pengaju); ?>" name="pa_pengaju">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['pa_pengaju'];
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
                            <div class="col-xs-3">
                                <label>Nomor Perkara Banding</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['no_banding'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($retensi->no_banding); ?>" name="no_banding">
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
                            <div class="col-xs-3">
                                <label>Nomor Perkara PA</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['no_pa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($retensi->no_pa); ?>" name="no_pa">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['no_pa'];
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
                            <div class="col-xs-2">
                                <label>Nomor Perkara Kasasi</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['no_kasasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($retensi->no_kasasi); ?>" name="no_kasasi">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['no_kasasi'];
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
                            <div class="col-xs-2">
                                <label>Nomor Perkara PK</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['no_pk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($retensi->no_pk); ?>" name="no_pk">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['no_pk'];
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
                            <div class="col-xs-3">
                                <label for="jenis_perkara">Jenis Perkara</label>
                                <select name="jenis_perkara"
                                    class="form-control <?php $__errorArgs = ['jenis_perkara'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option><?php echo e($retensi->jenis_perkara); ?></option>
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
                            <div class="col-xs-3">
                                <label>Pembanding</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['pembanding'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($retensi->pembanding); ?>" name="pembanding">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['pembanding'];
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
                            <div class="col-xs-3">
                                <label>Terbanding</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['terbanding'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($retensi->terbanding); ?>" name="terbanding">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['terbanding'];
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
                            <div class="col-xs-3">
                                <label>Status Putusan Banding</label>
                                <select name="status_put" class="form-control <?php $__errorArgs = ['status_put'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option><?php echo e($retensi->status_put); ?></option>
                                    <option>Menguatkan</option>
                                    <option>Mengabulkan</option>
                                    <option>Membatalkan</option>
                                    <option>Memperbaiki</option>
                                    <option>Tidak Dapat Diterima</option>
                                    <option>Dicabut</option>
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['status_put'];
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
                            <div class="col-xs-3">
                                <label>Tanggal Putus Banding</label>
                                <input type="date" class="form-control <?php $__errorArgs = ['tgl_put_banding'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($retensi->tgl_put_banding); ?>" name="tgl_put_banding">
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

                            <div class="col-xs-3">
                                <label>Tanggal Putus PA</label>
                                <input type="date" class="form-control <?php $__errorArgs = ['tgl_put_pa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($retensi->tgl_put_pa); ?>" name="tgl_put_pa">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['tgl_put_pa'];
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
                            <div class="col-xs-3">
                                <label>Tanggal Putus Kasasi</label>
                                <input type="date" class="form-control <?php $__errorArgs = ['tgl_put_kasasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($retensi->tgl_put_kasasi); ?>" name="tgl_put_kasasi">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['tgl_put_kasasi'];
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
                            <div class="col-xs-3">
                                <label>Tanggal Putus PK</label>
                                <input type="date" class="form-control <?php $__errorArgs = ['tgl_put_pk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($retensi->tgl_put_pk); ?>" name="tgl_put_pk">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['tgl_put_pk'];
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
                            <div class="col-xs-3">
                                <label>Buku</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['buku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($retensi->buku); ?>" name="buku">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['buku'];
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
                            <div class="col-xs-3">
                                <label>Tingkat</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['tingkat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($retensi->tingkat); ?>" name="tingkat">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    <?php $__errorArgs = ['tingkat'];
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
                            <div class="col-xs-3">
                                <label>Tahun</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['tahun'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($retensi->tahun); ?>" name="tahun">
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
                            <div class="col-xs-3">
                                <label>Doc Putusan</label>
                                <div><?php echo e($retensi->putusan); ?></div>
                                <input type="file" class="form-control <?php $__errorArgs = ['putusan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($retensi->putusan); ?>" name="putusan">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    <?php $__errorArgs = ['putusan'];
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
                            <div class="col-xs-12">
                                <button class="btn btn-success">Simpan</button>
                                <a href="/retensi" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\pm_hukum_app\resources\views//retensi_arsip/v_edit_retensi.blade.php ENDPATH**/ ?>