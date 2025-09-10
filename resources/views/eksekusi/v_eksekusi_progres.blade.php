<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progres Penyelesaian Perkara Eksekusi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .dashboard-container {
            max-width: 1600px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .panel-heading {
            background: linear-gradient(90deg, #1a2a6c 0%, #3a5ec0 100%);
            color: white;
            padding: 20px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        
        .panel-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0;
        }
        
        .panel-options {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        
        .panel-options a {
            color: white;
            margin-left: 10px;
            text-decoration: none;
            font-size: 1.2rem;
        }
        
        .panel-body {
            padding: 25px;
            background: #f8f9fa;
        }
        
        .btn-back {
            background: linear-gradient(90deg, #FF416C 0%, #FF4B2B 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 75, 43, 0.3);
        }
        
        .btn-back:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 75, 43, 0.4);
        }
        
        .table-container {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        thead th {
            background: linear-gradient(90deg, #4A00E0 0%, #8E2DE2 100%);
            color: white;
            padding: 15px 10px;
            text-align: center;
            font-weight: 500;
            font-size: 0.9rem;
            position: sticky;
            top: 0;
        }
        
        tbody td {
            padding: 12px 10px;
            text-align: center;
            border-bottom: 1px solid #e9ecef;
            font-size: 0.9rem;
            transition: background-color 0.2s ease;
        }
        
        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        tbody tr:hover {
            background-color: #e9f7ff;
        }
        
        tfoot th {
            background: #e3f2fd;
            padding: 10px;
            text-align: center;
            font-weight: 600;
        }
        
        .progress-cell {
            min-width: 120px;
        }
        
        .progress-container {
            background: #e9ecef;
            border-radius: 10px;
            height: 8px;
            overflow: hidden;
            margin-top: 5px;
        }
        
        .progress-bar {
            height: 100%;
            border-radius: 10px;
            transition: width 1s ease-in-out;
        }
        
        .high-progress {
            background: linear-gradient(90deg, #00b09b 0%, #96c93d 100%);
        }
        
        .medium-progress {
            background: linear-gradient(90deg, #ff9a00 0%, #ffcc00 100%);
        }
        
        .low-progress {
            background: linear-gradient(90deg, #FF416C 0%, #FF4B2B 100%);
        }
        
        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .badge-success {
            background: rgba(0, 176, 155, 0.15);
            color: #00b09b;
        }
        
        .badge-warning {
            background: rgba(255, 154, 0, 0.15);
            color: #ff9a00;
        }
        
        .badge-danger {
            background: rgba(255, 65, 108, 0.15);
            color: #FF416C;
        }
        
        .pagination {
            margin-top: 20px;
            justify-content: center;
        }
        
        .page-item.active .page-link {
            background: linear-gradient(90deg, #4A00E0 0%, #8E2DE2 100%);
            border-color: #4A00E0;
        }
        
        .page-link {
            color: #4A00E0;
        }
        
        /* Responsivitas */
        @media (max-width: 1200px) {
            .table-container {
                overflow-x: auto;
            }
            
            table {
                min-width: 1000px;
            }
        }
        
        @media (max-width: 768px) {
            .panel-title {
                font-size: 1.2rem;
            }
            
            .panel-heading {
                padding: 15px;
            }
            
            .panel-body {
                padding: 15px;
            }
            
            thead th, tbody td {
                padding: 10px 5px;
                font-size: 0.8rem;
            }
        }
        
        /* Animasi */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideIn {
            from { 
                opacity: 0;
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in {
            animation: fadeIn 0.8s ease;
        }
        
        .slide-in {
            animation: slideIn 0.6s ease;
        }
    </style>
</head>
<body>
    <div class="dashboard-container fade-in">
        <div class="panel-heading text-center position-relative">
            <h3 class="panel-title">Progres Penyelesaian Perkara Eksekusi Pengadilan Agama Di Wilayah Pengadilan Tinggi Agama Bandung</h3>
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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="/eks" class="btn btn-back">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
                </a>
                
                <div class="d-flex">
                    <button class="btn btn-sm btn-outline-primary me-2">
                        <i class="fas fa-download me-1"></i> Export PDF
                    </button>
                    <button class="btn btn-sm btn-outline-success">
                        <i class="fas fa-file-excel me-1"></i> Export Excel
                    </button>
                </div>
            </div>
            
            <div class="table-container slide-in">
                <table id="example-4" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pengadilan Agama</th>
                            <th>Permohonan Eksekusi</th>
                            <th>Eksekusi Putusan</th>
                            <th>Eksekusi HT</th>
                            <th>Eksekusi Riil</th>
                            <th>Eksekusi Lelang</th>
                            <th>Dicabut</th>
                            <th>Dicoret</th>
                            <th>Non-Eksekutable</th>
                            <th>Total Selesai</th>
                            <th>Sisa</th>
                            <th class="progress-cell">Presentase</th>
                            <th>Bobot Nilai</th>
                        </tr>
                    </thead>
                    
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Pengadilan Agama</th>
                            <th>Permohonan Eksekusi</th>
                            <th>Eksekusi Putusan</th>
                            <th>Eksekusi HT</th>
                            <th>Eksekusi Riil</th>
                            <th>Eksekusi Lelang</th>
                            <th>Dicabut</th>
                            <th>Dicoret</th>
                            <th>Non-Eksekutable</th>
                            <th>Total Selesai</th>
                            <th>Sisa</th>
                            <th>Presentase</th>
                            <th>Bobot Nilai</th>
                        </tr>
                    </tfoot>
                    
                    <tbody>
                        @foreach($results as $satker => $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-start">{{ ucfirst($satker) }}</td>
                            <td>{{ $data['total'] }}</td>
                            <td>{{ $data['putusan'] }}</td>
                            <td>{{ $data['ht'] }}</td>
                            <td>{{ $data['riil'] }}</td>
                            <td>{{ $data['lelang'] }}</td>
                            <td>{{ $data['dicabut'] }}</td>
                            <td>{{ $data['dicoret'] }}</td>
                            <td>{{ $data['ne'] }}</td>
                            <td><span class="badge badge-success">{{ $data['selesai'] }}</span></td>
                            <td><span class="badge badge-danger">{{ $data['sisa'] }}</span></td>
                            <td class="progress-cell">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>{{ $data['presentase'] }}%</span>
                                    @if($data['presentase'] >= 70)
                                    <span class="badge badge-success">Tinggi</span>
                                    @elseif($data['presentase'] >= 40)
                                    <span class="badge badge-warning">Sedang</span>
                                    @else
                                    <span class="badge badge-danger">Rendah</span>
                                    @endif
                                </div>
                                <div class="progress-container">
                                    <div class="progress-bar 
                                        @if($data['presentase'] >= 70) high-progress
                                        @elseif($data['presentase'] >= 40) medium-progress
                                        @else low-progress
                                        @endif" 
                                        style="width: {{ $data['presentase'] }}%">
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($data['bobot_nilai'] >= 85)
                                <span class="badge badge-success">A</span>
                                @elseif($data['bobot_nilai'] >= 70)
                                <span class="badge badge-warning">B</span>
                                @else
                                <span class="badge badge-danger">C</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            $('#example-4').DataTable({
                dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                     "<'row'<'col-sm-12'tr>>" +
                     "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ entri",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                    infoFiltered: "(disaring dari _MAX_ total entri)",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Selanjutnya",
                        previous: "Sebelumnya"
                    }
                },
                responsive: true,
                pageLength: 10,
                order: [[12, 'desc']] // Urutkan berdasarkan Presentase secara descending
            });
            
            // Animasi progress bar setelah tabel dimuat
            setTimeout(function() {
                $('.progress-bar').each(function() {
                    $(this).css('width', $(this).attr('style').split('width: ')[1]);
                });
            }, 500);
            
            // Efek hover pada baris tabel
            $('tbody tr').hover(
                function() {
                    $(this).css('transform', 'translateY(-2px)');
                    $(this).css('box-shadow', '0 4px 10px rgba(0,0,0,0.1)');
                },
                function() {
                    $(this).css('transform', 'translateY(0)');
                    $(this).css('box-shadow', 'none');
                }
            );
        });
    </script>
</body>
</html>