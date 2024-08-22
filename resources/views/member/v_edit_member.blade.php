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

        <form action="/member/update/{{$member->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card card-primary mt-3 ml-3 mb-3 mr-3">
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$member->name}}" name="name">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{$member->username}}" name="username">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('username')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{$member->email}}" name="email">
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Password</label>
                            <input type="text" class="form-control @error('password') is-invalid @enderror" value="{{$member->password}}" name="password" readonly>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback text-danger">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <label>Level</label>
                            <select name="level" class="form-control @error('level') is-invalid @enderror">
                                <option>{{$member->level}}</option>
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
                        <div class="form-group ml-3 mt-2 mb-2 mr-3">
                            <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                <label>Foto</label>
                                <div>
                                    <img src="{{asset('img/'.$member->foto_user)}}" width="40" height="60" />
                                </div>
                                <div class="">
                                    <div class="form-group ml-3 mt-2 mb-2 mr-3">
                                        <label>Ganti Foto</label>
                                        <input type="file" class="form-control form-control-sm @error('foto_user') is-invalid @enderror" value="{{$member->foto_user}}" name="foto_user">
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
                                <a href="/member" class="btn btn-sm btn-info mb-2"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
        </form>

    </div>

</div>
@endsection