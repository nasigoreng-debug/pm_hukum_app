@extends('layouts.v_template')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Welcome Banner -->
            <div class="col-md-12 mb-4">
                <blockquote class="blockquote blockquote-success text-center">
                    <div class="px-2 bg-light">
                        <marquee class="py-3" direction="left" onmouseover="this.stop()" onmouseout="this.start()">
                            <strong>Selamat Datang Di Portal Kepaniteraan Muda Hukum Pengadilan Tinggi Agama
                                Bandung</strong>
                        </marquee>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('public/template') }}/assets/image-gallery/1.jpg" class="img-fluid w-100"
                                    style="max-height: 170px; object-fit: cover;" alt="Gambar Header">
                            </div>
                        </div>
                    </div>
                </blockquote>
            </div>

            <!-- Statistics Widgets -->
            <!-- Arsip Perkara -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-progress-counter xe-progress-counter-orange animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $arsip_masuk }}" data-duration="2">
                    <div class="xe-background">
                        <i class="fa fa-file-text-o pulse"></i>
                    </div>
                    <div class="xe-upper">
                        <div class="xe-icon">
                            <i class="fa fa-file-text-o"></i>
                        </div>
                        <div class="xe-label">
                            <span>Arsip perkara {{ date('Y') }}</span>
                            <strong class="num">0</strong>
                        </div>
                    </div>
                    <div class="xe-progress">
                        <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $arsip_presentase }}"
                            data-fill-unit="%" data-fill-property="width" data-fill-duration="2"
                            data-fill-easing="true"></span>
                    </div>
                    <div class="xe-lower">
                        <span>Doc Arsip Perkara</span>
                        <strong>{{ $arsip_total }}</strong>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- Bank Putusan -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-progress-counter xe-progress-counter-green animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $bankput_putus }}" data-duration="2">
                    <div class="xe-background">
                        <i class="fa fa-file-text-o bounce"></i>
                    </div>
                    <div class="xe-upper">
                        <div class="xe-icon">
                            <i class="fa fa-file-text-o"></i>
                        </div>
                        <div class="xe-label">
                            <span> Bank Putusan {{ date('Y') }}</span>
                            <strong class="num">0</strong>
                        </div>
                    </div>
                    <div class="xe-progress">
                        <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $bankput_presentase }}"
                            data-fill-unit="%" data-fill-property="width" data-fill-duration="2"
                            data-fill-easing="true"></span>
                    </div>
                    <div class="xe-lower">
                        <span>Jumlah putusan </span>
                        <strong>{{ $bankput_total }}</strong>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- Surat Masuk -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-progress-counter xe-progress-counter-red animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $suratmasuk_number }}" data-duration="2">
                    <div class="xe-background">
                        <i class="fa fa-envelope-o float"></i>
                    </div>
                    <div class="xe-upper">
                        <div class="xe-icon">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="xe-label">
                            <span>Surat Masuk Tahun {{ date('Y') }}</span>
                            <strong class="num">0</strong>
                        </div>
                    </div>
                    <div class="xe-progress">
                        <span class="xe-progress-fill" data-fill-from="{{ $suratmasuk_total }}"
                            data-fill-to="{{ $suratmasuk_presentase }}" data-fill-unit="%" data-fill-property="width"
                            data-fill-duration="2" data-fill-easing="true"></span>
                    </div>
                    <div class="xe-lower">
                        <span>Jumlah Surat Masuk</span>
                        <strong>{{ $suratmasuk_total_number }}</strong>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- Surat Keluar -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-progress-counter xe-progress-counter-turquoise animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $suratkeluar }}" data-duration="3">
                    <div class="xe-background">
                        <i class="linecons-paper-plane spin"></i>
                    </div>
                    <div class="xe-upper">
                        <div class="xe-icon">
                            <i class="linecons-paper-plane"></i>
                        </div>
                        <div class="xe-label">
                            <span>Surat Keluar Tahun {{ date('Y') }}</span>
                            <strong class="num">0</strong>
                        </div>
                    </div>
                    <div class="xe-progress">
                        <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $suratkeluar_presentase }}"
                            data-fill-unit="%" data-fill-property="width" data-fill-duration="3"
                            data-fill-easing="true"></span>
                    </div>
                    <div class="xe-lower">
                        <span>Jumlah Surat Keluar</span>
                        <strong>{{ $suratkeluar_total }}</strong>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- Peminjam Berkas -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-progress-counter xe-progress-counter-green animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $pinjam }}" data-duration="5">
                    <div class="xe-background">
                        <i class="fa fa-user grow"></i>
                    </div>
                    <div class="xe-upper">
                        <div class="xe-icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="xe-label">
                            <span>Peminjam Berkas {{ date('Y') }}</span>
                            <strong class="num">0</strong>
                        </div>
                    </div>
                    <div class="xe-progress">
                        <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $arsip_presentase }}"
                            data-fill-unit="%" data-fill-property="width" data-fill-duration="2"
                            data-fill-easing="true"></span>
                    </div>
                    <div class="xe-lower">
                        <span>Belum Kembali {{ date('Y') }}</span>
                        <strong>{{ $pinjam_bl_kembali }}</strong>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- Himpunan Peraturan -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-progress-counter xe-progress-counter-red animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $himper_total }}" data-duration="2">
                    <div class="xe-background">
                        <i class="fa fa-file-text-o shake"></i>
                    </div>
                    <div class="xe-upper">
                        <div class="xe-icon">
                            <i class="fa fa-file-text-o"></i>
                        </div>
                        <div class="xe-label">
                            <span> Himpunan Peraturan</span>
                            <strong class="num">0</strong>
                        </div>
                    </div>
                    <div class="xe-progress">
                        <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $himper_presentase }}"
                            data-fill-unit="%" data-fill-property="width" data-fill-duration="2"
                            data-fill-easing="true"></span>
                    </div>
                    <div class="xe-lower">
                        <span>Jumlah Doc peraturan </span>
                        <strong>{{ $himper_upload }}</strong>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- Putusan Kasasi -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-progress-counter xe-progress-counter-turquoise animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $kasasi }}" data-duration="2">
                    <div class="xe-background bg-danger">
                        <i class="fa fa-legal wobble"></i>
                    </div>
                    <div class="xe-upper">
                        <div class="xe-icon">
                            <i class="fa fa-legal"></i>
                        </div>
                        <div class="xe-label">
                            <span>Putusan Kasasi Yang Diterima {{ date('Y') }}</span>
                            <strong class="num">0</strong>
                        </div>
                    </div>
                    <div class="xe-progress">
                        <span class="xe-progress-fill" data-fill-from="{{ $suratmasuk_total }}"
                            data-fill-to="{{ $kasasi_presentase }}" data-fill-unit="%" data-fill-property="width"
                            data-fill-duration="2" data-fill-easing="true"></span>
                    </div>
                    <div class="xe-lower">
                        <span>Jumlah Doc Putusan Kasasi</span>
                        <strong>{{ $kasasi_total }}</strong>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- PBT Putusan Banding -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-progress-counter xe-progress-counter-purple animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $pbt }}" data-duration="3">
                    <div class="xe-background">
                        <i class="fa fa-bullhorn bounce"></i>
                    </div>
                    <div class="xe-upper">
                        <div class="xe-icon">
                            <i class="fa fa-bullhorn"></i>
                        </div>
                        <div class="xe-label">
                            <span>PBT Putusan Banding {{ date('Y') }}</span>
                            <strong class="num">0</strong>
                        </div>
                    </div>
                    <div class="xe-progress">
                        <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $pbt_presentase }}"
                            data-fill-unit="%" data-fill-property="width" data-fill-duration="3"
                            data-fill-easing="true"></span>
                    </div>
                    <div class="xe-lower">
                        <span>Jumlah PBT Putusan Banding</span>
                        <strong>{{ $pbt_total }}</strong>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- Pengaduan Belum Selesai -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-progress-counter xe-progress-counter-red animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $pgd_blm_selesai }}" data-duration="3">
                    <div class="xe-background">
                        <i class="fa fa-users pulse"></i>
                    </div>
                    <div class="xe-upper">
                        <div class="xe-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="xe-label">
                            <span>Pengaduan Belum Selesai</span>
                            <strong class="num">0</strong>
                        </div>
                    </div>
                    <div class="xe-progress">
                        <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $pgd_presentase }}"
                            data-fill-unit="%" data-fill-property="width" data-fill-duration="3"
                            data-fill-easing="true"></span>
                    </div>
                    <div class="xe-lower">
                        <span>Jumlah Data Pengaduan</span>
                        <strong>{{ $pgd_total }}</strong>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- Putusan PK -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-progress-counter xe-progress-counter-turquoise animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $pk }}" data-duration="3">
                    <div class="xe-background">
                        <i class="fa fa-legal spin"></i>
                    </div>
                    <div class="xe-upper">
                        <div class="xe-icon">
                            <i class="fa fa-legal"></i>
                        </div>
                        <div class="xe-label">
                            <span>Putusan PK Yang DIterima {{ date('Y') }}</span>
                            <strong class="num">0</strong>
                        </div>
                    </div>
                    <div class="xe-progress">
                        <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $pk_presentase }}"
                            data-fill-unit="%" data-fill-property="width" data-fill-duration="3"
                            data-fill-easing="true"></span>
                    </div>
                    <div class="xe-lower">
                        <span>Jumlah Doc Putusan Peninjauan Kembali</span>
                        <strong>{{ $pk_total }}</strong>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- Retensi Arsip -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-progress-counter xe-progress-counter-purple animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $retensi_total }}" data-duration="3">
                    <div class="xe-background">
                        <i class="fa fa-file-text-o float"></i>
                    </div>
                    <div class="xe-upper">
                        <div class="xe-icon">
                            <i class="fa fa-file-text-o"></i>
                        </div>
                        <div class="xe-label">
                            <span>Retensi Arsip</span>
                            <strong class="num">0</strong>
                        </div>
                    </div>
                    <div class="xe-progress">
                        <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $retensi_presentase }}"
                            data-fill-unit="%" data-fill-property="width" data-fill-duration="3"
                            data-fill-easing="true"></span>
                    </div>
                    <div class="xe-lower">
                        <span>Jumlah Doc Retensi Arsip</span>
                        <strong>{{ $retensi_upload }}</strong>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- Upaya Hukum Kasasi -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-progress-counter xe-progress-counter-orange animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $reg_kasasi_blm_selesai }}" data-duration="3">
                    <div class="xe-background">
                        <i class="fa fa-edit grow"></i>
                    </div>
                    <div class="xe-upper">
                        <div class="xe-icon">
                            <i class="fa fa-edit"></i>
                        </div>
                        <div class="xe-label">
                            <span>Upaya Hukum Kasasi Belum Putus</span>
                            <strong class="num">0</strong>
                        </div>
                    </div>
                    <div class="xe-progress">
                        <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $reg_kasasi_presentase }}"
                            data-fill-unit="%" data-fill-property="width" data-fill-duration="3"
                            data-fill-easing="true"></span>
                    </div>
                    <div class="xe-lower">
                        <span>Jumlah Kasasi Putus</span>
                        <strong>{{ $reg_kasasi_total }}</strong>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- Upaya Hukum PK -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-progress-counter xe-progress-counter-turquoise animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $reg_pk_blm_selesai }}" data-duration="3">
                    <div class="xe-background">
                        <i class="fa fa-edit shake"></i>
                    </div>
                    <div class="xe-upper">
                        <div class="xe-icon">
                            <i class="fa fa-edit"></i>
                        </div>
                        <div class="xe-label">
                            <span>Upaya Hukum PK Belum Putus</span>
                            <strong class="num">0</strong>
                        </div>
                    </div>
                    <div class="xe-progress">
                        <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $reg_pk_presentase }}"
                            data-fill-unit="%" data-fill-property="width" data-fill-duration="3"
                            data-fill-easing="true"></span>
                    </div>
                    <div class="xe-lower">
                        <span>Jumlah PK Putus</span>
                        <strong>{{ $reg_pk_total }}</strong>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- Perkara Eksekusi -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-progress-counter xe-progress-counter-purple animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $eksekusi_blm_selesai }}" data-duration="3">
                    <div class="xe-background">
                        <i class="fa fa-users bounce"></i>
                    </div>
                    <div class="xe-upper">
                        <div class="xe-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="xe-label">
                            <span>Perkara Eksekusi Belum Selesai</span>
                            <strong class="num">0</strong>
                        </div>
                    </div>
                    <div class="xe-progress">
                        <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $eksekusi_presentase }}"
                            data-fill-unit="%" data-fill-property="width" data-fill-duration="3"
                            data-fill-easing="true"></span>
                    </div>
                    <div class="xe-lower">
                        <span>Total Perkara Eksekusi</span>
                        <strong>{{ $eksekusi_total }}</strong>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- Surat Keputusan -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="xe-widget xe-progress-counter xe-progress-counter-orange animated-widget" data-count=".num"
                    data-from="0" data-to="{{ $sk_blm_upload }}" data-duration="3">
                    <div class="xe-background">
                        <i class="fa fa-edit pulse"></i>
                    </div>
                    <div class="xe-upper">
                        <div class="xe-icon">
                            <i class="fa fa-edit"></i>
                        </div>
                        <div class="xe-label">
                            <span>Surat Keputusan {{ date('Y') }}</span>
                            <strong class="num">0</strong>
                        </div>
                    </div>
                    <div class="xe-progress">
                        <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $sk_presentase }}"
                            data-fill-unit="%" data-fill-property="width" data-fill-duration="3"
                            data-fill-easing="true"></span>
                    </div>
                    <div class="xe-lower">
                        <span>Jumlah Keputusan</span>
                        <strong>{{ $sk_total }}</strong>
                    </div>
                    <div class="widget-wave"></div>
                </div>
            </div>

            <!-- Weather Widget -->
            <div class="col-md-12">
                <div class="xe-widget xe-weather animated-widget">
                    <div class="xe-background xe-background-animated">
                        <img src="{{ asset('public/template') }}/assets/images/clouds.png" alt="Clouds Background" />
                    </div>

                    <div class="xe-current-day">
                        <div class="xe-now">
                            <div class="xe-temperature">
                                <div class="xe-icon">
                                    <i class="meteocons-cloud-moon"></i>
                                </div>
                                <div class="xe-label">
                                    Hari ini
                                    <strong>21&deg;</strong>
                                </div>
                            </div>
                            <div class="xe-location">
                                <h4>Bandung, Indonesia</h4>
                                <time id="indonesian-date">Loading...</time>
                            </div>
                        </div>

                        <div class="xe-forecast">
                            <ul>
                                <li>
                                    <div class="xe-forecast-entry">
                                        <time>11:00</time>
                                        <div class="xe-icon">
                                            <i class="meteocons-sunrise"></i>
                                        </div>
                                        <strong class="xe-temp">12&deg;</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="xe-forecast-entry">
                                        <time>12:00</time>
                                        <div class="xe-icon">
                                            <i class="meteocons-clouds-flash"></i>
                                        </div>
                                        <strong class="xe-temp">13&deg;</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="xe-forecast-entry">
                                        <time>13:00</time>
                                        <div class="xe-icon">
                                            <i class="meteocons-cloud-moon-inv"></i>
                                        </div>
                                        <strong class="xe-temp">16&deg;</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="xe-forecast-entry">
                                        <time>14:00</time>
                                        <div class="xe-icon">
                                            <i class="meteocons-eclipse"></i>
                                        </div>
                                        <strong class="xe-temp">19&deg;</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="xe-forecast-entry">
                                        <time>15:00</time>
                                        <div class="xe-icon">
                                            <i class="meteocons-rain"></i>
                                        </div>
                                        <strong class="xe-temp">21&deg;</strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="xe-forecast-entry">
                                        <time>16:00</time>
                                        <div class="xe-icon">
                                            <i class="meteocons-cloud-sun"></i>
                                        </div>
                                        <strong class="xe-temp">25&deg;</strong>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="xe-weekdays">
                        <ul class="list-unstyled">
                            <li>
                                <div class="xe-weekday-forecast">
                                    <div class="xe-temp">21&deg;</div>
                                    <div class="xe-day">Senin</div>
                                    <div class="xe-icon">
                                        <i class="meteocons-windy-inv"></i>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="xe-weekday-forecast">
                                    <div class="xe-temp">23&deg;</div>
                                    <div class="xe-day">Selasa</div>
                                    <div class="xe-icon">
                                        <i class="meteocons-sun"></i>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="xe-weekday-forecast">
                                    <div class="xe-temp">19&deg;</div>
                                    <div class="xe-day">Rabu</div>
                                    <div class="xe-icon">
                                        <i class="meteocons-na"></i>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="xe-weekday-forecast">
                                    <div class="xe-temp">18&deg;</div>
                                    <div class="xe-day">Kamis</div>
                                    <div class="xe-icon">
                                        <i class="meteocons-windy"></i>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="xe-weekday-forecast">
                                    <div class="xe-temp">20&deg;</div>
                                    <div class="xe-day">Jumat</div>
                                    <div class="xe-icon">
                                        <i class="meteocons-sun"></i>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        /* Base Styles untuk Progress Counter */
        .xe-widget {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .animated-widget:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
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
        .animated-widget:hover .xe-background .fa,
        .animated-widget:hover .xe-background .linecons {
            transform: scale(1.1);
            transition: transform 0.3s ease;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .xe-widget {
                margin-bottom: 15px;
            }
        }

        @media (max-width: 576px) {
            .col-xs-12 {
                margin-bottom: 15px;
            }
        }

        /* Weather Widget Animation */
        .xe-weather {
            transition: all 0.3s ease;
        }

        .xe-weather:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
    </style>

    <script>
        // Additional JavaScript for enhanced animations
        document.addEventListener('DOMContentLoaded', function() {
            const widgets = document.querySelectorAll('.animated-widget');

            widgets.forEach(widget => {
                // Add click animation
                widget.addEventListener('click', function() {
                    this.style.transform = 'scale(0.98)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });

                // Intersection Observer for scroll animations
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }
                    });
                }, {
                    threshold: 0.1
                });

                widget.style.opacity = '0';
                widget.style.transform = 'translateY(20px)';
                widget.style.transition = 'opacity 0.6s ease, transform 0.6s ease';

                observer.observe(widget);
            });

            // Indonesian Date Formatter
            function updateIndonesianDate() {
                const now = new Date();
                const options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    timeZone: 'Asia/Jakarta'
                };
                const formatter = new Intl.DateTimeFormat('id-ID', options);
                document.getElementById('indonesian-date').textContent = formatter.format(now);
            }

            updateIndonesianDate();
            setInterval(updateIndonesianDate, 60000); // Update every minute
        });
    </script>
@endsection
