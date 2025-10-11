@extends('layouts.v_template')

@section('content')

@include('layouts.v_deskripsi')

<div class="panel panel-default container">

    <div class="panel-heading">
        <div class="panel-title">
            Ubah Data SK
        </div>
    </div>

    <div class="panel-body">

        <form action="/suratkeputusan/update/{{$sk->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor Peraturan</label>
                            <input type="text" class="form-control @error('no_sk') is-invalid @enderror" value="{{$sk->no_sk}}" name="no_sk">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_sk')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tahun</label>
                            <input type="text" class="form-control @error('tahun') is-invalid @enderror" value="{{$sk->tahun}}" name="tahun">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tahun')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal </label>
                            <input type="date" class="form-control @error('tgl_sk') is-invalid @enderror" value="{{$sk->tgl_sk}}" name="tgl_sk">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_sk')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tentang</label>
                            <input type="text" class="form-control @error('tentang') is-invalid @enderror" value="{{$sk->tentang}}" name="tentang">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tentang')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Dokumen</label>
                                <div>{{ $sk->dokumen }}</div>
                            </div>
                            <div class="">
                                <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                    <label>Ganti dokumen</label>
                                    <input type="file" class="form-control form-control-sm @error('dokumen') is-invalid @enderror" value="{{$sk->dokumen}}" name="dokumen">
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        @error('dokumen')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Konsep</label>
                                <div>{{ $sk->konsep_sk }}</div>
                            </div>
                            <div class="">
                                <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                    <label>Ganti Konsep</label>
                                    <input type="file" class="form-control form-control-sm @error('konsep_sk') is-invalid @enderror" value="{{$sk->konsep_sk}}" name="konsep_sk">
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        @error('konsep_sk')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-success">Simpan</button>
                            <a href="/suratkeputusan" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection