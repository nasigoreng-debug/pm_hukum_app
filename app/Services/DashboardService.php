<?php
// app/Services/DashboardService.php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Carbon;

class DashboardService
{
    public function getDashboardData()
    {
        return Cache::remember('dashboard_data', 300, function () {
            $year = now()->year;
            $month = now()->month;

            return [
                // ========== ARSIP PERKARA ==========
                'arsip_masuk' => $this->getArsipMasukTahunIni($year),
                'arsip_total' => $this->getTotalArsipFormatted(),
                'arsip_alihmedia' => $this->getArsipAlihMedia(),
                'arsip_presentase' => $this->getArsipPresentase(),

                // ========== BANK PUTUSAN ==========
                'bankput_putus' => $this->getBankPutusanPutusTahunIni($year),
                'bankput_total' => $this->getTotalBankPutusanFormatted(),
                'bankput_up_put' => $this->getBankPutusanUploadPutusan(),
                'bankput_up_anonim' => $this->getBankPutusanUploadAnonim(),
                'bankput_presentase' => $this->getBankPutusanPresentase(),

                // ========== SURAT MASUK ==========
                'suratmasuk' => $this->getSuratMasukTahunIni($year),
                'suratmasuk_total' => $this->getTotalSuratMasuk(),
                'suratmasuk_total_number' => $this->getTotalSuratMasukFormatted(),
                'suratmasuk_number' => $this->getSuratMasukTahunIniFormatted($year),
                'suratmasuk_bln_ini' => $this->getSuratMasukBulanIni($month),
                'suratmasuk_blm_upload' => $this->getSuratMasukBelumUpload(),
                'suratmasuk_presentase' => $this->getSuratMasukPresentase(),

                // ========== SURAT KELUAR ==========
                'suratkeluar' => $this->getSuratKeluarTahunIni($year),
                'suratkeluar_total' => $this->getTotalSuratKeluar(),
                'suratkeluar_bln_ini' => $this->getSuratKeluarBulanIni($month),
                'suratkeluar_blm_upload' => $this->getSuratKeluarBelumUpload(),
                'suratkeluar_presentase' => $this->getSuratKeluarPresentase(),

                // ========== PEMINJAMAN ==========
                'pinjam' => $this->getTotalPeminjaman(),
                'pinjam_bl_kembali' => $this->getPeminjamanBelumKembali(),
                'pinjam_presentase' => $this->getPeminjamanPresentase(),

                // ========== HIMPUNAN PERATURAN ==========
                'himper_total' => $this->getTotalHimper(),
                'himper_upload' => $this->getHimperTerupload(),
                'himper_blm_upload' => $this->getHimperBelumUpload(),
                'himper_presentase' => $this->getHimperPresentase(),

                // ========== KASASI ==========
                'kasasi' => $this->getKasasiTahunIni($year),
                'kasasi_total' => $this->getTotalKasasi(),
                'kasasi_bln_ini' => $this->getKasasiBulanIni($month),
                'kasasi_blm_upload' => $this->getKasasiBelumUpload(),
                'kasasi_presentase' => $this->getKasasiPresentase(),

                // ========== PBT ==========
                'pbt' => $this->getPbtTahunIni($year),
                'pbt_total' => $this->getTotalPbt(),
                'pbt_bln_ini' => $this->getPbtBulanIni($month),
                'pbt_blm_upload' => $this->getPbtBelumUpload(),
                'pbt_presentase' => $this->getPbtPresentase(),

                // ========== PENGADUAN ==========
                'pgd_total' => $this->getTotalPengaduan(),
                'pgd_masuk_thn_ini' => $this->getPengaduanTahunIni($year),
                'pgd_bln_ini' => $this->getPengaduanHariIni(),
                'pgd_blm_selesai' => $this->getPengaduanBelumSelesai(),
                'pgd_blm_upload' => $this->getPengaduanBelumUpload(),
                'pgd_presentase' => $this->getPengaduanPresentase(),

                // ========== PK ==========
                'pk' => $this->getPkTahunIni($year),
                'pk_total' => $this->getTotalPk(),
                'pk_bln_ini' => $this->getPkBulanIni($month),
                'pk_blm_upload' => $this->getPkBelumUpload(),
                'pk_presentase' => $this->getPkPresentase(),

                // ========== RETENSI ==========
                'retensi_total' => $this->getTotalRetensiFormatted(),
                'retensi' => $this->getTotalRetensi(),
                'retensi_upload' => $this->getRetensiTeruploadFormatted(),
                'retensi_bln_ini' => $this->getRetensiBulanIni($month),
                'retensi_blm_upload' => $this->getRetensiBelumUpload(),
                'retensi_presentase' => $this->getRetensiPresentase(),

                // ========== REGISTRASI KASASI ==========
                'reg_kasasi_total' => $this->getTotalRegKasasi(),
                'reg_kasasi_masuk_thn_ini' => $this->getRegKasasiTahunIni($year),
                'reg_kasasi_bln_ini' => $this->getRegKasasiBulanIni($month),
                'reg_kasasi_blm_selesai' => $this->getRegKasasiBelumSelesai(),
                'reg_kasasi_selesai' => $this->getRegKasasiSelesai(),
                'reg_kasasi_presentase' => $this->getRegKasasiPresentase(),

                // ========== REGISTRASI PK ==========
                'reg_pk_total' => $this->getTotalRegPk(),
                'reg_pk_masuk_thn_ini' => $this->getRegPkTahunIni($year),
                'reg_pk_bln_ini' => $this->getRegPkBulanIni($month),
                'reg_pk_blm_selesai' => $this->getRegPkBelumSelesai(),
                'reg_pk_selesai' => $this->getRegPkSelesai(),
                'reg_pk_presentase' => $this->getRegPkPresentase(),

                // ========== EKSEKUSI ==========
                'eksekusi_total' => $this->getTotalEksekusi(),
                'eksekusi_masuk_thn_ini' => $this->getEksekusiTahunIni($year),
                'eksekusi_bln_ini' => $this->getEksekusiHariIni(),
                'eksekusi_blm_selesai' => $this->getEksekusiBelumSelesai(),
                'eksekusi_selesai' => $this->getEksekusiSelesai(),
                'eksekusi_presentase' => $this->getEksekusiPresentase(),

                // ========== SURAT KEPUTUSAN ==========
                'sk_total' => $this->getTotalSk(),
                'sk' => $this->getSkTahunIni($year),
                'sk_bln_ini' => $this->getSkBulanIni($month),
                'sk_blm_upload' => $this->getSkBelumUpload(),
                'sk_upload' => $this->getSkUpload(),
                'sk_presentase' => $this->getSkPresentase(),
            ];
        });
    }

