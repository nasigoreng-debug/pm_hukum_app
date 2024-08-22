@extends('layouts.v_template')

@section('content')

@include('layouts.v_deskripsi')

<div class="panel panel-default container">

    <div class="panel-heading">
        <div class="panel-title">
            Ubah Data Putusan Penijauan Kembali
        </div>
    </div>

    <div class="panel-body">

        <form action="/pk/update/{{$pk->id_pk}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Masuk</label>
                            <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" value="{{$pk->tgl_masuk}}" name="tgl_masuk">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_masuk')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor Perkara PK</label>
                            <input type="text" class="form-control @error('no_pk') is-invalid @enderror" value="{{$pk->no_pk}}" name="no_pk">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_pk')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor Perkara Banding</label>
                            <input type="text" class="form-control @error('no_banding') is-invalid @enderror" value="{{$pk->no_banding}}" name="no_banding">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_banding')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Status Putusan PK</label>
                            <select name="status_put" class="form-control @error('status_put') is-invalid @enderror">
                                <option>{{$pk->status_put}}</option>
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
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Salput PK</label>
                                <div>{{ $pk->salput_pk }}</div>
                            </div>
                            <div class="">
                                <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                    <label>Ganti salput_pk</label>
                                    <input type="file" class="form-control form-control-sm @error('salput_pk') is-invalid @enderror" value="{{$pk->salput_pk}}" name="salput_pk">
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        @error('salput_pk')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Simpan</button>
                            <a href="/pk" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

</div>
@endsection