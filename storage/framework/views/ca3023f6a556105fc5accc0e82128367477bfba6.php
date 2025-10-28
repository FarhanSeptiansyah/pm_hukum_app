<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- Breadcrumb Navigation -->
        <div class="row mb-3">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light p-2">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="/retensi">Dashboard Retensi</a></li>
                        <li class="breadcrumb-item active">Tahun <?php echo e($tahun); ?></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary mb-5">
                        <h3 class="card-title text-white">
                            DATA RETENSI ARSIP TAHUN <?php echo e($tahun); ?>

                        </h3>
                        <div class="card-tools">
                            <div class="btn-group">
                                <!-- Dropdown Navigasi Tahun -->
                                <?php if($tahun_tersedia->count() > 1): ?>
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        data-toggle="dropdown">
                                        Tahun Lain
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <?php $__currentLoopData = $tahun_tersedia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($tahun_item != $tahun): ?>
                                                <a class="dropdown-item badge"
                                                    href="<?php echo e(route('retensi.by_year', ['tahun' => $tahun_item])); ?>">
                                                    <?php echo e($tahun_item); ?>

                                                </a>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                                <a href="/retensi" class="btn btn-danger btn-sm">
                                    <i class="fa fa-arrow-left mr-1"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card-body">
                        <!-- STATISTIK TAHUNAN -->
                        <div class="row mb-4">
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="bg-info shadow">
                                    <span class="info-box-icon"><i class="fa fa-files-o"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Data</span>
                                        <span class="info-box-number"><?php echo e($total_tahun); ?></span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 100%"></div>
                                        </div>
                                        <span class="progress-description">
                                            Total arsip tahun <?php echo e($tahun); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="bg-success shadow">
                                    <span class="info-box-icon"><i class="fa fa-check"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Sudah Upload</span>
                                        <span class="info-box-number"><?php echo e($selesai_tahun); ?></span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php echo e($progress_tahun); ?>%"></div>
                                        </div>
                                        <span class="progress-description">
                                            <?php echo e($progress_tahun); ?>% dari total
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="bg-danger shadow">
                                    <span class="info-box-icon"><i class="fa fa-clock-o"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Belum Upload</span>
                                        <span class="info-box-number"><?php echo e($blm_selesai_tahun); ?></span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php echo e(100 - $progress_tahun); ?>%"></div>
                                        </div>
                                        <span class="progress-description">
                                            <?php echo e(100 - $progress_tahun); ?>% dari total
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="bg-success shadow">
                                    <span class="info-box-icon"><i class="fa fa-percent"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Progress Upload</span>
                                        <span class="info-box-number"><?php echo e($progress_tahun); ?>%</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php echo e($progress_tahun); ?>%"></div>
                                        </div>
                                        <span class="progress-description">
                                            <?php if($progress_tahun == 100): ?>
                                                Upload lengkap
                                            <?php elseif($progress_tahun >= 80): ?>
                                                Hampir lengkap
                                            <?php elseif($progress_tahun >= 50): ?>
                                                Setengah lengkap
                                            <?php else: ?>
                                                Perlu dipercepat
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- TABEL DATA RETENSI -->
                    <div class="table-responsive">
                        <table class="table table-bordered tabel-hover">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th width="5%" class="text-center align-middle">No</th>
                                    <th width="15%" class="text-center align-middle">Nomor Arsip</th>
                                    <th width="10%" class="text-center align-middle">Tahun</th>
                                    <th width="15%" class="text-center align-middle">Status</th>
                                    <th width="15%" class="text-center align-middle">Tanggal Upload</th>
                                    <th width="15%" class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $retensi_per_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $retensi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="text-center align-middle"><?php echo e($index + 1); ?></td>
                                        <td class="align-middle">
                                            <strong><?php echo e($retensi->no_banding ?? 'Belum ada nomor'); ?></strong>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="badge badge-info"><?php echo e($retensi->tahun); ?></span>
                                        </td>
                                        <td class="text-center align-middle">
                                            <?php if($retensi->putusan): ?>
                                                <span class="badge badge-success badge-lg">
                                                    <i class="fa fa-check mr-1"></i>Sudah Upload
                                                </span>
                                            <?php else: ?>
                                                <span class="badge badge-danger badge-lg">
                                                    <i class="fa fa-clock-o mr-1"></i>Belum Upload
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <?php if($retensi->putusan): ?>
                                                <?php echo e($retensi->updated_at ? \Carbon\Carbon::parse($retensi->updated_at)->format('d-m-Y H:i') : '-'); ?>

                                            <?php else: ?>
                                                <span class="text-muted">-</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="btn-group">
                                                <?php if(Auth::user()->level === 1): ?>
                                                    <button type="button" class="btn btn-purple btn-xs"
                                                        data-toggle="modal" data-target="#detail<?php echo e($retensi->id); ?>">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <a href="/retensi/edit/<?php echo e($retensi->id); ?>"
                                                        class="btn btn-warning btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-xs"
                                                        data-toggle="modal" data-target="#delete<?php echo e($retensi->id); ?>">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                <?php elseif(Auth::user()->level === 2): ?>
                                                    <button type="button" class="btn btn-purple btn-xs"
                                                        data-toggle="modal" data-target="#detail<?php echo e($retensi->id); ?>">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <a href="/retensi/edit/<?php echo e($retensi->id); ?>"
                                                        class="btn btn-warning btn-xs">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php elseif(Auth::user()->level === 3): ?>
                                                    <button type="button" class="btn btn-purple btn-xs"
                                                        data-toggle="modal" data-target="#detail<?php echo e($retensi->id); ?>">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            <div class="alert alert-info mb-0">
                                                <i class="fa fa-info-circle mr-2"></i> Tidak ada data retensi untuk
                                                tahun <?php echo e($tahun); ?>.
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal Section - DI LUAR TABEL -->
                    <?php $__currentLoopData = $retensi_per_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Modal Detail -->
                        <div class="modal fade" id="detail<?php echo e($data->id); ?>" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 colspan="2" class="text-white text-center bg-success">Retensi Arsip</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-small-font table-bordered table-hover">
                                            <tr class="text-start border">
                                                <td style="width: 200px;">Pengadilan Agama Pengaju</td>
                                                <td><?php echo e($data->pa_pengaju); ?></td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Nomor Perkara Banding</td>
                                                <td><?php echo e($data->no_banding); ?></td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Jenis Perkara</td>
                                                <td><?php echo e($data->jenis_perkara); ?></td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Pembanding</td>
                                                <td><?php echo e($data->pembanding); ?></td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Terbanding</td>
                                                <td><?php echo e($data->terbanding); ?></td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Tanggal Putus Banding</td>
                                                <td class="text-start border">
                                                    <?php if($data->tgl_put_banding == '0000-00-00' || $data->tgl_put_banding == ''): ?>
                                                    <?php else: ?>
                                                        <?php echo e(date('d-m-Y', strtotime($data->tgl_put_banding))); ?>

                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Status Putusan</td>
                                                <td><?php echo e($data->status_put); ?></td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Nomor Perkara TK.1</td>
                                                <td><?php echo e($data->no_pa); ?></td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Nomor Perkara Kasasi</td>
                                                <td><?php echo e($data->no_kasasi); ?></td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Nomor Perkara PK</td>
                                                <td><?php echo e($data->no_pk); ?></td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Tanggal Putus PA</td>
                                                <td class="text-start border">
                                                    <?php if($data->tgl_put_pa == '0000-00-00' || $data->tgl_put_pa == ''): ?>
                                                    <?php else: ?>
                                                        <?php echo e(date('d-m-Y', strtotime($data->tgl_put_pa))); ?>

                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Tanggal Putus Kasasi</td>
                                                <td>
                                                    <?php if($data->tgl_put_kasasi == '0000-00-00' || $data->tgl_put_kasasi == ''): ?>
                                                    <?php else: ?>
                                                        <?php echo e(date('d-m-Y', strtotime($data->tgl_put_kasasi))); ?>

                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Tanggal Putus PK</td>
                                                <td>
                                                    <?php if($data->tgl_put_pk == '0000-00-00' || $data->tgl_put_pk == ''): ?>
                                                    <?php else: ?>
                                                        <?php echo e(date('d-m-Y', strtotime($data->tgl_put_pk))); ?>

                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Buku</td>
                                                <td><?php echo e($data->buku); ?></td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Tingkat</td>
                                                <td><?php echo e($data->tingkat); ?></td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Tahun</td>
                                                <td><?php echo e($data->tahun); ?></td>
                                            </tr>
                                        </table>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="delete<?php echo e($data->id); ?>">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo e($data->no_banding); ?> Jo.
                                            <?php echo e($data->no_pa); ?> Jo.
                                            <?php echo e($data->no_kasasi); ?> Jo. <?php echo e($data->no_pk); ?> </h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <a href="/retensi/delete/<?php echo e($data->id); ?>" type="button"
                                            class="btn btn-sm btn-danger">Ya</a>
                                        <button type="button" class="btn btn-sm btn-white"
                                            data-dismiss="modal">Tidak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!-- Informasi Summary -->
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="alert alert-secondary">
                                <h6><i class="fa fa-info-circle mr-2"></i>Summary Tahun <?php echo e($tahun); ?></h6>
                                <p class="mb-1">Total data: <strong><?php echo e($total_tahun); ?></strong> arsip</p>
                                <p class="mb-1">Sudah upload: <strong><?php echo e($selesai_tahun); ?></strong> arsip
                                    (<?php echo e($progress_tahun); ?>%)</p>
                                <p class="mb-0">Belum upload: <strong><?php echo e($blm_selesai_tahun); ?></strong> arsip
                                    (<?php echo e(100 - $progress_tahun); ?>%)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\pm_hukum_app\resources\views//retensi_arsip/v_retensi_per_tahun.blade.php ENDPATH**/ ?>