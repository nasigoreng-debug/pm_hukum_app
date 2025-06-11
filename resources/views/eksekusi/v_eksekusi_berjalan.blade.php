@extends('layouts.v_template')

@section('content')
@include('layouts.v_deskripsi')
<!-- Table exporting -->
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Perkara Eksekusi Belum Selesai</h3>

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

    <!-- <script type="text/javascript">
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
    </script> -->
    <script type="text/javascript">
            jQuery(document).ready(function($) {
                $("#example-3").dataTable().yadcf([{
                        column_number: 1,
                    },
                    {
                        column_number: 2,
                        filter_type: 'text'
                    },
                    {
                        column_number: 3,
                        filter_type: 'text'
                    },
                    {
                        column_number: 4,
                        filter_type: 'text'
                    },
                    {
                        column_number: 5,
                    },
                    {
                        column_number: 6,
                        filter_type: 'text'
                    },
                    {
                        column_number: 7,
                        filter_type: 'text'
                    },
                    {
                        column_number: 8,
                        filter_type: 'text'
                    },
                ]);
            });
        </script>
    <td class="text-center" style="font-size: 5px;">
      @if(Auth::user()->level===1)
      <a href="/eks/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
      <a href="/eks" class="btn btn-sm btn-danger mb-2">Kembali</a>
      @elseif(Auth::user()->level===2)
      <a href="/eks/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
      <a href="/eks" class="btn btn-sm btn-danger mb-2">Kembali</a>
      @elseif(Auth::user()->level===3)

      @endif
    </td>

    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible mt-2">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ session('pesan') }}
    </div>
    @endif
    <table class="table table-bordered table-striped" id="example-3">
      <thead class="bg-gray">
        <tr>
          <th style="width: 20px;">No</th>
          <th style="width: 100px;">Satua Kerja</th>
          <th style="width: 140px;">Nomor Perkara Eksekusi</th>
          <th style="width: 135px;">Juncto</th>
          <th style="width: 100px;">Tanggal Permohonan</th>
          <th style="width: 100px;">Proses Terakhir</th>
          <th style="width: 100px;">Tanggal Pelaksanaan</th>
          <th style="width: 100px;">Tanggal Selesai</th>
          <th style="width: 100px;">Keterangan</th>
          <th style="width: 100px;">Lama</th>
          <th style="width: 50px;">Action</th>

        </tr>
      </thead>

      <tfoot class="bg-gray">
        <tr>
          <th>No</th>
          <th>Satua Kerja</th>
          <th>Nomor Perkara Eksekusi</th>
          <th>Juncto</th>
          <th>Tanggal Permohonan</th>
          <th>Proses Terakhir</th>
          <th>Tanggal Pelaksanaan</th>
          <th>Tanggal Selesai </th>
          <th>Keterangan</th>
          <th>Lama</th>
          <th>Action</th>
        </tr>
      </tfoot>

      <tbody>
        @foreach ($eksekusi as $data)
        <tr>
          <td class="text-center">{{$loop->iteration}}</td>
          <td>{{ $data->satker }}</td>
          <td>{{ $data->no_eksekusi }}</td>
          <td>{{ $data->no_put }}</td>
          <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_permohonan)) }}</td>
          <td>{{ $data->proses_terakhir }}</td>
          <td class="text-center">
            @if($data->tgl_eks=="0000-00-00")

            @elseif($data->tgl_eks=="")

            @else
            {{ date('d-m-Y', strtotime($data->tgl_eks)) }}
            @endif
          </td>
          <td class="text-center">
            @if($data->tgl_selesai=="0000-00-00")

            @elseif($data->tgl_selesai=="")

            @else
            {{ date('d-m-Y', strtotime($data->tgl_selesai)) }}
            @endif
          </td>
          <td>{{ $data->keterangan }}</td>
          <td class="text-center">
                        @if($data->tgl_selesai=="0000-00-00")
                        <span class="badge badge-danger">{{Carbon\Carbon::parse($data->tgl_permohonan	)->diffIndays($sekarang)}} Hari</span>
                        @elseif($data->tgl_selesai=="")
                        <span class="badge badge-danger">{{Carbon\Carbon::parse($data->tgl_permohonan	)->diffIndays($sekarang)}} Hari</span>
                        @else
                        <span class="badge badge-success"> {{Carbon\Carbon::parse($data->tgl_permohonan	)->diffIndays($data->tgl_selesai)}} Hari</span>
                        @endif
                    </td>
          <td class="text-center" style="font-size: 5px;">
            @if(Auth::user()->level===1)
            <a href="/eks/edit/{{$data->id_eks}}" class="btn btn-warning btn-xs">
              <i class="fa fa-edit"></i>
            </a>
            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete{{ $data->id_eks }}">
              <i class="fa fa-trash-o"></i>
            </button>
            @elseif(Auth::user()->level===2)
            <a href="/eks/edit/{{$data->id_eks}}" class="btn btn-warning btn-xs">
              <i class="fa fa-edit"></i>
            </a>
            @elseif(Auth::user()->level===3)

            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
@foreach ($eksekusi as $data)
<div class="modal fade" id="delete{{ $data->id_eks }}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">{{ $data->no_eksekusi }} </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
      </div>
      <div class="modal-footer justify-content-between">
        <a href="/eks/delete/{{$data->id_eks}}" type="button" class="btn btn-sm btn-danger">Ya</a>
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