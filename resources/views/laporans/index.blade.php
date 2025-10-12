@extends('layouts.v_template')

@section('content')
    @include('layouts.v_deskripsi')
    <!-- Basic Setup -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Data Laporan</h3>

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
                    <a href="{{ route('laporans.create') }}" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                    <a href="/laporan" class="btn btn-sm btn-danger mb-2">Kembali</a>
                @elseif(Auth::user()->level === 2)
                    <a href="{{ route('laporans.create') }}" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                    <a href="/laporan" class="btn btn-sm btn-danger mb-2">Kembali</a>
                @elseif(Auth::user()->level === 3)
                @endif
            </td>

            @if (session('pesan'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses!',
                            text: '{{ session('pesan') }}',
                            timer: 3000,
                            showConfirmButton: true,
                            confirmButtonText: 'OK',
                            timerProgressBar: true
                        });
                    });
                </script>
            @endif
            <table class="table table-sm table-hover" id="example-4">
                <thead class="bg-gray text-center">
                    <tr>
                        <th style="width: 20px;">No</th>
                        <th style="width: 60px;">Jenis Laporan</th>
                        <th style="width: 30px;">Tahun</th>
                        <th style="width: 50px;">Tanggal</th>
                        <th style="width: 200px;">Judul</th>
                        <th style="width: 30px;">Dokumen</th>
                        <th style="width: 30px;">Konsep</th>
                        <th style="width: 60px;">Action</th>
                    </tr>
                </thead>

                <tfoot class="bg-gray text-center">
                    <tr>
                        <th>No</th>
                        <th>Jenis Laporan</th>
                        <th>Tahun</th>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Dokumen</th>
                        <th>Konsep</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($laporans as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-start">{{ $data->jenis_laporan }}</td>
                            <td class="text-center">{{ $data->tahun }}</td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_laporan)) }}</td>
                            <td>{{ $data->judul }}</td>

                            <td class="text-center">

                                @if ($data->dokumen == '')
                                @else
                                    <a href="public/storage/laporans/dokumen/{{ $data->dokumen }}" class="text-blue"><i
                                            class="fa fa-file-pdf-o"></i></i></a>
                                @endif

                            </td>
                            <td class="text-center">

                                @if ($data->konsep == '')
                                @else
                                    <a href="public/storage/laporans/konsep/{{ $data->konsep }}" class="text-blue"><i
                                            class="fa fa-file-pdf-o"></i></i></a>
                                @endif

                            </td>
                            <td class="text-center" style="font-size: 5px;">
                                @if (Auth::user()->level === 1)
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail{{ $data->id }}"
                                        style="padding: 2px 5px; font-size: 8px; margin: 1px;">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="{{ route('laporans.edit', $data->id) }}" class="btn btn-warning btn-xs"
                                        style="padding: 2px 5px; font-size: 8px; margin: 1px;">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form id="deleteForm" action="{{ route('laporans.destroy', $data->id) }}"
                                        method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete()" class="btn btn-danger btn-xs"
                                            style="padding: 2px 5px; font-size: 8px; margin: 1px;">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                @elseif(Auth::user()->level === 2)
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail{{ $data->id }}"
                                        style="padding: 2px 5px; font-size: 8px; margin: 1px;">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="{{ route('laporans.edit', $data->id) }}" class="btn btn-warning btn-xs"
                                        style="padding: 2px 5px; font-size: 8px; margin: 1px;">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                @elseif(Auth::user()->level === 3)
                                    <button type="button" class="btn btn-purple btn-xs" data-toggle="modal"
                                        data-target="#detail{{ $data->id }}"
                                        style="padding: 2px 5px; font-size: 8px; margin: 1px;">
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
    @foreach ($laporans as $data)
        <!-- Modal Detail -->
        <div class="modal fade" id="detail{{ $data->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 colspan="2" class="text-white text-center bg-success">Detail Laporan</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-small-font table-bordered table-hover">
                            <tr class="text-start border">
                                <td style="width: 200px;">Jenis Peraturan</td>
                                <td>{{ $data->jenis_laporan }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>Tanggal</td>
                                <td>{{ date('d-m-Y', strtotime($data->tgl_laporan)) }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>judul</td>
                                <td>{{ $data->judul }}</td>
                            </tr>
                            <tr class="text-start border">
                                <td>Dokumen</td>
                                <td>

                                    @if ($data->dokumen == '')
                                    @else
                                        <a href="public/laporans/{{ $data->dokumen }}" class="text-blue" target="_blank"><i
                                                class="fa fa-file-pdf-o"></i></i></a>
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
    @endforeach
@endsection
