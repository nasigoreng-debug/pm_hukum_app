@extends('layouts.v_template')

@section('content')

    <div class="col-sm-12">
        <div class="col-sm-12">
            <blockquote class="blockquote blockquote-success text-center">
                <h3 class="px-2 bg-light ">
                    <marquee class="py-3" direction="left" onmouseover="this.stop()" onmouseout="this.start()">
                        <strong>Selamat Datang Di Portal Kepaniteraan Muda Hukum Pengadilan Tinggi Agama Bandung</strong>
                    </marquee>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('public/template')}}/assets/image-gallery/1.jpg" width="1300" height="170" class="img-fluid" alt="">
                            <div class="carousel-caption">
                    
                            </div>
                        </div>
                    </div>
                </h3>
            </blockquote>
        </div>
    
        <div class="col-sm-3">

            <div class="xe-widget xe-progress-counter xe-progress-counter-orange " data-count=".num" data-from="0" data-to="{{ $arsip_masuk }}" data-duration="2">

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

        <div class="col-sm-3">

            <div class="xe-widget xe-progress-counter xe-progress-counter-green " data-count=".num" data-from="0" data-to="{{ $bankput_putus }}" data-duration="2">

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

        <div class="col-sm-3 img-responsive">

            <div class="xe-widget xe-progress-counter xe-progress-counter-red " data-count=".num" data-from="0" data-to="{{$suratmasuk_number}}" data-duration="2">

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

        <div class="col-sm-3">

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

        <div class="col-sm-3">

            <div class="xe-widget xe-progress-counter xe-progress-counter-green " data-count=".num" data-from="0" data-to="{{ $pinjam }}" data-duration="5">

                <div class="xe-background">
                    <i class="fa fa-user"></i>
                </div>

                <div class="xe-upper">
                    <div class="xe-icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="xe-label">
                        <span>Belum Kembali {{date('Y')}}</span>
                        <strong>{{ $pinjam_bl_kembali }}</strong>
                    </div>
                </div>

                <div class="xe-progress">
                    <span class="xe-progress-fill" data-fill-from="0" data-fill-to="{{ $pinjam_presentase }}" data-fill-unit="%" data-fill-property="width" data-fill-duration="2" data-fill-easing="true"></span>
                </div>

                <div class="xe-lower">
                    <span>Peminjam Berkas {{date('Y')}}</span>
                    <strong class="num">0</strong>
                </div>

            </div>

        </div>

        <div class="col-sm-3">

            <div class="xe-widget xe-progress-counter xe-progress-counter-red " data-count=".num" data-from="0" data-to="{{ $himper_total }}" data-duration="2">

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

        <div class="col-sm-3">

            <div class="xe-widget xe-progress-counter xe-progress-counter-turquoise " data-count=".num" data-from="0" data-to="{{$kasasi}}" data-duration="2">

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

        <div class="col-sm-3">

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

        <div class="col-sm-3">

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

        <div class="col-sm-3">

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
        <div class="col-sm-3">

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
        <div class="col-sm-3">

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
        <div class="col-sm-3">

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
        <div class="col-sm-3">

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
                    <!-- <span>Perkara Eksekusi Sudah Selesai</span>
        <strong>{{$eksekusi_selesai}}</strong> -->
                </div>

            </div>

        </div>

    </div>

    <!-- PRESENTASE -->
    <div class="col-sm-12">
        {{-- <div class="col-sm-3">

            <div class="xe-widget xe-counter xe-counter-purple" data-count=".num" data-from="0" data-to="{{ $arsip_presentase }} " data-suffix="%" data-duration="5" data-easing="false">
                <div class="xe-icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0.0%</strong>
                    <span>Proses Alih Media</span>
                </div>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="xe-widget xe-counter xe-counter-green" data-count=".num" data-from="0" data-to="{{ $bankput_presentase}}" data-suffix="%" data-duration="5" data-easing="false">
                <div class="xe-icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0.0%</strong>
                    <span>Upload Doc Putusan</span>
                </div>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="xe-widget xe-counter xe-counter-red" data-count=".num" data-from="0" data-to="{{$suratmasuk_presentase}}" data-suffix="%" data-duration="5" data-easing="false">
                <div class="xe-icon">
                    <i class="fa fa-envelope-o"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0.0%</strong>
                    <span>Upload Doc Surat Masuk</span>
                </div>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="xe-widget xe-counter xe-counter-turquoise" data-count=".num" data-from="0" data-to="{{ $suratkeluar_presentase }}" data-suffix="%" data-duration="5" data-easing="false">
                <div class="xe-icon">
                    <i class="linecons-paper-plane"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0,0%</strong>
                    <span>Upload Doc Surat Keluar</span>
                </div>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="xe-widget xe-counter xe-counter-purple" data-count=".num" data-from="0" data-to="{{ $pinjam_presentase }} " data-suffix="%" data-duration="5" data-easing="false">
                <div class="xe-icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0.0%</strong>
                    <span>Berkas Arsip Perkara</span>
                </div>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="xe-widget xe-counter xe-counter-green" data-count=".num" data-from="0" data-to="{{ $himper_presentase}}" data-suffix="%" data-duration="5" data-easing="false">
                <div class="xe-icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0.0%</strong>
                    <span>Upload Doc Peraturan</span>
                </div>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="xe-widget xe-counter xe-counter-red" data-count=".num" data-from="0" data-to="{{$kasasi_presentase}}" data-suffix="%" data-duration="5" data-easing="false">
                <div class="xe-icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0.0%</strong>
                    <span>Upload Doc Putusan Kasasi</span>
                </div>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="xe-widget xe-counter xe-counter-turquoise" data-count=".num" data-from="0" data-to="{{ $pbt_presentase }}" data-suffix="%" data-duration="5" data-easing="false">
                <div class="xe-icon">
                    <i class="fa fa-bullhorn"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0,0%</strong>
                    <span>Jumlah PBT Putusan</span>
                </div>
            </div>

        </div>



        <div class="col-sm-3">

            <div class="xe-widget xe-counter xe-counter-purple" data-count=".num" data-from="0" data-to="{{ $pgd_presentase }} " data-suffix="%" data-duration="5" data-easing="false">
                <div class="xe-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0.0%</strong>
                    <span>Penyelesaian Pengaduan</span>
                </div>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="xe-widget xe-counter xe-counter-green" data-count=".num" data-from="0" data-to="{{ $pk_presentase}}" data-suffix="%" data-duration="5" data-easing="false">
                <div class="xe-icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0.0%</strong>
                    <span>Upload Doc Putusan Peninjauan Kembali</span>
                </div>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="xe-widget xe-counter xe-counter-red" data-count=".num" data-from="0" data-to="{{$retensi_presentase}}" data-suffix="%" data-duration="5" data-easing="false">
                <div class="xe-icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0.0%</strong>
                    <span>Upload Doc Retensi Arsip</span>
                </div>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="xe-widget xe-counter xe-counter-turquoise" data-count=".num" data-from="0" data-to="{{ $reg_kasasi_presentase }}" data-suffix="%" data-duration="5" data-easing="false">
                <div class="xe-icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0,0%</strong>
                    <span>Putus Kasasi</span>
                </div>
            </div>

        </div>
        <div class="col-sm-3">

            <div class="xe-widget xe-counter xe-counter-turquoise" data-count=".num" data-from="0" data-to="{{ $reg_pk_presentase }}" data-suffix="%" data-duration="5" data-easing="false">
                <div class="xe-icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0,0%</strong>
                    <span>Putus Peninjauan Kembali</span>
                </div>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="xe-widget xe-counter xe-counter-turquoise" data-count=".num" data-from="0" data-to="{{ $eksekusi_presentase }}" data-suffix="%" data-duration="5" data-easing="false">
                <div class="xe-icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="xe-label">
                    <strong class="num">0,0%</strong>
                    <span>Penyelesaian Perkara Eksekusi</span>
                </div>
            </div>

        </div> --}}

        <div class="col-sm-12">

            <div class="xe-widget xe-weather">
                <div class="xe-background xe-background-animated">
                    <img src="assets/images/clouds.png" />
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
                            <time>{{date('l, j F Y h:i:s A')}}</time>
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
        <div class="col-sm-12" >
                <iframe class="col-sm-12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.596135077041!2d107.69135747890924!3d-6.938775605266532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c2b8532be0b3%3A0x558f74ce35b77659!2sPengadilan%20Tinggi%20Agama%20Bandung!5e0!3m2!1sid!2sid!4v1702197661449!5m2!1sid!2sid" width="500" height="285" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

</div>

@endsection