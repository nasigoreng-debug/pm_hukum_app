@extends('layouts.v_template')

@section('content')

@include('layouts.v_deskripsi')

<div class="panel panel-default container">

    <div class="panel-heading">
        <div class="panel-title">
            Ubah Data Peminjam Berkas
        </div>
    </div>

    <div class="panel-body">

        <form action="/pinjam/update/{{$pinjam->id_pinjam}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary mt-3 ml-3 mb-3 mr-3">

                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nama Peminjam</label>
                            <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror" value="{{$pinjam->nama_peminjam}}" name="nama_peminjam" autofocus readonly>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('nama_peminjam')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor Perkara Banding</label>
                            <input type="text" class="form-control @error('no_banding') is-invalid @enderror" value="{{$pinjam->no_banding}}" name="no_banding" readonly>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_banding')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Pinjam</label>
                            <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" value="{{$pinjam->tgl_pinjam}}" name="tgl_pinjam" readonly>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_pinjam')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Kembali</label>
                            <input type="date" class="form-control @error('tgl_kembali') is-invalid @enderror" value="{{$pinjam->tgl_kembali}}" name="tgl_kembali">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_kembali')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" value="{{$pinjam->keterangan}}" name="keterangan">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('keterangan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <div>{{ $pinjam->bkt_pinjam }}</div>
                            <label>Upload Foto Bukti Peminjaman</label>
                            <input type="file" class="form-control form-control-sm @error('bkt_pinjam') is-invalid @enderror" value="{{$pinjam->bkt_pinjam}}" name="bkt_pinjam">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                @error('bkt_pinjam')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <div>{{ $pinjam->bkt_kembali }}</div>
                            <label>Upload Foto Bukti Kembali</label>
                            <input type="file" class="form-control form-control-sm @error('bkt_kembali') is-invalid @enderror" value="{{$pinjam->bkt_kembali}}" name="bkt_kembali">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                @error('bkt_kembali')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Simpan</button>
                            <a href="/pinjam" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection