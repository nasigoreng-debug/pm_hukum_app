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
                @if (Auth::user()->level === 1)
                    <a href="/pinjam/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                @elseif(Auth::user()->level === 2)
                    <a href="/pinjam/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                @elseif(Auth::user()->level === 3)
                @endif
            </td>

            @if (session('pesan'))
                <div class="alert alert-success alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session('pesan') }}
                </div>
            @endif
            <table class="table table-sm table-hover" id="example-4">
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
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_peminjam }}</td>
                            <td>{{ $data->no_banding }}</td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_pinjam)) }}</td>
                            <td class="text-center">
                                @if ($data->tgl_kembali == '0000-00-00')
                                    <span class="badge badge-danger">belum kembali</span>
                                @elseif($data->tgl_kembali == '')
                                    <span class="badge badge-danger">belum kembali</span>
                                @else
                                    {{ date('d-m-Y', strtotime($data->tgl_kembali)) }}
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($data->tgl_kembali == '0000-00-00')
                                    <span
                                        class="badge badge-danger">{{ Carbon\Carbon::parse($data->tgl_pinjam)->diffIndays($sekarang) }}
                                        Hari</span>
                                @elseif($data->tgl_kembali == '')
                                    <span
                                        class="badge badge-danger">{{ Carbon\Carbon::parse($data->tgl_pinjam)->diffIndays($sekarang) }}
                                        Hari</span>
                                @else
                                    <span class="badge badge-success">
                                        {{ Carbon\Carbon::parse($data->tgl_pinjam)->diffIndays($data->tgl_kembali) }}
                                        Hari</span>
                                @endif
                            </td>
                            <td>{{ $data->keterangan }}</td>
                            <td class="text-center" style="font-size: 5px;">
                                @if (Auth::user()->level === 1)
                                    <a href="/pinjam/edit/{{ $data->id }}" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail{{ $data->id }}">
                                        <i class="fa fa-eye"></i></button>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                        data-target="#delete{{ $data->id }}">
                                        <i class="fa fa-trash-o"></i></button>
                                @elseif(Auth::user()->level === 2)
                                    <a href="/pinjam/edit/{{ $data->id }}" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail{{ $data->id }}">
                                        <i class="fa fa-eye"></i></button>
                                @elseif(Auth::user()->level === 3)
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
        <div class="modal fade" id="detail{{ $data->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 colspan="2" class="text-white text-center bg-success">Detail</h4>
                    </div>
                    <div class="modal-body">
                        <h4 colspan="2" class="text-white text-center bg-success">Bukti Peminjaman - Bukti Kembali</h4>
                        <card class="table table-small-font table-bordered table-hover">
                            <span class="user-image hidden-xs hidden-sm justify-content-center">
                                <img src="{{ asset('public/dokumen_pinjam/bkt_pinjam/' . $data->bkt_pinjam) }}"
                                    width="400" height="600">
                            </span>
                            <span class="user-image hidden-xs hidden-sm justify-content-center">
                                <img src="{{ asset('public/dokumen_pinjam/bkt_kembali/' . $data->bkt_kembali) }}"
                                    width="400" height="600">
                            </span>
                        </card>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <div class="modal fade" id="delete{{ $data->id }}">
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
                        <a href="/pinjam/delete/{{ $data->id }}" type="button" class="btn btn-sm btn-danger">Ya</a>
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
