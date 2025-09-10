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

        // Tanggal sekarang
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        // Arsip
        $arsip = DB::table('tb_arsip_perkara')->count();
        $arsip_total = number_format($arsip, 0, ",", ".");

        $arsip_masuk = DB::table('tb_arsip_perkara')
            ->whereYear('tgl_masuk', $year)
            ->count();

        $arsip_masuk_bln_ini = DB::table('tb_arsip_perkara')
            ->whereMonth('tgl_masuk', $month)
            ->count();

        // Jumlah arsip belum alih media
        $arsip_blm_alihmedia = DB::table('tb_arsip_perkara')
            ->where(function ($query) {
                $query->where('putusan', '0000-00-00')
                    ->orWhereNull('putusan');
            })
            ->count();

        $arsip_alihmedia = $arsip - $arsip_blm_alihmedia;
        $arsip_presentase = $arsip > 0 ? round(($arsip_alihmedia / $arsip) * 100) : 0;

        // Bank Putusan
        $bankput_putus = DB::table('tb_bank_putusan')
            ->whereYear('tgl_put_banding', $year)
            ->count();

        $bankput_up_put = DB::table('tb_bank_putusan')
            ->whereNotNull('put_rtf')
            ->count();

        $bankput_up_anonim = DB::table('tb_bank_putusan')
            ->whereNotNull('put_anonim')
            ->count();

        $bankput = DB::table('tb_bank_putusan')->count();
        $bankput_total = number_format($bankput, 0, ",", ".");

        $bankput_bln_ini = DB::table('tb_bank_putusan')
            ->whereMonth('tgl_put_banding', $month)
            ->count();

        $bankput_presentase = $bankput > 0 ? round((($bankput_up_put + $bankput_up_anonim) / 2 / $bankput) * 100) : 0;

        // Peminjaman
        $pinjam = DB::table('tb_pinjam_berkas')->count();
        $pinjam_bl_kembali = DB::table('tb_pinjam_berkas')->whereNull('tgl_kembali')->count();
        $pinjam_kembali = $pinjam - $pinjam_bl_kembali;
        $pinjam_presentase = $pinjam > 0 ? round(($pinjam_kembali / $pinjam) * 100) : 0;

        // Surat Masuk
        $suratmasuk_total = DB::table('tb_surat_masuk')->count();
        $suratmasuk_total_number = number_format($suratmasuk_total, 0, ",", ".");

        $suratmasuk = DB::table('tb_surat_masuk')
            ->whereYear('tgl_masuk_pan', $year)
            ->count();

        $suratmasuk_number = number_format($suratmasuk, 0, ",", ".");

        $suratmasuk_bln_ini = DB::table('tb_surat_masuk')
            ->whereMonth('tgl_masuk_pan', $month)
            ->count();

        $suratmasuk_upload = DB::table('tb_surat_masuk')
            ->whereNotNull('lampiran')
            ->count();

        $suratmasuk_blm_upload = DB::table('tb_surat_masuk')
            ->whereNull('lampiran')
            ->count();

        $suratmasuk_presentase = $suratmasuk_total > 0 ? round(($suratmasuk_upload / $suratmasuk_total) * 100) : 0;

        // Surat Keluar
        $suratkeluar_total = DB::table('tb_surat_keluar')->count();

        $suratkeluar = DB::table('tb_surat_keluar')
            ->whereYear('tgl_surat', $year)
            ->count();

        $suratkeluar_bln_ini = DB::table('tb_surat_keluar')
            ->whereMonth('tgl_surat', $month)
            ->count();

        $suratkeluar_upload = DB::table('tb_surat_keluar')
            ->whereNotNull('surat_pta')
            ->count();

        $suratkeluar_blm_upload = DB::table('tb_surat_keluar')
            ->whereNull('surat_pta')
            ->count();

        $suratkeluar_presentase = $suratkeluar_total > 0 ? round(($suratkeluar_upload / $suratkeluar_total) * 100) : 0;

        // Himper
        $himper_total = DB::table('tb_jdih')->count();
        $himper_upload = DB::table('tb_jdih')
            ->whereNotNull('dokumen')
            ->count();

        $himper_blm_upload = DB::table('tb_jdih')
            ->whereNull('dokumen')
            ->count();

        $himper_presentase = $himper_total > 0 ? round(($himper_upload / $himper_total) * 100) : 0;

        // Kasasi
        $kasasi_total = DB::table('tb_kasasi')->count();

        $kasasi = DB::table('tb_kasasi')
            ->whereYear('tgl_masuk', $year)
            ->count();

        $kasasi_bln_ini = DB::table('tb_kasasi')
            ->whereMonth('tgl_masuk', $month)
            ->count();

        $kasasi_upload = DB::table('tb_kasasi')
            ->whereNotNull('salput_kasasi')
            ->count();

        $kasasi_blm_upload = DB::table('tb_kasasi')
            ->whereNull('salput_kasasi')
            ->count();

        $kasasi_presentase = $kasasi_total > 0 ? round(($kasasi_upload / $kasasi_total) * 100) : 0;

        // PBT
        $pbt_total = DB::table('tb_pbt_banding')->count();

        $pbt = DB::table('tb_pbt_banding')
            ->whereYear('tgl_masuk', $year)
            ->count();

        $pbt_bln_ini = DB::table('tb_pbt_banding')
            ->whereMonth('tgl_masuk', $month)
            ->count();

        $pbt_upload = DB::table('tb_pbt_banding')
            ->whereNotNull('pbt_put')
            ->count();

        $pbt_blm_upload = DB::table('tb_pbt_banding')
            ->whereNull('pbt_put')
            ->count();

        $pbt_presentase = $pbt_total > 0 ? round(($pbt_upload / $pbt_total) * 100) : 0;

        // Pengaduan
        $pgd_total = DB::table('tb_pengaduan')->count();

        $pgd_masuk_thn_ini = DB::table('tb_pengaduan')
            ->whereYear('tgl_terima_pgd', $year)
            ->count();

        $pgd_bln_ini = DB::table('tb_pengaduan')
            ->whereMonth('tgl_terima_pgd', $month)
            ->count();

        $pgd_upload = DB::table('tb_pengaduan')
            ->whereNotNull('surat_pgd')
            ->count();

        $pgd_blm_upload = DB::table('tb_pengaduan')
            ->whereNull('surat_pgd')
            ->count();

        $pgd_selesai = DB::table('tb_pengaduan')
            ->whereIn('status_pgd', ['Diarsipkan', 'Selesai', 'Klarifikasi'])
            ->count();

        $pgd_blm_selesai = $pgd_total - $pgd_selesai;
        $pgd_presentase = $pgd_total > 0 ? round(($pgd_selesai / $pgd_total) * 100) : 0;

        // Peninjauan Kembali
        $pk_total = DB::table('tb_peninjauan_kembali')->count();

        $pk = DB::table('tb_peninjauan_kembali')
            ->whereYear('tgl_masuk', $year)
            ->count();

        $pk_bln_ini = DB::table('tb_peninjauan_kembali')
            ->whereMonth('tgl_masuk', $month)
            ->count();

        $pk_upload = DB::table('tb_peninjauan_kembali')
            ->whereNotNull('salput_pk')
            ->count();

        $pk_blm_upload = DB::table('tb_peninjauan_kembali')
            ->whereNull('salput_pk')
            ->count();

        $pk_presentase = $pk_total > 0 ? round(($pk_upload / $pk_total) * 100) : 0;

        // Retensi
        $retensi = DB::table('tb_retensi_arsip')->count();
        $retensi_total = number_format($retensi, 0, ",", ".");

        $retensi_bln_ini = DB::table('tb_retensi_arsip')
            ->whereMonth('tgl_put_banding', $month)
            ->count();

        $retensi_up = DB::table('tb_retensi_arsip')
            ->whereNotNull('putusan')
            ->count();

        $retensi_upload = number_format($retensi_up, 0, ",", ".");

        $retensi_blm_upload = DB::table('tb_retensi_arsip')
            ->whereNull('putusan')
            ->count();

        $retensi_presentase = $retensi > 0 ? round(($retensi_up / $retensi) * 100) : 0;

        // Register Kasasi
        $reg_kasasi_total = DB::table('tb_reg_kasasi')->count();

        $reg_kasasi_masuk_thn_ini = DB::table('tb_reg_kasasi')
            ->whereYear('tgl_register', $year)
            ->count();

        $reg_kasasi_bln_ini = DB::table('tb_reg_kasasi')
            ->whereMonth('tgl_register', $month)
            ->count();

        $reg_kasasi_blm_selesai = DB::table('tb_reg_kasasi')
            ->where(function ($query) {
                $query->where('tgl_put_kasasi', '0000-00-00')
                    ->orWhereNull('tgl_put_kasasi');
            })
            ->count();

        $reg_kasasi_selesai = $reg_kasasi_total - $reg_kasasi_blm_selesai;
        $reg_kasasi_presentase = $reg_kasasi_total > 0 ? round(($reg_kasasi_selesai / $reg_kasasi_total) * 100) : 0;

        // Register PK
        $reg_pk_total = DB::table('tb_reg_pk')->count();

        $reg_pk_masuk_thn_ini = DB::table('tb_reg_pk')
            ->whereYear('tgl_register', $year)
            ->count();

        $reg_pk_bln_ini = DB::table('tb_reg_pk')
            ->whereMonth('tgl_register', $month)
            ->count();

        $reg_pk_blm_selesai = DB::table('tb_reg_pk')
            ->where(function ($query) {
                $query->where('tgl_put_pk', '0000-00-00')
                    ->orWhereNull('tgl_put_pk');
            })
            ->count();

        $reg_pk_selesai = $reg_pk_total - $reg_pk_blm_selesai;
        $reg_pk_presentase = $reg_pk_total > 0 ? round(($reg_pk_selesai / $reg_pk_total) * 100) : 0;

        // Eksekusi
        $eksekusi_total = DB::table('tb_eksekusi')->count();

        $eksekusi_masuk_thn_ini = DB::table('tb_eksekusi')
            ->whereYear('tgl_permohonan', $year)
            ->count();

        $eksekusi_bln_ini = DB::table('tb_eksekusi')
            ->whereMonth('tgl_permohonan', $month)
            ->count();

        $eksekusi_blm_selesai = DB::table('tb_eksekusi')
            ->where(function ($query) {
                $query->where('tgl_selesai', '0000-00-00')
                    ->orWhereNull('tgl_selesai');
            })
            ->count();

        $eksekusi_selesai = $eksekusi_total - $eksekusi_blm_selesai;
        $eksekusi_presentase = $eksekusi_total > 0 ? round(($eksekusi_selesai / $eksekusi_total) * 100) : 0;

        return view('dashboard', $data, compact(
            'arsip_masuk',
            'arsip_total',
            'arsip_alihmedia',
            'arsip_presentase',
            'bankput_total',
            'bankput_putus',
            'bankput_up_put',
            'bankput_up_anonim',
            'bankput_presentase',
            'bankput_bln_ini',
            'pinjam',
            'pinjam_bl_kembali',
            'pinjam_presentase',
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
            'eksekusi_selesai'
        ));
    }
}
