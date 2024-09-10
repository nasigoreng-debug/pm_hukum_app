@extends('layouts.v_template')

@section('content')
@include('layouts.v_deskripsi')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Data Arsip Perkara</h3>

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
                $("#example-3").dataTable().yadcf([{
                        column_number: 1,
                        filter_type: 'text'
                    },
                    {
                        column_number: 2,
                        filter_type: 'text'
                    },
                    {
                        column_number: 3,
                        filter_type: 'text'
                    },
                    {
                        column_number: 4,
                        filter_type: 'text'
                    },
                    {
                        column_number: 5,
                        filter_type: 'text'
                    },
                    {
                        column_number: 6,
                        filter_type: 'text'
                    },
                    {
                        column_number: 7,
                        filter_type: 'text'
                    },

                ]);
            });
        </script>
        <td class="text-center" style="font-size: 5px;">
            @if(Auth::user()->level===1)
            <a href="/arsip/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
            @elseif(Auth::user()->level===2)
            <a href="/arsip/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
            @elseif(Auth::user()->level===3)

            @endif
        </td>

        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('pesan') }}
        </div>
        @endif
        <table class="table table-striped table-bordered" id="example-3">
            <thead>
                <tr class="replace-inputs bg-gray">
                    <th style="width: 5px;">No</th>
                    <th style="width: 30px;">Masuk</th>
                    <th style="width: 70px;">Nomor Perkara</th>
                    <th style="width: 70px;">Nomor PA</th>
                    <th style="width: 50px;">Jenis Perkara</th>
                    <th style="width: 30px;">Putus</th>
                    <th style="width: 20px;">Putusan</th>
                    <th style="width: 30px;">Alih Media</th>
                    <th style="width: 30px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($arsip as $data)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_masuk)) }}</td>
                    <td>{{ $data->no_banding }}</td>
                    <td>{{ $data->no_pa }}</td>
                    <td>{{ $data->jenis_perkara }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_put_banding)) }}</td>
                    <td class="text-center">

                        @if($data->putusan=="")

                        @else
                        <a href="public/arsip_perkara_putusan/{{$data->putusan}}" class="text-blue" target="_blank"><i class="fa fa-file-pdf-o"></i></i></a>
                        @endif

                    </td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_alih_media)) }}</td>
                    <td class="text-center" style="font-size: 5px;">
                        @if(Auth::user()->level===1)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_banding }}">
                            <i class="fa fa-eye"></i>
                        </button>
                        <a href="/arsip/edit/{{$data->id_banding}}" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $data->id_banding }}">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        @elseif(Auth::user()->level===2)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_banding }}">
                            <i class="fa fa-eye"></i>
                        </button>
                        <a href="/arsip/edit/{{$data->id_banding}}" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        @elseif(Auth::user()->level===3)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_banding }}">
                            <i class="fa fa-eye"></i>
                        </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="bg-gray">
                    <th>No</th>
                    <th>Masuk</th>
                    <th>Nomor Perkara</th>
                    <th>Nomor PA</th>
                    <th>Jenis Perkara</th>
                    <th>Putus</th>
                    <th>Putusan</th>
                    <th>Alih Media</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>

    </div>
        </div >
@foreach ($arsip as $data)
<!-- Modal Detail -->
<div class="modal fade" id="detail{{ $data->id_banding }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 colspan="2" class="text-white text-center bg-success">Detail Arsip Perkara</h4>
            </div>
            <div class="modal-body">
                <table class="table table-small-font table-bordered table-hover">
                    <tr class="text-start border">
                        <td style="width: 200px;">Tanggal Masuk Arsip</td>
                        <td>{{ date('d-m-Y', strtotime($data->tgl_masuk)) }}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nomor Perkara Banding</td>
                        <td>{{$data->no_banding}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nomor Perkara TK.I</td>
                        <td>{{$data->no_pa}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Jenis Perkara</td>
                        <td>{{$data->jenis_perkara}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Tanggal Putus Banding</td>
                        <td>{{ date('d-m-Y', strtotime($data->tgl_put_banding)) }}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Petugas yang Menyerahkan Berkas</td>
                        <td>{{$data->penyerah}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Petugas yang Menerima Berkas</td>
                        <td>{{$data->penerima}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nomor Lemari</td>
                        <td>{{$data->no_lemari}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nomor Laci</td>
                        <td>{{$data->no_laci}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nomor Box</td>
                        <td>{{$data->no_box}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Tanggal ALih Media</td>
                        <td>{{ date('d-m-Y', strtotime($data->tgl_alih_media)) }}</td>
                    </tr>
                </table>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->

<!-- Modal Hapus -->
<div class="modal fade" id="delete{{ $data->id_banding }}">
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
                <a href="/arsip/delete/{{$data->id_banding}}" type="button" class="btn btn-xs btn-danger">Ya</a>
                <button type="button" class="btn btn-xs btn-white" data-dismiss="modal">Tidak</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach
@endsection