<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.v_deskripsi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Table exporting -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Data Retensi Arsip</h3>

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
                    <a href="/retensi/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                    <a href="/retensi" class="btn btn-sm btn-danger mb-2">Kembali</a>
                <?php elseif(Auth::user()->level === 2): ?>
                    <a href="/retensi/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                    <a href="/retensi" class="btn btn-sm btn-danger mb-2">Kembali</a>
                <?php elseif(Auth::user()->level === 3): ?>
                <?php endif; ?>
            </td>

            <?php if(session('pesan')): ?>
                <div class="alert alert-success alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo e(session('pesan')); ?>

                </div>
            <?php endif; ?>
            <table class="table table-sm table-hover" id="example-4">
                <thead class="bg-gray">
                    <tr>
                        <th style="width: 20px;">No</th>
                        <th style="width: 100px;">PA Pengaju</th>
                        <th style="width: 120px;">No. Banding</th>
                        <!-- <th style="width: 50px;">No. PA</th>
                        <th style="width: 50px;">No. Kasasi</th>
                        <th style="width: 50px;">No. PK</th> -->

                        <th style="width: 100px;">Jenis Perkara</th>
                        <th style="width: 120px;">Pembanding</th>
                        <th style="width: 120px;">Terbanding</th>
                        <th style="width: 80px;">Status Putusan</th>
                        <!-- <th style="width: 60px;">Putus Banding</th>
                        <th style="width: 60px;">Putus PA</th>
                        <th style="width: 60px;">Putus Kasasi</th>
                        <th style="width: 60px;">Putus PK</th>
                        <th style="width: 70px;">Buku</th>
                        <th style="width: 70px;">Tingkat</th>
                        <th style="width: 70px;">Tahun</th> -->
                        <th style="width: 50px;">Putusan</th>
                        <th style="width: 80px;">Action</th>
                    </tr>
                </thead>

                <tfoot class="bg-gray">
                    <tr>
                        <th>No</th>
                        <th>PA Pengaju</th>
                        <th>No. Banding</th>
                        <!-- <th>No. PA</th>
                        <th>No. Kasasi</th>
                        <th>No. PK</th> -->
                        <th>Jenis Perkara</th>
                        <th>Pembanding</th>
                        <th>Terbanding</th>
                        <th>Status Putusan</th>
                        <!-- <th>Putus Banding</th>
                        <th>Putus PA</th>
                        <th>Putus Kasasi</th>
                        <th>Putus PK</th>
                        <th>Buku</th>
                        <th>Tingkat</th>
                        <th>Tahun</th> -->
                        <th>Putusan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>

                <tbody>
                    <?php $__currentLoopData = $retensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($loop->iteration); ?></td>
                            <td class="text-start"><?php echo e($data->pa_pengaju); ?></td>
                            <td class="text-start"><?php echo e($data->no_banding); ?></td>
                            <!-- <td class="text-start"><?php echo e($data->no_pa); ?></td>
                        <td class="text-start"><?php echo e($data->no_kasasi); ?></td>
                        <td class="text-start"><?php echo e($data->no_pk); ?></td> -->
                            <td class="text-start"><?php echo e($data->jenis_perkara); ?></td>
                            <td><?php echo e($data->pembanding); ?></td>
                            <td><?php echo e($data->terbanding); ?></td>
                            <td><?php echo e($data->status_put); ?></td>
                            <!-- <td class="text-start"><?php echo e(date('d-m-Y', strtotime($data->tgl_put_banding))); ?></td>
                        <td class="text-start"><?php echo e(date('d-m-Y', strtotime($data->tgl_put_pa))); ?></td>
                        <td class="text-start"><?php echo e(date('d-m-Y', strtotime($data->tgl_put_kasasi))); ?></td>
                        <td class="text-start"><?php echo e(date('d-m-Y', strtotime($data->tgl_put_pk))); ?></td>
                        <td><?php echo e($data->buku); ?></td>
                        <td><?php echo e($data->tahun); ?></td>
                        <td><?php echo e($data->tahun); ?></td> -->
                            <td class="text-center">
                                <?php if($data->putusan == ''): ?>
                                <?php else: ?>
                                    <a href="public/retensi_arsip_perkara/<?php echo e($data->putusan); ?>" class="text-blue"><i
                                            class="fa fa-file-pdf-o"></i></a>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if(Auth::user()->level === 1): ?>
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail<?php echo e($data->id); ?>">
                                        <i class="fa fa-eye"></i></a>
                                    </button>
                                    <a href="/retensi/edit/<?php echo e($data->id); ?>" class="btn btn-warning btn-xs">
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
                                    <a href="/retensi/edit/<?php echo e($data->id); ?>" class="btn btn-warning btn-xs">
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
    <?php $__currentLoopData = $retensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    <?php if($data->tgl_put_banding == '0000-00-00'): ?>
                                    <?php elseif($data->tgl_put_banding == ''): ?>
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
                                    <?php if($data->tgl_put_pa == '0000-00-00'): ?>
                                    <?php elseif($data->tgl_put_pa == ''): ?>
                                    <?php else: ?>
                                        <?php echo e(date('d-m-Y', strtotime($data->tgl_put_pa))); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Putus Kasasi</td>
                                <td>
                                    <?php if($data->tgl_put_kasasi == '0000-00-00'): ?>
                                    <?php elseif($data->tgl_put_kasasi == ''): ?>
                                    <?php else: ?>
                                        <?php echo e(date('d-m-Y', strtotime($data->tgl_put_kasasi))); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Putus PK</td>
                                <td>
                                    <?php if($data->tgl_put_pk == '0000-00-00'): ?>
                                    <?php elseif($data->tgl_put_pk == ''): ?>
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
        <!-- /.modal -->

        <!-- Modal Hapus -->
        <div class="modal fade" id="delete<?php echo e($data->id); ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title"><?php echo e($data->no_banding); ?> Jo. <?php echo e($data->no_pa); ?> Jo.
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

<?php echo $__env->make('layouts.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\pm_hukum_app\resources\views//retensi_arsip/v_retensi.blade.php ENDPATH**/ ?>