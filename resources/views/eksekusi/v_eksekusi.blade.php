@extends('layouts.v_template')

@section('content')
    @include('layouts.v_deskripsi')

    <!-- Table exporting -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Data Perkara Eksekusi</h3>

            <div class="panel-options">
                <a href="#" data-toggle="panel">
                    <span class="collapse-icon">&ndash;</span>
                    <span class="expand-icon">+</span>
                </a>
                <a href="#" data-toggle="remove">&times;</a>
            </div>
        </div>

        <div class="panel-body">
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $("#example-3").dataTable().yadcf([{
                            column_number: 1
                        },
                        {
                            column_number: 5
                        }
                    ]);
                });
            </script>

            <!-- Action Buttons -->
            <div class="text-center mb-3" style="font-size: 14px;">
                @if (in_array(Auth::user()->level, [1, 2]))
                    <a href="/eks/add" class="btn btn-sm btn-info mb-2">Tambah Data</a>
                    <a href="/eks/total" class="btn btn-sm btn-secondary mb-2">Semua</a>
                    <a href="/eks/berjalan" class="btn btn-sm btn-secondary mb-2">Berjalan</a>
                    <a href="/eks/selesai" class="btn btn-sm btn-secondary mb-2">Selesai</a>
                    <a href="/eks/progres" class="btn btn-sm btn-secondary mb-2">Progres Satker</a>

                    <!-- TAMBAHKAN TOMBOL PRINT DI SINI -->
                    <button onclick="printTable()" class="btn btn-sm btn-success mb-2">
                        <i class="fa fa-print"></i> Print Table
                    </button>
                    <!-- END TOMBOL PRINT -->

                    <a href="/eks" class="btn btn-sm btn-danger mb-2">Kembali</a>
                @endif
            </div>

            <!-- Success Message -->
            @if (session('pesan'))
                <div class="alert alert-success alert-dismissible mt-2">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session('pesan') }}
                </div>
            @endif


            <!-- Data Table -->
            <table class="table table-sm table-hover" id="example-3">
                <thead class="bg-gray">
                    <tr>
                        <th style="width: 15px;">No</th>
                        <th style="width: 100px;">Satuan Kerja</th>
                        <th style="width: 135px;">Nomor Perkara Eksekusi</th>
                        <th style="width: 135px;">Juncto</th>
                        <th style="width: 100px;">Tanggal Permohonan</th>
                        <th style="width: 100px;">Proses Terakhir</th>
                        <th style="width: 100px;">Tanggal Pelaksanaan</th>
                        <th style="width: 100px;">Tanggal Selesai</th>
                        <th style="width: 100px;">Usia Perkara</th>
                        <th style="width: 100px;">Keterangan</th>
                        <th style="width: 50px;">Action</th>
                    </tr>
                </thead>

                <tfoot class="bg-gray">
                    <tr>
                        <th>No</th>
                        <th>Satuan Kerja</th>
                        <th>Nomor Perkara Eksekusi</th>
                        <th>Juncto</th>
                        <th>Tanggal Permohonan</th>
                        <th>Proses Terakhir</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>Tanggal Selesai</th>
                        <th>Usia Perkara</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>

                <tbody>
                    @foreach ($eksekusi as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->satker }}</td>
                            <td>{{ $data->no_eksekusi }}</td>
                            <td>{{ $data->no_put }}</td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($data->tgl_permohonan)) }}</td>
                            <td>{{ $data->proses_terakhir }}</td>
                            <td class="text-center">
                                @if (empty($data->tgl_eks))
                                    {{ date('d-m-Y', strtotime($data->tgl_permohonan)) }}
                                @else
                                    {{ date('d-m-Y', strtotime($data->tgl_eks)) }}
                                @endif
                            </td>
                            <td class="text-center">
                                @if (empty($data->tgl_selesai))
                                    <span class="badge badge-warning">Proses</span>
                                @else
                                    {{ date('d-m-Y', strtotime($data->tgl_selesai)) }}
                                @endif
                            </td>
                            <td class="text-center">
                                @if (empty($data->tgl_selesai))
                                    <span class="badge badge-danger">
                                        {{ Carbon\Carbon::parse($data->tgl_permohonan)->diffInDays($sekarang) }} Hari
                                    </span>
                                @else
                                    <span class="badge badge-success">
                                        {{ Carbon\Carbon::parse($data->tgl_permohonan)->diffInDays($data->tgl_selesai) }}
                                        Hari
                                    </span>
                                @endif
                            </td>
                            <td>
                                @if (empty($data->keterangan))
                                    <span class="badge badge-primary">Tanpa keterangan</span>
                                @else
                                    {{ $data->keterangan }}
                                @endif
                            </td>
                            <td class="text-center" style="font-size: 14px;">
                                @if (Auth::user()->level == 1)
                                    <a href="/eks/edit/{{ $data->id }}" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                                        data-target="#delete{{ $data->id }}">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                @elseif(Auth::user()->level == 2)
                                    <a href="/eks/edit/{{ $data->id }}" class="btn btn-warning btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Modals -->
    @foreach ($eksekusi as $data)
        <div class="modal fade" id="delete{{ $data->id }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ $data->no_eksekusi }}</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda ingin menghapus perkara ini?&hellip;</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="/eks/delete/{{ $data->id }}" type="button" class="btn btn-sm btn-danger">Ya</a>
                        <button type="button" class="btn btn-sm btn-white" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Data Table -->
    <table class="table table-sm table-hover" id="example-3">
        <!-- ... existing table code ... -->
    </table>

    <!-- TAMBAHKAN SCRIPT PRINT DI SINI -->
    <script>
        function printTable() {
            // Clone table asli
            var originalTable = document.getElementById('example-3');
            var printContent = originalTable.cloneNode(true);

            // Hapus kolom Action (kolom terakhir)
            var rows = printContent.getElementsByTagName('tr');
            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName('td');
                var thCells = rows[i].getElementsByTagName('th');

                // Hapus td terakhir (kolom Action)
                if (cells.length > 0) {
                    cells[cells.length - 1].remove();
                }

                // Hapus th terakhir (header Action)
                if (thCells.length > 0) {
                    thCells[thCells.length - 1].remove();
                }
            }

            // Buat window print
            var printWindow = window.open('', '_blank', 'width=1000,height=600');
            printWindow.document.write(`
            <!DOCTYPE html>
            <html>
            <head>
                <title>Laporan Data Perkara Eksekusi</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 20px;
                        font-size: 12px;
                    }
                    .header {
                        text-align: center;
                        margin-bottom: 20px;
                        border-bottom: 2px solid #333;
                        padding-bottom: 10px;
                    }
                    .header h2 {
                        margin: 0;
                        color: #333;
                    }
                    .info {
                        margin: 10px 0;
                        padding: 10px;
                        background: #f5f5f5;
                        border-radius: 5px;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 15px;
                    }
                    th, td {
                        border: 1px solid #000;
                        padding: 6px;
                        text-align: left;
                        font-size: 11px;
                    }
                    th {
                        background-color: #e9ecef;
                        font-weight: bold;
                    }
                    .text-center {
                        text-align: center;
                    }
                    .badge {
                        padding: 2px 6px;
                        border-radius: 3px;
                        font-size: 10px;
                        border: 1px solid #000;
                    }
                    .badge-warning { background-color: #ffc107; }
                    .badge-danger { background-color: #dc3545; color: white; }
                    .badge-success { background-color: #28a745; color: white; }
                    .badge-primary { background-color: #007bff; color: white; }
                    @media print {
                        body { margin: 0; }
                        .no-print { display: none; }
                    }
                </style>
            </head>
            <body>
                <div class="header">
                    <h2>LAPORAN DATA PERKARA EKSEKUSI</h2>
                    <p>Tanggal Cetak: ${new Date().toLocaleDateString('id-ID', {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    })}</p>
                </div>

                <div class="info">
                    <strong>Total Data:</strong> ${originalTable.rows.length - 1} Perkara<br>
                    <strong>User:</strong> {{ Auth::user()->name }}
                </div>

                ${printContent.outerHTML}

                <div class="no-print" style="margin-top: 20px; text-align: center;">
                    <button onclick="window.print()" style="padding: 8px 15px; background: #28a745; color: white; border: none; border-radius: 3px; cursor: pointer;">
                        🖨️ Print Halaman
                    </button>
                    <button onclick="window.close()" style="padding: 8px 15px; background: #dc3545; color: white; border: none; border-radius: 3px; cursor: pointer;">
                        ❌ Tutup
                    </button>
                </div>

                <script>
                    window.onload = function() {
                        // Auto print setelah window terbuka (opsional)
                        // window.print();
                    };
                <\/script>
            </body>
            </html>
        `);
            printWindow.document.close();
        }
    </script>
@endsection
