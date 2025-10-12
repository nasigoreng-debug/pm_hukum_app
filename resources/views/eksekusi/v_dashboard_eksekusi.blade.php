@extends('layouts.v_template')

@section('content')
    <!-- DASHBOARD EKSEKUSI -->
    <div class="container-fluid">
        <div class="row">

            <!-- TOTAL EKSEKUSI -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-purple animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $eksekusi_total }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-users pulse"></i>
                        <h4 class="widget-title">EKSEKUSI SE WILAYAH PTA BANDUNG</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/eks/total" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- JENIS EKSEKUSI -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-purple animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $eksekusi_putusan }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-gavel bounce"></i>
                        <h4 class="widget-title">EKSEKUSI PUTUSAN</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/eks/total" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-purple animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $eksekusi_ht }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-home float"></i>
                        <h4 class="widget-title">EKSEKUSI HAK TANGGUNGAN</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/eks/total" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- STATUS PENYELESAIAN -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-success animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $eksekusi_selesai }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-check-circle spin"></i>
                        <h4 class="widget-title">SUDAH SELESAI</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/eks/selesai" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-danger animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $eksekusi_blm_selesai }}" data-decimal="," data-suffix=""
                    data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-clock shake"></i>
                        <h4 class="widget-title">BELUM SELESAI</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/eks/berjalan" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- PROGRESS & METRICS -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $eksekusi_presentase }}" data-decimal="," data-suffix="%"
                    data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-chart-line grow"></i>
                        <h4 class="widget-title">PRESENTASE PENYELESAIAN</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/eks/progres" class="text-white">
                            <h1 class="num">0,0%</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $eksekusi_riil }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-chart-bar bounce"></i>
                        <h4 class="widget-title">EKSEKUSI RIIL</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/eks/berjalan" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- LELANG & PENYERAHAN -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $eksekusi_lelang }}" data-decimal="," data-suffix=""
                    data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-gavel hammer"></i>
                        <h4 class="widget-title">PENYERAHAN HASIL LELANG</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/eks/berjalan" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- STATUS KHUSUS -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $eksekusi_dicabut }}" data-decimal="," data-suffix=""
                    data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-times-circle flip"></i>
                        <h4 class="widget-title">DICABUT</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/eks/berjalan" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $eksekusi_dicoret }}" data-decimal="," data-suffix=""
                    data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-ban rotate"></i>
                        <h4 class="widget-title">DICORET</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/eks/berjalan" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $eksekusi_ne }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-exclamation-triangle wobble"></i>
                        <h4 class="widget-title">NON-EKSEKUTABLE</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/eks/berjalan" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

        </div>
    </div>

    <style>
        /* Base Styles */
        .xe-widget {
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .animated-widget:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .widget-title {
            font-size: 14px;
            line-height: 1.3;
            min-height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin: 10px 0;
        }

        .xe-label h1 {
            font-size: 2.5rem;
            margin: 0;
            text-align: center;
            font-weight: bold;
        }

        .xe-icon .fa {
            font-size: 28px;
            margin-bottom: 8px;
        }

        /* Wave Effect */
        .widget-wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
            animation: wave 2s infinite linear;
        }

        @keyframes wave {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        /* Icon Animations */
        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .bounce {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-5px);
            }

            60% {
                transform: translateY(-3px);
            }
        }

        .float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .spin {
            animation: spin 3s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .shake {
            animation: shake 2s ease-in-out infinite;
        }

        @keyframes shake {

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-5deg);
            }

            75% {
                transform: rotate(5deg);
            }
        }

        .grow {
            animation: grow 2s ease-in-out infinite;
        }

        @keyframes grow {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }
        }

        .hammer {
            animation: hammer 2s infinite;
        }

        @keyframes hammer {

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-15deg);
            }

            75% {
                transform: rotate(15deg);
            }
        }

        .flip {
            animation: flip 2s ease-in-out infinite;
        }

        @keyframes flip {

            0%,
            100% {
                transform: perspective(400px) rotateY(0);
            }

            50% {
                transform: perspective(400px) rotateY(180deg);
            }
        }

        .rotate {
            animation: rotate 3s linear infinite;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(-360deg);
            }
        }

        .wobble {
            animation: wobble 2s ease-in-out infinite;
        }

        @keyframes wobble {

            0%,
            100% {
                transform: translateX(0%);
            }

            15% {
                transform: translateX(-5px) rotate(-5deg);
            }

            30% {
                transform: translateX(4px) rotate(3deg);
            }

            45% {
                transform: translateX(-3px) rotate(-3deg);
            }

            60% {
                transform: translateX(2px) rotate(2deg);
            }

            75% {
                transform: translateX(-1px) rotate(-1deg);
            }
        }

        /* Number Counting Animation */
        .num {
            animation: numberPop 0.5s ease-out;
        }

        @keyframes numberPop {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }

            70% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Hover Effects */
        .animated-widget:hover .xe-icon .fa {
            transform: scale(1.2);
            transition: transform 0.3s ease;
        }

        .animated-widget:hover .widget-title {
            color: #fff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .xe-widget {
                height: 180px;
            }

            .widget-title {
                font-size: 13px;
                min-height: 32px;
            }

            .xe-label h1 {
                font-size: 2rem;
            }

            .xe-icon .fa {
                font-size: 24px;
            }
        }

        @media (max-width: 576px) {
            .xe-widget {
                height: 160px;
            }

            .widget-title {
                font-size: 12px;
                min-height: 28px;
            }

            .xe-icon .fa {
                font-size: 22px;
            }
        }
    </style>
@endsection
