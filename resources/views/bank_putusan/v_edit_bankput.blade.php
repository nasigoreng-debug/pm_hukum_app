@extends('layouts.v_template')

@section('content')

@include('layouts.v_deskripsi')

<div class="panel panel-default container">

    <div class="panel-heading">
        <div class="panel-title">
            Ubah Data Bank Putusan
        </div>
    </div>

    <div class="panel-body">

        <form action="/bankput/update/{{$bankput->id_bankput}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="row col-margin">
                        <div class="col-xs-6">
                            <label>Nomor Perkara Banding</label>
                            <input type="text" class="form-control @error('no_banding') is-invalid @enderror" value="{{$bankput->no_banding}}" name="no_banding" autofocus readonly>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_banding')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <label>Tanggal Putus Banding</label>
                            <input type="date" class="form-control @error('tgl_put_banding') is-invalid @enderror" value="{{$bankput->tgl_put_banding}}" name="tgl_put_banding">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_put_banding')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <label for="jenis_perkara">Jenis Perkara</label>
                            <select name="jenis_perkara" type="text" class="form-control @error('jenis_perkara') is-invalid @enderror">
                                <option>{{$bankput->jenis_perkara}}</option>
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
                        <div class="col-xs-6">
                            <label for="status_putus">Status Putusan</label>
                            <select name="status_putus" type="text" class="form-control @error('status_putus') is-invalid @enderror">
                                <option>{{$bankput->status_putus}}</option>
                                <option> Menguatkan </option>
                                <option> Membatalkan </option>
                                <option> Memperbaiki </option>
                                <option> Tidak Dapat Diterima </option>
                                <option> Dicabut </option>
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('status_putus')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <label for="keterangan">Keterangan</label>
                            <select name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror">
                                <option>{{$bankput->keterangan}}</option>
                                <option> e-Court </option>
                                <option> Non e-Court  </option>
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('keterangan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Putusan</label>
                                <div>{{ $bankput->put_rtf }}</div>
                            </div>
                            <div class="">
                                <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                    <label>Ganti Putusan</label>
                                    <input type="file" class="form-control form-control-sm @error('put_rtf') is-invalid @enderror" value="{{$bankput->put_rtf}}" name="put_rtf">
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                        @error('put_rtf')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Anonimasi</label>
                                <div>{{ $bankput->put_anonim }}</div>
                            </div>
                            <div class="">
                                <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                    <label>Ganti Anonimasi</label>
                                    <input type="file" class="form-control form-control-sm @error('put_anonim') is-invalid @enderror" value="{{$bankput->put_anonim}}" name="put_anonim">
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                        @error('put_anonim')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <button class="btn btn-sm btn-success">Simpan</button>
                            <a href="/bankput" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection