@extends('layouts.v_template')

@section('content')
    @include('layouts.v_deskripsi')
    <!-- Table exporting -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Data Register Kasasi</h3>

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
                    <a href="/reg_kasasi/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                @elseif(Auth::user()->level === 2)
                    <a href="/reg_kasasi/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
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
                        <th class="text-center" style="width: 30px;">No</th>
                        <th class="text-center" style="width: 70px;">Satker</th>
                        {{-- <th class="text-center" style="width: 80px;">Masuk</th> --}}
                        <th class="text-center" style="width: 100px;">Tanggal Reg</th>
                        <th class="text-center" style="width: 110px;">No. Reg Kasasi</th>
                        <!-- <th class="text-center" style="width: 100px;">Pemohon</th>
                        <th class="text-center" style="width: 100px;">Termohon</th> -->
                        <th class="text-center" style="width: 140px;">No. Banding</th>
                        {{-- <th class="text-center" style="width: 80px;">Putus Banding</th> --}}
                        <!-- <th class="text-center" style="width: 70px;">No. PA</th>
                        <th class="text-center" style="width: 60px;">Putus PA</th> -->
                        <th class="text-center" style="width: 80px;">No. Box</th>

                        <th class="text-center" style="width: 100px;">Putus Kasasi</th>
                        <th class="text-center" style="width: 50px;">Lama Proses</th>
                        <th class="text-center" style="width: 80px;">Keterangan</th>
                        <th class="text-center" style="width: 100px;">Action</th>
                    </tr>
                </thead>

                <tfoot class="bg-gray">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Satker</th>
                        {{-- <th class="text-center">Masuk</th> --}}
                        <th class="text-center">Tanggal Reg</th>
                        <th class="text-center">No. Reg Kasasi</th>
                        <!-- <th class="text-center">Pemohon</th>
                        <th class="text-center">Termohon</th> -->
                        <th class="text-center">No. Banding</th>
                        {{-- <th class="text-center">Putus Banding</th> --}}
                        <!-- <th class="text-center">No. PA</th>
                        <th class="text-center">Putus PA</th> -->
                        <th class="text-center">No. Box</th>
                        <th class="text-center">Putus Kasasi</th>
                        <th class="text-center">Lama Proses</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Action</th>
                    </tr>
                </tfoot>

                <tbody>
                    @foreach ($reg_kasasi as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $data->pa_pengaju }}</td>
                            <td class="text-center">
                                @if ($data->tgl_register == '')
                                    <span class="badge badge-danger">Data Not Available</span>
                                @elseif($data->tgl_register == '0000-00-00')
                                    <span class="badge badge-danger">Data Not Available</span>
                                @else
                                    {{ date('d-m-Y', strtotime($data->tgl_register)) }}
                                @endif
                            </td>
                            <td>{{ $data->no_kasasi }}</td>
                            <td class="text-start">{{ $data->no_banding }}</td>

                            <td class="text-center">
                                @if ($data->no_box == '')
                                    <span class="badge badge-orange">Belum diinput</button>
                                    @elseif($data->no_box == '0000-00-00')
                                        <span class="badge badge-orange">Belum diinput</button>
                                        @else
                                            <span class="badge badge-success">{{ $data->no_box }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($data->tgl_put_kasasi == '0000-00-00')
                                    <span class="badge badge-warning">Proses</span>
                                @elseif($data->tgl_put_kasasi == '')
                                    <span class="badge badge-warning">Proses</span>
                                @else
                                    {{ date('d-m-Y', strtotime($data->tgl_put_kasasi)) }}
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($data->tgl_put_kasasi == '0000-00-00')
                                    <span
                                        class="badge badge-danger">{{ Carbon\Carbon::parse($data->tgl_register)->diffIndays($sekarang) }}
                                        Hari</span>
                                @elseif($data->tgl_put_kasasi == '')
                                    <span
                                        class="badge badge-danger">{{ Carbon\Carbon::parse($data->tgl_register)->diffIndays($sekarang) }}
                                        Hari</span>
                                @else
                                    <span class="badge badge-success">
                                        {{ Carbon\Carbon::parse($data->tgl_register)->diffIndays($data->tgl_put_kasasi) }}
                                        Hari</span>
                                @endif
                            </td>
                            <td>{{ $data->keterangan }}</td>
                            <td class="text-center">
                                @if (Auth::user()->level === 1)
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail{{ $data->id }}">
                                        <i class="fa fa-eye"></i></a>
                                    </button>
                                    <a href="/reg_kasasi/edit/{{ $data->id }}" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                        data-target="#delete{{ $data->id }}">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                @elseif(Auth::user()->level === 2)
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail{{ $data->id }}">
                                        <i class="fa fa-eye"></i></a>
                                    </button>
                                    <a href="/reg_kasasi/edit/{{ $data->id }}" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                @elseif(Auth::user()->level === 3)
                                    <a href="/reg_kasasi/detail/{{ $data->id }}" class="btn btn-purple btn-xs">
                                        <i class="fa fa-eye"></i></a>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    @foreach ($reg_kasasi as $data)
        <!-- Modal Detail -->
        <div class="modal fade" id="detail{{ $data->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 colspan="2" class="text-white text-center bg-success">Detail Register Kasasi</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-small-font table-bordered table-hover">
                            <tr class="text-start border">
                                <td style="width: 200px;">Pengadilan Agama Pengaju</td>
                                <td>{{ $data->pa_pengaju }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Masuk</td>
                                <td>
                                    @if ($data->tgl_masuk == '0000-00-00')
                                    @elseif($data->tgl_masuk == '')
                                    @else
                                        {{ date('d-m-Y', strtotime($data->tgl_masuk)) }}
                                    @endif
                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Register</td>
                                <td>
                                    @if ($data->tgl_register == '0000-00-00')
                                        <span class="badge badge-success">Data Not Available</span>
                                    @elseif($data->tgl_register == '')
                                        <span class="badge badge-success"">Data Not Available</span>
                                    @else
                                        {{ date('d-m-Y', strtotime($data->tgl_register)) }}
                                    @endif
                                </td>
                            </tr>
                            <tr class=" text-start border">
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
                                <td>Nomor PA</td>
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
                                <td>Nomor Kasasi</td>
                                <td>{{ $data->no_kasasi }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>Pemohon</td>
                                <td>{{ $data->pemohon_kasasi }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>Termohon</td>
                                <td>{{ $data->termohon_kasasi }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal Putus Kasasi</td>
                                <td class="text-start">
                                    @if ($data->tgl_put_kasasi == '0000-00-00')
                                        <span class="badge badge-warning"">Proses</button>
                                        @elseif($data->tgl_put_kasasi == '')
                                            <span class=" badge badge-warning"">Proses</span>
                                        @else
                                            {{ date('d-m-Y', strtotime($data->tgl_put_kasasi)) }}
                                    @endif
                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td>Nomor Box</td>
                                <td>
                                    @if ($data->no_box == '')
                                        <span class="badge badge-success">Belum diinput</span>
                                    @elseif($data->no_box == '0000-00-00')
                                        <span class="badge badge-success">Belum diinput</span>
                                    @else
                                        <span class="badge badge-success">{{ $data->no_box }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr class="text-start border">
                                <td>Status Keterangan</td>
                                <td>{{ $data->keterangan }}</td>
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
                        <h6 class="modal-title">{{ $data->no_kasasi }} Jo. {{ $data->no_banding }} </h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="/reg_kasasi/delete/{{ $data->id }}" type="button"
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
