<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.v_deskripsi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Table exporting -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Data Perkara Eksekusi</h3>

            <div class="panel-options">
                <a href="#" data-toggle="panel">
                    <span class="collapse-icon">&ndash;</span>
                    <span class="expand-icon">+</span>
                </a>
                <a href="#" data-toggle="remove">&times;</a>
            </div>
        </div>

        <div class="panel-body">
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $("#example-3").dataTable().yadcf([{
                            column_number: 1
                        },
                        {
                            column_number: 5
                        }
                    ]);
                });
            </script>

            <div class="text-center mb-3">
                <!-- Filter Form -->
                <form action="/search-date-range-eksekusi" method="GET" class="form-inline mb-3">
                    <div class="form-group mr-3 mb-2">
                        <label for="start_date" class="mr-2"><strong>Dari Tanggal:</strong></label>
                        <input type="date" class="form-control form-control-sm" id="start_date" name="start_date"
                            value="<?php echo e($startDate ?? ''); ?>" required>
                    </div>
                    <div class="form-group mr-3 mb-2">
                        <label for="end_date" class="mr-2"><strong>Sampai Tanggal:</strong></label>
                        <input type="date" class="form-control form-control-sm" id="end_date" name="end_date"
                            value="<?php echo e($endDate ?? ''); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mr-2 mb-2">
                        <i class="fa fa-search"></i> Tampilkan Data
                    </button>
                    <a href="/eks/berjalan" class="btn btn-warning btn-sm mr-2 mb-2">
                        <i class="fa fa-refresh"></i> Reset Filter
                    </a>
                </form>
            </div>
            <br>

            <!-- Action Buttons -->
            <?php if(in_array(Auth::user()->level, [1, 2])): ?>
                <div class="text-start mb-4">
                    <div class="d-flex flex-wrap justify-content-center gap-2" style="font-size: 14px;">
                        <a href="/eks/add" class="btn btn-sm btn-info">Tambah Data</a>
                        <a href="/eks/total" class="btn btn-sm btn-secondary">Semua</a>
                        <a href="/eks/berjalan" class="btn btn-sm btn-secondary">Berjalan</a>
                        <a href="/eks/selesai" class="btn btn-sm btn-secondary">Selesai</a>
                        <a href="/eks/progres" class="btn btn-sm btn-secondary">Progres Satker</a>
                        <button onclick="printTable()" class="btn btn-sm btn-success">
                            <i class="fa fa-print"></i> Print Table
                        </button>
                        <a href="/eks" class="btn btn-sm btn-danger">Kembali</a>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Success Message -->
            <?php if(session('pesan')): ?>
                <div class="alert alert-success alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo e(session('pesan')); ?>

                </div>
            <?php endif; ?>

            <!-- Data Table -->
            <table class="table table-sm table-hover" id="example-3">
                <thead class="bg-gray">
                    <tr>
                        <th style="width: 15px;">No</th>
                        <th style="width: 100px;">Satuan Kerja</th>
                        <th style="width: 135px;">Nomor Perkara Eksekusi</th>
                        <th style="width: 135px;">Juncto</th>
                        <th style="width: 100px;">Tanggal Permohonan</th>
                        <th style="width: 100px;">Proses Terakhir</th>
                        <th style="width: 100px;">Tanggal Pelaksanaan</th>
                        <th style="width: 100px;">Tanggal Selesai</th>
                        <th style="width: 100px;">Usia Perkara</th>
                        <th style="width: 100px;">Keterangan</th>
                        <th style="width: 50px;">Action</th>
                    </tr>
                </thead>

                <tfoot class="bg-gray">
                    <tr>
                        <th>No</th>
                        <th>Satuan Kerja</th>
                        <th>Nomor Perkara Eksekusi</th>
                        <th>Juncto</th>
                        <th>Tanggal Permohonan</th>
                        <th>Proses Terakhir</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>Tanggal Selesai</th>
                        <th>Usia Perkara</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>

                <tbody>
                    <?php $__currentLoopData = $eksekusi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($data->satker); ?></td>
                            <td><?php echo e($data->no_eksekusi); ?></td>
                            <td><?php echo e($data->no_put); ?></td>
                            <td class="text-center"><?php echo e(date('d-m-Y', strtotime($data->tgl_permohonan))); ?></td>
                            <td><?php echo e($data->proses_terakhir); ?></td>
                            <td class="text-center">
                                <?php if(empty($data->tgl_eks)): ?>
                                    <?php echo e(date('d-m-Y', strtotime($data->tgl_permohonan))); ?>

                                <?php else: ?>
                                    <?php echo e(date('d-m-Y', strtotime($data->tgl_eks))); ?>

                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if(empty($data->tgl_selesai)): ?>
                                    <span class="badge badge-warning">Proses</span>
                                <?php else: ?>
                                    <?php echo e(date('d-m-Y', strtotime($data->tgl_selesai))); ?>

                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if(empty($data->tgl_selesai)): ?>
                                    <span class="badge badge-danger">
                                        <?php echo e(Carbon\Carbon::parse($data->tgl_permohonan)->diffInDays($sekarang)); ?> Hari
                                    </span>
                                <?php else: ?>
                                    <span class="badge badge-success">
                                        <?php echo e(Carbon\Carbon::parse($data->tgl_permohonan)->diffInDays($data->tgl_selesai)); ?>

                                        Hari
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if(empty($data->keterangan)): ?>
                                    <span class="badge badge-primary">Tanpa keterangan</span>
                                <?php else: ?>
                                    <?php echo e($data->keterangan); ?>

                                <?php endif; ?>
                            </td>
                            <td class="text-center" style="font-size: 14px;">
                                <?php if(Auth::user()->level == 1): ?>
                                    <a href="/eks/edit/<?php echo e($data->id); ?>" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                        data-target="#delete<?php echo e($data->id); ?>">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                <?php elseif(Auth::user()->level == 2): ?>
                                    <a href="/eks/edit/<?php echo e($data->id); ?>" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Modals -->
    <?php $__currentLoopData = $eksekusi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="delete<?php echo e($data->id); ?>">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title"><?php echo e($data->no_eksekusi); ?></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="/eks/delete/<?php echo e($data->id); ?>" type="button" class="btn btn-sm btn-danger">Ya</a>
                        <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- Print Script -->
    <!-- Print Script -->
    <script>
        function printTable() {
            // Dapatkan semua data asli (bukan hanya yang terlihat di halaman saat ini)
            var originalTable = document.getElementById('example-3');

            // Clone seluruh tabel beserta semua data
            var printContent = originalTable.cloneNode(true);

            // Hapus pagination dari cloned table
            var paginationElements = printContent.querySelectorAll(
                '.dataTables_paginate, .pagination, .dataTables_info, .dataTables_length, .dataTables_filter');
            paginationElements.forEach(function(element) {
                element.remove();
            });

            // Remove Action column (last column)
            var rows = printContent.getElementsByTagName('tr');
            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName('td');
                var thCells = rows[i].getElementsByTagName('th');

                // Remove last td (Action column)
                if (cells.length > 0) {
                    cells[cells.length - 1].remove();
                }

                // Remove last th (Action header)
                if (thCells.length > 0) {
                    thCells[thCells.length - 1].remove();
                }
            }

            // Create print window
            var printWindow = window.open('', '_blank', 'width=1200,height=800');
            printWindow.document.write(`
            <!DOCTYPE html>
            <html>
            <head>
                <title>Laporan Data Perkara Eksekusi</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 15px;
                        font-size: 12px;
                        background: white;
                    }
                    .header {
                        text-align: center;
                        margin-bottom: 20px;
                        border-bottom: 2px solid #333;
                        padding-bottom: 10px;
                    }
                    .header h2 {
                        margin: 0;
                        color: #333;
                        font-size: 18px;
                    }
                    .info {
                        margin: 10px 0;
                        padding: 10px;
                        background: #f5f5f5;
                        border-radius: 5px;
                        border: 1px solid #ddd;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 15px;
                        font-size: 11px;
                    }
                    th, td {
                        border: 1px solid #000;
                        padding: 6px 8px;
                        text-align: left;
                    }
                    th {
                        background-color: #e9ecef;
                        font-weight: bold;
                        text-align: center;
                    }
                    tr:nth-child(even) {
                        background-color: #f8f9fa;
                    }
                    .text-center {
                        text-align: center;
                    }
                    .badge {
                        padding: 3px 8px;
                        border-radius: 4px;
                        font-size: 10px;
                        font-weight: bold;
                    }
                    .badge-warning { background-color: #ffc107; color: #000; }
                    .badge-danger { background-color: #dc3545; color: white; }
                    .badge-success { background-color: #28a745; color: white; }
                    .badge-primary { background-color: #007bff; color: white; }

                    /* Hide unnecessary elements */
                    .dataTables_paginate,
                    .pagination,
                    .dt-paging,
                    .dataTables_info,
                    .dataTables_length,
                    .dataTables_filter {
                        display: none !important;
                    }

                    /* Print styles */
                    @media  print {
                        @page  {
                            size: landscape;
                            margin: 10mm;
                        }
                        body {
                            margin: 0;
                            padding: 0;
                            font-size: 10px;
                        }
                        .no-print {
                            display: none !important;
                        }
                        table {
                            page-break-inside: auto;
                            font-size: 9px;
                        }
                        tr {
                            page-break-inside: avoid;
                            page-break-after: auto;
                        }
                        thead {
                            display: table-header-group;
                        }
                        tfoot {
                            display: table-footer-group;
                        }
                        .header {
                            margin-bottom: 15px;
                        }
                    }
                </style>
            </head>
            <body>
                <div class="header">
                    <h2>LAPORAN DATA PERKARA EKSEKUSI</h2>
                    <p>Tanggal Cetak: ${new Date().toLocaleDateString('id-ID', {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    })}</p>
                </div>

                <div class="info">
                    <strong>Total Data:</strong> ${rows.length - 1} Perkara<br>
                    <strong>User:</strong> ${document.body.getAttribute('data-user-name') || 'User'}
                </div>

                ${printContent.outerHTML}

                <div class="no-print" style="margin-top: 20px; text-align: center; padding: 15px;">
                    <button onclick="window.print()" style="padding: 10px 20px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; margin: 5px;">
                        🖨️ Print Halaman
                    </button>
                    <button onclick="window.close()" style="padding: 10px 20px; background: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer; margin: 5px;">
                        ❌ Tutup
                    </button>
                </div>

                <script>
                    window.onload = function() {
                        console.log('Total rows in print view:', document.querySelectorAll('table tr').length);
                        // Auto print jika diperlukan
                        // window.print();
                    };
                <\/script>
            </body>
            </html>
        `);
            printWindow.document.close();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\pm_hukum_app\resources\views//eksekusi/v_eksekusi.blade.php ENDPATH**/ ?>