<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.v_deskripsi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Table exporting -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Data Register Kasasi</h3>

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
                    <a href="/reg_kasasi/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                <?php elseif(Auth::user()->level === 2): ?>
                    <a href="/reg_kasasi/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
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
                        <th class="text-center" style="width: 30px;">No</th>
                        <th class="text-center" style="width: 70px;">Satker</th>
                        
                        <th class="text-center" style="width: 100px;">Tanggal Reg</th>
                        <th class="text-center" style="width: 110px;">No. Reg Kasasi</th>
                        <!-- <th class="text-center" style="width: 100px;">Pemohon</th>
                        <th class="text-center" style="width: 100px;">Termohon</th> -->
                        <th class="text-center" style="width: 140px;">No. Banding</th>
                        
                        <!-- <th class="text-center" style="width: 70px;">No. PA</th>
                        <th class="text-center" style="width: 60px;">Putus PA</th> -->
                        <th class="text-center" style="width: 80px;">No. Box</th>

                        <th class="text-center" style="width: 100px;">Putus Kasasi</th>
                        <th class="text-center" style="width: 50px;">Lama Proses</th>
                        <th class="text-center" style="width: 80px;">Keterangan</th>
                        <th class="text-center" style="width: 100px;">Action</th>
                    </tr>
                </thead>

                <tfoot class="bg-gray">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Satker</th>
                        
                        <th class="text-center">Tanggal Reg</th>
                        <th class="text-center">No. Reg Kasasi</th>
                        <!-- <th class="text-center">Pemohon</th>
                        <th class="text-center">Termohon</th> -->
                        <th class="text-center">No. Banding</th>
                        
                        <!-- <th class="text-center">No. PA</th>
                        <th class="text-center">Putus PA</th> -->
                        <th class="text-center">No. Box</th>
                        <th class="text-center">Putus Kasasi</th>
                        <th class="text-center">Lama Proses</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tfoot>

                <tbody>
                    <?php $__currentLoopData = $reg_kasasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($loop->iteration); ?></td>
                            <td class="text-center"><?php echo e($data->pa_pengaju); ?></td>
                            <td class="text-center">
                                <?php if($data->tgl_register == ''): ?>
                                    <span class="badge badge-danger">Data Not Available</span>
                                <?php elseif($data->tgl_register == '0000-00-00'): ?>
                                    <span class="badge badge-danger">Data Not Available</span>
                                <?php else: ?>
                                    <?php echo e(date('d-m-Y', strtotime($data->tgl_register))); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e($data->no_kasasi); ?></td>
                            <td class="text-start"><?php echo e($data->no_banding); ?></td>

                            <td class="text-center">
                                <?php if($data->no_box == ''): ?>
                                    <span class="badge badge-orange">Belum diinput</button>
                                    <?php elseif($data->no_box == '0000-00-00'): ?>
                                        <span class="badge badge-orange">Belum diinput</button>
                                        <?php else: ?>
                                            <span class="badge badge-success"><?php echo e($data->no_box); ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if($data->tgl_put_kasasi == '0000-00-00'): ?>
                                    <span class="badge badge-warning">Proses</span>
                                <?php elseif($data->tgl_put_kasasi == ''): ?>
                                    <span class="badge badge-warning">Proses</span>
                                <?php else: ?>
                                    <?php echo e(date('d-m-Y', strtotime($data->tgl_put_kasasi))); ?>

                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if($data->tgl_put_kasasi == '0000-00-00'): ?>
                                    <span
                                        class="badge badge-danger"><?php echo e(Carbon\Carbon::parse($data->tgl_register)->diffIndays($sekarang)); ?>

                                        Hari</span>
                                <?php elseif($data->tgl_put_kasasi == ''): ?>
                                    <span
                                        class="badge badge-danger"><?php echo e(Carbon\Carbon::parse($data->tgl_register)->diffIndays($sekarang)); ?>

                                        Hari</span>
                                <?php else: ?>
                                    <span class="badge badge-success">
                                        <?php echo e(Carbon\Carbon::parse($data->tgl_register)->diffIndays($data->tgl_put_kasasi)); ?>

                                        Hari</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($data->keterangan); ?></td>
                            <td class="text-center">
                                <?php if(Auth::user()->level === 1): ?>
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail<?php echo e($data->id); ?>">
                                        <i class="fa fa-eye"></i></a>
                                    </button>
                                    <a href="/reg_kasasi/edit/<?php echo e($data->id); ?>" class="btn btn-warning btn-xs">
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
                                    <a href="/reg_kasasi/edit/<?php echo e($data->id); ?>" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                <?php elseif(Auth::user()->level === 3): ?>
                                    <a href="/reg_kasasi/detail/<?php echo e($data->id); ?>" class="btn btn-purple btn-xs">
                                        <i class="fa fa-eye"></i></a>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
    </div>
    <?php $__currentLoopData = $reg_kasasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Modal Detail -->
        <div class="modal fade" id="detail<?php echo e($data->id); ?>" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 colspan="2" class="text-white text-center bg-success">Detail Register Kasasi</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-small-font table-bordered table-hover">
                            <tr class="text-start border">
                                <td style="width: 200px;">Pengadilan Agama Pengaju</td>
                                <td><?php echo e($data->pa_pengaju); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Masuk</td>
                                <td>
                                    <?php if($data->tgl_masuk == '0000-00-00'): ?>
                                    <?php elseif($data->tgl_masuk == ''): ?>
                                    <?php else: ?>
                                        <?php echo e(date('d-m-Y', strtotime($data->tgl_masuk))); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Register</td>
                                <td>
                                    <?php if($data->tgl_register == '0000-00-00'): ?>
                                        <span class="badge badge-success">Data Not Available</span>
                                    <?php elseif($data->tgl_register == ''): ?>
                                        <span class="badge badge-success"">Data Not Available</span>
                                    <?php else: ?>
                                        <?php echo e(date('d-m-Y', strtotime($data->tgl_register))); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class=" text-start border">
                                <td>Nomor Perkara Banding</td>
                                <td><?php echo e($data->no_banding); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Putus Banding</td>
                                <td>
                                    <?php if($data->tgl_put_banding == '0000-00-00'): ?>
                                    <?php elseif($data->tgl_put_banding == ''): ?>
                                    <?php else: ?>
                                        <?php echo e(date('d-m-Y', strtotime($data->tgl_put_banding))); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td>Nomor PA</td>
                                <td><?php echo e($data->no_pa); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Putus PA</td>
                                <td>
                                    <?php if($data->tgl_put_pa == '0000-00-00'): ?>
                                    <?php elseif($data->tgl_put_pa == ''): ?>
                                    <?php else: ?>
                                        <?php echo e(date('d-m-Y', strtotime($data->tgl_put_pa))); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td>Nomor Kasasi</td>
                                <td><?php echo e($data->no_kasasi); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Pemohon</td>
                                <td><?php echo e($data->pemohon_kasasi); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Termohon</td>
                                <td><?php echo e($data->termohon_kasasi); ?></td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Putus Kasasi</td>
                                <td class="text-start">
                                    <?php if($data->tgl_put_kasasi == '0000-00-00'): ?>
                                        <span class="badge badge-warning"">Proses</button>
                                        <?php elseif($data->tgl_put_kasasi == ''): ?>
                                            <span class=" badge badge-warning"">Proses</span>
                                        <?php else: ?>
                                            <?php echo e(date('d-m-Y', strtotime($data->tgl_put_kasasi))); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td>Nomor Box</td>
                                <td>
                                    <?php if($data->no_box == ''): ?>
                                        <span class="badge badge-success">Belum diinput</span>
                                    <?php elseif($data->no_box == '0000-00-00'): ?>
                                        <span class="badge badge-success">Belum diinput</span>
                                    <?php else: ?>
                                        <span class="badge badge-success"><?php echo e($data->no_box); ?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td>Status Keterangan</td>
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
                        <h6 class="modal-title"><?php echo e($data->no_kasasi); ?> Jo. <?php echo e($data->no_banding); ?> </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="/reg_kasasi/delete/<?php echo e($data->id); ?>" type="button"
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

<?php echo $__env->make('layouts.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\pm_hukum_app\resources\views//reg_kasasi/v_reg_kasasi.blade.php ENDPATH**/ ?>