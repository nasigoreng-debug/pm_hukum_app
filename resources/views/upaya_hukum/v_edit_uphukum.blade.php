@extends('layouts.v_template')

@section('content')

@include('layouts.v_deskripsi')

<div class="panel panel-default container">

    <div class="panel-heading">
        <div class="panel-title">
            Ubah Data Regsiter Upaya Hukum
        </div>
    </div>

    <div class="panel-body">

        <form action="/uphukum/update/{{$uphukum->id_uphukum}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary mt-3 ml-3 mb-3 mr-3">

                        <!-- /.card-header -->
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Pengadilan Agama Pengaju</label>
                            <select name="pa_pengaju" class="form-control @error('pa_pengaju') is-invalid @enderror" autofocus>
                                <option>{{$uphukum->pa_pengaju}}</option>
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
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Masuk</label>
                            <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" value="{{$uphukum->tgl_masuk}}" name="tgl_masuk">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_masuk')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Register</label>
                            <input type="date" class="form-control @error('tgl_register') is-invalid @enderror" value="{{$uphukum->tgl_register}}" name="tgl_register">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_register')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor Upaya Hukum</label>
                            <input type="text" class="form-control @error('no_upy_hk') is-invalid @enderror" value="{{$uphukum->no_upy_hk}}" name="no_upy_hk">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_upy_hk')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor Perkara Banding</label>
                            <input type="text" class="form-control @error('no_banding') is-invalid @enderror" value="{{$uphukum->no_banding}}" name="no_banding">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_banding')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Putus Banding</label>
                            <input type="date" class="form-control @error('tgl_put_banding') is-invalid @enderror" value="{{$uphukum->tgl_put_banding}}" name="tgl_put_banding">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_put_banding')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor Perkara PA</label>
                            <input type="text" class="form-control @error('no_pa') is-invalid @enderror" value="{{$uphukum->no_pa}}" name="no_pa">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_pa')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Putus PA</label>
                            <input type="date" class="form-control @error('tgl_put_pa') is-invalid @enderror" value="{{$uphukum->tgl_put_pa}}" name="tgl_put_pa">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_put_pa')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nama Pemohon Upaya Hukum</label>
                            <input type="text" class="form-control @error('pemohon_upy') is-invalid @enderror" value="{{$uphukum->pemohon_upy}}" name="pemohon_upy">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('pemohon_upy')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nama Termohon Upaya Hukum</label>
                            <input type="text" class="form-control @error('termohon_upy') is-invalid @enderror" value="{{$uphukum->termohon_upy}}" name="termohon_upy">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('termohon_upy')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Putus Upaya Hukum</label>
                            <input type="date" class="form-control @error('tgl_put_upy') is-invalid @enderror" value="{{$uphukum->tgl_put_upy}}" name="tgl_put_upy">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_put_upy')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor Box</label>
                            <input type="text" class="form-control @error('no_box') is-invalid @enderror" value="{{$uphukum->no_box}}" name="no_box">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_box')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Keterangan</label>
                            <select name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" autofocus>
                                <option>{{$uphukum->keterangan}}</option>
                                <option>Kasasi</option>
                                <option>Peninjauan Kembali</option>
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('keterangan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <a href="/uphukum" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

</div>
@endsection