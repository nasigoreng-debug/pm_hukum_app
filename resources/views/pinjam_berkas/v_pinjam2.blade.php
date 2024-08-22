@extends('layouts.v_template')

@section('content')
@include('layouts.v_deskripsi')
<!-- Basic Setup -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Data Pinjam Berkas</h3>

        <div class="panel-options">
            <a href="#" data-toggle="panel">
                <span class="collapse-icon">&ndash;</span>
                <span class="expand-icon">+</span>
            </a>
            <a href="#" data-toggle="remove">
                &times;
            </a>
        </div>
    </div>
    <div class="panel-body">

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#example-1").dataTable({
                    aLengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ]
                });
            });
        </script>
        <a href="/pinjam/add" class="btn btn-sm btn-success mb-2">Tambah Data</a>
        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('pesan') }}
        </div>
        @endif
        <table id="example-1" class="table table-small-font table-sm table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead class="bg-gray">
                <tr>
                    <th style="width: 5px;">No</th>
                    <th style="width: 100px;">Nama Peminjam</th>
                    <th style="width: 100px;">Nomor Perkara</th>
                    <th style="width: 100px;">Tanggal Pinjam</th>
                    <th style="width: 100px;">Tanggal Kembali</th>
                    <th style="width: 100px;">Lama Pinjam</th>
                    <th style="width: 30px;">Action</th>

                </tr>
            </thead>

            <tfoot class="bg-gray">
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Nomor Perkara</thyle=>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Lama Pinjam</th>
                    <th>Action</th>
                </tr>
            </tfoot>

            <tbody>
                @foreach ($pinjam as $data)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{ $data->nama_peminjam }}</td>
                    <td>{{ $data->no_banding }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_pinjam)) }}</td>
                    <td class="text-center">
                        @if($data->tgl_kembali=="")
                        <p class="btn btn-xs btn-danger d-inline">Belum kembali</p>
                        @else
                        {{ date('d-m-Y', strtotime($data->tgl_kembali)) }}
                        @endif
                    </td>
                    <td class="text-center">

                    </td>
                    <td class="text-center" style="font-size: 5px;">
                        @if(Auth::user()->level===1)
                        <a href="/pinjam/edit/{{$data->id_pinjam}}" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $data->id_pinjam }}">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        @elseif(Auth::user()->level===2)
                        <a href="/pinjam/edit/{{$data->id_pinjam}}" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        @elseif(Auth::user()->level===3)

                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@foreach ($pinjam as $data)
<div class="modal fade" id="delete{{ $data->id_pinjam }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">{{ $data->no_banding }} </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <a href="/pinjam/delete/{{$data->id_pinjam}}" type="button" class="btn btn-sm btn-danger">Ya</a>
                <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Tidak</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach
@endsection