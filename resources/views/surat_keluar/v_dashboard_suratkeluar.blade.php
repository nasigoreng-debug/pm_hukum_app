@extends('layouts.v_template')

@section('content')
    <!-- DASHBOARD SURAT KELUAR -->

    <div class="container-fluid">
        <div class="row">

            <!-- TOTAL SURAT KELUAR -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-success animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $suratkeluar_total }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-envelope-o pulse"></i>
                        <h4 class="widget-title">TOTAL SURAT KELUAR</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/suratkeluar_total" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- SURAT KELUAR TAHUN INI -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-purple animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $suratkeluar_berjalan }}" data-decimal="," data-suffix=""
                    data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-envelope-o bounce"></i>
                        <h4 class="widget-title">SURAT KELUAR {{ date('Y') }}</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/suratkeluar_berjalan" class="text-white">
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
            font-weight: 600;
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
