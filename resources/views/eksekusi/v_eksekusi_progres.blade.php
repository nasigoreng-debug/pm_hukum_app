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

            <!-- FORM FILTER TANGGAL -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="card-title mb-0" style="font-size: 14px;">
                                <i class="fa fa-filter"></i> Filter Berdasarkan Tanggal Permohonan
                            </h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('progres_eks') }}" method="GET" class="form-inline">
                                <div class="form-group mr-3 mb-2">
                                    <label for="start_date" class="mr-2"><strong>Dari Tanggal:</strong></label>
                                    <input type="date" class="form-control form-control-sm" id="start_date"
                                        name="start_date" value="{{ $startDate }}" required>
                                </div>
                                <div class="form-group mr-3 mb-2">
                                    <label for="end_date" class="mr-2"><strong>Sampai Tanggal:</strong></label>
                                    <input type="date" class="form-control form-control-sm" id="end_date"
                                        name="end_date" value="{{ $endDate }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm mr-2 mb-2">
                                    <i class="fa fa-search"></i> Tampilkan Data
                                </button>
                                <a href="{{ route('progres_eks') }}" class="btn btn-warning btn-sm mr-2 mb-2">
                                    <i class="fa fa-refresh"></i> Reset Filter
                                </a>

                                @if (in_array(Auth::user()->level, [1, 2]))
                                    <a href="/eks" class="btn btn-danger btn-sm mb-2">
                                        <i class="fa fa-arrow-left"></i> Kembali
                                    </a>
                                @endif
                            </form>

                            @if (request()->has('start_date'))
                                <div class="mt-2">
                                    <small class="text-info">
                                        <i class="fa fa-info-circle"></i>
                                        Menampilkan data permohonan eksekusi dari
                                        <strong>{{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }}</strong>
                                        sampai <strong>{{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}</strong>
                                        | Total Data: <strong>{{ $eksekusi_total }}</strong>
                                    </small>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    // Inisialisasi DataTable
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
                        ],
                        language: {
                            search: "Cari:",
                            lengthMenu: "Tampilkan _MENU_ data per halaman",
                            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                            infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                            infoFiltered: "(disaring dari _MAX_ total data)",
                            paginate: {
                                first: "Pertama",
                                last: "Terakhir",
                                next: "Berikutnya",
                                previous: "Sebelumnya"
                            }
                        }
                    });

                    // Validasi tanggal
                    $('#start_date').change(function() {
                        var startDate = $(this).val();
                        $('#end_date').attr('min', startDate);

                        // Jika end_date < start_date, reset end_date
                        if ($('#end_date').val() < startDate) {
                            $('#end_date').val(startDate);
                        }
                    });

                    $('#end_date').change(function() {
                        var endDate = $(this).val();
                        $('#start_date').attr('max', endDate);
                    });

                    // Set min/max awal
                    var today = new Date().toISOString().split('T')[0];
                    $('#start_date').attr('max', today);
                    $('#end_date').attr('max', today);

                    // Set min untuk end_date berdasarkan start_date awal
                    @if (request()->has('start_date'))
                        $('#end_date').attr('min', '{{ $startDate }}');
                    @endif
                });
            </script>

            <!-- TABEL DATA -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm" id=""
                    style="font-size: 12px;">
                    <thead class="thead-dark">
                        <tr>
                            <th rowspan="2" class="align-middle text-center">No</th>
                            <th rowspan="2" class="align-middle text-center">Pengadilan Agama</th>
                            <th rowspan="2" class="align-middle text-center">Permohonan<br>Eksekusi</th>
                            <th colspan="2" class="text-center bg-info">Jenis Eksekusi</th>
                            <th colspan="5" class="text-center bg-success">Jenis Penyelesaian</th>
                            <th rowspan="2" class="align-middle text-center bg-warning">Total<br>Selesai</th>
                            <th rowspan="2" class="align-middle text-center bg-warning">Sisa</th>
                            <th rowspan="2" class="align-middle text-center bg-warning">Presentase</th>
                            <th rowspan="2" class="align-middle text-center bg-warning">Bobot<br>Nilai</th>
                        </tr>
                        <tr>
                            <th class="text-center bg-info">Eksekusi<br>Putusan</th>
                            <th class="text-center bg-info">Eksekusi<br>Hak Tanggungan</th>
                            <th class="text-center bg-success">Eksekusi<br>Riil</th>
                            <th class="text-center bg-success">Eksekusi<br>Lelang</th>
                            <th class="text-center bg-success">Eksekusi<br>Dicabut</th>
                            <th class="text-center bg-success">Eksekusi<br>Dicoret</th>
                            <th class="text-center bg-success">Eksekusi<br>NE</th>
                        </tr>
                    </thead>
                    <tfoot class="thead-dark">
                        <tr>
                            <th rowspan="2" class="align-middle text-center">No</th>
                            <th rowspan="2" class="align-middle text-center">Pengadilan Agama</th>
                            <th rowspan="2" class="align-middle text-center">Permohonan<br>Eksekusi</th>
                            <th colspan="2" class="text-center bg-info">Jenis Eksekusi</th>
                            <th colspan="5" class="text-center bg-success">Jenis Penyelesaian</th>
                            <th rowspan="2" class="align-middle text-center bg-warning">Total<br>Selesai</th>
                            <th rowspan="2" class="align-middle text-center bg-warning">Sisa</th>
                            <th rowspan="2" class="align-middle text-center bg-warning">Presentase</th>
                            <th rowspan="2" class="align-middle text-center bg-warning">Bobot<br>Nilai</th>
                        </tr>
                        <tr>
                            <th class="text-center bg-info">Eksekusi<br>Putusan</th>
                            <th class="text-center bg-info">Eksekusi<br>Hak Tanggungan</th>
                            <th class="text-center bg-success">Eksekusi<br>Riil</th>
                            <th class="text-center bg-success">Eksekusi<br>Lelang</th>
                            <th class="text-center bg-success">Eksekusi<br>Dicabut</th>
                            <th class="text-center bg-success">Eksekusi<br>Dicoret</th>
                            <th class="text-center bg-success">Eksekusi<br>NE</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (count($results) > 0)
                            @php $no = 1 @endphp
                            @foreach ($results as $satker => $data)
                                @if ($data['total'] > 0)
                                    {{-- Hanya tampilkan yang ada datanya --}}
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td><strong>{{ ucfirst($satker) }}</strong></td>
                                        <td class="text-center">{{ number_format($data['total'], 0, ',', '.') }}</td>
                                        <td class="text-center">{{ number_format($data['putusan'], 0, ',', '.') }}</td>
                                        <td class="text-center">{{ number_format($data['ht'], 0, ',', '.') }}</td>
                                        <td class="text-center">{{ number_format($data['riil'], 0, ',', '.') }}</td>
                                        <td class="text-center">{{ number_format($data['lelang'], 0, ',', '.') }}</td>
                                        <td class="text-center">{{ number_format($data['dicabut'], 0, ',', '.') }}</td>
                                        <td class="text-center">{{ number_format($data['dicoret'], 0, ',', '.') }}</td>
                                        <td class="text-center">{{ number_format($data['ne'], 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <strong>{{ number_format($data['selesai'], 0, ',', '.') }}</strong>
                                        </td>
                                        <td class="text-center">{{ number_format($data['sisa'], 0, ',', '.') }}</td>
                                        <td class="text-center">{{ $data['presentase'] }}%</td>
                                        <td class="text-center">
                                            <strong>{{ number_format($data['bobot_nilai'], 0, ',', '.') }}</strong>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                            {{-- Tampilkan pesan jika tidak ada data --}}
                            @if ($no == 1)
                                <tr>
                                    <td colspan="14" class="text-center text-muted py-4">
                                        <i class="fa fa-database fa-2x mb-3"></i><br>
                                        Tidak ada data untuk periode yang dipilih.
                                    </td>
                                </tr>
                            @endif
                        @else
                            <tr>
                                <td colspan="14" class="text-center text-muted py-4">
                                    <i class="fa fa-database fa-2x mb-3"></i><br>
                                    Belum ada data yang tersimpan.
                                </td>
                            </tr>
                        @endif
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
            font-size: 11px;
        }

        .card-header {
            padding: 8px 15px;
        }

        .form-inline .form-group {
            margin-right: 15px;
            margin-bottom: 10px;
        }

        .bg-info {
            background-color: #d1ecf1 !important;
        }

        .bg-success {
            background-color: #d4edda !important;
        }

        .bg-warning {
            background-color: #fff3cd !important;
        }
    </style>
@endsection