    // ==================== ARSIP PERKARA ====================
    private function getArsipMasukTahunIni($year)
    {
        return DB::table('arsips')
            ->whereYear('tgl_masuk', $year)
            ->count();
    }

    private function getTotalArsipFormatted()
    {
        $total = DB::table('arsips')->count();
        return number_format($total, 0, ",", ".");
    }

    private function getArsipAlihMedia()
    {
        return DB::table('arsips')
            ->whereNotNull('putusan')
            ->where('putusan', '!=', '')
            ->where('putusan', '>', '1000-01-01')
            ->count();
    }

    private function getArsipPresentase()
    {
        $total = DB::table('arsips')->count();
        $alihmedia = $this->getArsipAlihMedia();
        return $total > 0 ? round(($alihmedia / $total) * 100) : 0;
    }

    // ==================== BANK PUTUSAN ====================
    private function getBankPutusanPutusTahunIni($year)
    {
        return DB::table('bankputs')
            ->whereYear('tgl_put_banding', $year)
            ->count();
    }

    private function getTotalBankPutusanFormatted()
    {
        $total = DB::table('bankputs')->count();
        return number_format($total, 0, ",", ".");
    }

    private function getBankPutusanUploadPutusan()
    {
        return DB::table('bankputs')
            ->whereNotNull('put_rtf')
            ->count();
    }

    private function getBankPutusanUploadAnonim()
    {
        return DB::table('bankputs')
            ->whereNotNull('put_anonim')
            ->count();
    }

    private function getBankPutusanPresentase()
    {
        $total = DB::table('bankputs')->count();
        $uploadPutusan = $this->getBankPutusanUploadPutusan();
        $uploadAnonim = $this->getBankPutusanUploadAnonim();

        $uploadAvg = ($uploadPutusan + $uploadAnonim) / 2;
        return $total > 0 ? round(($uploadAvg / $total) * 100) : 0;
    }

