<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard JDIH</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --accent: #f72585;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
            --warning: #f9c74f;
            --danger: #f94144;
            --card-border-radius: 12px;
            --transition: all 0.3s ease;
        }
        
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
        
        /* Header Styles */
        .dashboard-header {
            text-align: center;
            margin-bottom: 30px;
            color: var(--dark);
            position: relative;
        }
        
        .dashboard-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .dashboard-header p {
            font-size: 1.1rem;
            color: #6c757d;
            max-width: 800px;
            margin: 0 auto 25px;
        }
        
        /* Menu Button Styles */
        .menu-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        
        .menu-button {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            background: white;
            border: none;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
            color: var(--dark);
            text-decoration: none;
        }
        
        .menu-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }
        
        .menu-button i {
            font-size: 18px;
        }
        
        .menu-button.active {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }
        
        /* Container Styles */
        .container-fluid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px;
            max-width: 1600px;
            margin: 0 auto;
        }
        
        /* Card Styles */
        .card {
            background: white;
            border-radius: var(--card-border-radius);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 280px;
            overflow: hidden;
            transition: var(--transition);
            position: relative;
            animation: fadeIn 0.6s ease-out;
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }
        
        .card-content {
            padding: 25px;
            text-align: center;
        }
        
        .card-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 28px;
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 15px;
            min-height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .card-counter {
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--primary);
            margin: 15px 0;
            transition: var(--transition);
        }
        
        .card-link {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 500;
            transition: var(--transition);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        .card-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.4);
        }
        
        .card:nth-child(3n+1) .card-icon {
            background: linear-gradient(135deg, var(--primary), var(--success));
        }
        
        .card:nth-child(3n+2) .card-icon {
            background: linear-gradient(135deg, var(--warning), var(--accent));
        }
        
        .card:nth-child(3n+3) .card-icon {
            background: linear-gradient(135deg, var(--danger), var(--secondary));
        }
        
        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }
        
        /* Responsive Styles */
        @media (max-width: 1200px) {
            .container-fluid {
                gap: 20px;
            }
            
            .card {
                width: calc(33.333% - 20px);
            }
        }
        
        @media (max-width: 992px) {
            .card {
                width: calc(50% - 20px);
            }
            
            .menu-container {
                gap: 10px;
            }
            
            .menu-button {
                padding: 10px 15px;
                font-size: 14px;
            }
        }
        
        @media (max-width: 768px) {
            .card {
                width: 100%;
                max-width: 400px;
            }
            
            .dashboard-header h1 {
                font-size: 2rem;
            }
            
            .menu-container {
                flex-direction: column;
                align-items: center;
            }
            
            .menu-button {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <div class="dashboard-header">
        <h1>Sistem Informasi JDIH</h1>
        <p>Jaringan Dokumentasi dan Informasi Hukum - Dashboard Peraturan Perundang-undangan</p>
        
        <!-- MENU UTAMA -->
        <div class="menu-container">
            <a href="/" class="menu-button active">
                <i class="fas fa-home"></i>
                <span>Dashboard Utama</span>
            </a>
            <a href="/peraturan" class="menu-button">
                <i class="fas fa-file-contract"></i>
                <span>Semua Peraturan</span>
            </a>
            <a href="/kategori" class="menu-button">
                <i class="fas fa-folder"></i>
                <span>Kategori</span>
            </a>
            <a href="/pencarian" class="menu-button">
                <i class="fas fa-search"></i>
                <span>Pencarian</span>
            </a>
            <a href="/statistik" class="menu-button">
                <i class="fas fa-chart-bar"></i>
                <span>Statistik</span>
            </a>
            <a href="/bantuan" class="menu-button">
                <i class="fas fa-question-circle"></i>
                <span>Bantuan</span>
            </a>
        </div>
    </div>
    
    <!-- DASHBOARD JDIH -->
    <div class="container-fluid">
        <!-- Undang-Undang -->
        <div class="card">
            <div class="card-content">
                <div class="card-icon">
                    <i class="fas fa-file-contract"></i>
                </div>
                <div class="card-title">Undang-Undang</div>
                <div class="card-counter" id="counter-uu">0</div>
                <a href="/undang_undang" class="card-link">Lihat Detail</a>
            </div>
        </div>
        
        <!-- PERPU -->
        <div class="card">
            <div class="card-content">
                <div class="card-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="card-title">PERPU</div>
                <div class="card-counter" id="counter-perpu">0</div>
                <a href="/perpu" class="card-link">Lihat Detail</a>
            </div>
        </div>
        
        <!-- Peraturan Pemerintah -->
        <div class="card">
            <div class="card-content">
                <div class="card-icon">
                    <i class="fas fa-file-invoice"></i>
                </div>
                <div class="card-title">Peraturan Pemerintah</div>
                <div class="card-counter" id="counter-pp">0</div>
                <a href="/pp" class="card-link">Lihat Detail</a>
            </div>
        </div>
        
        <!-- Instruksi Presiden -->
        <div class="card">
            <div class="card-content">
                <div class="card-icon">
                    <i class="fas fa-file-signature"></i>
                </div>
                <div class="card-title">Instruksi Presiden</div>
                <div class="card-counter" id="counter-inpres">0</div>
                <a href="/inpres" class="card-link">Lihat Detail</a>
            </div>
        </div>
        
        <!-- PERMA -->
        <div class="card">
            <div class="card-content">
                <div class="card-icon">
                    <i class="fas fa-gavel"></i>
                </div>
                <div class="card-title">PERMA</div>
                <div class="card-counter" id="counter-perma">0</div>
                <a href="/perma" class="card-link">Lihat Detail</a>
            </div>
        </div>
        
        <!-- SEMA -->
        <div class="card">
            <div class="card-content">
                <div class="card-icon">
                    <i class="fas fa-balance-scale"></i>
                </div>
                <div class="card-title">SEMA</div>
                <div class="card-counter" id="counter-sema">0</div>
                <a href="/sema" class="card-link">Lihat Detail</a>
            </div>
        </div>
        
        <!-- SK KMA -->
        <div class="card">
            <div class="card-content">
                <div class="card-icon">
                    <i class="fas fa-scale-balanced"></i>
                </div>
                <div class="card-title">SK KMA</div>
                <div class="card-counter" id="counter-sk-kma">0</div>
                <a href="/sk_kma" class="card-link">Lihat Detail</a>
            </div>
        </div>
        
        <!-- SK SEKMA -->
        <div class="card">
            <div class="card-content">
                <div class="card-icon">
                    <i class="fas fa-book-law"></i>
                </div>
                <div class="card-title">SK SEKMA</div>
                <div class="card-counter" id="counter-sk-sekma">0</div>
                <a href="/sk_sekma" class="card-link">Lihat Detail</a>
            </div>
        </div>
        
        <!-- SE Dirjen Badilag -->
        <div class="card">
            <div class="card-content">
                <div class="card-icon">
                    <i class="fas fa-stamp"></i>
                </div>
                <div class="card-title">SE Dirjen Badilag</div>
                <div class="card-counter" id="counter-se-dirjen">0</div>
                <a href="/se_dirjen_badilag" class="card-link">Lihat Detail</a>
            </div>
        </div>
        
        <!-- SK Dirjen Badilag -->
        <div class="card">
            <div class="card-content">
                <div class="card-icon">
                    <i class="fas fa-file-certificate"></i>
                </div>
                <div class="card-title">SK Dirjen Badilag</div>
                <div class="card-counter" id="counter-sk-dirjen">0</div>
                <a href="/sk_dirjen_badilag" class="card-link">Lihat Detail</a>
            </div>
        </div>
        
        <!-- SE KPTA Bandung -->
        <div class="card">
            <div class="card-content">
                <div class="card-icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <div class="card-title">SE KPTA Bandung</div>
                <div class="card-counter" id="counter-se-kpta">0</div>
                <a href="/se_kpta" class="card-link">Lihat Detail</a>
            </div>
        </div>
        
        <!-- SK KPTA Bandung -->
        <div class="card">
            <div class="card-content">
                <div class="card-icon">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <div class="card-title">SK KPTA Bandung</div>
                <div class="card-counter" id="counter-sk-kpta">0</div>
                <a href="/sk_kpta" class="card-link">Lihat Detail</a>
            </div>
        </div>
        
        <!-- Peraturan lainnya -->
        <div class="card">
            <div class="card-content">
                <div class="card-icon">
                    <i class="fas fa-file"></i>
                </div>
                <div class="card-title">Peraturan lainnya</div>
                <div class="card-counter" id="counter-lainnya">0</div>
                <a href="/peraturan_lainnya" class="card-link">Lihat Detail</a>
            </div>
        </div>
    </div>

    <script>
        // Data dari controller (dalam contoh ini kita gunakan data statis)
        const data = {
            jdih_uu: {{ $jdih_uu }},
            jdih_perpu: {{ $jdih_perpu }},
            jdih_pp: {{ $jdih_pp }},
            jdih_inpres: {{ $jdih_inpres }},
            jdih_perma: {{ $jdih_perma }},
            jdih_sema: {{ $jdih_sema }},
            jdih_sk_kma: {{ $jdih_sk_kma }},
            jdih_sk_sekma: {{ $jdih_sk_sekma }},
            jdih_se_dirjen: {{ $jdih_se_dirjen }},
            jdih_sk_dirjen: {{ $jdih_sk_dirjen }},
            jdih_se_kpta: {{ $jdih_se_kpta }},
            jdih_sk_kpta: {{ $jdih_sk_kpta }},
            jdih_peraturan_lainnya: {{ $jdih_peraturan_lainnya }}
        };
        
        // Fungsi untuk animasi counter
        function animateCounter(elementId, finalValue) {
            let counterElement = document.getElementById(elementId);
            let current = 0;
            let duration = 2000; // 2 detik
            let increment = finalValue / (duration / 20);
            
            let timer = setInterval(() => {
                current += increment;
                if (current >= finalValue) {
                    clearInterval(timer);
                    current = finalValue;
                }
                counterElement.textContent = Math.floor(current);
            }, 20);
        }
        
        // Fungsi untuk menu button active state
        function setActiveMenu() {
            const menuButtons = document.querySelectorAll('.menu-button');
            const currentPage = window.location.pathname;
            
            menuButtons.forEach(button => {
                button.classList.remove('active');
                if (button.getAttribute('href') === currentPage) {
                    button.classList.add('active');
                }
            });
        }
        
        // Jalankan ketika halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Jalankan counter animasi
            animateCounter('counter-uu', data.jdih_uu);
            animateCounter('counter-perpu', data.jdih_perpu);
            animateCounter('counter-pp', data.jdih_pp);
            animateCounter('counter-inpres', data.jdih_inpres);
            animateCounter('counter-perma', data.jdih_perma);
            animateCounter('counter-sema', data.jdih_sema);
            animateCounter('counter-sk-kma', data.jdih_sk_kma);
            animateCounter('counter-sk-sekma', data.jdih_sk_sekma);
            animateCounter('counter-se-dirjen', data.jdih_se_dirjen);
            animateCounter('counter-sk-dirjen', data.jdih_sk_dirjen);
            animateCounter('counter-se-kpta', data.jdih_se_kpta);
            animateCounter('counter-sk-kpta', data.jdih_sk_kpta);
            animateCounter('counter-lainnya', data.jdih_peraturan_lainnya);
            
            // Set menu aktif
            setActiveMenu();
            
            // Tambahkan efek hover pada menu buttons
            const menuButtons = document.querySelectorAll('.menu-button');
            menuButtons.forEach(button => {
                button.addEventListener('mouseenter', () => {
                    button.style.animation = 'pulse 0.5s ease';
                });
                
                button.addEventListener('mouseleave', () => {
                    button.style.animation = '';
                });
            });
        });
    </script>
</body>
</html>