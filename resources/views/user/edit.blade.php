@extends('layouts.v_template')

@section('content')

@include('layouts.v_deskripsi')

<div class="panel panel-default">

    <div class="panel-heading">
        <div class="panel-title">
            Ubah Data User
        </div>
    </div>

    <div class="panel-body">

        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" name="name">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{$user->username}}" name="username">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('username')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Ubah Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" value="" name="password" >
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Level</label>
                            <select name="level" class="form-control @error('level') is-invalid @enderror">
                                <option>{{$user->level}}</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('level')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Foto</label>
                                <div>
                                    @if($user->foto_user && file_exists(public_path('storage/users/' . $user->foto_user)))
                                    <img src="{{ asset('public/storage/users/'.$user->foto_user) }}" alt="" title="" width="40" height="40">
                                    @else
                                        <div class="avatar-placeholder" style="width:40px; height:40px; background:#ccc; border-radius:50%; display:flex; align-items:center; justify-content:center;">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="">
                                    <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                        <label>Ganti Foto</label>
                                        <input type="file" class="form-control form-control-sm @error('foto_user') is-invalid @enderror" value="{{$user->foto_user}}" name="foto_user">
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
                        </div>
                    </div>
                </div>
        </form>

    </div>

</div>
@endsection