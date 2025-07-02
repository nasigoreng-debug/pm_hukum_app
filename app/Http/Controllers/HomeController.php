<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        //Function Tahun sekarang
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        //Arsip
        $arsip = DB::table('tb_arsip_perkara')
            ->count();

        //Arsip Total
        $arsip_total = number_format($arsip, 0, ",", ".");

        //Jumlah arsip masuk
        $arsip_masuk = DB::table('tb_arsip_perkara')
            ->whereYear('tgl_masuk', $year)
            ->count();

        $arsip_masuk_bln_ini = DB::table('tb_arsip_perkara')
            ->whereMonth('tgl_masuk', $month)
            ->count();

        //Jumlah arsip sudah alih media
        $arsip_alihmedia_0000 = DB::table('tb_arsip_perkara')->where('putusan', 0000 - 00 - 00)->count();
        //Jumlah arsip sudah alih media
        $arsip_alihmedia_null = DB::table('tb_arsip_perkara')->where('putusan', Null)->count();

        //Jumlah arsip sudah alih media
        $arsip_blm_alihmedia = $arsip_alihmedia_0000 +  $arsip_alihmedia_null;

        $arsip_alihmedia = $arsip - $arsip_blm_alihmedia;

        //Persentasi alih media terhadap arsip masuk
        $arsip_progres = $arsip_alihmedia / $arsip * 100;
        $arsip_presentase = round($arsip_progres);

        //Bank Putusan

        //Jumlah perkara putus
        $bankput_putus = DB::table('tb_bank_putusan')
            ->whereYear('tgl_put_banding', $year)
            ->count();

        // //Jumlah perkara yang di register
        // $bankput_reg = DB::table('tb_bank_putusan')
        //     ->whereYear('tgl_reg', $year)
        //     ->count();

        //Jumlah upload putusan akhir
        $bankput_up_put = DB::table('tb_bank_putusan')
            ->whereNotNull('put_rtf')
            ->count();

        //Jumlah upload putusan anonimasi
        $bankput_up_anonim = DB::table('tb_bank_putusan')
            ->whereNotNull('put_anonim')
            ->count();

        //Jumlah total upload putusan
        $bankput = DB::table('tb_bank_putusan')->count();
        $bankput_total = number_format($bankput, 0, ",", ".");

        //Jumlah Putusan Bulan Ini
        $bankput_bln_ini = DB::table('tb_bank_putusan')
            ->whereMonth('tgl_put_banding', $month)
            ->count();

        //Persentasi upload terhadap jumlah putus
        $bankput_tambah = $bankput_up_put + $bankput_up_anonim;
        $bankput_bagi2 = $bankput_tambah / 2;
        $bankput_progres = $bankput_bagi2 / $bankput * 100;
        $bankput_presentase = round($bankput_progres);

        //Jumlah Peminjam
        $pinjam = DB::table('tb_arsip_perkara')->count();

        //Belum kembali

        $pinjam_bl_kembali_0000 = DB::table('tb_pinjam_berkas')->whereNull('tgl_kembali')->count();

        $pinjam_bl_kembali_null = DB::table('tb_pinjam_berkas')->whereNotNull('tgl_kembali')->count();

        $pinjam_bl_kembali = $pinjam_bl_kembali_0000;

        //Pinjam Kembali
        $pinjam_kembali = $pinjam - $pinjam_bl_kembali;
        //Presentase berkas kembali

        $pinjam_progres = $pinjam_kembali / $pinjam * 100;

        $pinjam_presentase = round($pinjam_progres);

        //Surat Masuk
        $suratmasuk_total = DB::table('tb_surat_masuk')->count();

        //Surat Masuk Total Number
        $suratmasuk_total_number = number_format($suratmasuk_total, 0, ",", ".");

        $suratmasuk = DB::table('tb_surat_masuk')
            ->whereYear('tgl_masuk_pan', $year)
            ->count();

        //Surat Masuk Number
        $suratmasuk_number = number_format($suratmasuk, 0, ",", ".");

        //Surat Masuk Bulan Ini
        $suratmasuk_bln_ini = DB::table('tb_surat_masuk')
            ->whereMonth('tgl_masuk_pan', $month)
            ->count();

        //Surat Masuk upload
        $suratmasuk_upload = DB::table('tb_surat_masuk')
            ->whereNotNull('lampiran')
            ->count();

        //Surat Masuk belum upload
        $suratmasuk_blm_upload = DB::table('tb_surat_masuk')
            ->whereNull('lampiran')
            ->count();

        //Presentase Surat Masuk upload
        $suratmasuk_progres = $suratmasuk_upload / $suratmasuk_total * 100;
        $suratmasuk_presentase = round($suratmasuk_progres);

        //Surat Keluar Total
        $suratkeluar_total = DB::table('tb_surat_keluar')->count();

        //Surat keluar
        $suratkeluar = DB::table('tb_surat_keluar')
            ->whereYear('tgl_surat', $year)
            ->count();

        //Surat keluar Bulan Ini
        $suratkeluar_bln_ini = DB::table('tb_surat_keluar')
            ->whereMonth('tgl_surat', $month)
            ->count();

        //Surat keluar upload
        $suratkeluar_upload = DB::table('tb_surat_keluar')
            ->whereNotNull('surat_pta')
            ->count();

        //Surat keluar belum upload
        $suratkeluar_blm_upload = DB::table('tb_surat_keluar')
            ->whereNull('tgl_surat')
            ->count();

        //Presentase Surat keluar upload
        $suratkeluar_progres = $suratkeluar_upload / $suratkeluar_total * 100;
        $suratkeluar_presentase = round($suratkeluar_progres);

        //Jumlah total Retensi Arsip
        $retensi_total = DB::table('tb_retensi_arsip')->count();

        //Himper
        $himper_total = DB::table('tb_jdih')->count();

        //Himper upload
        $himper_upload = DB::table('tb_jdih')
            ->whereNotNull('dokumen')
            ->count();

        //Himper belum upload
        $himper_blm_upload = DB::table('tb_jdih')
            ->whereNull('dokumen')
            ->count();

        //Presentase Himper upload
        $himper_progres = $himper_upload / $himper_total * 100;
        $himper_presentase = round($himper_progres);

        //Kasasi Total
        $kasasi_total = DB::table('tb_kasasi')->count();

        //Kasasi
        $kasasi = DB::table('tb_kasasi')
            ->whereYear('tgl_masuk', $year)
            ->count();

        //Kasasi Bulan Ini
        $kasasi_bln_ini = DB::table('tb_kasasi')
            ->whereMonth('tgl_masuk', $month)
            ->count();

        //Kasasi upload
        $kasasi_upload = DB::table('tb_kasasi')
            ->whereNotNull('salput_kasasi')
            ->count();

        //Kasasi belum upload
        $kasasi_blm_upload = DB::table('tb_kasasi')
            ->whereNull('salput_kasasi')
            ->count();

        //Presentase kasasi upload
        $kasasi_progres = $kasasi_upload / $kasasi_total * 100;
        $kasasi_presentase = round($kasasi_progres);

        //pbt Total
        $pbt_total = DB::table('tb_pbt_banding')->count();

        //pbt
        $pbt = DB::table('tb_pbt_banding')
            ->whereYear('tgl_masuk', $year)
            ->count();

        //pbt Bulan Ini
        $pbt_bln_ini = DB::table('tb_pbt_banding')
            ->whereMonth('tgl_masuk', $month)
            ->count();

        //pbt upload
        $pbt_upload = DB::table('tb_pbt_banding')
            ->whereNotNull('pbt_put')
            ->count();

        //pbt belum upload
        $pbt_blm_upload = DB::table('tb_pbt_banding')
            ->whereNull('pbt_put')
            ->count();

        //Presentase pbt upload
        $pbt_progres = $pbt_upload / $arsip * 100;
        $pbt_presentase = round($pbt_progres);

        //pbt Total
        $pgd_total = DB::table('tb_pengaduan')->count();

        //pgd
        $pgd_masuk_thn_ini = DB::table('tb_pengaduan')
            ->whereYear('tgl_terima_pgd', $year)
            ->count();

        //pgd Bulan Ini
        $pgd_bln_ini = DB::table('tb_pengaduan')
            ->whereDay('tgl_terima_pgd', $day)
            ->count();

        //pgd upload
        $pgd_upload = DB::table('tb_pengaduan')
            ->whereNotNull('surat_pgd')
            ->count();

        //pgd belum upload
        $pgd_blm_upload = DB::table('tb_pengaduan')
            ->whereNull('surat_pgd')
            ->count();

        //pgd belum selesai diarsipkan
        $pgd_blm_diarsipkan = DB::table('tb_pengaduan')->where('status_pgd', 'Diarsipkan')->count();

        //pgd belum selesai selesai
        $pgd_blm_selesai = DB::table('tb_pengaduan')->where('status_pgd', 'Selesai')->count();

        //pgd belum selesai klarifikasi
        $pgd_blm_klarifikasi = DB::table('tb_pengaduan')->where('status_pgd', 'Klarifikasi')->count();

        // //pgd belum selesai disposisi
        // $pgd_blm_disposisi = DB::table('tb_pengaduan')->where('status_pgd', 'Disposisi')->count();

        //pgd selesai 
        $pgd_selesai = $pgd_blm_diarsipkan + $pgd_blm_selesai + $pgd_blm_klarifikasi;

        //pgd belum selesai
        $pgd_blm_selesai = $pgd_total - $pgd_selesai;

        //Presentase selesai
        $pgd_progres = $pgd_selesai / $pgd_total * 100;
        $pgd_presentase = round($pgd_progres);

        //pk Total
        $pk_total = DB::table('tb_peninjauan_kembali')->count();

        //pk
        $pk = DB::table('tb_peninjauan_kembali')
            ->whereYear('tgl_masuk', $year)
            ->count();

        //pk Bulan Ini
        $pk_bln_ini = DB::table('tb_peninjauan_kembali')
            ->whereMonth('tgl_masuk', $month)
            ->count();

        //pk upload
        $pk_upload = DB::table('tb_peninjauan_kembali')
            ->whereNotNull('salput_pk')
            ->count();

        //pk belum upload
        $pk_blm_upload = DB::table('tb_peninjauan_kembali')
            ->whereNull('salput_pk')
            ->count();

        //Presentase pk upload
        $pk_progres = $pk_upload / $pk_total * 100;
        $pk_presentase = round($pk_progres);

        //retensi
        $retensi = DB::table('tb_retensi_arsip')
            ->count();

        //retensi Total
        $retensi_total = number_format($retensi, 0, ",", ".");

        //retensi Bulan Ini
        $retensi_bln_ini = DB::table('tb_retensi_arsip')
            ->whereMonth('tgl_put_banding', $month)
            ->count();

        //retensi belum upload
        $retensi_blm_upload = DB::table('tb_retensi_arsip')->where('putusan', '')->count();


        //retensi upload
        $retensi_up = $retensi - $retensi_blm_upload;
        $retensi_upload = number_format($retensi_up, 0, ",", ".");

        //Presentase retensi upload
        $retensi_progres = $retensi_up / $retensi * 100;
        $retensi_presentase = round($retensi_progres);

        //register kasasi
        $reg_kasasi_total = DB::table('tb_reg_kasasi')
            ->count();

        $reg_kasasi_masuk_thn_ini = DB::table('tb_reg_kasasi')
            ->whereYear('tgl_register', $year)
            ->count();

        //register kasasi Bulan Ini
        $reg_kasasi_bln_ini = DB::table('tb_reg_kasasi')
            ->whereMonth('tgl_register', $month)
            ->count();

        //register kasasi belum selesai
        $reg_kasasi_blm_selesai_0000 = DB::table('tb_reg_kasasi')->where('tgl_put_kasasi', 0000 - 00 - 00)->count();

        //reg_kasasi belum selesai
        $reg_kasasi_blm_selesai_null = DB::table('tb_reg_kasasi')->where('tgl_put_kasasi', Null)->count();

        $reg_kasasi_blm_selesai = $reg_kasasi_blm_selesai_0000 + $reg_kasasi_blm_selesai_null;

        //reg_kasasi selesai 
        $reg_kasasi_selesai = $reg_kasasi_total - $reg_kasasi_blm_selesai;

        //Presentase reg_kasasi upload
        $reg_kasasi_progres = $reg_kasasi_selesai / $reg_kasasi_total * 100;
        $reg_kasasi_presentase = round($reg_kasasi_progres);

        // $reg_kasasi_kasasi = DB::table('tb_reg_kasasi')->where('keterangan', 'Kasasi')->count();

        // $reg_kasasi_pk = DB::table('tb_reg_kasasi')->where('tgl_put_kasasi', Null)->value('Kasasi')->count();



        //pk kasasi
        $reg_pk_total = DB::table('tb_reg_pk')
            ->count();

        $reg_pk_masuk_thn_ini = DB::table('tb_reg_pk')
            ->whereYear('tgl_register', $year)
            ->count();
        //PK Bulan Ini
        $reg_pk_bln_ini = DB::table('tb_reg_pk')
            ->whereMonth('tgl_register', $month)
            ->count();

        //reg_pk belum selesai
        $reg_pk_blm_selesai_0000 = DB::table('tb_reg_pk')->where('tgl_put_pk', 0000 - 00 - 00)->count();

        //reg_pk belum selesai
        $reg_pk_blm_selesai_null = DB::table('tb_reg_pk')->where('tgl_put_pk', Null)->count();

        $reg_pk_blm_selesai = $reg_pk_blm_selesai_0000 + $reg_pk_blm_selesai_null;

        //reg_pk selesai 
        $reg_pk_selesai = $reg_pk_total - $reg_pk_blm_selesai;

        //Presentase reg_pk upload
        $reg_pk_progres = $reg_pk_selesai / $reg_pk_total * 100;
        $reg_pk_presentase = round($reg_pk_progres);

        // $reg_pk_kasasi = DB::table('tb_reg_pk')->where('keterangan', 'Kasasi')->count();

        // $reg_pk_pk = DB::table('tb_reg_pk')->where('tgl_put_pk', Null)->value('Kasasi')->count();

        //eksekusi
        $eksekusi_total = DB::table('tb_eksekusi')
            ->count();

        //eksekusi
        $eksekusi_masuk_thn_ini = DB::table('tb_eksekusi')
            ->whereYear('tgl_permohonan', $year)
            ->count();

        //eksekusi Bulan Ini
        $eksekusi_bln_ini = DB::table('tb_eksekusi')
            ->whereDay('tgl_permohonan', $day)
            ->count();

        //eksekusi belum selesai
        $eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('tgl_selesai', Null)->count();

        $eksekusi_blm_selesai =  $eksekusi_blm_selesai_0000 + $eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $eksekusi_selesai = $eksekusi_total - $eksekusi_blm_selesai;

        //Presentase selesai
        $eksekusi_progres = $eksekusi_selesai / $eksekusi_total * 100;
        $eksekusi_presentase = round($eksekusi_progres);

        return view('dashboard', $data, compact(
            'arsip_masuk',
            'arsip_total',
            'arsip_alihmedia',
            'arsip_presentase',
            'bankput_total',
            'bankput_putus',
            // 'bankput_reg',
            'bankput_up_put',
            'bankput_up_anonim',
            'bankput_presentase',
            'pinjam',
            'pinjam_bl_kembali',
            'pinjam_progres',
            'pinjam_presentase',
            'kasasi',
            'suratmasuk',
            'suratmasuk_total',
            'suratmasuk_total_number',
            'suratmasuk_number',
            'suratmasuk_bln_ini',
            'suratmasuk_blm_upload',
            'suratmasuk_presentase',
            'suratkeluar_total',
            'suratkeluar',
            'suratkeluar_bln_ini',
            'suratkeluar_blm_upload',
            'suratkeluar_presentase',
            'himper_total',
            'himper_upload',
            'himper_blm_upload',
            'himper_presentase',
            'kasasi_total',
            'kasasi',
            'kasasi_bln_ini',
            'kasasi_blm_upload',
            'kasasi_presentase',
            'pbt_total',
            'pbt',
            'pbt_bln_ini',
            'pbt_blm_upload',
            'pbt_presentase',
            'pgd_total',
            'pgd_masuk_thn_ini',
            'pgd_bln_ini',
            'pgd_blm_selesai',
            'pgd_blm_upload',
            'pgd_presentase',
            'pk_total',
            'pk',
            'pk_bln_ini',
            'pk_blm_upload',
            'pk_presentase',
            'retensi_total',
            'retensi',
            'retensi_upload',
            'retensi_bln_ini',
            'retensi_blm_upload',
            'retensi_presentase',
            'reg_kasasi_total',
            'reg_kasasi_blm_selesai',
            'reg_kasasi_selesai',
            'reg_kasasi_bln_ini',
            'reg_kasasi_masuk_thn_ini',
            'reg_kasasi_presentase',
            'reg_pk_total',
            'reg_pk_blm_selesai',
            'reg_pk_selesai',
            'reg_pk_bln_ini',
            'reg_pk_masuk_thn_ini',
            'reg_pk_presentase',
            'eksekusi_total',
            'eksekusi_masuk_thn_ini',
            'eksekusi_bln_ini',
            'eksekusi_presentase',
            'eksekusi_blm_selesai',
            'eksekusi_selesai',
            'eksekusi_presentase',

        ));
    }
}
