@extends('layouts.v_template')

@section('content')
    @include('layouts.v_deskripsi')

    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <h4 class="panel-title"><strong>Progres Penyelesaian Perkara Eksekusi Pengadilan Agama Di Wilayah Pengadilan
                    Tinggi Agama Bandung</strong></h4>

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
                        },
                        pageLength: 25,
                        scrollX: true,
                        autoWidth: false,
                        columnDefs: [{
                                width: "40px",
                                targets: 0
                            },
                            {
                                width: "150px",
                                targets: 1
                            },
                            {
                                width: "80px",
                                targets: 2
                            },
                            {
                                width: "70px",
                                targets: [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                            }
                        ]
                    });
                });
            </script>

            <div class="text-center mb-3">
                @if (in_array(Auth::user()->level, [1, 2]))
                    <a href="/eks" class="btn btn-sm btn-danger">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                @endif
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm" id="example-4"
                    style="font-size: 12px;">
                    <thead class="thead-dark">
                        <tr>
                            <th rowspan="2" class="align-middle text-center" style="width: 40px;">No</th>
                            <th rowspan="2" class="align-middle text-center" style="min-width: 150px;">Pengadilan Agama
                            </th>
                            <th rowspan="2" class="align-middle text-center" style="width: 80px;">Permohonan<br>Eksekusi
                            </th>
                            <th colspan="2" class="text-center bg-info">Jenis Eksekusi</th>
                            <th colspan="5" class="text-center bg-success">Jenis Penyelesaian</th>
                            <th rowspan="2" class="align-middle text-center bg-warning" style="width: 70px;">
                                Total<br>Selesai</th>
                            <th rowspan="2" class="align-middle text-center bg-warning" style="width: 70px;">Sisa</th>
                            <th rowspan="2" class="align-middle text-center bg-warning" style="width: 70px;">Presentase
                            </th>
                            <th rowspan="2" class="align-middle text-center bg-warning" style="width: 70px;">
                                Bobot<br>Nilai</th>
                        </tr>
                        <tr>
                            <th class="text-center bg-info" style="width: 70px;">Eksekusi<br>Putusan</th>
                            <th class="text-center bg-info" style="width: 70px;">Eksekusi<br>Hak Tanggungan</th>
                            <th class="text-center bg-success" style="width: 70px;">Eksekusi<br>Riil</th>
                            <th class="text-center bg-success" style="width: 70px;">Eksekusi<br>Lelang</th>
                            <th class="text-center bg-success" style="width: 70px;">Eksekusi<br>Dicabut</th>
                            <th class="text-center bg-success" style="width: 70px;">Eksekusi<br>Dicoret</th>
                            <th class="text-center bg-success" style="width: 70px;">Eksekusi<br>NE</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Pengadilan Agama</th>
                            <th class="text-center">Permohonan Eksekusi</th>
                            <th class="text-center">Eksekusi Putusan</th>
                            <th class="text-center">Eksekusi Hak Tanggungan</th>
                            <th class="text-center">Eksekusi Riil</th>
                            <th class="text-center">Eksekusi Lelang</th>
                            <th class="text-center">Eksekusi Dicabut</th>
                            <th class="text-center">Eksekusi Dicoret</th>
                            <th class="text-center">Eksekusi NE</th>
                            <th class="text-center">Total Selesai</th>
                            <th class="text-center">Sisa</th>
                            <th class="text-center">Presentase</th>
                            <th class="text-center">Bobot Nilai</th>
                        </tr>
                    </tfoot>

                    <tbody>
                        @foreach ($results as $satker => $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td><strong>{{ ucfirst($satker) }}</strong></td>
                                <td class="text-center">{{ $data['total'] }}</td>
                                <td class="text-center">{{ $data['putusan'] }}</td>
                                <td class="text-center">{{ $data['ht'] }}</td>
                                <td class="text-center">{{ $data['riil'] }}</td>
                                <td class="text-center">{{ $data['lelang'] }}</td>
                                <td class="text-center">{{ $data['dicabut'] }}</td>
                                <td class="text-center">{{ $data['dicoret'] }}</td>
                                <td class="text-center">{{ $data['ne'] }}</td>
                                <td class="text-center"><strong>{{ $data['selesai'] }}</strong></td>
                                <td class="text-center">{{ $data['sisa'] }}</td>
                                <td class="text-center">{{ $data['presentase'] }}</td>
                                <td class="text-center"><strong>{{ $data['bobot_nilai'] }}</strong></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .table th {
            font-size: 11px;
            padding: 8px 5px;
            vertical-align: middle;
        }

        .table td {
            padding: 6px 4px;
            vertical-align: middle;
        }

        .table thead th {
            border-bottom: 2px solid #dee2e6;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, .02);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, .075);
        }
    </style>
@endsection