    // ==================== SURAT MASUK ====================
    private function getSuratMasukTahunIni($year)
    {
        return DB::table('tb_surat_masuk')
            ->whereYear('tgl_masuk_pan', $year)
            ->count();
    }

    private function getSuratMasukTahunIniFormatted($year)
    {
        $count = $this->getSuratMasukTahunIni($year);
        return number_format($count, 0, ",", ".");
    }

    private function getTotalSuratMasuk()
    {
        return DB::table('tb_surat_masuk')->count();
    }

    private function getTotalSuratMasukFormatted()
    {
        return number_format($this->getTotalSuratMasuk(), 0, ",", ".");
    }

    private function getSuratMasukBulanIni($month)
    {
        return DB::table('tb_surat_masuk')
            ->whereMonth('tgl_masuk_pan', $month)
            ->count();
    }

    private function getSuratMasukBelumUpload()
    {
        return DB::table('tb_surat_masuk')
            ->whereNull('lampiran')
            ->count();
    }

    private function getSuratMasukPresentase()
    {
        $total = $this->getTotalSuratMasuk();
        $upload = DB::table('tb_surat_masuk')
            ->whereNotNull('lampiran')
            ->count();

        return $total > 0 ? round(($upload / $total) * 100) : 0;
    }

    // ==================== SURAT KELUAR ====================
    private function getSuratKeluarTahunIni($year)
    {
        return DB::table('tb_surat_keluar')
            ->whereYear('tgl_surat', $year)
            ->count();
    }

    private function getTotalSuratKeluar()
    {
        return DB::table('tb_surat_keluar')->count();
    }

    private function getSuratKeluarBulanIni($month)
    {
        return DB::table('tb_surat_keluar')
            ->whereMonth('tgl_surat', $month)
            ->count();
    }

    private function getSuratKeluarBelumUpload()
    {
        return DB::table('tb_surat_keluar')
            ->whereNull('surat_pta')
            ->count();
    }

    private function getSuratKeluarPresentase()
    {
        $total = $this->getTotalSuratKeluar();
        $upload = DB::table('tb_surat_keluar')
            ->whereNotNull('surat_pta')
            ->count();

        return $total > 0 ? round(($upload / $total) * 100) : 0;
    }

    // ==================== PEMINJAMAN ====================
    private function getTotalPeminjaman()
    {
        return DB::table('tb_pinjam_berkas')->count();
    }

    private function getPeminjamanBelumKembali()
    {
        return DB::table('tb_pinjam_berkas')
            ->whereNull('tgl_kembali')
            ->count();
    }

    private function getPeminjamanPresentase()
    {
        $total = $this->getTotalPeminjaman();
        $kembali = $total - $this->getPeminjamanBelumKembali();
        return $total > 0 ? round(($kembali / $total) * 100) : 0;
    }

    // ==================== HIMPUNAN PERATURAN ====================
    private function getTotalHimper()
    {
        return DB::table('tb_jdih')->count();
    }

    private function getHimperTerupload()
    {
        return DB::table('tb_jdih')
            ->whereNotNull('dokumen')
            ->count();
    }

    private function getHimperBelumUpload()
    {
        return DB::table('tb_jdih')
            ->whereNull('dokumen')
            ->count();
    }

    private function getHimperPresentase()
    {
        $total = $this->getTotalHimper();
        $upload = $this->getHimperTerupload();
        return $total > 0 ? round(($upload / $total) * 100) : 0;
    }

    // ==================== KASASI ====================
    private function getKasasiTahunIni($year)
    {
        return DB::table('tb_kasasi')
            ->whereYear('tgl_masuk', $year)
            ->count();
    }

    private function getTotalKasasi()
    {
        return DB::table('tb_kasasi')->count();
    }

    private function getKasasiBulanIni($month)
    {
        return DB::table('tb_kasasi')
            ->whereMonth('tgl_masuk', $month)
            ->count();
    }

    private function getKasasiBelumUpload()
    {
        return DB::table('tb_kasasi')
            ->whereNull('salput_kasasi')
            ->count();
    }

    private function getKasasiPresentase()
    {
        $total = $this->getTotalKasasi();
        $upload = DB::table('tb_kasasi')
            ->whereNotNull('salput_kasasi')
            ->count();

        return $total > 0 ? round(($upload / $total) * 100) : 0;
    }

