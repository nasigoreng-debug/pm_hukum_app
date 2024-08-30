@extends('layouts.v_template')

@section('content')
@include('layouts.v_deskripsi')
<!-- Table exporting -->
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
            <a href="/pinjam/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
            @elseif(Auth::user()->level===2)
            <a href="/pinjam/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
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
                    <th style="width: 100px;">Nama Peminjam</th>
                    <th style="width: 100px;">Nomor Perkara</th>
                    <th style="width: 100px;">Tanggal Pinjam</th>
                    <th style="width: 100px;">Tanggal Kembali</th>
                    <th style="width: 100px;">Lama Pinjam</th>
                    <th style="width: 100px;">Keterangan</th>
                    <th style="width: 50px;">Action</th>
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
                    <th>Keterangan</th>
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
                        @if($data->tgl_kembali=="0000-00-00")

                        @elseif($data->tgl_kembali=="")

                        @else
                        {{ date('d-m-Y', strtotime($data->tgl_kembali)) }}
                        @endif
                    </td>
                    <td class="text-center">
                        {{ number_format($data->selisih, 0, ",", ".")}}
                    </td>
                    <td>{{ $data->keterangan }}</td>
                    <td class="text-center" style="font-size: 5px;">
                        @if(Auth::user()->level===1)
                        <a href="/pinjam/edit/{{$data->id_pinjam}}" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_pinjam }}">
                            <i class="fa fa-eye"></i>
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $data->id_pinjam }}">
                                <i class="fa fa-trash-o"></i>
                            </button>
                            @elseif(Auth::user()->level===2)
                            </a>
                            <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_pinjam }}">
                                <a href="/pinjam/edit/{{$data->id_pinjam}}" class="btn btn-warning btn-xs">
                                    <i class="fa fa-edit"></i>
                                    <i class="fa fa-eye"></i>
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

<!-- Modal Detail -->
<div class="modal fade" id="detail{{ $data->id_pinjam }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 colspan="2" class="text-white text-center bg-success">Detail Bukti Peminjaman</h4>
            </div>
            <div class="modal-body">
                <table class="table table-small-font table-bordered table-hover">
                    <td class="user-image hidden-xs hidden-sm">
                        <img src="{{ asset('/dokumen_pinjam/'.$data->dokumen) }}" width="800" height="1000">
                    </td>
                </table>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
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