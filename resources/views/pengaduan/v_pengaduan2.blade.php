@extends('layouts.v_template')

@section('content')
@include('layouts.v_deskripsi')
<!-- Basic Setup -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Data Pengaduan</h3>

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
        <a href="/pgd/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible mt-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('pesan') }}
        </div>
        @endif
        <table id="example-1" class="table table-small-font table-sm table-striped table-bordered table-hover" cellspacing="0" width="100%">
            <thead class="bg-gray">
                <tr>
                    <th style="width: 20px;">No</th>
                    <th style="width: 80px;">Terima Pengaduan</th>
                    <th style="width: 120px;">Nomor Pengaduan</th>
                    <th style="width: 100px;">Pelapor</th>
                    <th style="width: 100px;">Terlapor</th>
                    <th style="width: 150px;">Uraian Pengaduan</th>
                    <!-- <th style="width: 100px;">Ditangani Oleh</th>
                    <th style="width: 100px;">Dis PM Hukum</th>
                    <th style="width: 120px;">Dis Ketua</th>
                    <th style="width: 120px;">Dis Wakil</th>
                    <th style="width: 80px;">Dis Hatiwasda</th>
                    <th style="width: 60px;">Tindak Lanjut</th> -->
                    <th style="width: 60px;">Status Pengaduan</th>
                    <th style="width: 60px;">Status Berkas</th>
                    <!-- <th style="width: 60px;">Tanggal Selesai</th>
                    <th style="width: 70px;">Tanggal LHP</th> -->
                    <th style="width: 60px;">Surat Pengaduan</th>
                    <th style="width: 60px;">Lampiran</th>
                    <th style="width: 80px;">Action</th>
                </tr>
            </thead>

            <tfoot class="bg-gray">
                <tr>
                    <th>No</th>
                    <th>Terima Pengaduan</th>
                    <th>Nomor Pengaduan</th>
                    <th>Pelapor</th>
                    <th>Terlpaor</th>
                    <th>Uraian Pengaduan</th>
                    <!-- <th>Ditangani Oleh</th>
                    <th>Dis PM Hukum</th>
                    <th>Dis Ketua</th>
                    <th>Dis Wakil</th>
                    <th>Dis Hatiwasda</th>
                    <th>Tindak Lanjut</th> -->
                    <th>Status Pengaduan</th>
                    <th>Status Berkas</th>
                    <!-- <th>Tanggal Selesai</th>
                    <th>Tanggal LHP</th> -->
                    <th>Surat Pengaduan</th>
                    <th>Lampiran</th>
                    <th>Action</th>
                </tr>
            </tfoot>

            <tbody>
                @foreach ($pengaduan as $data)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{ date('d-m-Y', strtotime($data->tgl_terima_pgd)) }}</td>
                    <td class="text-start">{{ $data->no_pgd }}</td>
                    <td class="text-start">{{ $data->pelapor }}</td>
                    <td class="text-start">{{ $data->terlapor }}</td>
                    <td class="text-start">{{ $data->uraian_pgd }}</td>
                    <!-- <td class="text-center">{{ $data->ditangani_oleh }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($data->dis_pm_hk)) }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($data->dis_kpta)) }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($data->dis_wkpta)) }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($data->dis_hatiwasda)) }}</td>
                    <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_tindak_lanjut)) }}</td> -->
                    <td>{{ $data->status_pgd }}</td>
                    <td>{{ $data->status_berkas }}</td>
                    <!-- <td>{{ $data->tgl_selesai_pgd }}</td>
                    <td>{{ $data->tgl_lhp }}</td> -->
                    <td class="text-center">
                        @if($data->surat_pgd=="")

                        @else
                        <a href="surat_pengaduan/{{$data->surat_pgd}}" class="text-blue" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($data->lampiran=="")

                        @else
                        <a href="lampiran_pengaduan/{{$data->lampiran}}" class="text-blue" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                        @endif
                    </td>
                    <td class="text-center">
                        @if(Auth::user()->level===1)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_pgd }}">
                            <i class="fa fa-eye"></i></a>
                        </button>
                        <a href="/pgd/edit/{{$data->id_pgd}}" class="btn btn-warning btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $data->id_pgd }}">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        @elseif(Auth::user()->level===2)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_pgd }}">
                            <i class="fa fa-eye"></i></a>
                        </button>
                        <a href="/pgd/edit/{{$data->id_pgd}}" class="btn btn-warning">
                            <i class="fa fa-edit"></i>
                        </a>
                        @elseif(Auth::user()->level===3)
                        <button type="button" class="btn btn-purple btn-xs" data-toggle="modal" data-target="#detail{{ $data->id_pgd }}">
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
@foreach ($pengaduan as $data)

