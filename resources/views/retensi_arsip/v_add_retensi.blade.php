@extends('layouts.v_template')

@section('content')
    @include('layouts.v_deskripsi')

    <div class="panel panel-default container">

        <div class="panel-heading">
            <div class="panel-title">
                Input Data Retensi Arsip
            </div>
        </div>

        <div class="panel-body">

            <form action="/retensi/insert" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- left column -->
                    <div class="col">
                        <!-- general form elements -->
                        <div class="row col-margin">

                            <!-- /.card-header -->
                            <div class="col-xs-2">
                                <label>Pengadilan Agama Pengaju</label>
                                <input type="text" class="form-control @error('pa_pengaju') is-invalid @enderror"
                                    value="{{ old('pa_pengaju') }}" name="pa_pengaju">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('pa_pengaju')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <label>Nomor Perkara Banding</label>
                                <input type="text" class="form-control @error('no_banding') is-invalid @enderror"
                                    value="{{ old('no_banding') }}" name="no_banding">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('no_banding')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <label>Nomor Perkara PA</label>
                                <input type="text" class="form-control @error('no_pa') is-invalid @enderror"
                                    value="{{ old('no_pa') }}" name="no_pa">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('no_pa')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <label>Nomor Perkara Kasasi</label>
                                <input type="text" class="form-control @error('no_kasasi') is-invalid @enderror"
                                    value="{{ old('no_kasasi') }}" name="no_kasasi">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('no_kasasi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-2">
                                <label>Nomor Perkara PK</label>
                                <input type="text" class="form-control @error('no_pk') is-invalid @enderror"
                                    value="{{ old('no_pk') }}" name="no_pk">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('no_pk')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <label for="jenis_perkara">Jenis Perkara</label>
                                <select name="jenis_perkara"
                                    class="form-control @error('jenis_perkara') is-invalid @enderror">
                                    <option>{{ old('jenis_perkara') }}</option>
                                    <option> Asal Usul Anak </option>
                                    <option> Cerai Gugat </option>
                                    <option> Cerai Talak </option>
                                    <option> Dispensasi Kawin </option>
                                    <option> Ekonomi Syariah </option>
                                    <option> Ganti Rugi terhadap Wali </option>
                                    <option> Hak-hak Bekas Isteri </option>
                                    <option> Harta Bersama </option>
                                    <option> Hibah </option>
                                    <option> Isbath Nikah </option>
                                    <option> Izin Kawin </option>
                                    <option> Izin Poligami </option>
                                    <option> Kelalaian Kewajiban Suami/Isteri </option>
                                    <option> Kewarisan </option>
                                    <option> Lain-lain </option>
                                    <option> Nafkah Anak oleh Ibu </option>
                                    <option> P3HP/Penetapan Ahli Waris </option>
                                    <option> Pembatalan Perkawinan </option>
                                    <option> Pencabutan Kekuasaan Orang Tua </option>
                                    <option> Pencabutan Kekuasaan Wali </option>
                                    <option> Pencegahan Perkawinan </option>
                                    <option> Pengesahan Anak/Pengangkatan Anak </option>
                                    <option> Penguasaan Anak/Hadlonah </option>
                                    <option> Penolakan Kawin Campuran </option>
                                    <option> Penolakan Perkawinan oleh PPN </option>
                                    <option> Penunjukan Orang Lain Sbg Wali </option>
                                    <option> Perwalian </option>
                                    <option> Wakaf </option>
                                    <option> Wali Adhol </option>
                                    <option> Wasiat </option>
                                    <option> Zakat/Infaq/Shodaqoh </option>
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('jenis_perkara')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <label>Pembanding</label>
                                <input type="text" class="form-control @error('pembanding') is-invalid @enderror"
                                    value="{{ old('pembanding') }}" name="pembanding">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('pembanding')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <label>Terbanding</label>
                                <input type="text" class="form-control @error('terbanding') is-invalid @enderror"
                                    value="{{ old('terbanding') }}" name="terbanding">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('terbanding')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <label>Status Putusan Banding</label>
                                <select name="status_put" class="form-control @error('status_put') is-invalid @enderror">
                                    <option>{{ old('status_put') }}</option>
                                    <option>Menguatkan</option>
                                    <option>Mengabulkan</option>
                                    <option>Membatalkan</option>
                                    <option>Memperbaiki</option>
                                    <option>Tidak Dapat Diterima</option>
                                    <option>Dicabut</option>
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('status_put')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <label>Tanggal Putus Banding</label>
                                <input type="date" class="form-control @error('tgl_put_banding') is-invalid @enderror"
                                    value="{{ old('tgl_put_banding') }}" name="tgl_put_banding">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tgl_put_banding')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-3">
                                <label>Tanggal Putus PA</label>
                                <input type="date" class="form-control @error('tgl_put_pa') is-invalid @enderror"
                                    value="{{ old('tgl_put_pa') }}" name="tgl_put_pa">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tgl_put_pa')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <label>Tanggal Putus Kasasi</label>
                                <input type="date" class="form-control @error('tgl_put_kasasi') is-invalid @enderror"
                                    value="{{ old('tgl_put_kasasi') }}" name="tgl_put_kasasi">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tgl_put_kasasi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <label>Tanggal Putus PK</label>
                                <input type="date" class="form-control @error('tgl_put_pk') is-invalid @enderror"
                                    value="{{ old('tgl_put_pk') }}" name="tgl_put_pk">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tgl_put_pk')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <label>Buku</label>
                                <input type="text" class="form-control @error('buku') is-invalid @enderror"
                                    value="{{ old('buku') }}" name="buku">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('buku')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <label>Tingkat</label>
                                <input type="text" class="form-control @error('tingkat') is-invalid @enderror"
                                    value="{{ old('tingkat') }}" name="tingkat">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tingkat')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <label>Tahun</label>
                                <input type="text" class="form-control @error('tahun') is-invalid @enderror"
                                    value="{{ old('tahun') }}" name="tahun">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tahun')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <label>Doc Putusan</label>
                                <input type="file" class="form-control @error('putusan') is-invalid @enderror"
                                    value="{{ old('putusan') }}" name="putusan">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('putusan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <button class="btn btn-success">Simpan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <a href="/retensi" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection
