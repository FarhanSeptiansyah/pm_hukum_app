<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.v_deskripsi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(Auth::user()->level === 1): ?>
        <!-- DASHBOARD KASASI PERKARA -->
        <div class="container-fluid">
            <div class="row">

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h3 class="card-title text-primary text-center">
                                    </i>REKAP DATA DOKUMEN PERKARA KASASI
                                </h3>
                            </div>
                            <div class="card-body p-0">
                                <div>
                                    <a href="/kasasi_total" type="button" class="btn btn-secondary btn-sm">Tampilkan semua
                                        data</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover mb-0">
                                        <thead class="bg-info text-white">
                                            <tr>
                                                <th width="5%" class="text-center align-middle">No</th>
                                                <th width="15%" class="text-center align-middle">Tahun</th>
                                                <th width="15%" class="text-center align-middle">Total Data</th>
                                                <th width="15%" class="text-center align-middle">Sudah Upload</th>
                                                <th width="15%" class="text-center align-middle">Belum Upload</th>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $rekap_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $rekap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $progress =
                                                        $rekap->total > 0
                                                            ? round(($rekap->selesai / $rekap->total) * 100)
                                                            : 0;
                                                ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo e($index + 1); ?></td>
                                                    <td class="text-center align-middle">
                                                        <a href="<?php echo e(route('kasasi.by_year', ['tahun' => $rekap->tahun])); ?>"
                                                            class="btn btn-outline-primary btn-sm font-weight-bold">
                                                            </i><?php echo e($rekap->tahun); ?>

                                                        </a>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <span class="btn btn-info btn-xs">
                                                            <?php echo e(number_format($rekap->total)); ?> Perkara
                                                        </span>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <span class="btn btn-success btn-xs">
                                                            <?php echo e(number_format($rekap->selesai)); ?> Dokumen
                                                        </span>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <span class="btn btn-danger btn-xs">
                                                            <?php echo e(number_format($rekap->belum_selesai)); ?> Dokumen
                                                        </span>
                                                    </td>

                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($rekap_tahun->isEmpty()): ?>
                                                <tr>
                                                    <td colspan="6" class="text-center py-4">
                                                        <div class="alert alert-info mb-0">
                                                            <i class="fa fa-info-circle mr-2"></i> Belum ada data untuk
                                                            direkap.
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                        <?php if(!$rekap_tahun->isEmpty()): ?>
                                            <tfoot class="bg-light">
                                                <tr>
                                                    <th colspan="2" class="text-center align-middle">TOTAL KESELURUHAN
                                                    </th>
                                                    <th class="text-center align-middle">
                                                        <span class="btn btn-primary btn-xs">
                                                            <?php echo e(number_format($rekap_tahun->sum('total'))); ?> Perkara
                                                        </span>
                                                    </th>
                                                    <th class="text-center align-middle">
                                                        <span class="btn btn-primary btn-xs">
                                                            <?php echo e(number_format($rekap_tahun->sum('selesai'))); ?> Perkara
                                                        </span>
                                                    </th>
                                                    <th class="text-center align-middle">
                                                        <span class="btn btn-primary btn-xs">
                                                            <?php echo e(number_format($rekap_tahun->sum('belum_selesai'))); ?> Perkara
                                                        </span>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        <?php endif; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif(Auth::user()->level === 2): ?>
        <!-- DASHBOARD KASASI PERKARA -->
        <div class="container-fluid">
            <div class="row">
                <!-- TOTAL KASASI PERKARA -->
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="xe-widget xe-vertical-counter xe-vertical-counter-info animated-widget" data-count=".num"
                        data-from="0" data-to="<?php echo e($kasasi_total); ?>" data-decimal="," data-suffix="" data-duration="2.5">
                        <div class="xe-icon">
                            <i class="fa fa-file-text-o pulse"></i>
                            <h4 class="widget-title">KASASI PERKARA</h4>
                        </div>
                        <div class="xe-label">
                            <a href="/kasasi_total" class="text-white">
                                <h1 class="num">0</h1>
                            </a>
                        </div>
                        <div class="widget-wave"></div>
                    </div>
                </div>

                <!-- SUDAH SELESAI -->
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="xe-widget xe-vertical-counter xe-vertical-counter-success animated-widget" data-count=".num"
                        data-from="0" data-to="<?php echo e($kasasi_selesai); ?>" data-decimal="," data-suffix="" data-duration="2.5">
                        <div class="xe-icon">
                            <i class="fa fa-file-text-o bounce"></i>
                            <h4 class="widget-title">SUDAH SELESAI</h4>
                        </div>
                        <div class="xe-label">
                            <a href="/kasasi_sdh" class="text-white">
                                <h1 class="num">0</h1>
                            </a>
                        </div>
                        <div class="widget-wave"></div>
                    </div>
                </div>

                <!-- BELUM SELESAI -->
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="xe-widget xe-vertical-counter xe-vertical-counter-danger animated-widget" data-count=".num"
                        data-from="0" data-to="<?php echo e($kasasi_blm_selesai); ?>" data-decimal="," data-suffix=""
                        data-duration="2.5">
                        <div class="xe-icon">
                            <i class="fa fa-file-text-o shake"></i>
                            <h4 class="widget-title">BELUM SELESAI</h4>
                        </div>
                        <div class="xe-label">
                            <a href="/kasasi_blm" class="text-white">
                                <h1 class="num">0</h1>
                            </a>
                        </div>
                        <div class="widget-wave"></div>
                    </div>
                </div>

                <!-- PROGRESS PERSENTASE -->
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="xe-widget xe-vertical-counter xe-vertical-counter-warning animated-widget" data-count=".num"
                        data-from="0" data-to="<?php echo e($kasasi_presentase); ?>" data-decimal="," data-suffix="%"
                        data-duration="2.5">
                        <div class="xe-icon">
                            <i class="fa fa-percent rotate"></i>
                            <h4 class="widget-title">PROGRESS SELESAI</h4>
                        </div>
                        <div class="xe-label">
                            <div class="text-white">
                                <h1 class="num">0</h1>
                            </div>
                        </div>
                        <div class="widget-wave"></div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h3 class="card-title text-primary text-center">
                                    </i>REKAP DATA BERDASARKAN TAHUN
                                </h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover mb-0">
                                        <thead class="bg-info text-white">
                                            <tr>
                                                <th width="5%" class="text-center align-middle">No</th>
                                                <th width="15%" class="text-center align-middle">Tahun</th>
                                                <th width="15%" class="text-center align-middle">Total Data</th>
                                                <th width="15%" class="text-center align-middle">Sudah Selesai</th>
                                                <th width="15%" class="text-center align-middle">Belum Selesai</th>
                                                <th width="35%" class="text-center align-middle">Progress Selesai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $rekap_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $rekap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $progress =
                                                        $rekap->total > 0
                                                            ? round(($rekap->selesai / $rekap->total) * 100)
                                                            : 0;
                                                ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo e($index + 1); ?></td>
                                                    <td class="text-center align-middle">
                                                        <a href="<?php echo e(route('kasasi.by_year', ['tahun' => $rekap->tahun])); ?>"
                                                            class="btn btn-outline-primary btn-sm font-weight-bold">
                                                            </i><?php echo e($rekap->tahun); ?>

                                                        </a>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <span class="btn btn-info btn-xs">
                                                            <?php echo e(number_format($rekap->total)); ?> Perkara
                                                        </span>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <span class="btn btn-success btn-xs">
                                                            <?php echo e(number_format($rekap->selesai)); ?> Perkara
                                                        </span>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <span class="btn btn-danger btn-xs">
                                                            <?php echo e(number_format($rekap->belum_selesai)); ?> Perkara
                                                        </span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="d-flex align-items-center">
                                                            <div class="progress-wrapper flex-grow-1 mr-3">
                                                                <div class="progress"
                                                                    style="height: 20px; border-radius: 10px;">
                                                                    <div class="progress-bar progress-bar-striped progress-bar-animated
                                                            <?php if($progress >= 80): ?> bg-success
                                                            <?php elseif($progress >= 50): ?> bg-warning
                                                            <?php else: ?> bg-danger <?php endif; ?>"
                                                                        role="progressbar"
                                                                        style="width: <?php echo e($progress); ?>%; border-radius: 10px;"
                                                                        aria-valuenow="<?php echo e($progress); ?>"
                                                                        aria-valuemin="0" aria-valuemax="100">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-text">
                                                                <span
                                                                    class="font-weight-bold
                                                        <?php if($progress >= 80): ?> text-success
                                                        <?php elseif($progress >= 50): ?> text-warning
                                                        <?php else: ?> text-danger <?php endif; ?>"
                                                                    style="font-size: 14px; min-width: 45px; display: inline-block;">
                                                                    <?php echo e($progress); ?>%
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($rekap_tahun->isEmpty()): ?>
                                                <tr>
                                                    <td colspan="6" class="text-center py-4">
                                                        <div class="alert alert-info mb-0">
                                                            <i class="fa fa-info-circle mr-2"></i> Belum ada data untuk
                                                            direkap.
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                        <?php if(!$rekap_tahun->isEmpty()): ?>
                                            <tfoot class="bg-light">
                                                <tr>
                                                    <th colspan="2" class="text-center align-middle">TOTAL KESELURUHAN
                                                    </th>
                                                    <th class="text-center align-middle">
                                                        <span class="btn btn-primary btn-xs">
                                                            <?php echo e(number_format($rekap_tahun->sum('total'))); ?> Perkara
                                                        </span>
                                                    </th>
                                                    <th class="text-center align-middle">
                                                        <span class="btn btn-primary btn-xs">
                                                            <?php echo e(number_format($rekap_tahun->sum('selesai'))); ?> Perkara
                                                        </span>
                                                    </th>
                                                    <th class="text-center align-middle">
                                                        <span class="btn btn-primary btn-xs">
                                                            <?php echo e(number_format($rekap_tahun->sum('belum_selesai'))); ?> Perkara
                                                        </span>
                                                    </th>
                                                    <th class="text-center align-middle">
                                                        <?php
                                                            $total_keseluruhan = $rekap_tahun->sum('total');
                                                            $selesai_keseluruhan = $rekap_tahun->sum('selesai');
                                                            $progress_keseluruhan =
                                                                $total_keseluruhan > 0
                                                                    ? round(
                                                                        ($selesai_keseluruhan / $total_keseluruhan) *
                                                                            100,
                                                                    )
                                                                    : 0;
                                                        ?>
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <div class="progress-wrapper flex-grow-1 mr-3"
                                                                style="max-width: 200px;">
                                                                <div class="progress"
                                                                    style="height: 20px; border-radius: 10px;">
                                                                    <div class="progress-bar progress-bar-striped progress-bar-animated
                                                            <?php if($progress_keseluruhan >= 80): ?> bg-success
                                                            <?php elseif($progress_keseluruhan >= 50): ?> bg-warning
                                                            <?php else: ?> bg-danger <?php endif; ?>"
                                                                        role="progressbar"
                                                                        style="width: <?php echo e($progress_keseluruhan); ?>%; border-radius: 10px;"
                                                                        aria-valuenow="<?php echo e($progress_keseluruhan); ?>"
                                                                        aria-valuemin="0" aria-valuemax="100">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="progress-text">
                                                                <span
                                                                    class="font-weight-bold
                                                        <?php if($progress_keseluruhan >= 80): ?> text-success
                                                        <?php elseif($progress_keseluruhan >= 50): ?> text-warning
                                                        <?php else: ?> text-danger <?php endif; ?>"
                                                                    style="font-size: 16px; min-width: 50px; display: inline-block;">
                                                                    <?php echo e($progress_keseluruhan); ?>%
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        <?php endif; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif(Auth::user()->level === 3): ?>
    <?php endif; ?>

    <style>
        /* Base Styles untuk card */
        .xe-widget {
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .animated-widget:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .widget-title {
            font-size: 14px;
            line-height: 1.3;
            min-height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin: 10px 0;
            font-weight: 600;
        }

        .xe-label h1 {
            font-size: 2.5rem;
            margin: 0;
            text-align: center;
            font-weight: bold;
        }

        .xe-icon .fa {
            font-size: 28px;
            margin-bottom: 8px;
        }

        /* Wave Effect */
        .widget-wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
            animation: wave 2s infinite linear;
        }

        @keyframes  wave {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        /* Icon Animations */
        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes  pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .bounce {
            animation: bounce 2s infinite;
        }

        @keyframes  bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-5px);
            }

            60% {
                transform: translateY(-3px);
            }
        }

        .shake {
            animation: shake 2s ease-in-out infinite;
        }

        @keyframes  shake {

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-5deg);
            }

            75% {
                transform: rotate(5deg);
            }
        }

        .rotate {
            animation: rotate 3s infinite linear;
        }

        @keyframes  rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /* Number Counting Animation */
        .num {
            animation: numberPop 0.5s ease-out;
        }

        @keyframes  numberPop {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }

            70% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Hover Effects */
        .animated-widget:hover .xe-icon .fa {
            transform: scale(1.2);
            transition: transform 0.3s ease;
        }

        .animated-widget:hover .widget-title {
            color: #fff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* Table Styles */
        .table th {
            font-weight: 700;
            font-size: 14px;
            padding: 12px 8px;
        }

        .table td {
            padding: 10px 8px;
            vertical-align: middle;
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%) !important;
        }

        .badge-lg {
            font-size: 13px;
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 600;
        }

        .progress {
            border-radius: 10px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2);
            background-color: #f8f9fa;
            overflow: visible;
        }

        .progress-bar {
            border-radius: 10px;
            position: relative;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: width 0.6s ease;
        }

        .progress-bar-striped {
            background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
            background-size: 1rem 1rem;
        }

        .progress-bar-animated {
            animation: progress-bar-stripes 1s linear infinite;
        }

        @keyframes  progress-bar-stripes {
            0% {
                background-position: 1rem 0;
            }

            100% {
                background-position: 0 0;
            }
        }

        /* Progress text styling */
        .progress-text {
            min-width: 50px;
            text-align: center;
        }

        .progress-wrapper {
            flex: 1;
        }

        /* Button styles for year links */
        .btn-outline-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .xe-widget {
                height: 180px;
            }

            .widget-title {
                font-size: 13px;
                min-height: 32px;
            }

            .xe-label h1 {
                font-size: 2rem;
            }

            .xe-icon .fa {
                font-size: 24px;
            }

            .table-responsive {
                font-size: 13px;
            }

            .badge-lg {
                font-size: 11px;
                padding: 6px 10px;
            }

            .progress-text {
                font-size: 12px;
                min-width: 40px;
            }
        }

        @media (max-width: 576px) {
            .xe-widget {
                height: 160px;
            }

            .widget-title {
                font-size: 12px;
                min-height: 28px;
            }

            .xe-icon .fa {
                font-size: 22px;
            }

            .table-responsive {
                font-size: 12px;
            }

            .badge-lg {
                font-size: 10px;
                padding: 4px 8px;
            }

            .progress {
                height: 16px !important;
            }

            .progress-text {
                font-size: 11px;
                min-width: 35px;
            }

            .table th,
            .table td {
                padding: 8px 6px;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Admin\Desktop\pm_hukum_app\resources\views//kasasi/v_kasasi_dashboard.blade.php ENDPATH**/ ?>