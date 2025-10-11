@extends('layouts.v_template')

@section('content')
@include('layouts.v_deskripsi')

<div class="panel panel-default container">
    <div class="panel-heading">
        <div class="panel-title">
            Ubah Data Laporan
        </div>
    </div>

    <div class="panel-body">
        <form action="{{ route('laporans.update', $laporans->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                        
                        <!-- Jenis Laporan -->
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label for="jenis_laporan">Jenis Laporan</label>
                            <select name="jenis_laporan" class="form-control @error('jenis_laporan') is-invalid @enderror">
                                <option>{{$laporans->jenis_laporan}}</option>
                                <option> Laporan Tahunan (Laptah)</option>
                                <option> Laporan Kinerja Instansi Pemerintah (LKjIP)</option>
                                <option> Laporan lainnya</option>
                            </select>
                            @error('jenis_laporan')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Tahun -->
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tahun</label>
                            <input type="text" class="form-control @error('tahun') is-invalid @enderror" 
                                   value="{{$laporans->tahun}}" name="tahun">
                            @error('tahun')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Tanggal Laporan (FIXED) -->
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Tanggal Laporan</label>
                            <input type="date" class="form-control form-control-sm @error('tgl_laporan') is-invalid @enderror" 
                                   value="{{ $laporans->tgl_laporan ? \Carbon\Carbon::parse($laporans->tgl_laporan)->format('Y-m-d') : '' }}" 
                                   name="tgl_laporan">
                            @error('tgl_laporan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Judul -->
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                   value="{{$laporans->judul}}" name="judul">
                            @error('judul')
                            <div class="invalid-feedback text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Dokumen -->
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Dokumen</label>
                            <div>{{ $laporans->dokumen }}</div>
                            
                            <div class="mt-2">
                                <label>Ganti Dokumen</label>
                                <input type="file" class="form-control form-control-sm @error('dokumen') is-invalid @enderror" 
                                       name="dokumen">
                                @error('dokumen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Konsep -->
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Konsep</label>
                            <div>{{ $laporans->konsep }}</div>
                            
                            <div class="mt-2">
                                <label>Ganti Konsep</label>
                                <input type="file" class="form-control form-control-sm @error('konsep') is-invalid @enderror" 
                                       name="konsep">
                                @error('konsep')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="form-group ml-3 mt-4 mb-3">
                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                            <a href="{{ route('laporans.index') }}" class="btn btn-sm btn-info">Kembali</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection