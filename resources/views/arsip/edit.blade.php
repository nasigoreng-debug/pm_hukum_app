@extends('layouts.v_template')

@section('content')
    @include('layouts.v_deskripsi')

    <div class="panel panel-default container">

        <div class="panel-heading">
            <div class="panel-title">
                Ubah Data Arsip Perkara
            </div>
        </div>

        <div class="panel-body">

            <form action="{{ route('arsip.update', $arsip_perkara->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Tanggal Masuk</label>
                                <input type="date"
                                    class="form-control form-control-sm @error('tgl_masuk') is-invalid @enderror"
                                    value="{{ $arsip_perkara->tgl_masuk ? \Carbon\Carbon::parse($arsip_perkara->tgl_masuk)->format('Y-m-d') : '' }}"
                                    name="tgl_masuk" autofocus>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('tgl_masuk')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Nomor Perkara</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('no_banding') is-invalid @enderror"
                                    value="{{ $arsip_perkara->no_banding }}" name="no_banding" readonly>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('no_banding')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Nomor Perkara Tk.I</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('no_pa') is-invalid @enderror"
                                    value="{{ $arsip_perkara->no_pa }}" name="no_pa">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('no_pa')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label for="jenis_perkara">Jenis Perkara</label>
                                <select name="jenis_perkara"
                                    class="form-control form-control-sm @error('jenis_perkara') is-invalid @enderror">
                                    <option>{{ $arsip_perkara->jenis_perkara }}</option>
                                    <option> Asal Usul Anak </option>
                                    <option> Cerai Gugat </option>
                                    <option> Cerai Talak </option>
                                    <option> Derden Verzet </option>
                                    <option> Dispensasi Kawin </option>
                                    <option> Ekonomi Syariah </option>
                                    <option> Ganti Rugi terhadap Wali </option>
                                    <option> Hadhonah Anak </option>
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
                                    <option> Pembatalan Penetapan Ahli Waris </option>
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
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('jenis_perkara')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Tanggal Putus</label>
                                <input type="date"
                                    class="form-control form-control-sm @error('tgl_put_banding') is-invalid @enderror"
                                    value="{{ $arsip_perkara->tgl_put_banding ? \Carbon\Carbon::parse($arsip_perkara->tgl_put_banding)->format('Y-m-d') : '' }}"
                                    name="tgl_put_banding">

                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('tgl_put_banding')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Staf yang menyerahkan berkas</label>
                                <select name="penyerah"
                                    class="form-control form-control-sm @error('penyerah') is-invalid @enderror">
                                    <option>{{ $arsip_perkara->penyerah }}</option>
                                    @foreach ($users as $data)
                                        <option>{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('penyerah')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Petugas yang menerima berkas</label>
                                <select name="penerima"
                                    class="form-control form-control-sm @error('penerima') is-invalid @enderror">
                                    <option>{{ $arsip_perkara->penerima }}</option>
                                    @foreach ($users as $data)
                                        <option>{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('penerima')
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
                                <label>No. Lemari</label>
                                <select name="no_lemari"
                                    class="form-control form-control-sm @error('no_lemari') is-invalid @enderror"
                                    id="no_lemari">
                                    <option>{{ $arsip_perkara->no_lemari }}</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('no_lemari')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>No. Tingkat/Laci</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('no_laci') is-invalid @enderror"
                                    value="{{ $arsip_perkara->no_laci }}" name="no_laci">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('no_laci')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>No. Box</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('no_box') is-invalid @enderror"
                                    value="{{ $arsip_perkara->no_box }}" name="no_box">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('no_box')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Tanggal alih media</label>
                                <input type="date"
                                    class="form-control form-control-sm @error('tgl_alih_media') is-invalid @enderror"
                                    value="{{ $arsip_perkara->tgl_alih_media ? \Carbon\Carbon::parse($arsip_perkara->tgl_alih_media)->format('Y-m-d') : '' }}"
                                    name="tgl_alih_media">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('tgl_alih_media')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <!-- File Putusan -->
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Putusan Saat Ini</label>
                                <div class="form-control-plaintext">
                                    @if ($arsip_perkara->putusan)
                                        <span class="badge badge-info">{{ $arsip_perkara->putusan }}</span>
                                    @else
                                        <span class="badge badge-warning">Belum ada file</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Ganti Putusan</label>
                                <input type="file"
                                    class="form-control form-control-sm @error('putusan') is-invalid @enderror"
                                    name="putusan">
                                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah file</small>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('putusan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <!-- File Bundel B -->
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Bundel B Saat Ini</label>
                                <div class="form-control-plaintext">
                                    @if ($arsip_perkara->bundel_b)
                                        <span class="badge badge-info">{{ $arsip_perkara->bundel_b }}</span>
                                    @else
                                        <span class="badge badge-warning">Belum ada file</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Ganti Bundel B</label>
                                <input type="file"
                                    class="form-control form-control-sm @error('bundel_b') is-invalid @enderror"
                                    name="bundel_b">
                                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah file</small>
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    @error('bundel_b')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="form-group ml-3 mt-4 mb-2 mr-3">
                                <button class="btn btn-sm btn-success">
                                    <i class="fas fa-save"></i> Simpan Perubahan
                                </button>
                                <a href="/arsip" class="btn btn-sm btn-info">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection
