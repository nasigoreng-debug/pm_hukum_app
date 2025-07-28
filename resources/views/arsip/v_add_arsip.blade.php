@extends('layouts.v_template')

@section('content')

@include('layouts.v_deskripsi')

<div class="panel panel-default container">

    <div class="panel-heading">
        <div class="panel-title">
            Tambah Data Arsip Perkara
        </div>
    </div>

    <div class="panel-body">

        <form action="/arsip/insert" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary mt-3 ml-3 mb-3 mr-3">

                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Masuk</label>
                            <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" value="{{old('tgl_masuk')}}" name="tgl_masuk" autofocus>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_masuk')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor Perkara</label>
                            <input type="text" class="form-control @error('no_banding') is-invalid @enderror" value="{{old('no_banding')}}" name="no_banding">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_banding')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor Perkara Tk.I</label>
                            <input type="text" class="form-control @error('no_pa') is-invalid @enderror" value="{{old('no_pa')}}" name="no_pa">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_pa')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label for="jenis_perkara">Jenis Perkara</label>
                            <select name="jenis_perkara" class="form-control @error('jenis_perkara') is-invalid @enderror">
                                <option>{{old('jenis_perkara')}}</option>
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
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Putus</label>
                            <input type="date" class="form-control @error('tgl_put_banding') is-invalid @enderror" value="{{old('tgl_put_banding')}}" name="tgl_put_banding">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_put_banding')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Staf yang menyerahkan berkas</label>
                            <select name="penyerah" class="form-control @error('penyerah') is-invalid @enderror" value="{{old('penyerah')}}" >
                                <option>{{old('penyerah')}}</option>
                                @foreach ($user as $data)
                                <option>{{$data->name}}</option>
                                @endforeach
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('penyerah')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Petugas yang menerima berkas</label>
                            <select name="penerima" class="form-control @error('penerima') is-invalid @enderror" value="{{old('penerima')}}" >
                                <option>{{old('penerima')}}</option>
                                @foreach ($user as $data)
                                <option>{{$data->name}}</option>
                                @endforeach
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('penerima')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>No. Lemari</label>
                            <select name="no_lemari" class="form-control @error('no_lemari') is-invalid @enderror" id="no_lemari">
                                <option>{{old('no_lemari')}}</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_lemari')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>No. Tingkat/Laci</label>
                            <input type="text" class="form-control @error('no_laci') is-invalid @enderror" value="{{old('no_laci')}}" name="no_laci">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_laci')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>No. Box</label>
                            <input type="text" class="form-control @error('no_box') is-invalid @enderror" value="{{old('no_box')}}" name="no_box">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_box')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal alih media</label>
                            <input type="date" class="form-control @error('tgl_alih_media') is-invalid @enderror" value="{{old('tgl_alih_media')}}" name="tgl_alih_media">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_alih_media')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Putusan</label>
                            <input type="file" class="form-control @error('putusan') is-invalid @enderror" value="{{old('putusan')}}" name="putusan">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('putusan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Bundel B</label>
                            <input type="file" class="form-control @error('bundle_b') is-invalid @enderror" value="{{old('bundle_b')}}" name="bundle_b">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('bundle_b')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <a href="/arsip" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>

</div>
@endsection