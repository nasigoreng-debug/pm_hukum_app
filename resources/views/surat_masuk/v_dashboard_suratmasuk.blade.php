<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Surat Masuk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        
        /* Navigasi Atas */
        .top-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding: 15px 25px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.8s ease;
        }
        
        .app-title h1 {
            color: #2c3e50;
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
        }
        
        .app-title p {
            color: #7f8c8d;
            font-size: 0.9rem;
            margin: 0;
        }
        
        .main-menu {
            display: flex;
            gap: 15px;
        }
        
        .menu-button {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            background: linear-gradient(90deg, #4A00E0 0%, #8E2DE2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(142, 45, 226, 0.3);
        }
        
        .menu-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(142, 45, 226, 0.4);
        }
        
        .menu-button i {
            font-size: 1.1rem;
        }
        
        .dashboard-header {
            text-align: center;
            margin-bottom: 40px;
            animation: fadeIn 1s ease;
        }
        
        .dashboard-header h1 {
            color: #2c3e50;
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .dashboard-header p {
            color: #7f8c8d;
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .container-fluid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .counter-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 320px;
            padding: 25px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            animation: slideUp 0.8s ease;
        }
        
        .counter-card:nth-child(1) {
            animation-delay: 0.2s;
        }
        
        .counter-card:nth-child(2) {
            animation-delay: 0.4s;
        }
        
        .counter-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .counter-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
        }
        
        .counter-card.success::before {
            background: linear-gradient(90deg, #00b09b 0%, #96c93d 100%);
        }
        
        .counter-card.purple::before {
            background: linear-gradient(90deg, #8E2DE2 0%, #4A00E0 100%);
        }
        
        .xe-icon {
            margin-bottom: 20px;
        }
        
        .xe-icon i {
            font-size: 3.5rem;
            margin-bottom: 15px;
            animation: pulse 2s infinite;
        }
        
        .counter-card.success .xe-icon i {
            color: #00b09b;
        }
        
        .counter-card.purple .xe-icon i {
            color: #8E2DE2;
        }
        
        .xe-icon h4 {
            font-size: 1.1rem;
            color: #7f8c8d;
            font-weight: 500;
            line-height: 1.4;
            margin-top: 10px;
        }
        
        .counter-value {
            margin-top: 15px;
        }
        
        .counter-value a {
            text-decoration: none;
        }
        
        .counter-value h1 {
            font-size: 3.2rem;
            font-weight: 700;
            transition: color 0.3s ease;
        }
        
        .counter-card.success .counter-value h1 {
            color: #00b09b;
            background: linear-gradient(90deg, #00b09b 0%, #96c93d 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .counter-card.purple .counter-value h1 {
            color: #8E2DE2;
            background: linear-gradient(90deg, #8E2DE2 0%, #4A00E0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .counter-card:hover .counter-value h1 {
            transform: scale(1.05);
            display: inline-block;
        }
        
        .additional-info {
            margin-top: 10px;
            font-size: 0.9rem;
            color: #7f8c8d;
        }
        
        .chart-container {
            margin-top: 40px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 25px;
            max-width: 1200px;
            margin: 40px auto;
            animation: fadeIn 1.5s ease;
        }
        
        .chart-header {
            text-align: center;
            margin-bottom: 25px;
        }
        
        .chart-header h2 {
            color: #2c3e50;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }
        
        .chart-content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        
        .chart-item {
            flex: 1;
            min-width: 250px;
            text-align: center;
        }
        
        .chart-item h3 {
            color: #7f8c8d;
            font-size: 1rem;
            margin-bottom: 15px;
        }
        
        .progress-ring {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto;
        }
        
        .progress-ring circle {
            fill: none;
            stroke-width: 10;
            stroke-linecap: round;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
        }
        
        .progress-ring-bg {
            stroke: #f0f0f0;
        }
        
        .progress-ring-progress {
            stroke-dasharray: 314;
            stroke-dashoffset: 314;
            animation: progress-animation 2s ease-out forwards;
        }
        
        .success-progress {
            stroke: url(#successGradient);
        }
        
        .purple-progress {
            stroke: url(#purpleGradient);
        }
        
        .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .success-text {
            color: #00b09b;
        }
        
        .purple-text {
            color: #8E2DE2;
        }
        
        /* Animasi */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0;
                transform: translateY(50px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        @keyframes progress-animation {
            from { stroke-dashoffset: 314; }
            to { stroke-dashoffset: var(--dashoffset); }
        }
        
        /* Responsivitas */
        @media (max-width: 1200px) {
            .container-fluid {
                gap: 20px;
            }
            
            .counter-card {
                width: 280px;
            }
        }
        
        @media (max-width: 992px) {
            .counter-card {
                width: calc(50% - 20px);
                max-width: 300px;
            }
            
            .top-navigation {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
            
            .main-menu {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
        
        @media (max-width: 768px) {
            .counter-card {
                width: 100%;
                max-width: 400px;
            }
            
            .dashboard-header h1 {
                font-size: 2rem;
            }
            
            .dashboard-header p {
                font-size: 1rem;
            }
            
            .chart-content {
                flex-direction: column;
                align-items: center;
            }
            
            .chart-item {
                width: 100%;
            }
            
            .menu-button {
                padding: 10px 15px;
                font-size: 0.9rem;
            }
            
            .menu-button i {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigasi Atas -->
    <div class="top-navigation">
        <div class="app-title">
            <h1>Sistem Manajemen Surat</h1>
            <p>Pengadilan Agama Wilayah PTA Bandung</p>
        </div>
        <div class="main-menu">
            <a href="/" class="menu-button">
                <i class="fas fa-home"></i>
                <span>Dashboard Utama</span>
            </a>
            {{-- <a href="/eks" class="menu-button">
                <i class="fas fa-gavel"></i>
                <span>Data Eksekusi</span>
            </a> --}}
            <a href="/suratkeluar" class="menu-button">
                <i class="fas fa-envelope"></i>
                <span>Surat Keluar</span>
            </a>
            {{-- <a href="/laporan" class="menu-button">
                <i class="fas fa-chart-bar"></i>
                <span>Laporan</span>
            </a> --}}
        </div>
    </div>

    <!-- DASHBOARD SURAT MASUK -->
    <div class="dashboard-header">
        <h1>Dashboard Surat Masuk</h1>
        <p>Monitoring dan Statistik Surat Masuk Pengadilan Agama</p>
    </div>

    <div class="container-fluid">
        <div class="counter-card success">
            <div class="xe-icon">
                <i class="fas fa-envelope"></i>
                <h4>TOTAL SURAT MASUK</h4>
            </div>
            <div class="counter-value">
                <a href="/suratmasuk_total">
                    <h1 class="num" data-target="{{ $suratmasuk_total }}">0</h1>
                </a>
            </div>
            <div class="additional-info">
                <p>Seluruh periode</p>
            </div>
        </div>
        
        <div class="counter-card purple">
            <div class="xe-icon">
                <i class="fas fa-envelope-open-text"></i>
                <h4>SURAT MASUK {{ date('Y') }}</h4>
            </div>
            <div class="counter-value">
                <a href="/suratmasuk_berjalan">
                    <h1 class="num" data-target="{{ $suratmasuk_berjalan }}">0</h1>
                </a>
            </div>
            <div class="additional-info">
                <p>Tahun berjalan</p>
            </div>
        </div>
    </div>

    <div class="chart-container">
        <div class="chart-header">
            <h2>Statistik Surat Masuk</h2>
            <p>Perbandingan Total dan Surat Masuk Tahun {{ date('Y') }}</p>
        </div>
        
        <svg width="0" height="0">
            <defs>
                <linearGradient id="successGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#00b09b" />
                    <stop offset="100%" stop-color="#96c93d" />
                </linearGradient>
                <linearGradient id="purpleGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#8E2DE2" />
                    <stop offset="100%" stop-color="#4A00E0" />
                </linearGradient>
            </defs>
        </svg>
        
        <div class="chart-content">
            <div class="chart-item">
                <h3>Total Surat Masuk</h3>
                <div class="progress-ring">
                    <svg width="120" height="120" viewBox="0 0 120 120">
                        <circle class="progress-ring-bg" cx="60" cy="60" r="50" stroke-width="10" />
                        <circle class="progress-ring-progress success-progress" cx="60" cy="60" r="50" stroke-width="10" 
                            style="--dashoffset: {{ 314 * (1 - min($suratmasuk_total/100, 1)) }};" />
                    </svg>
                    <div class="progress-text success-text">{{ $suratmasuk_total }}</div>
                </div>
            </div>
            
            <div class="chart-item">
                <h3>Surat Masuk {{ date('Y') }}</h3>
                <div class="progress-ring">
                    <svg width="120" height="120" viewBox="0 0 120 120">
                        <circle class="progress-ring-bg" cx="60" cy="60" r="50" stroke-width="10" />
                        <circle class="progress-ring-progress purple-progress" cx="60" cy="60" r="50" stroke-width="10" 
                            style="--dashoffset: {{ 314 * (1 - min($suratmasuk_berjalan/100, 1)) }};" />
                    </svg>
                    <div class="progress-text purple-text">{{ $suratmasuk_berjalan }}</div>
                </div>
            </div>
            
            <div class="chart-item">
                <h3>Perbandingan</h3>
                <div class="progress-ring">
                    <svg width="120" height="120" viewBox="0 0 120 120">
                        <circle class="progress-ring-bg" cx="60" cy="60" r="50" stroke-width="10" />
                        <circle class="progress-ring-progress success-progress" cx="60" cy="60" r="50" stroke-width="10" 
                            style="--dashoffset: {{ 314 * (1 - min($suratmasuk_total/(max($suratmasuk_total, $suratmasuk_berjalan)+1), 1)) }};" />
                    </svg>
                    <div class="progress-text" style="color: #2c3e50;">
                        {{ $suratmasuk_total > 0 ? round(($suratmasuk_berjalan / $suratmasuk_total) * 100, 1) : 0 }}%
                    </div>
                </div>
                <p style="margin-top: 10px;">
                    {{ $suratmasuk_berjalan }} dari {{ $suratmasuk_total }}<br>surat tahun ini
                </p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi untuk animasi penghitungan
            function animateValue(element, start, end, duration) {
                let startTimestamp = null;
                const step = (timestamp) => {
                    if (!startTimestamp) startTimestamp = timestamp;
                    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                    
                    let value = Math.floor(progress * (end - start) + start);
                    element.textContent = value.toLocaleString();
                    
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    }
                };
                window.requestAnimationFrame(step);
            }
            
            // Animasi untuk semua elemen dengan kelas 'num'
            document.querySelectorAll('.num').forEach(element => {
                const target = parseInt(element.getAttribute('data-target'));
                
                // Tentukan durasi berdasarkan nilai target
                const duration = target > 1000 ? 3000 : 2000;
                
                // Mulai animasi dengan sedikit delay untuk efek berurutan
                setTimeout(() => {
                    animateValue(element, 0, target, duration);
                }, 500);
            });
            
            // Tambahkan efek hover pada kartu
            const cards = document.querySelectorAll('.counter-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-10px)';
                    card.style.boxShadow = '0 15px 35px rgba(0, 0, 0, 0.15)';
                });
                
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0)';
                    card.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.1)';
                });
            });
        });
    </script>
</body>
</html>