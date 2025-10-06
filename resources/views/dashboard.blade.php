@extends('layouts.v_template')

@section('content')
<div class="row">
    <!-- Welcome Banner -->
    <div class="col-md-12">
        <blockquote class="blockquote blockquote-success text-center">
            <div class="px-2 bg-light">
                <marquee class="py-3" direction="left" onmouseover="this.stop()" onmouseout="this.start()">
                    <strong>Selamat Datang Di Portal Kepaniteraan Muda Hukum Pengadilan Tinggi Agama Bandung</strong>
                </marquee>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('public/template') }}/assets/image-gallery/1.jpg" class="img-fluid w-100" style="max-height: 170px; object-fit: cover;" alt="Gambar Header">
                    </div>
                </div>
            </div>
        </blockquote>
    </div>

    <!-- Statistics Widgets -->
    <!-- Arsip Perkara -->
    <div class="col-md-3 col-sm-6">
        <div class="xe-widget xe-progress-counter xe-progress-counter-orange" data-count=".num" data-from="0" data-to="{{ $arsip_masuk }}" data-duration="2">
            <div class="xe-background">
                <i class="fa fa-file-text-o"></i>
            </div>
            <div class="xe-upper">
                <div class="xe-icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="xe-label">
                    <span>Arsip perkara {{date('Y')}}</span>
                    <strong class="num">0</strong>
                </div>
            </div>
            <div class="xe-progress">
                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $arsip_presentase }}" data-fill-unit="%" data-fill-property="width" data-fill-duration="2" data-fill-easing="true"></span>
            </div>
            <div class="xe-lower">
                <span>Doc Arsip Perkara</span>
                <strong>{{ $arsip_total }}</strong>
            </div>
        </div>
    </div>

    <!-- Bank Putusan -->
    <div class="col-md-3 col-sm-6">
        <div class="xe-widget xe-progress-counter xe-progress-counter-green" data-count=".num" data-from="0" data-to="{{ $bankput_putus }}" data-duration="2">
            <div class="xe-background">
                <i class="fa fa-file-text-o"></i>
            </div>
            <div class="xe-upper">
                <div class="xe-icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="xe-label">
                    <span> Bank Putusan {{date('Y')}}</span>
                    <strong class="num">0</strong>
                </div>
            </div>
            <div class="xe-progress">
                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $bankput_presentase}}" data-fill-unit="%" data-fill-property="width" data-fill-duration="2" data-fill-easing="true"></span>
            </div>
            <div class="xe-lower">
                <span>Jumlah putusan </span>
                <strong>{{$bankput_total}}</strong>
            </div>
        </div>
    </div>

    <!-- Surat Masuk -->
    <div class="col-md-3 col-sm-6">
        <div class="xe-widget xe-progress-counter xe-progress-counter-red" data-count=".num" data-from="0" data-to="{{$suratmasuk_number}}" data-duration="2">
            <div class="xe-background">
                <i class="fa fa-envelope-o"></i>
            </div>
            <div class="xe-upper">
                <div class="xe-icon">
                    <i class="fa fa-envelope-o"></i>
                </div>
                <div class="xe-label">
                    <span>Surat Masuk Tahun {{date('Y')}}</span>
                    <strong class="num">0</strong>
                </div>
            </div>
            <div class="xe-progress">
                <span class="xe-progress-fill" data-fill-from="{{$suratmasuk_total}}" data-fill-to="{{$suratmasuk_presentase}}" data-fill-unit="%" data-fill-property="width" data-fill-duration="2" data-fill-easing="true"></span>
            </div>
            <div class="xe-lower">
                <span>Jumlah Surat Masuk</span>
                <strong>{{$suratmasuk_total_number}}</strong>
            </div>
        </div>
    </div>

    <!-- Surat Keluar -->
    <div class="col-md-3 col-sm-6">
        <div class="xe-widget xe-progress-counter xe-progress-counter-turquoise" data-count=".num" data-from="0" data-to="{{ $suratkeluar }}" data-duration="3">
            <div class="xe-background">
                <i class="linecons-paper-plane"></i>
            </div>
            <div class="xe-upper">
                <div class="xe-icon">
                    <i class="linecons-paper-plane"></i>
                </div>
                <div class="xe-label">
                    <span>Surat Keluar Tahun {{date('Y')}}</span>
                    <strong class="num">0</strong>
                </div>
            </div>
            <div class="xe-progress">
                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $suratkeluar_presentase }}" data-fill-unit="%" data-fill-property="width" data-fill-duration="3" data-fill-easing="true"></span>
            </div>
            <div class="xe-lower">
                <span>Jumlah Surat Keluar</span>
                <strong>{{$suratkeluar_total}}</strong>
            </div>
        </div>
    </div>

    <!-- Peminjam Berkas -->
    <div class="col-md-3 col-sm-6">
        <div class="xe-widget xe-progress-counter xe-progress-counter-green" data-count=".num" data-from="0" data-to="{{ $pinjam }}" data-duration="5">
            <div class="xe-background">
                <i class="fa fa-user"></i>
            </div>
            <div class="xe-upper">
                <div class="xe-icon">
                    <i class="fa fa-user"></i>
                </div>
                <div class="xe-label">
                    <span>Peminjam Berkas {{date('Y')}}</span>
                    <strong class="num">0</strong>
                </div>
            </div>
            <div class="xe-progress">
                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $arsip_presentase }}" data-fill-unit="%" data-fill-property="width" data-fill-duration="2" data-fill-easing="true"></span>
            </div>
            <div class="xe-lower">
                <span>Belum Kembali {{date('Y')}}</span>
                <strong>{{ $pinjam_bl_kembali }}</strong>
            </div>
        </div>
    </div>

    <!-- Himpunan Peraturan -->
    <div class="col-md-3 col-sm-6">
        <div class="xe-widget xe-progress-counter xe-progress-counter-red" data-count=".num" data-from="0" data-to="{{ $himper_total }}" data-duration="2">
            <div class="xe-background">
                <i class="fa fa-file-text-o"></i>
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
                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $himper_presentase}}" data-fill-unit="%" data-fill-property="width" data-fill-duration="2" data-fill-easing="true"></span>
            </div>
            <div class="xe-lower">
                <span>Jumlah Doc peraturan </span>
                <strong>{{$himper_upload}}</strong>
            </div>
        </div>
    </div>

    <!-- Putusan Kasasi -->
    <div class="col-md-3 col-sm-6">
        <div class="xe-widget xe-progress-counter xe-progress-counter-turquoise" data-count=".num" data-from="0" data-to="{{$kasasi}}" data-duration="2">
            <div class="xe-background bg-danger">
                <i class="fa fa-legal"></i>
            </div>
            <div class="xe-upper">
                <div class="xe-icon">
                    <i class="fa fa-legal"></i>
                </div>
                <div class="xe-label">
                    <span>Putusan Kasasi Yang Diterima {{date('Y')}}</span>
                    <strong class="num">0</strong>
                </div>
            </div>
            <div class="xe-progress">
                <span class="xe-progress-fill" data-fill-from="{{$suratmasuk_total}}" data-fill-to="{{$kasasi_presentase}}" data-fill-unit="%" data-fill-property="width" data-fill-duration="2" data-fill-easing="true"></span>
            </div>
            <div class="xe-lower">
                <span>Jumlah Doc Putusan Kasasi</span>
                <strong>{{$kasasi_total}}</strong>
            </div>
        </div>
    </div>

    <!-- PBT Putusan Banding -->
    <div class="col-md-3 col-sm-6">
        <div class="xe-widget xe-progress-counter xe-progress-counter-purple" data-count=".num" data-from="0" data-to="{{ $pbt }}" data-duration="3">
            <div class="xe-background">
                <i class="fa fa-bullhorn"></i>
            </div>
            <div class="xe-upper">
                <div class="xe-icon">
                    <i class="fa fa-bullhorn"></i>
                </div>
                <div class="xe-label">
                    <span>PBT Putusan Banding {{date('Y')}}</span>
                    <strong class="num">0</strong>
                </div>
            </div>
            <div class="xe-progress">
                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $pbt_presentase }}" data-fill-unit="%" data-fill-property="width" data-fill-duration="3" data-fill-easing="true"></span>
            </div>
            <div class="xe-lower">
                <span>Jumlah PBT Putusan Banding</span>
                <strong>{{$pbt_total}}</strong>
            </div>
        </div>
    </div>

    <!-- Pengaduan Belum Selesai -->
    <div class="col-md-3 col-sm-6">
        <div class="xe-widget xe-progress-counter xe-progress-counter-red" data-count=".num" data-from="0" data-to="{{ $pgd_blm_selesai }}" data-duration="3">
            <div class="xe-background">
                <i class="fa fa-users"></i>
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
                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $pgd_presentase }}" data-fill-unit="%" data-fill-property="width" data-fill-duration="3" data-fill-easing="true"></span>
            </div>
            <div class="xe-lower">
                <span>Jumlah Data Pengaduan</span>
                <strong>{{$pgd_total}}</strong>
            </div>
        </div>
    </div>

    <!-- Putusan PK -->
    <div class="col-md-3 col-sm-6">
        <div class="xe-widget xe-progress-counter xe-progress-counter-turquoise" data-count=".num" data-from="0" data-to="{{ $pk }}" data-duration="3">
            <div class="xe-background">
                <i class="fa fa-legal"></i>
            </div>
            <div class="xe-upper">
                <div class="xe-icon">
                    <i class="fa fa-legal"></i>
                </div>
                <div class="xe-label">
                    <span>Putusan PK Yang DIterima {{date('Y')}}</span>
                    <strong class="num">0</strong>
                </div>
            </div>
            <div class="xe-progress">
                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $pk_presentase }}" data-fill-unit="%" data-fill-property="width" data-fill-duration="3" data-fill-easing="true"></span>
            </div>
            <div class="xe-lower">
                <span>Jumlah Doc Putusan Peninjauan Kembali</span>
                <strong>{{$pk_total}}</strong>
            </div>
        </div>
    </div>

    <!-- Retensi Arsip -->
    <div class="col-md-3 col-sm-6">
        <div class="xe-widget xe-progress-counter xe-progress-counter-purple" data-count=".num" data-from="0" data-to="{{ $retensi_total }}" data-duration="3">
            <div class="xe-background">
                <i class="fa fa-file-text-o"></i>
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
                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $retensi_presentase }}" data-fill-unit="%" data-fill-property="width" data-fill-duration="3" data-fill-easing="true"></span>
            </div>
            <div class="xe-lower">
                <span>Jumlah Doc Retensi Arsip</span>
                <strong>{{$retensi_upload}}</strong>
            </div>
        </div>
    </div>

    <!-- Upaya Hukum Kasasi -->
    <div class="col-md-3 col-sm-6">
        <div class="xe-widget xe-progress-counter xe-progress-counter-orange" data-count=".num" data-from="0" data-to="{{ $reg_kasasi_blm_selesai }}" data-duration="3">
            <div class="xe-background">
                <i class="fa fa-edit"></i>
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
                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $reg_kasasi_presentase }}" data-fill-unit="%" data-fill-property="width" data-fill-duration="3" data-fill-easing="true"></span>
            </div>
            <div class="xe-lower">
                <span>Jumlah Kasasi Putus</span>
                <strong>{{$reg_kasasi_total}}</strong>
            </div>
        </div>
    </div>

    <!-- Upaya Hukum PK -->
    <div class="col-md-3 col-sm-6">
        <div class="xe-widget xe-progress-counter xe-progress-counter-turquoise" data-count=".num" data-from="0" data-to="{{ $reg_pk_blm_selesai }}" data-duration="3">
            <div class="xe-background">
                <i class="fa fa-edit"></i>
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
                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $reg_pk_presentase }}" data-fill-unit="%" data-fill-property="width" data-fill-duration="3" data-fill-easing="true"></span>
            </div>
            <div class="xe-lower">
                <span>Jumlah PK Putus</span>
                <strong>{{$reg_pk_total}}</strong>
            </div>
        </div>
    </div>

    <!-- Perkara Eksekusi -->
    <div class="col-md-3 col-sm-6">
        <div class="xe-widget xe-progress-counter xe-progress-counter-purple" data-count=".num" data-from="0" data-to="{{ $eksekusi_blm_selesai }}" data-duration="3">
            <div class="xe-background">
                <i class="fa fa-users"></i>
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
                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $eksekusi_presentase }}" data-fill-unit="%" data-fill-property="width" data-fill-duration="3" data-fill-easing="true"></span>
            </div>
            <div class="xe-lower">
                <span>Total Perkara Eksekusi</span>
                <strong>{{$eksekusi_total}}</strong>
            </div>
        </div>
    </div>

    <!-- Surat Keputusan -->
    <div class="col-md-3 col-sm-6">
        <div class="xe-widget xe-progress-counter xe-progress-counter-orange" data-count=".num" data-from="0" data-to="{{ $sk_blm_upload }}" data-duration="3">
            <div class="xe-background">
                <i class="fa fa-edit"></i>
            </div>
            <div class="xe-upper">
                <div class="xe-icon">
                    <i class="fa fa-edit"></i>
                </div>
                <div class="xe-label">
                    <span>Surat Keputusan {{date('Y')}}</span>
                    <strong class="num">0</strong>
                </div>
            </div>
            <div class="xe-progress">
                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $sk_presentase }}" data-fill-unit="%" data-fill-property="width" data-fill-duration="3" data-fill-easing="true"></span>
            </div>
            <div class="xe-lower">
                <span>Jumlah Keputusan</span>
                <strong>{{$sk_total}}</strong>
            </div>
        </div>
    </div>

    <!-- Weather Widget -->
    <div class="col-md-12">
        <div class="xe-widget xe-weather">
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
@endsection