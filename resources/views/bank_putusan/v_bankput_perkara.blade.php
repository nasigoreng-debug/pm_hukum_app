@extends('layouts.v_template')

@section('content')
@include('layouts.v_deskripsi')
<!-- Basic Setup -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Data Bank Putusan</h3>

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
                $("#example-4").dataTable({
                    dom: "<'row'<'col-sm-5'l><'col-sm-7'Tf>r>" +
                        "t" +
                        "<'row'<'col-xs-6'i><'col-xs-6'p>>",
                    tableTools: {
                        sSwfPath: "assets/js/datatables/tabletools/copy_csv_xls_pdf.swf"
                    }
                });
            });
        </script>
        <td class="text-center" style="font-size: 5px;">
            @if(Auth::user()->level===1)
            <a href="/bankput/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
            @elseif(Auth::user()->level===2)
            <a href="/bankput/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
            @elseif(Auth::user()->level===3)

            @endif
        </td>

        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('pesan') }}
        </div>
        @endif
        <table class="table table-bordered table-striped" id="example-4">
            <thead class="bg-gray">
                <tr>
                    <th style="width: 5px;">No</th>
                    <!-- <th style="width: 30px;">Tanggal Register</th> -->
                    <th style="width: 70px;">Nomor Banding</th>
                    <th style="width: 30px;">Jenis Perkara</th>
                    <!-- <th style="width: 70px;">Pembanding</th>
                    <th style="width: 70px;">Terbanding</th> -->
                    <th style="width: 30px;">Putus</th>
                    <th style="width: 30px;">Status</th>
                    <th style="width: 20px;">Putusan</th>
                    <th style="width: 30px;">Anonimasi</th>
                    <th style="width: 30px;">Keterangan</th>
                    <th style="width: 50px;">Action</th>
                </tr>
            </thead>

            <tfoot class="bg-gray">
                <tr>
                    <th>No</th>
                    <!-- <th>Tanggal Register</th> -->
                    <th>Nomor Banding</thyle=>
                    <th>Jenis Perkara</th>
                    <!-- <th>Pembanding</th>
                    <th>Terbanding</th> -->
                    <th>Putus</th>
                    <th>Status</th>
                    <th>Putusan</th>
                    <th>Anonimasi</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </tfoot>

            <tbody>
                @foreach ($bankput as $data)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>

                    <td>{{ $data->no_banding }}</td>
                    <td>{{ $data->jenis_perkara }}</td>
                    <td class="text-center">
                        @if($data->tgl_put_banding=="")
                        "-"
                        @else
                        {{ date('d-m-Y', strtotime($data->tgl_put_banding)) }}
                        @endif
                    </td>
                    <td>{{ $data->status_putus }}</td>
                    <td class="text-center">
                        @if($data->put_rtf=="")

                        @else
                        <a href="bank_putusan_rtf/{{$data->put_rtf}}" class="text-blue" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($data->put_anonim=="")

                        @else
                        <a href="bank_putusan_anonim/{{$data->put_anonim}}" class="text-blue" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                        @endif
                    </td>
                    <td>{{ $data->keterangan }}</td>
                    <!-- <td class="text-center"></td> -->
                    <td class="text-center" style="font-size: 5px;">
                        @if(Auth::user()->level===1)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_bankput }}">
                            <i class="fa fa-eye"></i></a>
                        </button>
                        <a href="/bankput/edit/{{$data->id_bankput}}" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $data->id_bankput }}">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        @elseif(Auth::user()->level===2)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_bankput }}">
                            <i class="fa fa-eye"></i></a>
                        </button>
                        <a href="/bankput/edit/{{$data->id_bankput}}" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        @elseif(Auth::user()->level===3)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_bankput }}">
                            <i class="fa fa-eye"></i></a>
                        </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>
@foreach ($bankput as $data)

<!-- Modal Detail -->
<div class="modal fade" id="detail{{ $data->id_bankput }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 colspan="2" class="text-white text-center bg-success">Detail Bank Putusan</h4>
            </div>
            <div class="modal-body">
                <table class="table table-small-font table-bordered table-hover">
                   
                    <tr class="text-start border">
                        <td>Tanggal Putus Banding</td>
                        <td>{{ date('d-m-Y', strtotime($data->tgl_put_banding)) }}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Putusan Akhir</td>
                        <td>@if($data->put_rtf=="")
                            ""
                            @else
                            <a href="bank_putusan_rtf/{{$data->put_rtf}}" class="text-blue" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-start border">
                        <td>Putusan Anonimasi</td>
                        <td> @if($data->put_anonim=="")
                            ""
                            @else
                            <a href="bank_putusan_anonim/{{$data->put_anonim}}" class="text-blue" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                            @endif
                        </td>
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
<div class="modal fade" id="delete{{ $data->id_bankput }}">
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
                <a href="/bankput/delete/{{$data->id_bankput}}" type="button" class="btn btn-sm btn-danger">Ya</a>
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