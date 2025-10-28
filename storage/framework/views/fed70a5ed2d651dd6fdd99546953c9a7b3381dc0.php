<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.v_deskripsi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Table exporting -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Data Pemberitahuan Putusan Banding</h3>

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
                    <a href="/pbt/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                <?php elseif(Auth::user()->level === 2): ?>
                    <a href="/pbt/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
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
                <thead class="bg-gray text-center">
                    <tr>
                        <th style="width: 30px;">No</th>
                        <th style="width: 80px;">Tanggal Masuk</th>
                        <th style="width: 100px;">No. Banding</th>
                        <th style="width: 100px;">No. PA</th>
                        <th style="width: 80px;">Tanggal PBT P</th>
                        <th style="width: 80px;">Tanggal PBT T</th>
                        <th style="width: 50px;">Dokumen</th>
                        <th style="width: 70px;">Keterangan</th>
                        <th style="width: 80px;">Action</th>
                    </tr>
                </thead>

                <tfoot class="bg-gray text-center">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Masuk</th>
                        <th>No. Banding</th>
                        <th>No. PA</th>
                        <th>Tanggal PBT P</th>
                        <th>Tanggal PBT T</th>
                        <th>Dokumen</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $__currentLoopData = $pbt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($loop->iteration); ?></td>
                            <td class="text-center"><?php echo e(date('d-m-Y', strtotime($data->tgl_masuk))); ?></td>
                            <td class="text-center"><?php echo e($data->no_banding); ?></td>
                            <td class="text-center"><?php echo e($data->no_pa); ?></td>
                            <td class="text-center"><?php echo e(date('d-m-Y', strtotime($data->tgl_pbt_p))); ?></td>
                            <td class="text-center"><?php echo e(date('d-m-Y', strtotime($data->tgl_pbt_t))); ?></td>
                            <td class="text-center">
                                <?php if($data->pbt_put == ''): ?>
                                <?php else: ?>
                                    <a href="public/pbt_putusan/<?php echo e($data->pbt_put); ?>" class="text-blue"><i
                                            class="fa fa-file-pdf-o"></i></i></a>
                                <?php endif; ?>

                            </td>
                            <td class="text-center"><?php echo e($data->keterangan); ?></td>
                            <td class="text-center" style="font-size: 5px;">
                                <?php if(Auth::user()->level === 1): ?>
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail<?php echo e($data->id); ?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="/pbt/edit/<?php echo e($data->id); ?>" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                        data-target="#delete<?php echo e($data->id); ?>">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                <?php elseif(Auth::user()->level === 2): ?>
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail<?php echo e($data->id); ?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="/pbt/edit/<?php echo e($data->id); ?>" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                <?php elseif(Auth::user()->level === 3): ?>
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
    <?php $__currentLoopData = $pbt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Modal Detail -->
        <div class="modal fade" id="detail<?php echo e($data->id); ?>" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 colspan="2" class="text-white text-center bg-success">Detail Pemberitahuan Putusan Banding
                        </h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-small-font table-bordered table-hover">
                            <tr class="text-start border">
                                <td style="width: 200px;">Tanggal Masuk</td>
                                <td><?php echo e(date('d-m-Y', strtotime($data->tgl_masuk))); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Nomor Perkara Banding</td>
                                <td><?php echo e($data->no_banding); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Nomor Perkara PA</td>
                                <td><?php echo e($data->no_pa); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal PBT P</td>
                                <td><?php echo e($data->tgl_pbt_p); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal PBT T</td>
                                <td><?php echo e(date('d-m-Y', strtotime($data->tgl_pbt_t))); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Dokumen PBT</td>
                                <td>

                                    <?php if($data->pbt_put == ''): ?>
                                    <?php else: ?>
                                        <a href="pbt/<?php echo e($data->pbt_put); ?>" class="text-blue"><i
                                                class="fa fa-file-pdf-o"></i></i></a>
                                    <?php endif; ?>

                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td>Keterangan</td>
                                <td><?php echo e($data->keterangan); ?></td>
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
                        <h6 class="modal-title"><?php echo e($data->no_banding); ?> Jo. <?php echo e($data->no_pa); ?></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="/pbt/delete/<?php echo e($data->id); ?>" type="button" class="btn btn-xs btn-danger">Ya</a>
                        <button type="button" class="btn btn-xs btn-white" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\pm_hukum_app\resources\views//pbt_banding/v_pbt.blade.php ENDPATH**/ ?>