@extends('layouts.v_template')

@section('content')
@include('layouts.v_deskripsi')
<!-- Basic Setup -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Data Himpunan Peraturan</h3>

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
            <a href="/himper/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
            @elseif(Auth::user()->level===2)
            <a href="/himper/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
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
            <thead class="bg-gray text-center">
                <tr>
                    <th style="width: 20px;">No</th>
                    <th style="width: 60px;">Jenis Peraturan</th>
                    <th style="width: 60px;">Nomor Peraturan</th>
                    <th style="width: 30px;">Tahun</th>
                    <th style="width: 50px;">Tanggal</th>
                    <th style="width: 200px;">Tentang</th>
                    <th style="width: 30px;">Dokumen</th>
                    <th style="width: 60px;">Action</th>
                </tr>
            </thead>

            <tfoot class="bg-gray text-center">
                <tr>
                    <th>No</th>
                    <th>Jenis Peraturan</th>
                    <th>Nomor Peraturan</th>
                    <th>Tahun</th>
                    <th>Tanggal</th>
                    <th>Tentang</th>
                    <th>Dokumen</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($jdih as $data)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-start">{{ $data->jenis_peraturan }}</td>
                    <td class="text-center">{{ $data->no_peraturan }}</td>
                    <td class="text-center">{{ $data->tahun }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_peraturan)) }}</td>
                    <td>{{ $data->tentang }}</td>

                    <td class="text-center">

                        @if($data->dokumen=="")

                        @else
                        <a href="public/jdih/{{$data->dokumen}}" class="text-blue"><i class="fa fa-file-pdf-o"></i></i></a>
                        @endif

                    </td>
                    <td class="text-center" style="font-size: 5px;">
                        @if(Auth::user()->level===1)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_jdih }}">
                            <i class="fa fa-eye"></i>
                        </button>
                        <a href="/himper/edit/{{$data->id_jdih}}" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $data->id_jdih }}">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        @elseif(Auth::user()->level===2)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_jdih }}">
                            <i class="fa fa-eye"></i>
                        </button>
                        <a href="/himper/edit/{{$data->id_jdih}}" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        @elseif(Auth::user()->level===3)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_jdih }}">
                            <i class="fa fa-eye"></i>
                        </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@foreach ($jdih as $data)

<!-- Modal Detail -->
<div class="modal fade" id="detail{{ $data->id_jdih }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 colspan="2" class="text-white text-center bg-success">Detail Himpunan Peraturan</h4>
            </div>
            <div class="modal-body">
                <table class="table table-small-font table-bordered table-hover">
                    <tr class="text-start border">
                        <td style="width: 200px;">Jenis Peraturan</td>
                        <td>{{$data->jenis_peraturan}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nomor Peraturan</td>
                        <td>{{$data->no_peraturan}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Tanggal</td>
                        <td>{{ date('d-m-Y', strtotime($data->tgl_peraturan)) }}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>tentang</td>
                        <td>{{$data->tentang}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Dokumen</td>
                        <td>

                            @if($data->dokumen=="")

                            @else
                            <a href="public/jdih/{{$data->dokumen}}" class="text-blue" target="_blank"><i class="fa fa-file-pdf-o"></i></i></a>
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
<div class="modal fade" id="delete{{ $data->id_jdih }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">{{ $data->jenis_peraturan }} Nomor {{ $data->no_peraturan }} tentang {{ $data->tentang }} </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <a href="/himper/delete/{{$data->id_jdih}}" type="button" class="btn btn-xs btn-danger">Ya</a>
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