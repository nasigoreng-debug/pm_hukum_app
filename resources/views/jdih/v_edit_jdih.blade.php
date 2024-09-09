@extends('layouts.v_template')

@section('content')

@include('layouts.v_deskripsi')

<div class="panel panel-default container">

    <div class="panel-heading">
        <div class="panel-title">
            Ubah Data Peraturan
        </div>
    </div>

    <div class="panel-body">

        <form action="/himper/update/{{$jdih->id_jdih}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label for="jenis_peraturan">Jenis Peraturan</label>
                            <select name="jenis_peraturan" class="form-control @error('jenis_peraturan') is-invalid @enderror">
                                <option>{{$jdih->jenis_peraturan}}</option>
                                <option> Undang-Undang (UU)</option>
                                <option> Peraturan Pemerintah Pengganti Undang-undang (PERPU)</option>
                                <option> Peraturan Pemerintah (PP) </option>
                                <option> Instruksi Presiden (INPRES)</option>
                                <option> Peraturan Mahkamah Agung (PERMA)</option>
                                <option> Surat Edaran Mahkamah Agung (SEMA)</option>
                                <option> Surat Keputusan Ketua Mahkamah Agung (SK KMA)</option>
                                <option> Surat Keputusan Sekretaris Mahkamah Agung (SK SEKMA)</option>
                                <option> Surat Edaran Direktur Jenderal Badan Peradilan Agama (SE Dirjen Badilag)</option>
                                <option> Surat Keputusan Ketua Pengadilan Tinggi Agama Bandung (SK KPTA Bandung)</option>
                                <option> Surat Edaran Ketua Pengadilan Tinggi Agama Bandung (SE KPTA Bandung)</option>
                                <option> Peraturan lainnya</option>
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('jenis_peraturan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor Peraturan</label>
                            <input type="text" class="form-control @error('no_peraturan') is-invalid @enderror" value="{{$jdih->no_peraturan}}" name="no_peraturan">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_peraturan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tahun</label>
                            <input type="text" class="form-control @error('tahun') is-invalid @enderror" value="{{$jdih->tahun}}" name="tahun">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tahun')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Peraturan</label>
                            <input type="date" class="form-control @error('tgl_peraturan') is-invalid @enderror" value="{{$jdih->tgl_peraturan}}" name="tgl_peraturan">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_peraturan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tentang</label>
                            <input type="text" class="form-control @error('tentang') is-invalid @enderror" value="{{$jdih->tentang}}" name="tentang">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tentang')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Dokumen</label>
                                <div>{{ $jdih->dokumen }}</div>
                            </div>
                            <div class="">
                                <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                    <label>Ganti dokumen</label>
                                    <input type="file" class="form-control form-control-sm @error('dokumen') is-invalid @enderror" value="{{$jdih->dokumen}}" name="dokumen">
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        @error('dokumen')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-success">Simpan</button>
                            <a href="/himper" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection