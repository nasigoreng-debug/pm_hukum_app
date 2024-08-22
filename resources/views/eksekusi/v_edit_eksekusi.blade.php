@extends('layouts.v_template')

@section('content')

@include('layouts.v_deskripsi')

<div class="panel panel-default container">

    <div class="panel-heading">
        <div class="panel-title">
            Ubah Data Perkara Eksekusi
        </div>
    </div>

    <div class="panel-body">

        <form action="/eks/update/{{$eksekusi->id_eks}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label for="satker">Satker</label>
                            <select name="satker" class="form-control @error('satker') is-invalid @enderror" readonly>
                                <option>{{$eksekusi->satker}}</option>
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
                                <option>Instansi Lain</option>
                                <option>Karawang</option>
                                <option>Kota Banjar</option>
                                <option>Kota Tasikmalaya</option>
                                <option>Kuningan</option>
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
                                @error('satker')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Nomor Perkara Eksekusi</label>
                            <input type="text" class="form-control @error('no_eksekusi') is-invalid @enderror" value="{{$eksekusi->no_eksekusi}}" name="no_eksekusi" readonly>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_eksekusi')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Putusan atau grose akta yang dimohonkan Eksekusi</label>
                            <input type="text" class="form-control @error('no_put') is-invalid @enderror" value="{{$eksekusi->no_put}}" name="no_put" readonly>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('no_put')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Permohonan Eksekusi</label>
                            <input type="date" class="form-control @error('tgl_permohonan') is-invalid @enderror" value="{{$eksekusi->tgl_permohonan}}" name="tgl_permohonan" readonly>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_permohonan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label for="proses_terakhir">Proses Terakhir</label>
                            <select name="proses_terakhir" class="form-control @error('proses_terakhir') is-invalid @enderror">
                                <option>{{$eksekusi->proses_terakhir}}</option>
                                <option> Permohonan Eksekusi </option>
                                <option> Penetapan aanmaning </option>
                                <option> Pelaksanaan aanmaning </option>
                                <option> Penetapan Sita Eksekusi </option>
                                <option> Pelaksanaan Sita Eksekusi </option>
                                <option> Penetapan Eksekusi Lelang </option>
                                <option> Penetapan Eksekusi Riil </option>
                                <option> Pelaksanaan Eksekusi Lelang </option>
                                <option> Pelaksanaan Eksekusi Riil </option>
                                <option> Penyerahan Hasil Eksekusi/Lelang </option>
                                <option> Penetapan Cabut </option>
                                <option> Penetapan Coret </option>
                                <option> Penetapan Non-Eksekutabel </option>
                                <option> Selesai </option>
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('proses_terakhir')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Pelaksanaan</label>
                            <input type="date" class="form-control @error('tgl_eks') is-invalid @enderror" value="{{$eksekusi->tgl_eks}}" name="tgl_eks">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_eks')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Selesai</label>
                            <input type="date" class="form-control @error('tgl_selesai') is-invalid @enderror" value="{{$eksekusi->tgl_selesai}}" name="tgl_selesai">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('tgl_selesai')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" value="{{$eksekusi->keterangan}}" name="keterangan">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('keterangan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Simpan</button>
                            <a href="/eks" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection