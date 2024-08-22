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
                $("#example-1").dataTable({
                    aLengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"]
                    ]
                });
            });
        </script>
        <a href="/bankput/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
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
                    <th style="width: 30px;">Tanggal Register</th>
                    <th style="width: 70px;">Nomor Banding</th>
                    <th style="width: 30px;">Jenis Perkara</th>
                    <th style="width: 70px;">Pembanding</th>
                    <th style="width: 70px;">Terbanding</th>
                    <th style="width: 30px;">Putus</th>
                    <th style="width: 20px;">Putusan</th>
                    <th style="width: 30px;">Anonimasi</th>
                    <th style="width: 30px;">Lama Putus</th>
                    <th style="width: 50px;">Action</th>
                </tr>
            </thead>

            <tfoot class="bg-gray">
                <tr>
                    <th>No</th>
                    <th>Tanggal Register</th>
                    <th>Nomor Banding</thyle=>
                    <th>Jenis Perkara</th>
                    <th>Pembanding</th>
                    <th>Terbanding</th>
                    <th>Putus</th>
                    <th>Putusan</th>
                    <th>Anonimasi</th>
                    <th>Lama Putus</th>
                    <th>Action</th>
                </tr>
            </tfoot>

            <tbody>
                @foreach ($bankput as $data)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_reg)) }}</td>
                    <td>{{ $data->no_banding }}</td>
                    <td>{{ $data->jenis_perkara }}</td>
                    <td>{{ $data->pembanding }}</td>
                    <td>{{ $data->terbanding }}</td>
                    <td class="text-center">
                        @if($data->tgl_put_banding=="")
                        "-"
                        @else
                        {{ date('d-m-Y', strtotime($data->tgl_put_banding)) }}
                        @endif
                    </td>
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
                    <td class="text-center">

                    </td>

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
                        <td style="width: 200px;">Tanggal Register</td>
                        <td>{{ date('d-m-Y', strtotime($data->tgl_reg)) }}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nomor Perkara Banding</td>
                        <td>{{$data->no_banding}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Jenis Perkara</td>
                        <td>{{$data->jenis_perkara}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nama Pembanding</td>
                        <td>{{$data->pembanding}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nama Terbanding</td>
                        <td>{{$data->terbanding}}</td>
                    </tr>
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