    // ==================== PBT ====================
    private function getPbtTahunIni($year)
    {
        return DB::table('tb_pbt_banding')
            ->whereYear('tgl_masuk', $year)
            ->count();
    }

    private function getTotalPbt()
    {
        return DB::table('tb_pbt_banding')->count();
    }

    private function getPbtBulanIni($month)
    {
        return DB::table('tb_pbt_banding')
            ->whereMonth('tgl_masuk', $month)
            ->count();
    }

    private function getPbtBelumUpload()
    {
        return DB::table('tb_pbt_banding')
            ->whereNull('pbt_put')
            ->count();
    }

    private function getPbtPresentase()
    {
        $total = $this->getTotalPbt();
        $upload = DB::table('tb_pbt_banding')
            ->whereNotNull('pbt_put')
            ->count();

        return $total > 0 ? round(($upload / $total) * 100) : 0;
    }

    // ==================== PENGADUAN ====================
    private function getTotalPengaduan()
    {
        return DB::table('tb_pengaduan')->count();
    }

    private function getPengaduanTahunIni($year)
    {
        return DB::table('tb_pengaduan')
            ->whereYear('tgl_terima_pgd', $year)
            ->count();
    }

    private function getPengaduanHariIni()
    {
        return DB::table('tb_pengaduan')
            ->whereDate('tgl_terima_pgd', now()->toDateString())
            ->count();
    }

    private function getPengaduanBelumSelesai()
    {
        $total = $this->getTotalPengaduan();
        $selesai = DB::table('tb_pengaduan')
            ->whereIn('status_pgd', ['Diarsipkan', 'Selesai', 'Klarifikasi'])
            ->count();

        return $total - $selesai;
    }

    private function getPengaduanBelumUpload()
    {
        return DB::table('tb_pengaduan')
            ->whereNull('surat_pgd')
            ->count();
    }

    private function getPengaduanPresentase()
    {
        $total = $this->getTotalPengaduan();
        $selesai = DB::table('tb_pengaduan')
            ->whereIn('status_pgd', ['Diarsipkan', 'Selesai', 'Klarifikasi'])
            ->count();

        return $total > 0 ? round(($selesai / $total) * 100) : 0;
    }

    // ==================== PK ====================
    private function getPkTahunIni($year)
    {
        return DB::table('tb_peninjauan_kembali')
            ->whereYear('tgl_masuk', $year)
            ->count();
    }

    private function getTotalPk()
    {
        return DB::table('tb_peninjauan_kembali')->count();
    }

    private function getPkBulanIni($month)
    {
        return DB::table('tb_peninjauan_kembali')
            ->whereMonth('tgl_masuk', $month)
            ->count();
    }

    private function getPkBelumUpload()
    {
        return DB::table('tb_peninjauan_kembali')
            ->whereNull('salput_pk')
            ->count();
    }

    private function getPkPresentase()
    {
        $total = $this->getTotalPk();
        $upload = DB::table('tb_peninjauan_kembali')
            ->whereNotNull('salput_pk')
            ->count();

        return $total > 0 ? round(($upload / $total) * 100) : 0;
    }

    // ==================== RETENSI ====================
    private function getTotalRetensi()
    {
        return DB::table('tb_retensi_arsip')->count();
    }

    private function getTotalRetensiFormatted()
    {
        $total = $this->getTotalRetensi();
        return number_format($total, 0, ",", ".");
    }

    private function getRetensiTeruploadFormatted()
    {
        $upload = DB::table('tb_retensi_arsip')
            ->whereNotNull('putusan')
            ->where('putusan', '!=', '')
            ->count();
        return number_format($upload, 0, ",", ".");
    }

    private function getRetensiBulanIni($month)
    {
        return DB::table('tb_retensi_arsip')
            ->whereMonth('tgl_put_banding', $month)
            ->count();
    }

    private function getRetensiBelumUpload()
    {
        return DB::table('tb_retensi_arsip')
            ->whereNull('putusan')
            ->orWhere('putusan', '')
            ->count();
    }

    private function getRetensiPresentase()
    {
        $total = $this->getTotalRetensi();
        $upload = DB::table('tb_retensi_arsip')
            ->whereNotNull('putusan')
            ->where('putusan', '!=', '')
            ->count();

        return $total > 0 ? round(($upload / $total) * 100) : 0;
    }

