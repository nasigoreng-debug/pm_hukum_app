@extends('layouts.v_template')

@section('content')
@include('layouts.v_deskripsi')
<!-- Basic Setup -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Data Putusan Kasasi</h3>

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
        <a href="/kasasi/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('pesan') }}
        </div>
        @endif
        <table id="example-1" class="table table-small-font table-sm table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead class="bg-gray">
                <tr>
                    <th style="width: 10px;">No</th>
                    <th style="width: 50px;">Satker</th>
                    <th style="width: 60px;">Tanggal Masuk</th>
                    <th style="width: 100px;">Pemohon</th>
                    <th style="width: 100px;">Termohon</th>
                    <th style="width: 70px;">Nomor Kasasi</th>
                    <th style="width: 60px;">Putus Kasasi</th>
                    <th style="width: 70px;">Status Putusan</th>
                    <th style="width: 30px;">Putusan</th>
                    <th style="width: 50px;">Action</th>
                </tr>
            </thead>

            <tfoot class="bg-gray">
                <tr>
                    <th>No</th>
                    <th>Satker</th>
                    <th>Tanggal Masuk</th>
                    <th>Pemohon</th>
                    <th>Termohon</th>
                    <th>Nomor Kasasi</th>
                    <th>Putus Kasasi</th>
                    <th>Status Putusan</th>
                    <th>Putusan</th>
                    <th>Action</th>
                </tr>
            </tfoot>

            <tbody>
                @foreach ($kasasi as $data)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{ $data->pa_pengaju }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_masuk)) }}</td>
                    <td>{{ $data->pemohon_kasasi }}</td>
                    <td>{{ $data->termohon_kasasi }}</td>
                    <td class="text-center">{{ $data->no_kasasi }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_put_kasasi)) }}</td>
                    <td>{{ $data->status_put }}</td>
                    <td class="text-center">

                        @if($data->salput_kasasi=="")

                        @else
                        <a href="kasasi_perkara_putusan/{{$data->salput_kasasi}}" class="text-blue" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                        @endif
                    </td>
                    <td class="text-center">
                        @if(Auth::user()->level===1)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_kasasi }}">
                            <i class="fa fa-eye"></i></a>
                        </button>
                        <a href="/kasasi/edit/{{$data->id_kasasi}}" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $data->id_kasasi }}">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        @elseif(Auth::user()->level===2)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_kasasi }}">
                            <i class="fa fa-eye"></i></a>
                        </button>
                        <a href="/kasasi/edit/{{$data->id_kasasi}}" class="btn btn-warning">
                            <i class="fa fa-edit"></i>
                        </a>
                        @elseif(Auth::user()->level===3)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_kasasi }}">
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
@foreach ($kasasi as $data)

<!-- Modal Detail -->
<div class="modal fade" id="detail{{ $data->id_kasasi }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 colspan="2" class="text-white text-center bg-success">Detail Putusan Kasasi</h4>
            </div>
            <div class="modal-body">
                <table class="table table-small-font table-bordered table-hover">
                    <tr class="text-start border">
                        <td style="width: 200px;">Pengadilan Agama Pengaju</td>
                        <td>{{$data->pa_pengaju}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Tanggal Masuk Arsip</td>
                        <td>{{ date('d-m-Y', strtotime($data->tgl_masuk)) }}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Pemohon Kasasi</td>
                        <td>{{$data->pemohon_kasasi}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Termohon kasasi</td>
                        <td>{{$data->termohon_kasasi}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nomor Perkara PA</td>
                        <td>{{$data->no_pa}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Tanggal Putus PA</td>
                        <td>{{ date('d-m-Y', strtotime($data->tgl_put_pa)) }}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nomor Perkara Banding</td>
                        <td>{{$data->no_banding}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Tanggal Putus Banding</td>
                        <td>{{ date('d-m-Y', strtotime($data->tgl_put_banding)) }}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nomor Kasasi</td>
                        <td>{{$data->no_kasasi}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Tanggal Putus Kasasi</td>
                        <td>{{ date('d-m-Y', strtotime($data->tgl_put_kasasi)) }}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Status Putusan</td>
                        <td>{{$data->status_put}}</td>
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
<div class="modal fade" id="delete{{ $data->id_kasasi }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">{{ $data->no_kasasi }} Jo. {{ $data->no_banding }} </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <a href="/arsip/delete/{{$data->id_kasasi}}" type="button" class="btn btn-sm btn-danger">Ya</a>
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