<!-- Modal Detail -->
<div class="modal fade" id="detail{{ $data->id_pgd }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 colspan="2" class="text-white text-center bg-success">Detail Pengaduan</h4>
            </div>
            <div class="modal-body">
                <table class="table table-small-font table-bordered table-hover">
                    <tr class="text-start border">
                        <td style="width: 200px;">Terima Pengaduan</td>
                        <td>{{ date('d-m-Y', strtotime($data->tgl_terima_pgd)) }}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Nomor Pengaduan</td>
                        <td>{{$data->no_pgd}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Pelapor</td>
                        <td>{{$data->pelapor}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Terlapor</td>
                        <td>{{$data->terlapor}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td> Uraian Pengaduan</td>
                        <td>{{$data->uraian_pgd}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td> Ditangani Oleh</td>
                        <td>{{$data->ditangani_oleh}}</td>
                    <tr class="text-start border">
                        <td>Dis Ketua</td>
                        <td>
                            @if($data->dis_kpta=="0000-00-00")

                            @else
                            {{ date('d-m-Y', strtotime($data->dis_kpta)) }}
                            @endif
                        </td>
                    </tr>
                    <tr class="text-start border">
                        <td> Dis Wakil</td>
                        <td>
                            @if($data->dis_wkpta=="0000-00-00")

                            @else
                            {{ date('d-m-Y', strtotime($data->dis_wkpta)) }}
                            @endif
                        </td>
                    </tr>
                    <tr class="text-start border">
                        <td>Dis Hatiwasda</td>
                        <td>
                            @if($data->dis_hatiwasda=="0000-00-00")

                            @else
                            {{ date('d-m-Y', strtotime($data->dis_hatiwasda)) }}
                            @endif
                        </td>
                    </tr>
                    <tr class="text-start border">
                        <td>Tindak Lanjut</td>
                        <td>
                            @if($data->tgl_tindak_lanjut=="0000-00-00")

                            @else
                            {{ date('d-m-Y', strtotime($data->tgl_tindak_lanjut)) }}
                            @endif
                        </td>
                    </tr>
                    <tr class="text-start border">
                        <td>Status Pengaduan</td>
                        <td>{{$data->status_pgd}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Status Berkas</td>
                        <td>{{$data->status_berkas}}</td>
                    </tr>
                    <tr class="text-start border">
                        <td>Tanggal Selesai</td>
                        <td>
                            @if($data->tgl_selesai_pgd=="0000-00-00")
                            @else
                            {{ date('d-m-Y', strtotime($data->tgl_selesai_pgd)) }}
                            @endif
                        </td>
                    </tr>
                    <tr class="text-start border">
                        <td> Tanggal LHP</td>
                        <td>
                            @if($data->tgl_lhp=="0000-00-00")
                            @else
                            {{ date('d-m-Y', strtotime($data->tgl_lhp)) }}
                            @endif
                        </td>
                    </tr>
                    <tr class="text-start border">
                        <td> Surat Pengaduan</td>
                        <td>
                            @if($data->surat_pgd=="")

                            @else
                            <a href="surat_pengaduan/{{$data->surat_pgd}}" class="text-blue" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-start border">
                        <td> Lampiran</td>
                        <td>
                            @if($data->lampiran=="")

                            @else
                            <a href="lampiran_pengaduan/{{$data->lampiran}}" class="text-blue" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
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
<div class="modal fade" id="delete{{ $data->id_pgd }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">{{ $data->no_pgd }} Perihal {{ $data->uraian_pgd }} </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <a href="/pgd/delete/{{$data->id_pgd}}" type="button" class="btn btn-sm btn-danger">Ya</a>
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