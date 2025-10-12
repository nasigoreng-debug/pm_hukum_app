@extends('layouts.v_template')

@section('content')
    <!-- DASHBOARD JDIH -->

    <div class="container-fluid">
        <div class="row">

            <!-- UNDANG-UNDANG -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $jdih_uu }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-file-text-o pulse"></i>
                        <h4 class="widget-title">UNDANG-UNDANG</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/undang_undang" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- PERPU -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $jdih_perpu }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-file-text-o bounce"></i>
                        <h4 class="widget-title">PERPU</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/perpu" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- PERATURAN PEMERINTAH -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $jdih_pp }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-file-text-o float"></i>
                        <h4 class="widget-title">PERATURAN PEMERINTAH</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/pp" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- INSTRUKSI PRESIDEN -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $jdih_inpres }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-file-text-o spin"></i>
                        <h4 class="widget-title">INSTRUKSI PRESIDEN</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/inpres" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- PERMA -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $jdih_perma }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-file-text-o shake"></i>
                        <h4 class="widget-title">PERMA</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/perma" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- SEMA -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $jdih_sema }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-file-text-o grow"></i>
                        <h4 class="widget-title">SEMA</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/sema" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- SK KMA -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $jdih_sk_kma }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-file-text-o bounce"></i>
                        <h4 class="widget-title">SK KMA</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/sk_kma" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- SK SEKMA -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $jdih_sk_sekma }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-file-text-o pulse"></i>
                        <h4 class="widget-title">SK SEKMA</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/sk_sekma" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- SE DIRJEN BADILAG -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $jdih_se_dirjen }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-file-text-o float"></i>
                        <h4 class="widget-title">SE DIRJEN BADILAG</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/se_dirjen_badilag" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- SK DIRJEN BADILAG -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $jdih_sk_dirjen }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-file-text-o spin"></i>
                        <h4 class="widget-title">SK DIRJEN BADILAG</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/sk_dirjen_badilag" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- SE KPTA BANDUNG -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $jdih_se_kpta }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-file-text-o shake"></i>
                        <h4 class="widget-title">SE KPTA BANDUNG</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/se_kpta" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- SK KPTA BANDUNG -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $jdih_sk_kpta }}" data-decimal="," data-suffix="" data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-file-text-o grow"></i>
                        <h4 class="widget-title">SK KPTA BANDUNG</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/sk_kpta" class="text-white">
                            <h1 class="num">0</h1>
                        </a>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- PERATURAN LAINNYA -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-vertical-counter xe-vertical-counter-primary animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $jdih_peraturan_lainnya }}" data-decimal="," data-suffix=""
                    data-duration="2.5">
                    <div class="xe-icon">
                        <i class="fa fa-file-text-o wobble"></i>
                        <h4 class="widget-title">PERATURAN LAINNYA</h4>
                    </div>
                    <div class="xe-label">
                        <a href="/peraturan_lainnya" class="text-white">
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
