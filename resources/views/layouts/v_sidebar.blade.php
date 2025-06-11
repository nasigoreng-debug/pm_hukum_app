<!-- Sidebar -->
<div class="sidebar-menu toggle-others fixed">

    <div class="sidebar-menu-inner">
        <!-- Sidebar User Info Bar - Added in 1.3 -->
        <section class="sidebar-user-info">
            <div class="sidebar-user-info-inner">
                <a href="extra-profile.html" class="user-profile">
                    <img src="{{ asset('public/img/'.Auth::user()->foto_user) }}" width="50" height="60" class="img-circle img-corona" />
                    <span class="user-status is-online" style="font-size: 12px;">
                        <h5 class="text-white">{{ Auth::user()->name }}</h5>
                        <p class="text-yellow">@if(Auth::user()->level===1)
                            Administrator
                            @elseif(Auth::user()->level===2)
                            Staf
                            @elseif(Auth::user()->level===3)
                            User
                            @endif</p>
                        <p class="text-success"><i class="fa fa-circle"></i> <span> online</span>
                    </span></p>
                </a>
            </div>
        </section>
        <ul id="main-menu" class="main-menu">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            @if(Auth::user()->level===1)
            <li class="opened {{ ( $title === 'Dashboard') ? 'active' : ''}}">
                <a href="/">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Arsip Perkara') ? 'active' : ''}}">
                <a href="/arsip">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Arsip Perkara</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Bank Putusan') ? 'active' : ''}}">
                <a href="/bankput">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Bank Putusan</span>
                </a>
            </li>

            <li class="opened {{ ( $title === 'Pinjam Berkas') ? 'active' : ''}}">
                <a href="/pinjam">
                    <i class="fa fa-user"></i>
                    <span class="title">Data Peminjam Berkas</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Himpunan Peraturan') ? 'active' : ''}}">
                <a href="/himper">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Himpunan Peraturan</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Pemberitahuan Putusan') ? 'active' : ''}}">
                <a href="/pbt">
                    <i class="fa fa-bullhorn"></i>
                    <span class="title">Pemberitahuan Putusan Banding</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Pengaduan') ? 'active' : ''}}">
                <a href="/pgd">
                    <i class="fa fa-users"></i>
                    <span class="title">Pengaduan</span>
                </a>
            </li>

            <li class="opened {{ ( $title === 'Perkara Eksekusi') ? 'active' : ''}}">
                <a href="/eks">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Perkara Eksekusi</span>
                </a>
            </li>
            <!-- <li class="opened {{ ( $title === 'Register Upaya Hukum') ? 'active' : ''}}">
                <a href="/uphukum">
                    <i class="fa fa-edit"></i>
                    <span class="title">Register Upaya Hukum</span>
                </a>
            </li> -->
            <li class="opened {{ ( $title === 'Kasasi Perkara') ? 'active' : ''}}">
                <a href="/kasasi">
                    <i class="fa fa-legal"></i>
                    <span class="title">Putusan Kasasi</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Peninjauan Kembali') ? 'active' : ''}}">
                <a href="/pk">
                    <i class="fa fa-legal"></i>
                    <span class="title">Putusan Peninjauan Kembali</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Register Kasasi') ? 'active' : ''}}">
                <a href="/reg_kasasi">
                    <i class="fa fa-edit"></i>
                    <span class="title">Register Kasasi</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Register Peninjauan Kembali') ? 'active' : ''}}">
                <a href="/reg_pk">
                    <i class="fa fa-edit"></i>
                    <span class="title">Register Peninjauan Kembali</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Retensi Arsip') ? 'active' : ''}}">
                <a href="/retensi">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Retensi Arsip Perkara</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Surat Keputusan') ? 'active' : ''}}">
                <a href="/suratkeputusan">
                    <i class="fa fa-edit"></i>
                    <span class="title">Surat Keputusan</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Surat Keluar') ? 'active' : ''}}">
                <a href="/suratkeluar">
                    <i class="fa fa-paper-plane-o"></i>
                    <span class="title">Surat Keluar</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Surat Masuk') ? 'active' : ''}}">
                <a href="/suratmasuk">
                    <i class="fa fa-envelope-o"></i>
                    <span class="title">Surat Masuk</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Member') ? 'active' : ''}}">
                <a href="/member">
                    <i class="fa fa-user"></i>
                    <span class="title">Data User</span>
                </a>
            </li>

            @elseif(Auth::user()->level===2)
            <li class="opened {{ ( $title === 'Dashboard') ? 'active' : ''}}">
                <a href="/">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Arsip Perkara') ? 'active' : ''}}">
                <a href="/arsip">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Arsip Perkara</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Bank Putusan') ? 'active' : ''}}">
                <a href="/bankput">
                    <i class="fa fa-bank"></i>
                    <span class="title">Bank Putusan</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Perkara Eksekusi') ? 'active' : ''}}">
                <a href="/eks">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Perkara Eksekusi</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Pinjam Berkas') ? 'active' : ''}}">
                <a href="/pinjam">
                    <i class="fa fa-user"></i>
                    <span class="title">Data Peminjam Berkas</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Himpunan Peraturan') ? 'active' : ''}}">
                <a href="/himper">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Himpunan Peraturan</span>
                </a>
            </li>

            <li class="opened {{ ( $title === 'Pemberitahuan Putusan') ? 'active' : ''}}">
                <a href="/pbt">
                    <i class="fa fa-bullhorn"></i>
                    <span class="title">Pemberitahuan Putusan</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Pengaduan') ? 'active' : ''}}">
                <a href="/pgd">
                    <i class="fa fa-users"></i>
                    <span class="title">Pengaduan</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Kasasi Perkara') ? 'active' : ''}}">
                <a href="/kasasi">
                    <i class="fa fa-legal"></i>
                    <span class="title">Putusan Kasasi</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Peninjauan Kembali') ? 'active' : ''}}">
                <a href="/pk">
                    <i class="fa fa-legal"></i>
                    <span class="title">Putusan Peninjauan Kembali</span>
                </a>
            </li>

            <!-- <li class="opened {{ ( $title === 'Register Upaya Hukum') ? 'active' : ''}}">
                <a href="/uphukum">
                    <i class="fa fa-edit"></i>
                    <span class="title">Register Upaya Hukum</span>
                </a>
            </li> -->
            <li class="opened {{ ( $title === 'Register Kasasi') ? 'active' : ''}}">
                <a href="/reg_kasasi">
                    <i class="fa fa-edit"></i>
                    <span class="title">Register Kasasi</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Register Peninjauan Kembali') ? 'active' : ''}}">
                <a href="/reg_pk">
                    <i class="fa fa-edit"></i>
                    <span class="title">Register Peninjauan Kembali</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Retensi Arsip') ? 'active' : ''}}">
                <a href="/retensi">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Retensi Arsip Perkara</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Surat Keputusan') ? 'active' : ''}}">
                <a href="/suratkeputusan">
                    <i class="fa fa-edit"></i>
                    <span class="title">Surat Keputusan</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Surat Masuk') ? 'active' : ''}}">
                <a href="/suratmasuk">
                    <i class="fa fa-envelope-o"></i>
                    <span class="title">Surat Masuk</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Surat Keluar') ? 'active' : ''}}">
                <a href="/suratkeluar">
                    <i class="fa fa-paper-plane-o"></i>
                    <span class="title">Surat Keluar</span>
                </a>
            </li>

            @elseif(Auth::user()->level===3)
            <li class="opened {{ ( $title === 'Dashboard') ? 'active' : ''}}">
                <a href="/">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Arsip Perkara') ? 'active' : ''}}">
                <a href="/arsip">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Arsip Perkara</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Bank Putusan') ? 'active' : ''}}">
                <a href="/bankput">
                    <i class="fa fa-bank"></i>
                    <span class="title">Bank Putusan</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Perkara Eksekusi') ? 'active' : ''}}">
                <a href="/eks">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Perkara Eksekusi</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Pinjam Berkas') ? 'active' : ''}}">
                <a href="/pinjam">
                    <i class="fa fa-user"></i>
                    <span class="title">Data Peminjam Berkas</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Himpunan Peraturan') ? 'active' : ''}}">
                <a href="/himper">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Himpunan Peraturan</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Kasasi Perkara') ? 'active' : ''}}">
                <a href="/kasasi">
                    <i class="fa fa-legal"></i>
                    <span class="title">Kasasi</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Pemberitahuan Putusan') ? 'active' : ''}}">
                <a href="/pbt">
                    <i class="fa fa-bullhorn"></i>
                    <span class="title">Pemberitahuan Putusan</span>
                </a>
            </li>
            <!-- <li class="opened {{ ( $title === 'Pengaduan') ? 'active' : ''}}">
                <a href="/pgd">
                    <i class="fa fa-users"></i>
                    <span class="title">Pengaduan</span>
                </a>
            </li> -->
            <li class="opened {{ ( $title === 'Peninjauan Kembali') ? 'active' : ''}}">
                <a href="/pk">
                    <i class="fa fa-legal"></i>
                    <span class="title">Peninjauan Kembali</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Register Kasasi') ? 'active' : ''}}">
                <a href="/reg_kasasi">
                    <i class="fa fa-edit"></i>
                    <span class="title">Register Kasasi</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Register Peninjauan Kembali') ? 'active' : ''}}">
                <a href="/reg_pk">
                    <i class="fa fa-edit"></i>
                    <span class="title">Register Peninjauan Kembali</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Retensi Arsip') ? 'active' : ''}}">
                <a href="/retensi">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Retensi Arsip Perkara</span>
                </a>
            </li>
            <!-- <li class="opened {{ ( $title === 'Register Upaya Hukum') ? 'active' : ''}}">
                <a href="/uphukum">
                    <i class="fa fa-edit"></i>
                    <span class="title">Register Upaya Hukum</span>
                </a>
            </li> -->
            <li class="opened {{ ( $title === 'Surat Masuk') ? 'active' : ''}}">
                <a href="/suratmasuk">
                    <i class="fa fa-envelope-o"></i>
                    <span class="title">Surat Masuk</span>
                </a>
            </li>
            <li class="opened {{ ( $title === 'Surat Keluar') ? 'active' : ''}}">
                <a href="/suratkeluar">
                    <i class="fa fa-paper-plane-o"></i>
                    <span class="title">Surat Keluar</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
<!-- /Sidebar -->