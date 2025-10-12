@extends('layouts.v_template')

@section('content')
    @include('layouts.v_deskripsi')

    <!-- Table exporting -->
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
                    <a href="/kasasi/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                @elseif(Auth::user()->level === 2)
                    <a href="/kasasi/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
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
                        <th class="text-center" style="width: 10px;">No</th>
                        <th class="text-center" style="width: 50px;">Satker</th>
                        <th class="text-center" style="width: 60px;">Tanggal Masuk</th>
                        <!-- <th style="width: 100px;">Pemohon</th>
                        <th style="width: 100px;">Termohon</th> -->
                        <th class="text-center" style="width: 70px;">Nomor Kasasi</th>
                        <th class="text-center" style="width: 50px;">Putus Kasasi</th>
                        <th class="text-center" style="width: 70px;">Nomor Banding</th>
                        <th class="text-center" style="width: 70px;">Status Putusan</th>
                        <th class="text-center" style="width: 30px;">Putusan</th>
                        <th class="text-center" style="width: 50px;">Action</th>
                    </tr>
                </thead>

                <tfoot class="bg-gray">
                    <tr>
                        <th>No</th>
                        <th>Satker</th>
                        <th>Tanggal Masuk</th>
                        <!-- <th>Pemohon</th>
                        <th>Termohon</th> -->
                        <th>Nomor Kasasi</th>
                        <th>Putus Kasasi</th>
                        <th>Nomor Banding</th>
                        <th>Status Putusan</th>
                        <th>Putusan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>

                <tbody>
                    @foreach ($kasasi as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $data->pa_pengaju }}</td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_masuk)) }}</td>
                            <!-- <td>{{ $data->pemohon_kasasi }}</td>
                        <td>{{ $data->termohon_kasasi }}</td> -->
                            <td class="text-center">{{ $data->no_kasasi }}</td>
                            <!-- <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_put_kasasi)) }}</td> -->
                            <td class="text-center">
                                @if ($data->tgl_put_kasasi == '0000-00-00')
                                    <span class="badge badge-danger">Belum diinput!!!</span>
                                @elseif($data->tgl_put_kasasi == '')
                                    <span class="badge badge-danger">Belum diinput!!!</span>
                                @else
                                    {{ date('d-m-Y', strtotime($data->tgl_put_kasasi)) }}
                                @endif
                            </td>
                            <td class="text-center">{{ $data->no_banding }}</td>
                            <td class="text-center">{{ $data->status_put }}</td>
                            <!-- <td class="text-center">

                            @if ($data->salput_kasasi == '')
    <i class="bi text-danger bi-filetype-pdf"></i>
@else
    <a href="kasasi_perkara_putusan/{{ $data->salput_kasasi }}" class="text-blue" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
    @endif
                        </td> -->
                            <td class="text-center">
                                @if ($data->salput_kasasi == '')
                                    <i class="bi text-danger bi-filetype-pdf"></i>
                                @elseif($data->salput_kasasi == '0000-00-00')
                                    <i class="bi text-danger bi-filetype-pdf"></i>
                                @else
                                    <a href="public/kasasi_perkara_putusan/{{ $data->salput_kasasi }}" class="text-blue"
                                        target="_blank"><i class="bi text-success bi-file-earmark-pdf-fill"></i></i></i></a>
                                @endif
                            </td>
                            <td class="text-center">
                                @if (Auth::user()->level === 1)
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail{{ $data->id_kasasi }}">
                                        <i class="fa fa-eye"></i></a>
                                    </button>
                                    <a href="/kasasi/edit/{{ $data->id_kasasi }}" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                        data-target="#delete{{ $data->id_kasasi }}">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                @elseif(Auth::user()->level === 2)
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail{{ $data->id_kasasi }}">
                                        <i class="fa fa-eye"></i></a>
                                    </button>
                                    <a href="/kasasi/edit/{{ $data->id_kasasi }}" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                @elseif(Auth::user()->level === 3)
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail{{ $data->id_kasasi }}">
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
                                <td>{{ $data->pa_pengaju }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Masuk Arsip</td>
                                <td>{{ date('d-m-Y', strtotime($data->tgl_masuk)) }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>Pemohon Kasasi</td>
                                <td>{{ $data->pemohon_kasasi }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>Termohon kasasi</td>
                                <td>{{ $data->termohon_kasasi }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>Nomor Perkara PA</td>
                                <td>{{ $data->no_pa }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Putus PA</td>
                                <td>
                                    @if ($data->tgl_put_pa == '0000-00-00')
                                    @elseif($data->tgl_put_pa == '')
                                    @else
                                        {{ date('d-m-Y', strtotime($data->tgl_put_pa)) }}
                                    @endif
                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td>Nomor Perkara Banding</td>
                                <td>{{ $data->no_banding }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Putus Banding</td>
                                <td>
                                    @if ($data->tgl_put_banding == '0000-00-00')
                                    @elseif($data->tgl_put_banding == '')
                                    @else
                                        {{ date('d-m-Y', strtotime($data->tgl_put_banding)) }}
                                    @endif
                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td>Nomor Kasasi</td>
                                <td>{{ $data->no_kasasi }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Putus Kasasi</td>
                                <td class="text-start">
                                    @if ($data->tgl_put_kasasi == '0000-00-00')
                                        Belum Putus
                                    @elseif($data->tgl_put_kasasi == '')
                                        Belum Putus
                                    @else
                                        {{ date('d-m-Y', strtotime($data->tgl_put_kasasi)) }}
                                    @endif
                                </td>
                            </tr>

                            <tr class="text-start border">
                                <td>Status Putusan</td>
                                <td>{{ $data->status_put }}</td>
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
                        <a href="/kasasi/delete/{{ $data->id_kasasi }}" type="button"
                            class="btn btn-sm btn-danger">Ya</a>
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
