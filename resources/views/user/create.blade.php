@extends('layouts.v_template')

@section('content')
    @include('layouts.v_deskripsi')

    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="panel-title">
                Tambah User
            </div>
        </div>

        <div class="panel-body ">

            <div class="row">
                <!-- left column -->
                <div class="col-md-4 offset-md-4">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- general form elements -->
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" name="name">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username') }}" name="username">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('username')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                value="{{ old('password') }}" name="password">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select name="level" class="form-control @error('level') is-invalid @enderror">
                                <option>--pilih role--</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('level')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Foto</label>
                                <div class="">
                                    <div class="form-group">
                                        <label>Upload Foto</label>
                                        <input type="file"
                                            class="form-control form-control-sm @error('foto_user') is-invalid @enderror"
                                            value="{{ old('foto_user') }}" name="foto_user">
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            @error('foto_user')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Simpan</button>
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
