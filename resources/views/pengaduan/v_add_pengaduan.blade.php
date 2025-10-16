@extends('layouts.v_template')

@section('content')
    @include('layouts.v_deskripsi')

    <div class="panel panel-default container">

        <div class="panel-heading">
            <div class="panel-title">
                Input Data Pengaduan
            </div>
        </div>

        <div class="panel-body">

            <form action="/pgd/insert" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Tanggal Terima</label>
                                <input type="date" class="form-control @error('tgl_terima_pgd') is-invalid @enderror"
                                    value="{{ old('tgl_terima_pgd') }}" name="tgl_terima_pgd" autofocus>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tgl_terima_pgd')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Nomor Pengaduan</label>
                                <input type="text" class="form-control @error('no_pgd') is-invalid @enderror"
                                    value="{{ old('no_pgd') }}" name="no_pgd">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('no_pgd')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Pelapor</label>
                                <input type="text" class="form-control @error('pelapor') is-invalid @enderror"
                                    value="{{ old('pelapor') }}" name="pelapor">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('pelapor')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Terlapor</label>
                                <select name="terlapor" class="form-control @error('terlapor') is-invalid @enderror">
                                    <option>{{ old('terlapor') }}</option>
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
                                    @error('terlapor')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Uraian Pengaduan</label>
                                <textarea class="form-control @error('uraian_pgd') is-invalid @enderror" name="uraian_pgd" rows="4">{{ old('uraian_pgd') }}</textarea>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('uraian_pgd')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Ditangani Oleh</label>
                                <select name="ditangani_oleh"
                                    class="form-control @error('ditangani_oleh') is-invalid @enderror">
                                    <option>{{ old('ditangani_oleh') }}</option>
                                    <option> Badan Pengawas MARI </option>
                                    <option> Pengadilan Tingkat Banding </option>
                                    <option> Pengadilan Tingkat Pertama </option>
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('ditangani_oleh')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Disposisi Panmud Hukum</label>
                                <input type="date" class="form-control @error('dis_pm_hk') is-invalid @enderror"
                                    value="{{ old('dis_pm_hk') }}" name="dis_pm_hk">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('dis_pm_hk')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Disposisi Ketua</label>
                                <input type="date" class="form-control @error('dis_kpta') is-invalid @enderror"
                                    value="{{ old('dis_kpta') }}" name="dis_kpta">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('dis_kpta')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Disposisi Wakil</label>
                                <input type="date" class="form-control @error('dis_wkpta') is-invalid @enderror"
                                    value="{{ old('dis_wkpta') }}" name="dis_wkpta">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('dis_wkpta')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Disposisi Hatiwasda</label>
                                <input type="date" class="form-control @error('dis_hatiwasda') is-invalid @enderror"
                                    value="{{ old('dis_hatiwasda') }}" name="dis_hatiwasda">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('dis_hatiwasda')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Tindak Lanjut</label>
                                <input type="date" class="form-control @error('tgl_tindak_lanjut') is-invalid @enderror"
                                    value="{{ old('tgl_tindak_lanjut') }}" name="tgl_tindak_lanjut">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tgl_tindak_lanjut')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Status Pengaduan</label>
                                <select name="status_pgd" class="form-control @error('status_pgd') is-invalid @enderror"
                                    autofocus>
                                    <option>{{ old('status_pgd') }}</option>
                                    <option> Disposisi </option>
                                    <option> Klarifikasi </option>
                                    <option> Telaah Berkas </option>
                                    <option> Pemeriksaan oleh TIM </option>
                                    <option> Selesai </option>
                                    <option> Diarsipkan </option>
                                    <option> Tidak dapat ditindaklanjuti </option>
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('status_pgd')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Status Berkas</label>
                                <select name="status_berkas"
                                    class="form-control @error('status_berkas') is-invalid @enderror" autofocus>
                                    <option>{{ old('status_berkas') }}</option>
                                    <option> Ketua </option>
                                    <option> Wakil Ketua </option>
                                    <option> Hakim Tinggi Pengawas </option>
                                    <option> Panitera </option>
                                    <option> Panitera Muda Hukum </option>
                                    <option> Petugas Pengaduan </option>
                                    <option> Pengadilan Agama Terlapor</option>
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('status_berkas')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Tanggal Selesai</label>
                                <input type="date" class="form-control @error('tgl_selesai_pgd') is-invalid @enderror"
                                    value="{{ old('tgl_selesai_pgd') }}" name="tgl_selesai_pgd">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tgl_selesai_pgd')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Tanggal LHP</label>
                                <input type="date" class="form-control @error('tgl_lhp') is-invalid @enderror"
                                    value="{{ old('tgl_lhp') }}" name="tgl_lhp">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tgl_lhp')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Surat Pengaduan</label>
                                <input type="file" class="form-control @error('surat_pgd') is-invalid @enderror"
                                    value="{{ old('surat_pgd') }}" name="surat_pgd">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('surat_pgd')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Lampiran</label>
                                <input type="file" class="form-control @error('lampiran') is-invalid @enderror"
                                    value="{{ old('lampiran') }}" name="lampiran">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('lampiran')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <button class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <a href="/pgd_total" class="btn btn-sm btn-info mb-2">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection
