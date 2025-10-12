@extends('layouts.v_template')

@section('content')
    @include('layouts.v_deskripsi')
    <!-- Table exporting -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Data Surat Keluar</h3>

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
                            sSwfPath: "{{ asset('public/template') }}/assets/js/datatables/tabletools/copy_csv_xls_pdf.swf"
                        }
                    });
                });
            </script>
            <td class="text-center" style="font-size: 5px;">
                @if (Auth::user()->level === 1)
                    <a href="/suratkeluar/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                    <a href="/suratkeluar_total" class="btn btn-sm btn-success mb-2">All Data</a>
                    <a href="/suratkeluar" class="btn btn-sm btn-danger mb-2">Kembali</a>
                @elseif(Auth::user()->level === 2)
                    <a href="/suratkeluar/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                    <a href="/suratkeluar_total" class="btn btn-sm btn-success mb-2">All Data</a>
                    <a href="/suratkeluar" class="btn btn-sm btn-danger mb-2">Kembali</a>
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
                <thead class="bg-gray text-center">
                    <tr>
                        <th style="width: 30px;">No</th>
                        <th style="width: 150px;">Nomor </th>
                        <th style="width: 80px;">Tanggal </th>
                        <th style="width: 60px;">Tujuan </th>
                        <th style="width: 200px;">Perihal</th>
                        <th style="width: 40px;">Dokumen</th>
                        {{-- <th style="width: 40px;">Lampiran</th> --}}
                        <th style="width: 40px;">Konsep </th>
                        <th style="width: 50px;">Keterangan</th>
                        <th style="width: 60px;">Action</th>
                    </tr>
                </thead>

                <tfoot class="bg-gray text-center">
                    <tr>
                        <th>No</th>
                        <th>Nomor </th>
                        <th>Tanggal </th>
                        <th>Tujuan </th>
                        <th>Perihal</th>
                        <th>Dokumen</th>
                        {{-- <th>Lampiran</th> --}}
                        <th>Konsep </th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($suratkeluar as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-start">{{ $data->no_surat }}</td>
                            <td class="text-start">{{ date('d-m-Y', strtotime($data->tgl_surat)) }}</td>
                            <td class="text-start">{{ $data->tujuan_surat }}</td>
                            <td>{{ $data->perihal }}</td>
                            <td class="text-center">

                                @if ($data->surat_pta == '')
                                @else
                                    <a href="public/surat_keluar/{{ $data->surat_pta }}" class="text-blue"><i
                                            class="fa fa-file-pdf-o"></i></i></a>
                                @endif

                            </td>
                            {{-- <td class="text-start">

                        @if ($data->lampiran == '')
                        -
                        @else
                        <a href="public/lampiran_surat_keluar/{{$data->lampiran}}" class="text-blue"><i class="fa fa-file-pdf-o"></i></i></a>
                        @endif

                    </td> --}}
                            <td class="text-center">

                                @if ($data->konsep_surat == '')
                                    -
                                @else
                                    <a href="public/konsep_surat_keluar/{{ $data->konsep_surat }}" class="text-blue"><i
                                            class="fa fa-file-pdf-o"></i></i></a>
                                @endif

                            </td>
                            <td class="text-start">{{ $data->keterangan }}</td>
                            <td class="text-center" style="font-size: 5px;">
                                @if (Auth::user()->level === 1)
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail{{ $data->id }}">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="/suratkeluar/edit/{{ $data->id }}" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                        data-target="#delete{{ $data->id }}">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                @elseif(Auth::user()->level === 2)
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail{{ $data->id }}">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="/suratkeluar/edit/{{ $data->id }}" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                @elseif(Auth::user()->level === 3)
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail{{ $data->id }}">
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
    @foreach ($suratkeluar as $data)
        <!-- Modal Detail -->
        <div class="modal fade" id="detail{{ $data->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 colspan="2" class="text-white text-center bg-success">Detail Surat Masuk</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-small-font table-bordered table-hover">
                            <tr class="text-start border">
                                <td style="width: 200px;">Nomor Surat</td>
                                <td>{{ $data->no_surat }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Surat</td>
                                <td>{{ date('d-m-Y', strtotime($data->tgl_surat)) }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tujuan Surat</td>
                                <td>{{ $data->tujuan_surat }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>Perihal</td>
                                <td>{{ $data->perihal }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>Surat PTA</td>
                                <td>

                                    @if ($data->surat_pta == '')
                                        -
                                    @else
                                        <a href="surat_masuk/{{ $data->surat_pta }}" class="text-blue"><i
                                                class="fa fa-file-pdf-o"></i></i></a>
                                    @endif

                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td>Konsep Surat</td>
                                <td>

                                    @if ($data->konsep_surat == '')
                                        -
                                    @else
                                        <a href="public/konsep_surat_keluar/{{ $data->konsep_surat }}"
                                            class="text-blue"><i class="fa fa-file-pdf-o"></i></i></a>
                                    @endif

                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td>Keterangan</td>

                                @if ($data->keterangan == '')
                                    -
                                @else
                                    {{ $data->keterangan }}
                                @endif
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
        <div class="modal fade" id="delete{{ $data->id }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ $data->no_surat }} perihal {{ $data->perihal }}</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda ingin menghapus data ini?&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="/suratkeluar/delete/{{ $data->id }}" type="button"
                            class="btn btn-xs btn-danger">Ya</a>
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
