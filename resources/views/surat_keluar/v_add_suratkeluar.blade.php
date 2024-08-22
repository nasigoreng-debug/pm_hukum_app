@extends('layouts.v_template')

@section('content')

@include('layouts.v_deskripsi')

<div class="panel panel-default container">

    <div class="panel-heading">
        <div class="panel-title">
            Tambah Data Surat Keluar
        </div>
    </div>

    <div class="panel-body">

        <form action="/suratkeluar/insert" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor Surat</label>
                            <input type="text" class="form-control @error('no_surat') is-invalid @enderror" value="{{old('no_surat')}}" name="no_surat" autofocus>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_surat')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Surat</label>
                            <input type="date" class="form-control @error('tgl_surat') is-invalid @enderror" value="{{old('tgl_surat')}}" name="tgl_surat" autofocus>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_surat')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label for="tujuan_surat">Tujuan Surat</label>
                            <select name="tujuan_surat" class="form-control @error('tujuan_surat') is-invalid @enderror">
                                <option>{{old('tujuan_surat')}}</option>
                                <option> Mahkamah Agung Republik Indonesia </option>
                                <option> Badan Pengawasan MA RI </option>
                                <option> Direktorat Jenderal Badan Peradilan Agama </option>
                                <option> Se Jawa Barat</option>
                                <option> Bandung </option>
                                <option> Sumedang </option>
                                <option> Cimahi </option>
                                <option> Ciamis </option>
                                <option> Tasikmalaya </option>
                                <option> Garut </option>
                                <option> Bogor </option>
                                <option> Sukabumi </option>
                                <option> Cianjur </option>
                                <option> Cirebon </option>
                                <option> Indramayu </option>
                                <option> Majalengka </option>
                                <option> Kuningan </option>
                                <option> Bekasi </option>
                                <option> Karawang </option>
                                <option> Purwakarta </option>
                                <option> Soreang </option>
                                <option> Ngamprah </option>
                                <option> Subang </option>
                                <option> Cibadak </option>
                                <option> Sumber </option>
                                <option> Cibinong </option>
                                <option> Cikarang </option>
                                <option> Depok </option>
                                <option> Kota Tasikmalaya </option>
                                <option> Kota Banjar </option>
                                <option> Lain-lain </option>
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tujuan_surat')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Perihal</label>
                            <input type="text" class="form-control @error('perihal') is-invalid @enderror" value="{{old('perihal')}}" name="perihal">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('perihal')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Surat PTA</label>
                            <input type="file" class="form-control @error('surat_pta') is-invalid @enderror" value="{{old('surat_pta')}}" name="surat_pta">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('surat_pta')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Lampiran</label>
                            <input type="file" class="form-control @error('lampiran') is-invalid @enderror" value="{{old('lampiran')}}" name="lampiran">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('lampiran')
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
                        <div class="form-group">
                            <button class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <a href="/suratkeluar" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>

</div>
@endsection