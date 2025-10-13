<!-- Sidebar -->
<div class="sidebar-menu toggle-others fixed">
    <div class="sidebar-menu-inner">
        <!-- Sidebar User Info Bar - Added in 1.3 -->
        <section class="sidebar-user-info">
            <div class="sidebar-user-info-inner">
                <a href="extra-profile.html" class="user-profile">
                    <img src="<?php echo e(asset('public/storage/users/' . Auth::user()->foto_user)); ?>" width="50" height="60"
                        class="img-circle img-corona" />
                    <span class="user-status is-online" style="font-size: 12px;">
                        <h5 class="text-white"><?php echo e(Auth::user()->name); ?></h5>
                        <p class="text-yellow">
                            <?php if(Auth::user()->level === 1): ?>
                                Administrator
                            <?php elseif(Auth::user()->level === 2): ?>
                                Staf
                            <?php elseif(Auth::user()->level === 3): ?>
                                User
                            <?php endif; ?>
                        </p>
                        <p class="text-success">
                            <i class="fa fa-circle"></i>
                            <span>online</span>
                        </p>
                    </span>
                </a>
            </div>
        </section>

        <ul id="main-menu" class="main-menu">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->

            <?php if(Auth::user()->level === 1): ?>
                <!-- Menu Administrator -->
                <li class="opened <?php echo e($title === 'Dashboard' ? 'active' : ''); ?>">
                    <a href="/">
                        <i class="fa fa-dashboard"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Retensi Arsip' ? 'active' : ''); ?>">
                    <a href="/retensi">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">Arsip Perkara 1986 s.d 2018</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Arsip Perkara' ? 'active' : ''); ?>">
                    <a href="/arsip">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">Arsip Perkara 2019 s.d <?php echo date('Y'); ?></span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Bank Putusan' ? 'active' : ''); ?>">
                    <a href="/bankput">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">Bank Putusan</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Pinjam Berkas' ? 'active' : ''); ?>">
                    <a href="/pinjam">
                        <i class="fa fa-user"></i>
                        <span class="title">Data Peminjam Berkas</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Himpunan Peraturan' ? 'active' : ''); ?>">
                    <a href="/himper">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">Himpunan Peraturan</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Pemberitahuan Putusan' ? 'active' : ''); ?>">
                    <a href="/pbt">
                        <i class="fa fa-bullhorn"></i>
                        <span class="title">Pemberitahuan Putusan Banding</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Pengaduan' ? 'active' : ''); ?>">
                    <a href="/pgd">
                        <i class="fa fa-users"></i>
                        <span class="title">Pengaduan</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Perkara Eksekusi' ? 'active' : ''); ?>">
                    <a href="/eks">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">Perkara Eksekusi</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Kasasi Perkara' ? 'active' : ''); ?>">
                    <a href="/kasasi">
                        <i class="fa fa-legal"></i>
                        <span class="title">Putusan Kasasi</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Peninjauan Kembali' ? 'active' : ''); ?>">
                    <a href="/pk">
                        <i class="fa fa-legal"></i>
                        <span class="title">Putusan Peninjauan Kembali</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Register Kasasi' ? 'active' : ''); ?>">
                    <a href="/reg_kasasi">
                        <i class="fa fa-edit"></i>
                        <span class="title">Register Kasasi</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Register Peninjauan Kembali' ? 'active' : ''); ?>">
                    <a href="/reg_pk">
                        <i class="fa fa-edit"></i>
                        <span class="title">Register Peninjauan Kembali</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Surat Keputusan' ? 'active' : ''); ?>">
                    <a href="/suratkeputusan">
                        <i class="fa fa-edit"></i>
                        <span class="title">Surat Keputusan</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Surat Keluar' ? 'active' : ''); ?>">
                    <a href="/suratkeluar">
                        <i class="fa fa-paper-plane-o"></i>
                        <span class="title">Surat Keluar</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Surat Masuk' ? 'active' : ''); ?>">
                    <a href="/suratmasuk">
                        <i class="fa fa-envelope-o"></i>
                        <span class="title">Surat Masuk</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Laporan' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('laporans.index')); ?>">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">Laporan</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'User' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('users.index')); ?>">
                        <i class="fa fa-user"></i>
                        <span class="title">Data User</span>
                    </a>
                </li>
            <?php elseif(Auth::user()->level === 2): ?>
                <!-- Menu Staf -->
                <li class="opened <?php echo e($title === 'Dashboard' ? 'active' : ''); ?>">
                    <a href="/">
                        <i class="fa fa-dashboard"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Retensi Arsip' ? 'active' : ''); ?>">
                    <a href="/retensi">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">Arsip Perkara 1986 s.d 2018</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Arsip Perkara' ? 'active' : ''); ?>">
                    <a href="/arsip">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">Arsip Perkara 2019 s.d <?php echo date('Y'); ?></span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Bank Putusan' ? 'active' : ''); ?>">
                    <a href="/bankput">
                        <i class="fa fa-bank"></i>
                        <span class="title">Bank Putusan</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Perkara Eksekusi' ? 'active' : ''); ?>">
                    <a href="/eks">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">Perkara Eksekusi</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Pinjam Berkas' ? 'active' : ''); ?>">
                    <a href="/pinjam">
                        <i class="fa fa-user"></i>
                        <span class="title">Data Peminjam Berkas</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Himpunan Peraturan' ? 'active' : ''); ?>">
                    <a href="/himper">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">Himpunan Peraturan</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Pemberitahuan Putusan' ? 'active' : ''); ?>">
                    <a href="/pbt">
                        <i class="fa fa-bullhorn"></i>
                        <span class="title">Pemberitahuan Putusan</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Pengaduan' ? 'active' : ''); ?>">
                    <a href="/pgd">
                        <i class="fa fa-users"></i>
                        <span class="title">Pengaduan</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Kasasi Perkara' ? 'active' : ''); ?>">
                    <a href="/kasasi">
                        <i class="fa fa-legal"></i>
                        <span class="title">Putusan Kasasi</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Peninjauan Kembali' ? 'active' : ''); ?>">
                    <a href="/pk">
                        <i class="fa fa-legal"></i>
                        <span class="title">Putusan Peninjauan Kembali</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Register Kasasi' ? 'active' : ''); ?>">
                    <a href="/reg_kasasi">
                        <i class="fa fa-edit"></i>
                        <span class="title">Register Kasasi</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Register Peninjauan Kembali' ? 'active' : ''); ?>">
                    <a href="/reg_pk">
                        <i class="fa fa-edit"></i>
                        <span class="title">Register Peninjauan Kembali</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Surat Keputusan' ? 'active' : ''); ?>">
                    <a href="/suratkeputusan">
                        <i class="fa fa-edit"></i>
                        <span class="title">Surat Keputusan</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Surat Masuk' ? 'active' : ''); ?>">
                    <a href="/suratmasuk">
                        <i class="fa fa-envelope-o"></i>
                        <span class="title">Surat Masuk</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Surat Keluar' ? 'active' : ''); ?>">
                    <a href="/suratkeluar">
                        <i class="fa fa-paper-plane-o"></i>
                        <span class="title">Surat Keluar</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Laporan' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('laporans.index')); ?>">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">Laporan</span>
                    </a>
                </li>
            <?php elseif(Auth::user()->level === 3): ?>
                <!-- Menu User -->
                <li class="opened <?php echo e($title === 'Dashboard' ? 'active' : ''); ?>">
                    <a href="/">
                        <i class="fa fa-dashboard"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Retensi Arsip' ? 'active' : ''); ?>">
                    <a href="/retensi">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">Arsip Perkara 1986 s.d 2018</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Arsip Perkara' ? 'active' : ''); ?>">
                    <a href="/arsip">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">Arsip Perkara 2019 s.d <?php echo date('Y'); ?></span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Bank Putusan' ? 'active' : ''); ?>">
                    <a href="/bankput">
                        <i class="fa fa-bank"></i>
                        <span class="title">Bank Putusan</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Perkara Eksekusi' ? 'active' : ''); ?>">
                    <a href="/eks">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">Perkara Eksekusi</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Pinjam Berkas' ? 'active' : ''); ?>">
                    <a href="/pinjam">
                        <i class="fa fa-user"></i>
                        <span class="title">Data Peminjam Berkas</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Himpunan Peraturan' ? 'active' : ''); ?>">
                    <a href="/himper">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">Himpunan Peraturan</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Kasasi Perkara' ? 'active' : ''); ?>">
                    <a href="/kasasi">
                        <i class="fa fa-legal"></i>
                        <span class="title">Kasasi</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Pemberitahuan Putusan' ? 'active' : ''); ?>">
                    <a href="/pbt">
                        <i class="fa fa-bullhorn"></i>
                        <span class="title">Pemberitahuan Putusan</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Peninjauan Kembali' ? 'active' : ''); ?>">
                    <a href="/pk">
                        <i class="fa fa-legal"></i>
                        <span class="title">Peninjauan Kembali</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Register Kasasi' ? 'active' : ''); ?>">
                    <a href="/reg_kasasi">
                        <i class="fa fa-edit"></i>
                        <span class="title">Register Kasasi</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Register Peninjauan Kembali' ? 'active' : ''); ?>">
                    <a href="/reg_pk">
                        <i class="fa fa-edit"></i>
                        <span class="title">Register Peninjauan Kembali</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Surat Masuk' ? 'active' : ''); ?>">
                    <a href="/suratmasuk">
                        <i class="fa fa-envelope-o"></i>
                        <span class="title">Surat Masuk</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Surat Keluar' ? 'active' : ''); ?>">
                    <a href="/suratkeluar">
                        <i class="fa fa-paper-plane-o"></i>
                        <span class="title">Surat Keluar</span>
                    </a>
                </li>
                <li class="opened <?php echo e($title === 'Laporan' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('laporans.index')); ?>">
                        <i class="fa fa-file-text-o"></i>
                        <span class="title">Laporan</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<!-- /Sidebar -->
<?php /**PATH C:\Users\Admin\Desktop\pm_hukum_app\resources\views/layouts/v_sidebar.blade.php ENDPATH**/ ?>