    // ==================== REGISTRASI KASASI ====================
    private function getTotalRegKasasi()
    {
        return DB::table('tb_reg_kasasi')->count();
    }

    private function getRegKasasiTahunIni($year)
    {
        return DB::table('tb_reg_kasasi')
            ->whereYear('tgl_register', $year)
            ->count();
    }

    private function getRegKasasiBulanIni($month)
    {
        return DB::table('tb_reg_kasasi')
            ->whereMonth('tgl_register', $month)
            ->count();
    }

    private function getRegKasasiBelumSelesai()
    {
        $total = $this->getTotalRegKasasi();
        $selesai = $this->getRegKasasiSelesai();
        return $total - $selesai;
    }

    private function getRegKasasiSelesai()
    {
        return DB::table('tb_reg_kasasi')
            ->whereNotNull('tgl_put_kasasi')
            ->where('tgl_put_kasasi', '>', '1000-01-01')
            ->count();
    }

    private function getRegKasasiPresentase()
    {
        $total = $this->getTotalRegKasasi();
        $selesai = $this->getRegKasasiSelesai();
        return $total > 0 ? round(($selesai / $total) * 100) : 0;
    }

    // ==================== REGISTRASI PK ====================
    private function getTotalRegPk()
    {
        return DB::table('tb_reg_pk')->count();
    }

    private function getRegPkTahunIni($year)
    {
        return DB::table('tb_reg_pk')
            ->whereYear('tgl_register', $year)
            ->count();
    }

    private function getRegPkBulanIni($month)
    {
        return DB::table('tb_reg_pk')
            ->whereMonth('tgl_register', $month)
            ->count();
    }

    private function getRegPkBelumSelesai()
    {
        $total = $this->getTotalRegPk();
        $selesai = $this->getRegPkSelesai();
        return $total - $selesai;
    }

    private function getRegPkSelesai()
    {
        return DB::table('tb_reg_pk')
            ->whereNotNull('tgl_put_pk')
            ->where('tgl_put_pk', '>', '1000-01-01')
            ->count();
    }

    private function getRegPkPresentase()
    {
        $total = $this->getTotalRegPk();
        $selesai = $this->getRegPkSelesai();
        return $total > 0 ? round(($selesai / $total) * 100) : 0;
    }

    // ==================== EKSEKUSI ====================
    private function getTotalEksekusi()
    {
        return DB::table('tb_eksekusi')->count();
    }

    private function getEksekusiTahunIni($year)
    {
        return DB::table('tb_eksekusi')
            ->whereYear('tgl_permohonan', $year)
            ->count();
    }

    private function getEksekusiHariIni()
    {
        return DB::table('tb_eksekusi')
            ->whereDate('tgl_permohonan', now()->toDateString())
            ->count();
    }

    private function getEksekusiBelumSelesai()
    {
        $total = $this->getTotalEksekusi();
        $selesai = $this->getEksekusiSelesai();
        return $total - $selesai;
    }

    private function getEksekusiSelesai()
    {
        return DB::table('tb_eksekusi')
            ->whereNotNull('tgl_selesai')
            ->where('tgl_selesai', '>', '1000-01-01')
            ->count();
    }

    private function getEksekusiPresentase()
    {
        $total = $this->getTotalEksekusi();
        $selesai = $this->getEksekusiSelesai();
        return $total > 0 ? round(($selesai / $total) * 100) : 0;
    }

    // ==================== SURAT KEPUTUSAN ====================
    private function getTotalSk()
    {
        return DB::table('tb_sk')->count();
    }

    private function getSkTahunIni($year)
    {
        return DB::table('tb_sk')
            ->whereYear('tgl_sk', $year)
            ->count();
    }

    private function getSkBulanIni($month)
    {
        return DB::table('tb_sk')
            ->whereMonth('tgl_sk', $month)
            ->count();
    }

    private function getSkBelumUpload()
    {
        return DB::table('tb_sk')
            ->whereNull('dokumen')
            ->count();
    }

    private function getSkUpload()
    {
        return DB::table('tb_sk')
            ->whereNotNull('dokumen')
            ->count();
    }

    private function getSkPresentase()
    {
        $total = $this->getTotalSk();
        $upload = $this->getSkUpload();
        return $total > 0 ? round(($upload / $total) * 100) : 0;
    }
}
