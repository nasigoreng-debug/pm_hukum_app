@extends('layouts.v_template')

@section('content')
    @include('layouts.v_deskripsi')

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                Tambah User
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <!-- left column -->
                <div class="col-md-4 offset-md-4">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Name Field -->
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" name="name" placeholder="Masukkan nama">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Username Field -->
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username"
                                class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"
                                name="username" placeholder="Masukkan username">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Masukkan password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Level Field -->
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control @error('level') is-invalid @enderror">
                                <option value="">--pilih level--</option>
                                <option value="1" {{ old('level') == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('level') == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('level') == '3' ? 'selected' : '' }}>3</option>
                            </select>
                            @error('level')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Photo Field -->
                        <div class="form-group">
                            <label for="foto_user">Foto</label>
                            <input type="file" id="foto_user"
                                class="form-control @error('foto_user') is-invalid @enderror" name="foto_user"
                                accept="image/*">
                            <small class="form-text text-muted">
                                Format: JPG, PNG, JPEG. Maksimal 500Kb.
                            </small>
                            @error('foto_user')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Simpan
                            </button>
                            <a href="{{ route('users.index') }}" class="btn btn-info">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
