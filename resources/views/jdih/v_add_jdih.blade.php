@extends('layouts.v_template')

@section('content')
    @include('layouts.v_deskripsi')

    <div class="panel panel-default container">

        <div class="panel-heading">
            <div class="panel-title">
                Tambah Data Peraturan
            </div>
        </div>

        <div class="panel-body">

            <form action="/himper/insert" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- left column -->
                    <div class="col">
                        <!-- general form elements -->
                        <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label for="jenis_peraturan">Jenis Peraturan</label>
                                <select name="jenis_peraturan"
                                    class="form-control @error('jenis_peraturan') is-invalid @enderror">
                                    <option>{{ old('jenis_peraturan') }}</option>
                                    <option> Undang-Undang (UU)</option>
                                    <option> Peraturan Pemerintah Pengganti Undang-undang (PERPU)</option>
                                    <option> Peraturan Pemerintah (PP) </option>
                                    <option> Instruksi Presiden (INPRES)</option>
                                    <option> Peraturan Mahkamah Agung (PERMA)</option>
                                    <option> Surat Edaran Mahkamah Agung (SEMA)</option>
                                    <option> Surat Keputusan Ketua Mahkamah Agung (SK KMA)</option>
                                    <option> Surat Keputusan Sekretaris Mahkamah Agung (SK SEKMA)</option>
                                    <option> Surat Edaran Direktur Jenderal Badan Peradilan Agama (SE Dirjen Badilag)
                                    </option>
                                    <option> Surat Keputusan Direktur Jenderal Badan Peradilan Agama (SK Dirjen Badilag)
                                    </option>
                                    <option> Surat Edaran Ketua Pengadilan Tinggi Agama Bandung (SE KPTA Bandung)</option>
                                    <option> Surat Keputusan Ketua Pengadilan Tinggi Agama Bandung (SK KPTA Bandung)
                                    </option>
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
                                <input type="text" class="form-control @error('no_peraturan') is-invalid @enderror"
                                    value="{{ old('no_peraturan') }}" name="no_peraturan">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('no_peraturan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Tahun</label>
                                <input type="text" class="form-control @error('tahun') is-invalid @enderror"
                                    value="{{ old('tahun') }}" name="tahun">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tahun')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Tanggal Peraturan</label>
                                <input type="date" class="form-control @error('tgl_peraturan') is-invalid @enderror"
                                    value="{{ old('tgl_peraturan') }}" name="tgl_peraturan">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tgl_peraturan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Tentang</label>
                                <input type="text" class="form-control @error('tentang') is-invalid @enderror"
                                    value="{{ old('tentang') }}" name="tentang">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('tentang')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Dokumen</label>
                                <input type="file" class="form-control @error('dokumen') is-invalid @enderror"
                                    value="{{ old('dokumen') }}" name="dokumen">
                                <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                    @error('dokumen')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Simpan</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <a href="/himper" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>
@endsection
