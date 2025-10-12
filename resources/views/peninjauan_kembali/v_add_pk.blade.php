@extends('layouts.v_template')

@section('content')
    @include('layouts.v_deskripsi')

    <div class="panel panel-default container">

        <div class="panel-heading">
            <div class="panel-title">
                Input Data Putusan Penijauan Kembali
            </div>
        </div>

        <div class="panel-body">

            <form action="/pk/insert" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- left column -->
                    <div class="col">
                        <!-- general form elements -->
                        <div class="card card-primary mt-3 ml-3 mb-3 mr-3">

                            <!-- /.card-header -->
                            <!-- <div class="form-group col-xs-6">
                                <label>Pengadilan Agama Pengaju</label>
                                <select name="pa_pengaju" class="form-control @error('pa_pengaju') is-invalid @enderror" autofocus>
                                    <option>{{ old('pa_pengaju') }}</option>
                                    <option>Bandung</option>
                                    <option>Bekasi</option>
                                    <option>Bogor</option>
                                    <option>Ciamis</option>
                                    <option>Cianjur</option>
                                    <option>Cibadak</option>
                                    <option>Cibinong</option>
                                    <option>Cikarang</option>
                                    <option>Cimahi</option>
                                    <option>Cirebon</option>
                                    <option>Depok</option>
                                    <option>Garut</option>
                                    <option>Indramayu</option>
                                    <option>Karawang</option>
                                    <option>Kota Banjar</option>
                                    <option>Kota Tasikmalaya</option>
                                    <option>Kuningan</option>
                                    <option>Majalengka</option>
                                    <option>Ngamprah</option>
                                    <option>Purwakarta</option>
                                    <option>Soreang</option>
                                    <option>Subang</option>
                                    <option>Sukabumi</option>
                                    <option>Sumber</option>
                                    <option>Sumedang</option>
                                    <option>Tasikmalaya</option>
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('pa_pengaju')
        {{ $message }}
    @enderror
                                </div>
                            </div> -->
                            <div class="form-group col-xs-6">
                                <label>Tanggal Masuk</label>
                                <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror"
                                    value="{{ old('tgl_masuk') }}" name="tgl_masuk">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tgl_masuk')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="form-group col-xs-6">
                                <label>Pemohon PK</label>
                                <input type="text" class="form-control @error('pemohon_pk') is-invalid @enderror" value="{{ old('pemohon_pk') }}" name="pemohon_pk">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('pemohon_pk')
        {{ $message }}
    @enderror
                                </div>
                            </div>
                            <div class="form-group col-xs-6">
                                <label>Termohon PK</label>
                                <input type="text" class="form-control @error('termohon_pk') is-invalid @enderror" value="{{ old('termohon_pk') }}" name="termohon_pk">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('termohon_pk')
        {{ $message }}
    @enderror
                                </div>
                            </div> -->
                            <div class="form-group col-xs-6">
                                <label>Nomor Perkara PK</label>
                                <input type="text" class="form-control @error('no_pk') is-invalid @enderror"
                                    value="{{ old('no_pk') }}" name="no_pk">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('no_pk')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="form-group col-xs-6">
                                <label>Tanggal Putus PK</label>
                                <input type="date" class="form-control @error('tgl_put_pk') is-invalid @enderror" value="{{ old('tgl_put_pk') }}" name="tgl_put_pk">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tgl_put_pk')
        {{ $message }}
    @enderror
                                </div>
                            </div>
                            <div class="form-group col-xs-6">
                                <label>Nomor Perkara PA</label>
                                <input type="text" class="form-control @error('no_pa') is-invalid @enderror" value="{{ old('no_pa') }}" name="no_pa">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('no_pa')
        {{ $message }}
    @enderror
                                </div>
                            </div>
                            <div class="form-group col-xs-6">
                                <label>Tanggal Putus PA</label>
                                <input type="date" class="form-control @error('tgl_put_pa') is-invalid @enderror" value="{{ old('tgl_put_pa') }}" name="tgl_put_pa">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tgl_put_pa')
        {{ $message }}
    @enderror
                                </div>
                            </div> -->
                            <div class="form-group col-xs-6">
                                <label>Nomor Perkara Banding</label>
                                <input type="text" class="form-control @error('no_banding') is-invalid @enderror"
                                    value="{{ old('no_banding') }}" name="no_banding">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('no_banding')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="form-group col-xs-6">
                                <label>Tanggal Putus Banding</label>
                                <input type="date" class="form-control @error('tgl_put_banding') is-invalid @enderror" value="{{ old('tgl_put_banding') }}" name="tgl_put_banding">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tgl_put_banding')
        {{ $message }}
    @enderror
                                </div>
                            </div> -->
                            <!-- <div class="form-group col-xs-6">
                                <label>Nomor Perkara Kasasi</label>
                                <input type="text" class="form-control @error('no_kasasi') is-invalid @enderror" value="{{ old('no_kasasi') }}" name="no_kasasi">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('no_kasasi')
        {{ $message }}
    @enderror
                                </div>
                            </div>
                            <div class="form-group col-xs-6">
                                <label>Tanggal Putus Kasasi</label>
                                <input type="date" class="form-control @error('tgl_put_kasasi') is-invalid @enderror" value="{{ old('tgl_put_kasasi') }}" name="tgl_put_kasasi">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tgl_put_kasasi')
        {{ $message }}
    @enderror
                                </div>
                            </div> -->
                            <div class="form-group col-xs-6">
                                <label>Status Putusan PK</label>
                                <select name="status_put" class="form-control @error('status_put') is-invalid @enderror">
                                    <option>{{ old('status_put') }}</option>
                                    <option>Mengabulkan</option>
                                    <option>Menolak</option>
                                    <option>Tidak Dapat Diterima</option>
                                    <option>Dicoret</option>
                                    <option>Dicabut</option>
                                    <option>Membatalkan</option>
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('status_put')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-xs-6">
                                <label>Salput PK</label>
                                <input type="file" class="form-control @error('salput_pk') is-invalid @enderror"
                                    value="{{ old('salput_pk') }}" name="salput_pk">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('salput_pk')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-xs-6">
                                <button class="btn btn-success">Simpan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <a href="/pk" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection
