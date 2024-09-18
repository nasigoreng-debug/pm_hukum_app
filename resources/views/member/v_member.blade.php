@extends('layouts.v_template')

@section('content')
@include('layouts.v_deskripsi')

<div class="row">

    <div class="col-md-12">

        <ul class="nav nav-tabs">
            @if(Auth::user()->level===1)
            <a href="/member/add" class="btn btn-sm btn-info mb-2">Tambah User</a>
            @elseif(Auth::user()->level===2)
            <a href="/member/add" class="btn btn-sm btn-info mb-2">Tambah User</a>
            @elseif(Auth::user()->level===3)

            @endif
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="all">
                <table class="table table-responsive-sm table-small-font table-sm table-hover members-table middle-align">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="hidden-xs hidden-sm"></th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Settings</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $data)
                        <tr>
                            <td class="user-cb">
                                <input type="checkbox" class="cbr" name="members-list[]" value="1" checked />
                            </td>
                            <td class="user-image hidden-xs hidden-sm">

                                <img src="{{ asset('public/img/'.$data->foto_user) }}" alt="" title="">

                            </td>
                            <td class="user-name">
                                <a href="#" class="name">{{ $data->name }}</a>
                                <span>
                                    @if($data->level===1)
                                    Administrator
                                    @elseif($data->level===2)
                                    Staf
                                    @elseif($data->level===3)
                                    User
                                    @endif
                                </span>
                            </td>
                            <td class="hidden-xs hidden-sm">
                                <span class="email">{{ $data->username }}</span>
                            </td>
                            <td class="user-id">
                                {{ $data->level }}
                            </td>
                            <td class="action-links">
                                <a href="/member/edit/{{$data->id}}" class="edit">
                                    <i class="linecons-pencil"></i>
                                    Edit Profile
                                </a>

                                <!-- <a href="#" class="delete">
                                    <i class="linecons-trash"></i>
                                    Delete
                                </a> -->
                                <button type="button" class="btn btn-sm btn-default text-danger" data-toggle="modal" data-target="#delete{{ $data->id }}">
                                    <i class="linecons-trash"></i>
                                    Delete
                                </button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>

    </div>

</div>

@endsection
@foreach ($member as $data)
<div class="modal fade" id="delete{{ $data->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">{{ $data->name }} </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <a href="/member/delete/{{$data->id}}" type="button" class="btn btn-sm btn-danger">Ya</a>
                <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Tidak</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach