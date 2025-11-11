@extends('layouts.v_template')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb Navigation -->
        <div class="row mb-3">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light p-2">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="/retensi">Dashboard Retensi</a></li>
                        <li class="breadcrumb-item active">Tahun {{ $tahun }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary mb-5">
                        <h3 class="card-title text-white">
                            DATA RETENSI ARSIP TAHUN {{ $tahun }}
                        </h3>
                        <div class="card-tools">
                            <div class="btn-group">
                                <!-- Dropdown Navigasi Tahun -->
                                @if ($tahun_tersedia->count() > 1)
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        data-toggle="dropdown">
                                        Tahun Lain
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @foreach ($tahun_tersedia as $tahun_item)
                                            @if ($tahun_item != $tahun)
                                                <a class="dropdown-item badge"
                                                    href="{{ route('retensi.by_year', ['tahun' => $tahun_item]) }}">
                                                    {{ $tahun_item }}
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
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
                                        <span class="info-box-number">{{ $total_tahun }}</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 100%"></div>
                                        </div>
                                        <span class="progress-description">
                                            Total arsip tahun {{ $tahun }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="bg-success shadow">
                                    <span class="info-box-icon"><i class="fa fa-check"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Sudah Upload</span>
                                        <span class="info-box-number">{{ $selesai_tahun }}</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: {{ $progress_tahun }}%"></div>
                                        </div>
                                        <span class="progress-description">
                                            {{ $progress_tahun }}% dari total
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="bg-danger shadow">
                                    <span class="info-box-icon"><i class="fa fa-clock-o"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Belum Upload</span>
                                        <span class="info-box-number">{{ $blm_selesai_tahun }}</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: {{ 100 - $progress_tahun }}%"></div>
                                        </div>
                                        <span class="progress-description">
                                            {{ 100 - $progress_tahun }}% dari total
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="bg-success shadow">
                                    <span class="info-box-icon"><i class="fa fa-percent"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Progress Upload</span>
                                        <span class="info-box-number">{{ $progress_tahun }}%</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: {{ $progress_tahun }}%"></div>
                                        </div>
                                        <span class="progress-description">
                                            @if ($progress_tahun == 100)
                                                Upload lengkap
                                            @elseif($progress_tahun >= 80)
                                                Hampir lengkap
                                            @elseif($progress_tahun >= 50)
                                                Setengah lengkap
                                            @else
                                                Perlu dipercepat
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- TABEL DATA RETENSI -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th width="5%" class="text-center align-middle">No</th>
                                    <th width="15%" class="text-center align-middle">Nomor Arsip</th>
                                    <th width="10%" class="text-center align-middle">Tahun</th>
                                    <th width="15%" class="text-center align-middle">Status</th>
                                    <th width="5%%" class="text-center align-middle">Putusan</th>
                                    <th width="15%" class="text-center align-middle">Tanggal Upload</th>
                                    <th width="15%" class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($retensi_per_tahun as $index => $retensi)
                                    <tr>
                                        <td class="text-center align-middle">{{ $index + 1 }}</td>
                                        <td class="align-middle">
                                            <strong>{{ $retensi->no_banding ?? 'Belum ada nomor' }}</strong>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="btn btn-info btn-xs">{{ $retensi->tahun }}</span>
                                        </td>
                                        <td class="text-center align-middle">
                                            @if ($retensi->putusan)
                                                <span class="btn btn-success btn-xs">
                                                    <i class="fa fa-check mr-1"></i>Sudah Upload
                                                </span>
                                            @else
                                                <span class="btn btn-danger btn-xs">
                                                    <i class="fa fa-clock-o mr-1"></i>Belum Upload
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($retensi->putusan == '')
                                            @else
                                                <a href="{{ asset('public/retensi_arsip_perkara/' . $retensi->putusan) }}"
                                                    class="text-blue"><i class="fa fa-file-pdf-o"></i></a>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            @if ($retensi->putusan)
                                                {{ $retensi->updated_at ? \Carbon\Carbon::parse($retensi->updated_at)->format('d-m-Y H:i') : '-' }}
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="btn-group btn-group-xs">
                                                @if (Auth::user()->level === 1)
                                                    <button type="button" class="btn btn-info btn-xs"
                                                        data-toggle="modal" data-target="#detail{{ $retensi->id }}"
                                                        title="Detail">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <a href="/retensi/edit/{{ $retensi->id }}"
                                                        class="btn btn-warning btn-xs" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-xs"
                                                        data-toggle="modal" data-target="#delete{{ $retensi->id }}"
                                                        title="Hapus">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                @elseif(Auth::user()->level === 2)
                                                    <button type="button" class="btn btn-info btn-xs"
                                                        data-toggle="modal" data-target="#detail{{ $retensi->id }}"
                                                        title="Detail">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <a href="/retensi/edit/{{ $retensi->id }}"
                                                        class="btn btn-warning btn-xs" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @elseif(Auth::user()->level === 3)
                                                    <button type="button" class="btn btn-info btn-xs"
                                                        data-toggle="modal" data-target="#detail{{ $retensi->id }}"
                                                        title="Detail">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            <div class="alert alert-info mb-0">
                                                <i class="fa fa-info-circle mr-2"></i> Tidak ada data retensi untuk tahun
                                                {{ $tahun }}.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal Section - DI LUAR TABEL -->
                    @foreach ($retensi_per_tahun as $data)
                        <!-- Modal Detail -->
                        <div class="modal fade" id="detail{{ $data->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 colspan="2" class="text-white text-center bg-success">Retensi Arsip</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-small-font table-bordered table-hover">
                                            <tr class="text-start border">
                                                <td style="width: 200px;">Pengadilan Agama Pengaju</td>
                                                <td>{{ $data->pa_pengaju }}</td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Nomor Perkara Banding</td>
                                                <td>{{ $data->no_banding }}</td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Jenis Perkara</td>
                                                <td>{{ $data->jenis_perkara }}</td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Pembanding</td>
                                                <td>{{ $data->pembanding }}</td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Terbanding</td>
                                                <td>{{ $data->terbanding }}</td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Tanggal Putus Banding</td>
                                                <td class="text-start border">
                                                    @if ($data->tgl_put_banding == '0000-00-00' || $data->tgl_put_banding == '')
                                                    @else
                                                        {{ date('d-m-Y', strtotime($data->tgl_put_banding)) }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Status Putusan</td>
                                                <td>{{ $data->status_put }}</td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Nomor Perkara TK.1</td>
                                                <td>{{ $data->no_pa }}</td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Nomor Perkara Kasasi</td>
                                                <td>{{ $data->no_kasasi }}</td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Nomor Perkara PK</td>
                                                <td>{{ $data->no_pk }}</td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Tanggal Putus PA</td>
                                                <td class="text-start border">
                                                    @if ($data->tgl_put_pa == '0000-00-00' || $data->tgl_put_pa == '')
                                                    @else
                                                        {{ date('d-m-Y', strtotime($data->tgl_put_pa)) }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Tanggal Putus Kasasi</td>
                                                <td>
                                                    @if ($data->tgl_put_kasasi == '0000-00-00' || $data->tgl_put_kasasi == '')
                                                    @else
                                                        {{ date('d-m-Y', strtotime($data->tgl_put_kasasi)) }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Tanggal Putus PK</td>
                                                <td>
                                                    @if ($data->tgl_put_pk == '0000-00-00' || $data->tgl_put_pk == '')
                                                    @else
                                                        {{ date('d-m-Y', strtotime($data->tgl_put_pk)) }}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Buku</td>
                                                <td>{{ $data->buku }}</td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Tingkat</td>
                                                <td>{{ $data->tingkat }}</td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Tahun</td>
                                                <td>{{ $data->tahun }}</td>
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
                        <div class="modal fade" id="delete{{ $data->id }}">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">{{ $data->no_banding }} Jo.
                                            {{ $data->no_pa }} Jo.
                                            {{ $data->no_kasasi }} Jo. {{ $data->no_pk }} </h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <a href="/retensi/delete/{{ $data->id }}" type="button"
                                            class="btn btn-sm btn-danger">Ya</a>
                                        <button type="button" class="btn btn-sm btn-white"
                                            data-dismiss="modal">Tidak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Informasi Summary -->
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="alert alert-secondary">
                                <h6><i class="fa fa-info-circle mr-2"></i>Summary Tahun {{ $tahun }}</h6>
                                <p class="mb-1">Total data: <strong>{{ $total_tahun }}</strong> arsip</p>
                                <p class="mb-1">Sudah upload: <strong>{{ $selesai_tahun }}</strong> arsip
                                    ({{ $progress_tahun }}%)</p>
                                <p class="mb-0">Belum upload: <strong>{{ $blm_selesai_tahun }}</strong> arsip
                                    ({{ 100 - $progress_tahun }}%)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
