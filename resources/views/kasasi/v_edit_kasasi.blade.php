@extends('layouts.v_template')

@section('content')

@include('layouts.v_deskripsi')

<div class="panel panel-default container">

    <div class="panel-heading">
        <div class="panel-title">
            Ubah Data Putusan Kasasi
        </div>
    </div>

    <div class="panel-body">

        <form action="/kasasi/update/{{$kasasi->id_kasasi}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                        <div class="form-group col-xs-6">
                            <label>Tanggal Masuk</label>
                            <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" value="{{$kasasi->tgl_masuk}}" name="tgl_masuk">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_masuk')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-xs-6">
                            <label>Nomor Perkara Banding</label>
                            <input type="text" class="form-control @error('no_banding') is-invalid @enderror" value="{{$kasasi->no_banding}}" name="no_banding">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_banding')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-xs-6">
                            <label>Nomor Perkara Kasasi</label>
                            <input type="text" class="form-control @error('no_kasasi') is-invalid @enderror" value="{{$kasasi->no_kasasi}}" name="no_kasasi">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_kasasi')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-xs-6">
                            <label>Status Putusan Kasasi</label>
                            <select name="status_put" class="form-control @error('status_put') is-invalid @enderror">
                                <option>{{$kasasi->status_put}}</option>
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
                        <div>
                            <div class="form-group col-xs-6">
                                <div>Salput Kasasi</div>
                                <div>{{ $kasasi->salput_kasasi }}</div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div class="form-group col-xs-6">
                                    <label>Ganti Salput Kasasi</label>
                                    <input type="file" class="form-control  col-xs-6  @error('salput_kasasi') is-invalid @enderror" value="{{$kasasi->salput_kasasi}}" name="salput_kasasi">
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                        @error('salput_kasasi')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-xs-6">
                            <button class="btn btn-success">Simpan</button>
                            <a href="/kasasi" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

</div>
@endsection