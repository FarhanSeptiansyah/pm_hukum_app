@extends('layouts.v_template')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb Navigation -->
        <div class="row mb-3">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light p-2">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="/kasasi">Dashboard Kasasi</a></li>
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
                            DATA KASASI PERKARA TAHUN {{ $tahun }}
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
                                                    href="{{ route('kasasi.by_year', ['tahun' => $tahun_item]) }}">
                                                    {{ $tahun_item }}
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
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
                                @forelse ($kasasi_per_tahun as $index => $kasasi)
                                    <tr>
                                        <td class="text-center align-middle">{{ $index + 1 }}</td>
                                        <td class="align-middle">
                                            <strong>{{ $kasasi->no_kasasi ?? 'Belum ada nomor' }}</strong>
                                            Jo.
                                            <small>{{ $kasasi->no_banding ?? 'Belum ada nomor' }}</small>
                                        </td>
                                        <td class="text-center align-middle">
                                            <span class="btn btn-info btn-xs">{{ $tahun }}</span>
                                        </td>
                                        <td class="text-center align-middle">
                                            {{ $kasasi->status_put }}
                                        </td>
                                        <td class="text-center">
                                            @if ($kasasi->salput_kasasi)
                                                <a href="{{ asset('public/kasasi_perkara/' . $kasasi->salput_kasasi) }}"
                                                    class="text-blue"><i class="fa fa-file-pdf-o"></i></a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            @if ($kasasi->tgl_masuk)
                                                {{ \Carbon\Carbon::parse($kasasi->tgl_masuk)->format('d-m-Y') }}
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="btn-group btn-group-xs">
                                                @if (Auth::user()->level === 1)
                                                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                        data-target="#detail{{ $kasasi->id }}" title="Detail">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <a href="/kasasi/edit/{{ $kasasi->id }}"
                                                        class="btn btn-warning btn-xs" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                                        data-target="#delete{{ $kasasi->id }}" title="Hapus">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                @elseif(Auth::user()->level === 2)
                                                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                        data-target="#detail{{ $kasasi->id }}" title="Detail">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <a href="/kasasi/edit/{{ $kasasi->id }}"
                                                        class="btn btn-warning btn-xs" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @elseif(Auth::user()->level === 3)
                                                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                        data-target="#detail{{ $kasasi->id }}" title="Detail">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <div class="alert alert-info mb-0">
                                                <i class="fa fa-info-circle mr-2"></i> Tidak ada data kasasi untuk tahun
                                                {{ $tahun }}.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal Section - DI LUAR TABEL -->
                    @foreach ($kasasi_per_tahun as $data)
                        <!-- Modal Detail -->
                        <div class="modal fade" id="detail{{ $data->id }}" tabindex="-1">
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
                                                    @if ($data->tgl_masuk)
                                                        {{ \Carbon\Carbon::parse($data->tgl_masuk)->format('d-m-Y') }}
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Tanggal Register</td>
                                                <td>
                                                    @if ($data->tgl_masuk)
                                                        {{ \Carbon\Carbon::parse($data->tgl_masuk)->format('d-m-Y') }}
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Nomor Banding</td>
                                                <td>{{ $data->no_banding ?? '-' }}</td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Nomor Kasasi</td>
                                                <td>{{ $data->no_kasasi ?? '-' }}</td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Status Putusan</td>
                                                <td>{{ $data->status_put ?? '-' }}</td>
                                            </tr>
                                            <tr class="text-start border">
                                                <td>Salinan Putusan Kasasi</td>
                                                <td>
                                                    @if ($data->salput_kasasi)
                                                        <span class="badge badge-success">Sudah Upload</span>
                                                    @else
                                                        <span class="badge badge-danger">Belum Upload</span>
                                                    @endif
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
                        <div class="modal fade" id="delete{{ $data->id }}">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title">{{ $data->no_kasasi ?? 'Data Kasasi' }}</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda ingin menghapus data kasasi ini?&hellip;</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <a href="/kasasi/delete/{{ $data->id }}" type="button"
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
                                <p class="mb-1">Total data: <strong>{{ $total_tahun }}</strong> kasasi</p>
                                <p class="mb-1">Sudah upload: <strong>{{ $selesai_tahun }}</strong> kasasi
                                    ({{ $progress_tahun }}%)</p>
                                <p class="mb-0">Belum upload: <strong>{{ $blm_selesai_tahun }}</strong> kasasi
                                    ({{ 100 - $progress_tahun }}%)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
