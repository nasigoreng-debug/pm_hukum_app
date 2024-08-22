@extends('layouts.v_template')

@section('content')

@include('layouts.v_deskripsi')

<div class="panel panel-default container">

    <div class="panel-heading">
        <div class="panel-title">
            Tambah Data Peminjam Berkas
        </div>
    </div>

    <div class="panel-body">

        <form action="/pinjam/insert" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary mt-3 ml-3 mb-3 mr-3">

                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nama Peminjam</label>
                            <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror" value="{{old('nama_peminjam')}}" name="nama_peminjam" autofocus>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('nama_peminjam')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor Perkara Banding</label>
                            <input type="text" class="form-control @error('no_banding') is-invalid @enderror" value="{{old('no_banding')}}" name="no_banding">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_banding')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Pinjam</label>
                            <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" value="{{old('tgl_pinjam')}}" name="tgl_pinjam">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_pinjam')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Kembali</label>
                            <input type="date" class="form-control @error('tgl_kembali') is-invalid @enderror" value="{{old('tgl_kembali')}}" name="tgl_kembali">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_kembali')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" value="{{old('keterangan')}}" name="keterangan">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('keterangan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                        <label>Upload Foto Bukti Peminjaman</label>
                                        <input type="file" class="form-control form-control-sm @error('dokumen') is-invalid @enderror" value="{{old('dokumen')}}" name="dokumen">
                                        <div                    id="validationServerUsernameFeedback" class="invalid-feedback">
                                            @error('dokumen')
                                            {{ $message }}
                                            @enderror
                                        </div>
                            </div>
                        <div class="form-group">
                            <button class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <a href="/pinjam" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>

</div>
@endsection