<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Kepaniteraan Muda Hukum - Pengadilan Tinggi Agama Bandung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="{{{ asset('public/favicon/favicon.ico') }}}">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        
        .dashboard-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .welcome-text {
            padding: 15px;
            text-align: center;
        }
        
        .welcome-marquee {
            font-size: 1.5rem;
            font-weight: 600;
            padding: 10px 0;
        }
        
        .header-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 0 0 8px 8px;
        }
        
        .stat-card {
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            height: 100%;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        
        .xe-widget {
            padding: 15px;
            position: relative;
        }
        
        .xe-background {
            position: absolute;
            top: 0;
            right: 0;
            opacity: 0.1;
            font-size: 6rem;
            z-index: 0;
        }
        
        .xe-upper {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }
        
        .xe-icon {
            font-size: 2.5rem;
            margin-right: 15px;
        }
        
        .xe-label {
            flex: 1;
        }
        
        .xe-label strong {
            font-size: 1.8rem;
            display: block;
            margin-top: 5px;
        }
        
        .xe-progress {
            height: 8px;
            background-color: rgba(0,0,0,0.1);
            border-radius: 4px;
            margin: 10px 0;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }
        
        .xe-progress-fill {
            height: 100%;
            border-radius: 4px;
            transition: width 2s ease;
        }
        
        .xe-lower {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            position: relative;
            z-index: 1;
        }
        
        .weather-widget {
            background: linear-gradient(135deg, #74b9ff, #0984e3);
            color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .map-container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        /* Color variants for different card types */
        .xe-progress-counter-orange {
            background-color: #fff;
            color: var(--warning-color);
        }
        
        .xe-progress-counter-orange .xe-progress-fill {
            background-color: var(--warning-color);
        }
        
        .xe-progress-counter-green {
            background-color: #fff;
            color: var(--success-color);
        }
        
        .xe-progress-counter-green .xe-progress-fill {
            background-color: var(--success-color);
        }
        
        .xe-progress-counter-red {
            background-color: #fff;
            color: var(--danger-color);
        }
        
        .xe-progress-counter-red .xe-progress-fill {
            background-color: var(--danger-color);
        }
        
        .xe-progress-counter-turquoise {
            background-color: #fff;
            color: #1abc9c;
        }
        
        .xe-progress-counter-turquoise .xe-progress-fill {
            background-color: #1abc9c;
        }
        
        .xe-progress-counter-purple {
            background-color: #fff;
            color: #9b59b6;
        }
        
        .xe-progress-counter-purple .xe-progress-fill {
            background-color: #9b59b6;
        }
        
        @media (max-width: 768px) {
            .welcome-marquee {
                font-size: 1.2rem;
            }
            
            .xe-icon {
                font-size: 2rem;
            }
            
            .xe-label strong {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    @extends('layouts.v_template')

    @section('content')
    <div class="container-fluid py-4">
        <!-- Header Section -->
        <div class="dashboard-header">
            <div class="welcome-text">
                <div class="welcome-marquee">
                    <strong>Selamat Datang Di Portal Kepaniteraan Muda Hukum Pengadilan Tinggi Agama Bandung</strong>
                </div>
            </div>
            <img src="{{ asset('public/template') }}/assets/image-gallery/1.jpg" class="header-image" alt="Gedung Pengadilan Tinggi Agama Bandung">
        </div>

        <!-- Statistics Cards -->
        <div class="row">
            <!-- Arsip Perkara -->
            <div class="col-md-3 col-sm-6">
                <div class="stat-card xe-progress-counter-orange">
                    <div class="xe-widget">
                        <div class="xe-background">
                            <i class="fa-regular fa-file-lines"></i>
                        </div>
                        <div class="xe-upper">
                            <div class="xe-icon">
                                <i class="fa-regular fa-file-lines"></i>
                            </div>
                            <div class="xe-label">
                                <span>Arsip perkara {{ date('Y') }}</span>
                                <a href="/arsip" class="text-yellow"><strong>{{ $arsip_masuk }}</strong></a>
                            </div>
                        </div>
                        <div class="xe-progress">
                            <span class="xe-progress-fill" data-fill-to="{{ $arsip_presentase }}"></span>
                        </div>
                        <div class="xe-lower">
                            <span>Doc Arsip Perkara</span>
                            <strong>{{ $arsip_total }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bank Putusan -->
            <div class="col-md-3 col-sm-6">
                <div class="stat-card xe-progress-counter-green">
                    <div class="xe-widget">
                        <div class="xe-background">
                            <i class="fa-regular fa-file-lines"></i>
                        </div>
                        <div class="xe-upper">
                            <div class="xe-icon">
                                <i class="fa-regular fa-file-lines"></i>
                            </div>
                            <div class="xe-label">
                                <span>Bank Putusan {{ date('Y') }}</span>
                                <a href="/bankput" class="text-success"><strong>{{ $bankput_putus }}</strong></a>
                            </div>
                        </div>
                        <div class="xe-progress">
                            <span class="xe-progress-fill" data-fill-to="{{ $bankput_presentase }}"></span>
                        </div>
                        <div class="xe-lower">
                            <span>Jumlah putusan</span>
                            <strong>{{ $bankput_total }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Surat Masuk -->
            <div class="col-md-3 col-sm-6">
                <div class="stat-card xe-progress-counter-red">
                    <div class="xe-widget">
                        <div class="xe-background">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <div class="xe-upper">
                            <div class="xe-icon">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <div class="xe-label">
                                <span>Surat Masuk Tahun {{ date('Y') }}</span>
                                <a href="/suratmasuk" class="text-danger"><strong>{{ $suratmasuk }}</strong></a>
                                
                            </div>
                        </div>
                        <div class="xe-progress">
                            <span class="xe-progress-fill" data-fill-to="{{ $suratmasuk_presentase }}"></span>
                        </div>
                        <div class="xe-lower">
                            <span>Jumlah Surat Masuk</span>
                            <strong>{{ $suratmasuk_total_number }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Surat Keluar -->
            <div class="col-md-3 col-sm-6">
                <div class="stat-card xe-progress-counter-turquoise">
                    <div class="xe-widget">
                        <div class="xe-background">
                            <i class="fa-regular fa-paper-plane"></i>
                        </div>
                        <div class="xe-upper">
                            <div class="xe-icon">
                                <i class="fa-regular fa-paper-plane"></i>
                            </div>
                            <div class="xe-label">
                                <span>Surat Keluar Tahun {{ date('Y') }}</span>
                                <a href="/suratkeluar" class="text-turquoise"><strong>{{ $suratkeluar }}</strong></a>
                            </div>
                        </div>
                        <div class="xe-progress">
                            <span class="xe-progress-fill" data-fill-to="{{ $suratkeluar_presentase }}"></span>
                        </div>
                        <div class="xe-lower">
                            <span>Jumlah Surat Keluar</span>
                            <strong>{{ $suratkeluar_total }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <!-- Surat Keputusan -->
            <div class="col-md-3 col-sm-6">
                <div class="stat-card xe-progress-counter-turquoise">
                    <div class="xe-widget">
                        <div class="xe-background">
                            <i class="fa-regular fa-paper-plane"></i>
                        </div>
                        <div class="xe-upper">
                            <div class="xe-icon">
                                <i class="fa-regular fa-paper-plane"></i>
                            </div>
                            <div class="xe-label">
                                <span>Surat Keputusan {{ date('Y') }}</span>
                                <a href="/suratkeputusan" class="text-turquoise"><strong>{{ $suratkeputusan }}</strong></a>
                            </div>
                        </div>
                        <div class="xe-progress">
                            <span class="xe-progress-fill" data-fill-to="{{ $suratkeputusan_presentase }}"></span>
                        </div>
                        <div class="xe-lower">
                            <span>Jumlah Surat Keputusan</span>
                            <strong>{{ $suratkeputusan_total }}</strong>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Peminjaman Berkas -->
            <div class="col-md-3 col-sm-6">
                <div class="stat-card xe-progress-counter-green">
                    <div class="xe-widget">
                        <div class="xe-background">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <div class="xe-upper">
                            <div class="xe-icon">
                                <i class="fa-regular fa-user"></i>
                            </div>
                            <div class="xe-label">
                                <span>Belum Kembali {{ date('Y') }}</span>
                                    <a href="/pinjam" class="text-success"><strong>{{ $pinjam_bl_kembali }}</strong></a>
                            </div>
                        </div>
                        <div class="xe-progress">
                            <span class="xe-progress-fill" data-fill-to="{{ $pinjam_presentase }}"></span>
                        </div>
                        <div class="xe-lower">
                            <span>Peminjam Berkas {{ date('Y') }}</span>
                            <strong>{{ $pinjam }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Himpunan Peraturan -->
            <div class="col-md-3 col-sm-6">
                <div class="stat-card xe-progress-counter-red">
                    <div class="xe-widget">
                        <div class="xe-background">
                            <i class="fa-regular fa-file-lines"></i>
                        </div>
                        <div class="xe-upper">
                            <div class="xe-icon">
                                <i class="fa-regular fa-file-lines"></i>
                            </div>
                            <div class="xe-label">
                                <span>Himpunan Peraturan</span>
                                <a href="/himper" class="text-red"><strong>{{ $himper_total }}</strong></a>
                            </div>
                        </div>
                        <div class="xe-progress">
                            <span class="xe-progress-fill" data-fill-to="{{ $himper_presentase }}"></span>
                        </div>
                        <div class="xe-lower">
                            <span>Jumlah Doc peraturan</span>
                            <strong>{{ $himper_upload }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Putusan Kasasi -->
            <div class="col-md-3 col-sm-6">
                <div class="stat-card xe-progress-counter-turquoise">
                    <div class="xe-widget">
                        <div class="xe-background bg-danger">
                            <i class="fa-solid fa-scale-balanced"></i>
                        </div>
                        <div class="xe-upper">
                            <div class="xe-icon">
                                <i class="fa-solid fa-scale-balanced"></i>
                            </div>
                            <div class="xe-label">
                                <span>Putusan Kasasi Yang Diterima {{ date('Y') }}</span>
                                <strong>{{ $kasasi }}</strong>
                            </div>
                        </div>
                        <div class="xe-progress">
                            <span class="xe-progress-fill" data-fill-to="{{ $kasasi_presentase }}"></span>
                        </div>
                        <div class="xe-lower">
                            <span>Jumlah Doc Putusan Kasasi</span>
                            <strong>{{ $kasasi_total }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PBT Putusan Banding -->
            <div class="col-md-3 col-sm-6">
                <div class="stat-card xe-progress-counter-purple">
                    <div class="xe-widget">
                        <div class="xe-background">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>
                        <div class="xe-upper">
                            <div class="xe-icon">
                                <i class="fa-solid fa-bullhorn"></i>
                            </div>
                            <div class="xe-label">
                                <span>PBT Putusan Banding {{ date('Y') }}</span>
                                <strong>{{ $pbt }}</strong>
                            </div>
                        </div>
                        <div class="xe-progress">
                            <span class="xe-progress-fill" data-fill-to="{{ $pbt_presentase }}"></span>
                        </div>
                        <div class="xe-lower">
                            <span>Jumlah PBT Putusan Banding</span>
                            <strong>{{ $pbt_total }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengaduan -->
            <div class="col-md-3 col-sm-6">
                <div class="stat-card xe-progress-counter-red">
                    <div class="xe-widget">
                        <div class="xe-background">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="xe-upper">
                            <div class="xe-icon">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <div class="xe-label">
                                <span>Pengaduan Belum Selesai</span>
                                <a href="/pgd" class="text-danger"> <strong>{{ $pgd_blm_selesai }}</strong></a>
                            </div>
                        </div>
                        <div class="xe-progress">
                            <span class="xe-progress-fill" data-fill-to="{{ $pgd_presentase }}"></span>
                        </div>
                        <div class="xe-lower">
                            <span>Jumlah Data Pengaduan</span>
                            <strong>{{ $pgd_total }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Putusan PK -->
            <div class="col-md-3 col-sm-6">
                <div class="stat-card xe-progress-counter-turquoise">
                    <div class="xe-widget">
                        <div class="xe-background">
                            <i class="fa-solid fa-scale-balanced"></i>
                        </div>
                        <div class="xe-upper">
                            <div class="xe-icon">
                                <i class="fa-solid fa-scale-balanced"></i>
                            </div>
                            <div class="xe-label">
                                <span>Putusan PK Yang Diterima {{ date('Y') }}</span>
                                <strong>{{ $pk }}</strong>
                            </div>
                        </div>
                        <div class="xe-progress">
                            <span class="xe-progress-fill" data-fill-to="{{ $pk_presentase }}"></span>
                        </div>
                        <div class="xe-lower">
                            <span>Jumlah Doc Putusan Peninjauan Kembali</span>
                            <strong>{{ $pk_total }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Retensi Arsip -->
            <div class="col-md-3 col-sm-6">
                <div class="stat-card xe-progress-counter-purple">
                    <div class="xe-widget">
                        <div class="xe-background">
                            <i class="fa-regular fa-file-lines"></i>
                        </div>
                        <div class="xe-upper">
                            <div class="xe-icon">
                                <i class="fa-regular fa-file-lines"></i>
                            </div>
                            <div class="xe-label">
                                <span>Retensi Arsip</span>
                                <strong>{{ $retensi }}</strong>
                            </div>
                        </div>
                        <div class="xe-progress">
                            <span class="xe-progress-fill" data-fill-to="{{ $retensi_presentase }}"></span>
                        </div>
                        <div class="xe-lower">
                            <span>Jumlah Doc Retensi Arsip</span>
                            <strong>{{ $retensi_upload }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upaya Hukum Kasasi -->
            <div class="col-md-3 col-sm-6">
                <div class="stat-card xe-progress-counter-orange">
                    <div class="xe-widget">
                        <div class="xe-background">
                            <i class="fa-regular fa-edit"></i>
                        </div>
                        <div class="xe-upper">
                            <div class="xe-icon">
                                <i class="fa-regular fa-edit"></i>
                            </div>
                            <div class="xe-label">
                                <span>Upaya Hukum Kasasi Belum Putus</span>
                                <strong>{{ $reg_kasasi_blm_selesai }}</strong>
                            </div>
                        </div>
                        <div class="xe-progress">
                            <span class="xe-progress-fill" data-fill-to="{{ $reg_kasasi_presentase }}"></span>
                        </div>
                        <div class="xe-lower">
                            <span>Jumlah Kasasi Putus</span>
                            <strong>{{ $reg_kasasi_total }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upaya Hukum PK -->
            <div class="col-md-3 col-sm-6">
                <div class="stat-card xe-progress-counter-turquoise">
                    <div class="xe-widget">
                        <div class="xe-background">
                            <i class="fa-regular fa-edit"></i>
                        </div>
                        <div class="xe-upper">
                            <div class="xe-icon">
                                <i class="fa-regular fa-edit"></i>
                            </div>
                            <div class="xe-label">
                                <span>Upaya Hukum PK Belum Putus</span>
                                <a href="/pk" class="text-turquoise"><strong>{{ $reg_pk_blm_selesai }}</strong></a>
                            </div>
                        </div>
                        <div class="xe-progress">
                            <span class="xe-progress-fill" data-fill-to="{{ $reg_pk_presentase }}"></span>
                        </div>
                        <div class="xe-lower">
                            <span>Jumlah PK Putus</span>
                            <strong>{{ $reg_pk_total }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Perkara Eksekusi -->
            <div class="col-md-3 col-sm-6">
                <div class="stat-card xe-progress-counter-purple">
                    <div class="xe-widget">
                        <div class="xe-background">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="xe-upper">
                            <div class="xe-icon">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <div class="xe-label">
                                <span>Perkara Eksekusi Belum Selesai</span>
                                <a href="/eks" class="text-purple"><strong>{{ $eksekusi_blm_selesai }}</strong></a>
                                
                            </div>
                        </div>
                        <div class="xe-progress">
                            <span class="xe-progress-fill" data-fill-to="{{ $eksekusi_presentase }}"></span>
                        </div>
                        <div class="xe-lower">
                            <span>Total Perkara Eksekusi</span>
                            <strong>{{ $eksekusi_total }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Weather and Map Section -->
        <div class="row mt-4">
            <!-- Weather Widget -->
            <div class="col-lg-6 col-md-12">
                <div class="weather-widget">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h4>Bandung, Indonesia</h4>
                            <p>{{ date('l, j F Y h:i:s A') }}</p>
                        </div>
                        <div class="text-end">
                            <h2>21&deg;</h2>
                            <p>Berawan</p>
                        </div>
                    </div>
                    
                    <div class="weather-forecast">
                        <div class="row text-center">
                            <div class="col">
                                <p>11:00</p>
                                <i class="fas fa-sun fs-3 mb-2"></i>
                                <p>12&deg;</p>
                            </div>
                            <div class="col">
                                <p>12:00</p>
                                <i class="fas fa-cloud fs-3 mb-2"></i>
                                <p>13&deg;</p>
                            </div>
                            <div class="col">
                                <p>13:00</p>
                                <i class="fas fa-cloud-moon fs-3 mb-2"></i>
                                <p>16&deg;</p>
                            </div>
                            <div class="col">
                                <p>14:00</p>
                                <i class="fas fa-cloud-sun fs-3 mb-2"></i>
                                <p>19&deg;</p>
                            </div>
                            <div class="col">
                                <p>15:00</p>
                                <i class="fas fa-cloud-rain fs-3 mb-2"></i>
                                <p>21&deg;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Section -->
            <div class="col-lg-6 col-md-12">
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.596135077041!2d107.69135747890924!3d-6.938775605266532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c2b8532be0b3%3A0x558f74ce35b77659!2sPengadilan%20Tinggi%20Agama%20Bandung!5e0!3m2!1sid!2sid!4v1702197661449!5m2!1sid!2sid" 
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    @endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animate progress bars
            const progressBars = document.querySelectorAll('.xe-progress-fill');
            progressBars.forEach(bar => {
                const fillTo = bar.getAttribute('data-fill-to');
                bar.style.width = fillTo + '%';
            });
            
            // Animate counters
            const counters = document.querySelectorAll('.num');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-to'));
                const duration = 2000; // 2 seconds
                const steps = 100;
                const stepValue = target / steps;
                let current = 0;
                
                const timer = setInterval(() => {
                    current += stepValue;
                    if (current >= target) {
                        counter.textContent = target.toLocaleString();
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.round(current).toLocaleString();
                    }
                }, duration / steps);
            });
        });
    </script>
</body>
</html>