@extends('layouts.v_template')

@section('content')

@include('layouts.v_deskripsi')

<div class="panel panel-default container">

    <div class="panel-heading">
        <div class="panel-title">
            Ubah Data Surat Masuk
        </div>
    </div>

    <div class="panel-body">

        <form action="/suratmasuk/update/{{$suratmasuk->id_suratmasuk}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Masuk Kepaniteraan</label>
                            <input type="date" class="form-control @error('tgl_masuk_pan') is-invalid @enderror" value="{{$suratmasuk->tgl_masuk_pan}}" name="tgl_masuk_pan" autofocus>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_masuk_pan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Masuk Kesekretariatan</label>
                            <input type="date" class="form-control @error('tgl_masuk_umum') is-invalid @enderror" value="{{$suratmasuk->tgl_masuk_umum}}" name="tgl_masuk_umum" autofocus>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_masuk_umum')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor index</label>
                            <input type="text" class="form-control @error('no_indeks') is-invalid @enderror" value="{{$suratmasuk->no_indeks}}" name="no_indeks">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_indeks')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label for="asal_surat">Asal Surat</label>
                            <select name="asal_surat" class="form-control @error('asal_surat') is-invalid @enderror">
                                <option>{{$suratmasuk->asal_surat}}</option>
                                <option>Advokat</option>
                                <option>Badan Pengawasan MA RI</option>
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
                                <option>Direktorat Jenderal Badan Peradilan Agama</option>
                                <option>Garut</option>
                                <option>Indramayu</option>
                                <option>Instansi Lain</option>
                                <option>Karawang</option>
                                <option>Kota Banjar</option>
                                <option>Kota Tasikmalaya</option>
                                <option>Kuningan</option>
                                <option>Lain-lain</option>
                                <option>Mahkamah Agung Republik Indonesia</option>
                                <option>Majalengka</option>
                                <option>Ngamprah</option>
                                <option>Prinsipal</option>
                                <option>Purwakarta</option>
                                <option>Soreang</option>
                                <option>Subang</option>
                                <option>Sukabumi</option>
                                <option>Sumber</option>
                                <option>Sumedang</option>
                                <option>Tasikmalaya</option>
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('asal_surat')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor Surat</label>
                            <input type="text" class="form-control @error('no_surat') is-invalid @enderror" value="{{$suratmasuk->no_surat}}" name="no_surat">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_surat')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Surat</label>
                            <input type="date" class="form-control @error('tgl_surat') is-invalid @enderror" value="{{$suratmasuk->tgl_surat}}" name="tgl_surat">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_surat')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Perihal</label>
                            <input type="text" class="form-control @error('perihal') is-invalid @enderror" value="{{$suratmasuk->perihal}}" name="perihal">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('perihal')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Lampiran</label>
                                <div>{{ $suratmasuk->lampiran }}</div>
                            </div>
                            <div class="">
                                <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                    <label>Ganti Lampiran</label>
                                    <input type="file" class="form-control form-control-sm @error('lampiran') is-invalid @enderror" value="{{$suratmasuk->lampiran}}" name="lampiran">
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        @error('lampiran')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label for="disposisi">Disposisi</label>
                            <select name="disposisi" class="form-control @error('disposisi') is-invalid @enderror">
                                <option>{{$suratmasuk->disposisi}}</option>
                                <option>Ahmad Taufik Senjaya, S.Sy.</option>
                                <option>Sabrina Vanissa Rizki Hilaihi, S.H</option>
                                <option>Eva Andari Ramadhina, S.H.</option>
                                <option>Dede Epul Syaepuloh Rasyid, A.Md.</option>
                                <option>Irma Yuliani, A.Md.</option>
                                <option>Farhan Septiansyah, S.Sos.</option>
                                <option>Adhi Padmayuda, S.H.</option>
                                <option>Sobari Hidayat, S.Sos.I.</option>
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('disposisi')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" value="{{$suratmasuk->keterangan}}" name="keterangan">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('keterangan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-success">Simpan</button>
                            <a href="/suratmasuk" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection