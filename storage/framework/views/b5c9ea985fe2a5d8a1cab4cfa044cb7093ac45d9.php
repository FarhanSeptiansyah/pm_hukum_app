<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- Breadcrumb Navigation -->
        <div class="row mb-3">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light p-2">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="/kasasi">Dashboard Kasasi</a></li>
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
                            DATA KASASI PERKARA TAHUN <?php echo e($tahun); ?>

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
                                                    href="<?php echo e(route('kasasi.by_year', ['tahun' => $tahun_item])); ?>">
                                                    <?php echo e($tahun_item); ?>

                                                </a>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                                <a href="/kasasi" class="btn btn-danger btn-sm">
                                    <i class="fa fa-arrow-left mr-1"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- TABEL DATA KASASI -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th width="5%" class="text-center align-middle">No</th>
                                    <th width="20%" class="text-center align-middle">Nomor Kasasi</th>
                                    <th width="10%" class="text-center align-middle">Tahun</th>
                                    <th width="15%" class="text-center align-middle">Status Putusan</th>
                                    <th width="5%" class="text-center align-middle">Putusan</th>
                                    <th width="15%" class="text-center align-middle">Masuk Arsip</th>
                                    <th width="15%" class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $kasasi_per_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $kasasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="text-center align-middle"><?php echo e($index + 1); ?></td>
                                        <td class="align-middle">
                                            <strong><?php echo e($kasasi->no_kasasi ?? 'Belum ada nomor'); ?></strong>
                                            Jo.
                                            <small><?php echo e($kasasi->no_banding ?? 'Belum ada nomor'); ?></small>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="btn btn-info btn-xs"><?php echo e($tahun); ?></span>
                                        </td>
                                        <td class="text-center align-middle">
                                            <?php echo e($kasasi->status_put); ?>

                                        </td>
                                        <td class="text-center">
                                            <?php if($kasasi->salput_kasasi): ?>
                                                <a href="<?php echo e(asset('public/kasasi_perkara/' . $kasasi->salput_kasasi)); ?>"
                                                    class="text-blue"><i class="fa fa-file-pdf-o"></i></a>
                                            <?php else: ?>
                                                <span class="text-muted">-</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <?php if($kasasi->tgl_masuk): ?>
                                                <?php echo e(\Carbon\Carbon::parse($kasasi->tgl_masuk)->format('d-m-Y')); ?>

                                            <?php else: ?>
                                                <span class="text-muted">-</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="btn-group btn-group-xs">
                                                <?php if(Auth::user()->level === 1): ?>
                                                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                        data-target="#detail<?php echo e($kasasi->id); ?>" title="Detail">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <a href="/kasasi/edit/<?php echo e($kasasi->id); ?>"
                                                        class="btn btn-warning btn-xs" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                                        data-target="#delete<?php echo e($kasasi->id); ?>" title="Hapus">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                <?php elseif(Auth::user()->level === 2): ?>
                                                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                        data-target="#detail<?php echo e($kasasi->id); ?>" title="Detail">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <a href="/kasasi/edit/<?php echo e($kasasi->id); ?>"
                                                        class="btn btn-warning btn-xs" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <?php elseif(Auth::user()->level === 3): ?>
                                                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                        data-target="#detail<?php echo e($kasasi->id); ?>" title="Detail">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <div class="alert alert-info mb-0">
                                                <i class="fa fa-info-circle mr-2"></i> Tidak ada data kasasi untuk tahun
                                                <?php echo e($tahun); ?>.
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal Section - DI LUAR TABEL -->
                    <?php $__currentLoopData = $kasasi_per_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Modal Detail -->
                        <div class="modal fade" id="detail<?php echo e($data->id); ?>" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 colspan="2" class="text-white text-center bg-success">Kasasi Perkara</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-small-font table-bordered table-hover">
                                            <tr class="text-start border">
                                                <td style="width: 200px;">Tanggal Masuk</td>
                                                <td>
                                                    <?php if($data->tgl_masuk): ?>
                                                        <?php echo e(\Carbon\Carbon::parse($data->tgl_masuk)->format('d-m-Y')); ?>

                                                    <?php else: ?>
                                                        <span class="text-muted">-</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Tanggal Register</td>
                                                <td>
                                                    <?php if($data->tgl_masuk): ?>
                                                        <?php echo e(\Carbon\Carbon::parse($data->tgl_masuk)->format('d-m-Y')); ?>

                                                    <?php else: ?>
                                                        <span class="text-muted">-</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Nomor Banding</td>
                                                <td><?php echo e($data->no_banding ?? '-'); ?></td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Nomor Kasasi</td>
                                                <td><?php echo e($data->no_kasasi ?? '-'); ?></td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Status Putusan</td>
                                                <td><?php echo e($data->status_put ?? '-'); ?></td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Salinan Putusan Kasasi</td>
                                                <td>
                                                    <?php if($data->salput_kasasi): ?>
                                                        <span class="badge badge-success">Sudah Upload</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-danger">Belum Upload</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="delete<?php echo e($data->id); ?>">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title"><?php echo e($data->no_kasasi ?? 'Data Kasasi'); ?></h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda ingin menghapus data kasasi ini?&hellip;</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <a href="/kasasi/delete/<?php echo e($data->id); ?>" type="button"
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
                                <p class="mb-1">Total data: <strong><?php echo e($total_tahun); ?></strong> kasasi</p>
                                <p class="mb-1">Sudah upload: <strong><?php echo e($selesai_tahun); ?></strong> kasasi
                                    (<?php echo e($progress_tahun); ?>%)</p>
                                <p class="mb-0">Belum upload: <strong><?php echo e($blm_selesai_tahun); ?></strong> kasasi
                                    (<?php echo e(100 - $progress_tahun); ?>%)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\pm_hukum_app\resources\views//kasasi/v_kasasi_per_tahun.blade.php ENDPATH**/ ?>