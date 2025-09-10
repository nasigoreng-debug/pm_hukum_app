<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Eksekusi</title>
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
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .dashboard-header {
            text-align: center;
            margin-bottom: 30px;
            animation: fadeIn 1s ease;
        }
        
        .dashboard-header h1 {
            color: #2c3e50;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .dashboard-header p {
            color: #7f8c8d;
            font-size: 1.2rem;
        }
        
        .container-fluid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px;
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .counter-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 280px;
            padding: 25px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            animation: slideUp 0.8s ease;
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
            background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
        }
        
        .counter-card.purple::before {
            background: linear-gradient(90deg, #8E2DE2 0%, #4A00E0 100%);
        }
        
        .counter-card.success::before {
            background: linear-gradient(90deg, #00b09b 0%, #96c93d 100%);
        }
        
        .counter-card.danger::before {
            background: linear-gradient(90deg, #FF416C 0%, #FF4B2B 100%);
        }
        
        .counter-card.primary::before {
            background: linear-gradient(90deg, #1a2a6c 0%, #b21f1f 50%, #fdbb2d 100%);
        }
        
        .xe-icon {
            margin-bottom: 20px;
        }
        
        .xe-icon i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #6c5ce7;
            animation: pulse 2s infinite;
        }
        
        .counter-card.purple .xe-icon i {
            color: #8E2DE2;
        }
        
        .counter-card.success .xe-icon i {
            color: #00b09b;
        }
        
        .counter-card.danger .xe-icon i {
            color: #FF416C;
        }
        
        .counter-card.primary .xe-icon i {
            background: linear-gradient(90deg, #1a2a6c 0%, #b21f1f 50%, #fdbb2d 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .xe-icon h4 {
            font-size: 0.95rem;
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
            font-size: 2.8rem;
            font-weight: 700;
            color: #2c3e50;
            transition: color 0.3s ease;
        }
        
        .counter-card:hover .counter-value h1 {
            color: #6c5ce7;
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
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        /* Responsivitas */
        @media (max-width: 1200px) {
            .container-fluid {
                gap: 20px;
            }
            
            .counter-card {
                width: 250px;
            }
        }
        
        @media (max-width: 992px) {
            .counter-card {
                width: calc(50% - 20px);
                max-width: 300px;
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
        }
    </style>
</head>

        <div class="main-menu">
            <a href="/" class="menu-button">
                <i class="fas fa-home"></i>
                <span>Dashboard Utama</span>
            </a>
        </div>
    
<body>
    <!-- DASHBOARD EKSEKUSI -->
    <div class="dashboard-header">
        <h1>Dashboard Eksekusi</h1>
        <p>Statistik Eksekusi Wilayah PTA Bandung</p>
    </div>

    <div class="container-fluid">
        <div class="counter-card purple">
            <div class="xe-icon">
                <i class="fas fa-gavel"></i>
                <h4>EKSEKUSI SE WILAYAH PTA BANDUNG</h4>
            </div>
            <div class="counter-value">
                <a href="/eks/total" class="text-white">
                    <h1 class="num" data-target="{{ $eksekusi_total }}">0</h1>
                </a>
            </div>
        </div>
        
        <div class="counter-card purple">
            <div class="xe-icon">
                <i class="fas fa-balance-scale"></i>
                <h4>EKSEKUSI PUTUSAN</h4>
            </div>
            <div class="counter-value">
                <a href="/eks/total" class="text-white">
                    <h1 class="num" data-target="{{ $eksekusi_putusan }}">0</h1>
                </a>
            </div>
        </div>
        
        <div class="counter-card purple">
            <div class="xe-icon">
                <i class="fas fa-home"></i>
                <h4>EKSEKUSI HAK TANGGUNGAN</h4>
            </div>
            <div class="counter-value">
                <a href="/eks/total" class="text-white">
                    <h1 class="num" data-target="{{ $eksekusi_ht }}">0</h1>
                </a>
            </div>
        </div>
        
        <div class="counter-card success">
            <div class="xe-icon">
                <i class="fas fa-check-circle"></i>
                <h4>SUDAH SELESAI</h4>
            </div>
            <div class="counter-value">
                <a href="/eks/selesai" class="text-white">
                    <h1 class="num" data-target="{{ $eksekusi_selesai }}">0</h1>
                </a>
            </div>
        </div>
        
        <div class="counter-card danger">
            <div class="xe-icon">
                <i class="fas fa-hourglass-half"></i>
                <h4>BELUM SELESAI</h4>
            </div>
            <div class="counter-value">
                <a href="/eks/berjalan" class="text-white">
                    <h1 class="num" data-target="{{ $eksekusi_blm_selesai }}">0</h1>
                </a>
            </div>
        </div>
        
        <div class="counter-card primary">
            <div class="xe-icon">
                <i class="fas fa-chart-line"></i>
                <h4>PRESENTASE PENYELESAIAN</h4>
            </div>
            <div class="counter-value">
                <a href="/eks/progres" class="text-white">
                    <h1 class="num" data-target="{{ $eksekusi_presentase }}" data-suffix="%">0%</h1>
                </a>
            </div>
        </div>
        
        <div class="counter-card primary">
            <div class="xe-icon">
                <i class="fas fa-chart-bar"></i>
                <h4>EKSEKUSI RIIL</h4>
            </div>
            <div class="counter-value">
                <a href="/eks/berjalan" class="text-white">
                    <h1 class="num" data-target="{{ $eksekusi_riil }}">0</h1>
                </a>
            </div>
        </div>
        
        <div class="counter-card primary">
            <div class="xe-icon">
                <i class="fas fa-gavel"></i>
                <h4>PENYERAHAN HASIL LELANG</h4>
            </div>
            <div class="counter-value">
                <a href="/eks/berjalan" class="text-white">
                    <h1 class="num" data-target="{{ $eksekusi_lelang }}">0</h1>
                </a>
            </div>
        </div>
        
        <div class="counter-card primary">
            <div class="xe-icon">
                <i class="fas fa-times-circle"></i>
                <h4>DICABUT</h4>
            </div>
            <div class="counter-value">
                <a href="/eks/berjalan" class="text-white">
                    <h1 class="num" data-target="{{ $eksekusi_dicabut }}">0</h1>
                </a>
            </div>
        </div>
        
        <div class="counter-card primary">
            <div class="xe-icon">
                <i class="fas fa-ban"></i>
                <h4>DICORET</h4>
            </div>
            <div class="counter-value">
                <a href="/eks/berjalan" class="text-white">
                    <h1 class="num" data-target="{{ $eksekusi_dicoret }}">0</h1>
                </a>
            </div>
        </div>
        
        <div class="counter-card primary">
            <div class="xe-icon">
                <i class="fas fa-exclamation-triangle"></i>
                <h4>NON-EKSEKUTABLE</h4>
            </div>
            <div class="counter-value">
                <a href="/eks/berjalan" class="text-white">
                    <h1 class="num" data-target="{{ $eksekusi_ne }}">0</h1>
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi untuk animasi penghitungan
            function animateValue(element, start, end, duration, suffix = '') {
                let startTimestamp = null;
                const step = (timestamp) => {
                    if (!startTimestamp) startTimestamp = timestamp;
                    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                    
                    let value = progress * (end - start) + start;
                    
                    if (suffix === '%') {
                        element.innerHTML = value.toFixed(1) + suffix;
                    } else {
                        element.innerHTML = Math.floor(value).toLocaleString() + suffix;
                    }
                    
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    }
                };
                window.requestAnimationFrame(step);
            }
            
            // Animasi untuk semua elemen dengan kelas 'num'
            document.querySelectorAll('.num').forEach(element => {
                const target = parseInt(element.getAttribute('data-target'));
                const suffix = element.getAttribute('data-suffix') || '';
                
                // Tentukan durasi berdasarkan nilai target
                const duration = target > 1000 ? 3000 : 2000;
                
                // Mulai animasi dengan sedikit delay untuk efek berurutan
                setTimeout(() => {
                    animateValue(element, 0, target, duration, suffix);
                }, 200);
            });
            
            // Tambahkan efek hover dengan GSAP jika tersedia
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