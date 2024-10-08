@extends('layouts.v_template')

@section('content')

@include('layouts.v_deskripsi')

<div class="panel panel-default container">

    <div class="panel-heading">
        <div class="panel-title">
            Ubah Data Pemberitahuan Putusan Banding
        </div>
    </div>

    <div class="panel-body">

        <form action="/pbt/update/{{$pbt->id_pbt}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Masuk</label>
                            <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" value="{{$pbt->tgl_masuk}}" name="tgl_masuk" autofocus>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_masuk')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor Perkara Banding</label>
                            <input type="text" class="form-control @error('no_banding') is-invalid @enderror" value="{{$pbt->no_banding}}" name="no_banding" autofocus>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_banding')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor Perkara PA</label>
                            <input type="text" class="form-control @error('no_pa') is-invalid @enderror" value="{{$pbt->no_pa}}" name="no_pa">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_pa')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Pemberitahuan Putusan Kepada Pebanding</label>
                            <input type="date" class="form-control @error('tgl_pbt_p') is-invalid @enderror" value="{{$pbt->tgl_pbt_p}}" name="tgl_pbt_p">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_pbt_p')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Pemberitahuan Putusan Kepada Terbanding</label>
                            <input type="date" class="form-control @error('tgl_pbt_t') is-invalid @enderror" value="{{$pbt->tgl_pbt_t}}" name="tgl_pbt_t">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_pbt_t')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Dokumen PBT</label>
                                <div>{{ $pbt->pbt_put }}</div>
                            </div>
                            <div class="">
                                <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                    <label>Ganti Dokumen PBT</label>
                                    <input type="file" class="form-control form-control-sm @error('pbt_put') is-invalid @enderror" value="{{$pbt->pbt_put}}" name="pbt_put">
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        @error('pbt_put')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" value="{{$pbt->keterangan}}" name="keterangan">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('keterangan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-success">Simpan</button>
                            <a href="/pbt" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection