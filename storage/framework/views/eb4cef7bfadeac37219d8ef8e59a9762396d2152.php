<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.v_deskripsi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Basic Setup -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Data Himpunan Peraturan</h3>

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
                    <a href="/himper/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                    <a href="/himper/total" class="btn btn-sm btn-success mb-2">Tampilkan semua data</a>
                    <a href="/himper" class="btn btn-sm btn-danger mb-2">Kembali</a>
                <?php elseif(Auth::user()->level === 2): ?>
                    <a href="/himper/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                    <a href="/himper/total" class="btn btn-sm btn-success mb-2">Tampilkan semua data</a>
                    <a href="/himper" class="btn btn-sm btn-danger mb-2">Kembali</a>
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
                        <th style="width: 20px;">No</th>
                        <th style="width: 60px;">Jenis Peraturan</th>
                        <th style="width: 60px;">Nomor Peraturan</th>
                        <th style="width: 30px;">Tahun</th>
                        <th style="width: 50px;">Tanggal</th>
                        <th style="width: 200px;">Tentang</th>
                        <th style="width: 30px;">Dokumen</th>
                        <th style="width: 60px;">Action</th>
                    </tr>
                </thead>

                <tfoot class="bg-gray text-center">
                    <tr>
                        <th>No</th>
                        <th>Jenis Peraturan</th>
                        <th>Nomor Peraturan</th>
                        <th>Tahun</th>
                        <th>Tanggal</th>
                        <th>Tentang</th>
                        <th>Dokumen</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $__currentLoopData = $jdih; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($loop->iteration); ?></td>
                            <td class="text-start"><?php echo e($data->jenis_peraturan); ?></td>
                            <td class="text-center"><?php echo e($data->no_peraturan); ?></td>
                            <td class="text-center"><?php echo e($data->tahun); ?></td>
                            <td class="text-center"><?php echo e(date('d-m-Y', strtotime($data->tgl_peraturan))); ?></td>
                            <td><?php echo e($data->tentang); ?></td>

                            <td class="text-center">

                                <?php if($data->dokumen == ''): ?>
                                <?php else: ?>
                                    <a href="public/jdih/<?php echo e($data->dokumen); ?>" class="text-blue"><i
                                            class="fa fa-file-pdf-o"></i></i></a>
                                <?php endif; ?>

                            </td>
                            <td class="text-center" style="font-size: 5px;">
                                <?php if(Auth::user()->level === 1): ?>
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail<?php echo e($data->id); ?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="/himper/edit/<?php echo e($data->id); ?>" class="btn btn-warning btn-xs">
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
                                    <a href="/himper/edit/<?php echo e($data->id); ?>" class="btn btn-warning btn-xs">
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
    <?php $__currentLoopData = $jdih; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Modal Detail -->
        <div class="modal fade" id="detail<?php echo e($data->id); ?>" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 colspan="2" class="text-white text-center bg-success">Detail Himpunan Peraturan</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-small-font table-bordered table-hover">
                            <tr class="text-start border">
                                <td style="width: 200px;">Jenis Peraturan</td>
                                <td><?php echo e($data->jenis_peraturan); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Nomor Peraturan</td>
                                <td><?php echo e($data->no_peraturan); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal</td>
                                <td><?php echo e(date('d-m-Y', strtotime($data->tgl_peraturan))); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>tentang</td>
                                <td><?php echo e($data->tentang); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Dokumen</td>
                                <td>

                                    <?php if($data->dokumen == ''): ?>
                                    <?php else: ?>
                                        <a href="public/jdih/<?php echo e($data->dokumen); ?>" class="text-blue" target="_blank"><i
                                                class="fa fa-file-pdf-o"></i></i></a>
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
                        <h6 class="modal-title"><?php echo e($data->jenis_peraturan); ?> Nomor <?php echo e($data->no_peraturan); ?> tentang
                            <?php echo e($data->tentang); ?> </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="/himper/delete/<?php echo e($data->id); ?>" type="button" class="btn btn-xs btn-danger">Ya</a>
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

<?php echo $__env->make('layouts.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\pm_hukum_app\resources\views//jdih/v_jdih.blade.php ENDPATH**/ ?>