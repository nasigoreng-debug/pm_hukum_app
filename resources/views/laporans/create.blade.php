@extends('layouts.v_template')

@section('content')

@include('layouts.v_deskripsi')

<div class="panel panel-default container">

    <div class="panel-heading">
        <div class="panel-title">
            Tambah Data Peraturan
        </div>
    </div>

    <div class="panel-body">

        <form action="/laporan/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label for="jenis_laporan">Jenis Laporan</label>
                            <select name="jenis_laporan" id="jenis_laporan" class="form-control @error('jenis_laporan') is-invalid @enderror">
                                <option>{{old('jenis_laporan')}}</option>
                                <option> Laporan Tahunan (Laptah)</option>
                                <option> Laporan Kinerja Instansi Pemerintah (LKjIP)</option>
                                <option> Laporan lainnya</option>
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('jenis_laporan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label for="tahun">Tahun</label>
                            <input type="text" id="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{old('tahun')}}" name="tahun">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tahun')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label for="tgl_laporan">Tanggal Laporan</label>
                            <input type="date" id="tgl_laporan" class="form-control @error('tgl_laporan') is-invalid @enderror" value="{{old('tgl_laporan')}}" name="tgl_laporan">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_laporan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label for="judul">Judul Laporan</label>
                            <input type="text" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{old('judul')}}" name="judul">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('judul')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label for="dokumen">Dokumen</label>
                            <input type="file" id="dokumen" class="form-control @error('dokumen') is-invalid @enderror" value="{{old('dokumen')}}" name="dokumen">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('dokumen')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <a href="/laporan" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>

</div>
@endsection