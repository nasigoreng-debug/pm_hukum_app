@extends('layouts.v_template')

@section('content')
@include('layouts.v_deskripsi')
<!-- Table exporting -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Data Register Upaya Hukum</h3>

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
            <a href="/uphukum/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
            @elseif(Auth::user()->level===2)
            <a href="/uphukum/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
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
                    <th style="width: 20px;">No</th>
                    <th style="width: 70px;">Satker</th>
                    <th style="width: 80px;">Masuk</th>
                    <th style="width: 80px;">Register</th>
                    <th style="width: 100px;">No. Upaya Hukum</th>
                    <!-- <th style="width: 100px;">Pemohon</th>
                    <th style="width: 100px;">Termohon</th> -->
                    <th style="width: 140px;">No. Banding</th>
                    <th style="width: 80px;">Putus Banding</th>
                    <!-- <th style="width: 70px;">No. PA</th>
                    <th style="width: 60px;">Putus PA</th> -->
                    <th style="width: 50px;">Box</th>

                    <th style="width: 100px;">Putus Upaya Hukum</th>
                    <!-- <th style="width: 50px;">Lama Proses</th> -->
                    <th style="width: 100px;">Keterangan</th>
                    <th style="width: 100px;">Action</th>
                </tr>
            </thead>

            <tfoot class="bg-gray">
                <tr>
                    <th>No</th>
                    <th>Satker</th>
                    <th>Masuk</th>
                    <th>Register</th>
                    <th>No. Upaya Hukum</th>
                    <!-- <th>Pemohon</th>
                    <th>Termohon</th> -->
                    <th>No. Banding</th>
                    <th>Putus Banding</th>
                    <!-- <th>No. PA</th>
                    <th>Putus PA</th> -->
                    <th>Box</th>
                    <th>Upaya Hukum</th>
                    <!-- <th>Lama Proses</th> -->
                    <td>Keterangan</td>
                    <th>Action</th>
                </tr>
            </tfoot>

            <tbody>
                @foreach ($uphukum as $data)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{ $data->pa_pengaju }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_masuk)) }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_register)) }}</td>
                    <td>{{ $data->no_upy_hk }}</td>
                    <!-- <td>{{ $data->pemohon_upy }}</td>
                    <td>{{ $data->termohon_upy }}</td> -->
                    <td class="text-center">{{ $data->no_banding }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_put_banding)) }}</td>
                    <!-- <td class="text-center">{{ $data->no_pa }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_put_pa)) }}</td> -->
                    <td class="text-center">{{ $data->no_box }}</td>
                    <td class="text-center">
                        @if($data->tgl_put_upy=="0000-00-00")

                        @elseif($data->tgl_put_upy=="")

                        @else
                        {{ date('d-m-Y', strtotime($data->tgl_put_upy)) }}
                        @endif
                    </td>
                    <!-- <td class="text-center"> {{ number_format($data->selisih, 0, ",", ".")}} </td> -->
                    <td>{{ $data->keterangan }}</td>
                    <td class="text-center">
                        @if(Auth::user()->level===1)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_uphukum }}">
                            <i class="fa fa-eye"></i></a>
                        </button>
                        <a href="/uphukum/edit/{{$data->id_uphukum}}" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $data->id_uphukum }}">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        @elseif(Auth::user()->level===2)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_uphukum }}">
                            <i class="fa fa-eye"></i></a>
                        </button>
                        <a href="/uphukum/edit/{{$data->id_uphukum}}" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        @elseif(Auth::user()->level===3)
                        <a href="/uphukum/detail/{{$data->id_uphukum}}" class="btn btn-purple btn-xs">
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
@foreach ($uphukum as $data)

<!-- Modal Detail -->
<div class="modal fade" id="detail{{ $data->id_uphukum }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 colspan="2" class="text-white text-center bg-success">Detail Putusan uphukum</h4>
            </div>
            <div class="modal-body">
                <table class="table table-small-font table-bordered table-hover">
                    <tr class="text-start border">
                        <td style="width: 200px;">Pengadilan Agama Pengaju</td>
                        <td>{{$data->pa_pengaju}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Tanggal Masuk</td>
                        <td>
                            @if($data->tgl_masuk=="0000-00-00")

                            @elseif($data->tgl_masuk=="")

                            @else
                            {{ date('d-m-Y', strtotime($data->tgl_masuk)) }}
                            @endif
                        </td>
                    </tr>
                    <tr class="text-start border">
                        <td>Tanggal Register</td>
                        <td>
                            @if($data->tgl_register=="0000-00-00")

                            @elseif($data->tgl_register=="")

                            @else
                            {{ date('d-m-Y', strtotime($data->tgl_register)) }}
                            @endif
                        </td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nomor Perkara Banding</td>
                        <td>{{$data->no_banding}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Ranggal Putus Banding</td>
                        <td>{{$data->tgl_put_banding}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nomor PA</td>
                        <td>{{$data->no_pa}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Tanggal Putus PA</td>
                        <td>
                            @if($data->tgl_put_pa=="0000-00-00")

                            @elseif($data->tgl_put_pa=="")

                            @else
                            {{ date('d-m-Y', strtotime($data->tgl_put_pa)) }}
                            @endif
                        </td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nomor Upaya Hukum</td>
                        <td>{{$data->no_upy_hk}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Pemohon</td>
                        <td>{{$data->pemohon_upy}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Termohon</td>
                        <td>{{$data->termohon_upy}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Tanggal Putus Upaya Hukum</td>
                        <td>
                            @if($data->tgl_put_upy=="0000-00-00")

                            @elseif($data->tgl_put_upy=="")

                            @else
                            {{ date('d-m-Y', strtotime($data->tgl_put_upy)) }}
                            @endif
                        </td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nomor Box</td>
                        <td>{{$data->no_box}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Status Keterangan</td>
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
<div class="modal fade" id="delete{{ $data->id_uphukum }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">{{ $data->no_upy_hk }} Jo. {{ $data->no_banding }} </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <a href="/uphukum/delete/{{$data->id_uphukum}}" type="button" class="btn btn-sm btn-danger">Ya</a>
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