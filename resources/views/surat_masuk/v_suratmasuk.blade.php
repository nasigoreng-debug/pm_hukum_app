@extends('layouts.v_template')

@section('content')
@include('layouts.v_deskripsi')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Data Surat Masuk</h3>

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
                        sSwfPath: "{{ asset('public/template')}}/assets/js/datatables/tabletools/copy_csv_xls_pdf.swf"
                    }
                });
            });
        </script>
        

        <div class="text-center">
            <form method="GET" action="/search-date-range-surat-masuk">
                <input type="date" name="start_date" required>
                s.d
                <input type="date" name="end_date" required>
                <button type="submit" class="btn btn-sm btn-primary">Tampilkan</button>
                <a href="/suratmasuk" class="btn btn-sm btn-danger"><i class="fa fa-repeat"></i></a>
            </form>
        </div>

        <td class="text-center" style="font-size: 5px;">
            @if(Auth::user()->level===1)
            <a href="/suratmasuk/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
            <a href="/suratmasuk_total" class="btn btn-sm btn-success mb-2">All Data</a>
            <a href="/suratmasuk" class="btn btn-sm btn-danger mb-2">Kembali</a>
            @elseif(Auth::user()->level===2)
            <a href="/suratmasuk/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
            <a href="/suratmasuk_total" class="btn btn-sm btn-success mb-2">All Data</a>
            <a href="/suratmasuk" class="btn btn-sm btn-success mb-2">Kembali</a>
            @elseif(Auth::user()->level===3)

            @endif
        </td>

        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('pesan') }}
        </div>
        @endif
        <table class="table table-sm table-hover" id="example-4">
            <thead>
                <tr class="replace-inputs bg-gray">
                    <th style="width: 30px;">No</th>
                    {{-- <th style="width: 80px;">Masuk</th> --}}
                    <!-- <th style="width: 100px;">Masuk Kesekretariatan</th> -->
                    <th style="width: 50px;">Index</th>
                    <th style="width: 50px;">Asal</th>
                    <th style="width: 150px;">Nomor</th>
                    <th style="width: 50px;">Tanggal</th>
                    <th style="width: 200px;">Perihal</th>
                    <th style="width: 20px;">Lampiran</th>
                    {{-- <th style="width: 100px;">Disposisi</th> --}}
                    <!-- <th style="width: 70px;">Keterangan</th> -->
                    <th class="text-center" style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr class="bg-gray">
                    <th>No</th>
                    {{-- <th>Masuk</th> --}}
                    <!-- <th>Masuk Kesekretariatan</th> -->
                    <th>Index</th>
                    <th>Asal</th>
                    <th>Nomor</th>
                    <th>Tanggal</th>
                    <th>Perihal</th>
                    <th>Lampiran</th>
                    {{-- <th>Disposisi</th> --}}
                    <!-- <th>Keterangan</th> -->
                    <th class="text-center">Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($suratmasuk as $data)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    {{-- <td class="text-start">{{ date('d-m-Y', strtotime($data->tgl_masuk_pan)) }}</td> --}}
                    <!-- <td class="text-start">{{ date('d-m-Y', strtotime($data->tgl_masuk_umum)) }}</td> -->
                    <td class="text-start">{{ $data->no_indeks }}</td>
                    <td class="text-start">{{ $data->asal_surat }}</td>
                    <td class="text-start">{{ $data->no_surat }}</td>
                    <td class="text-start">{{ date('d-m-Y', strtotime($data->tgl_surat)) }}</td>
                    <td class="text-start">{{ $data->perihal }}</td>

                    <td class="text-start">

                        @if($data->lampiran=="")
                            <span class="badge badge-red">Belum upload</button>
                        @else
                            <a href="public/surat_masuk/{{$data->lampiran}}" class="text-blue"><i class="fa fa-file-pdf-o"></i></i></a>
                        @endif

                    </td>
                    {{-- <td>{{ $data->disposisi }}</td> --}}
                    <!-- <td>{{ $data->keterangan }}</td> -->
                    <td class="text-center" style="font-size: 5px;">
                        @if(Auth::user()->level===1)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_suratmasuk }}">
                            <i class="fa fa-eye"></i>
                        </button>
                        <a href="/suratmasuk/edit/{{$data->id_suratmasuk}}" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $data->id_suratmasuk }}">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        @elseif(Auth::user()->level===2)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_suratmasuk }}">
                            <i class="fa fa-eye"></i>
                        </button>
                        <a href="/suratmasuk/edit/{{$data->id_suratmasuk}}" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        @elseif(Auth::user()->level===3)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_suratmasuk }}">
                            <i class="fa fa-eye"></i>
                        </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div @foreach ($suratmasuk as $data) <!-- Modal Detail -->
<div class="modal fade" id="detail{{ $data->id_suratmasuk }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 colspan="2" class="text-white text-center bg-success">Detail Surat Masuk</h4>
            </div>
            <div class="modal-body">
                <table class="table table-small-font table-bordered table-hover">
                    <tr class="text-start border">
                        <td style="width: 200px;">Tanggal Masuk Kepaniteraan</td>
                        <td>{{ date('d-m-Y', strtotime($data->tgl_masuk_pan)) }}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Tanggal Masuk Kesekretariatan</td>
                        <td>{{ date('d-m-Y', strtotime($data->tgl_masuk_umum)) }}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nomor Indeks</td>
                        <td>{{$data->no_indeks}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Asal Surat</td>
                        <td>{{$data->asal_surat}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nomor Surat</td>
                        <td>{{$data->no_surat}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Tanggal Surat</td>
                        <td>{{ date('d-m-Y', strtotime($data->tgl_surat)) }}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Perihal</td>
                        <td>{{$data->perihal}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Lampiran</td>
                        <td class="text-center">

                            @if($data->lampiran=="")
                            @else
                            <a href="surat_masuk/{{$data->lampiran}}" class="text-blue"><i class="fa fa-file-pdf-o"></i></i></a>
                            @endif

                        </td>
                    </tr>
                    <tr class="text-start border">
                        <td>Disposisi</td>
                        <td>{{$data->disposisi}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Keterangan</td>
                        <td>{{$data->keterangan}}</td>
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
<div class="modal fade" id="delete{{ $data->id_suratmasuk }}">
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
                <a href="/suratmasuk/delete/{{$data->id_suratmasuk}}" type="button" class="btn btn-xs btn-danger">Ya</a>
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