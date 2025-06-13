<?php

namespace App\Http\Controllers;

use App\Models\EksekusiModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class EksekusiController extends Controller
{
    public function __construct()
    {
        $this->EksekusiModel = new EksekusiModel();
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Perkara Eksekusi',
            'eksekusi' => $this->EksekusiModel->allData(),

        ];

        //Function Tahun sekarang
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

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

        $eksekusi_riil = DB::table('tb_eksekusi')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $eksekusi_lelang = DB::table('tb_eksekusi')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $eksekusi_dicabut = DB::table('tb_eksekusi')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $eksekusi_dicoret = DB::table('tb_eksekusi')->where('proses_terakhir', 'Penetapan Coret')->count();

        $eksekusi_ne = DB::table('tb_eksekusi')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        return view('/eksekusi/v_dashboard_eksekusi', $data, compact(
            'eksekusi_total',
            'eksekusi_masuk_thn_ini',
            'eksekusi_bln_ini',
            'eksekusi_presentase',
            'eksekusi_blm_selesai',
            'eksekusi_selesai',
            'eksekusi_presentase',
            'eksekusi_riil',
            'eksekusi_lelang',
            'eksekusi_dicabut',
            'eksekusi_dicoret',
            'eksekusi_ne',
        ));
    }

    public function progres_eks()
    {

        $data = [
            'title' => 'Perkara Eksekusi',
            'eksekusi' => $this->EksekusiModel->allData(),

        ];

        //Function Tahun sekarang
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

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

        //Bandung
        $badg_eksekusi = DB::table('tb_eksekusi')->where('satker', 'bandung')->count();

        $badg_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'bandung')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $badg_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'bandung')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $badg_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'bandung')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $badg_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'bandung')->where('proses_terakhir', 'Penetapan Coret')->count();

        $badg_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'bandung')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $badg_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'bandung')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $badg_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'bandung')->where('tgl_selesai', Null)->count();

        $badg_eksekusi_blm_selesai =  $badg_eksekusi_blm_selesai_0000 + $badg_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $badg_eksekusi_selesai = $badg_eksekusi - $badg_eksekusi_blm_selesai;

        //eksekusi sisa
        $badg_eksekusi_sisa = $badg_eksekusi - $badg_eksekusi_selesai;

        //Presentase selesai
        $badg_eksekusi_progres = $badg_eksekusi_selesai / $badg_eksekusi * 100;
        $badg_eksekusi_presentase = round($badg_eksekusi_progres);

        //Bobot Nilai
        $badg_eksekusi_riil_nilai = $badg_eksekusi_riil * 5;
        $badg_eksekusi_lelang_nilai = $badg_eksekusi_lelang * 5;
        $badg_eksekusi_dicabut_nilai = $badg_eksekusi_dicabut * 3;
        $badg_eksekusi_dicoret_nilai = $badg_eksekusi_dicoret * 3;
        $badg_eksekusi_ne_nilai = $badg_eksekusi_ne * 3;
        $badg_eksekusi_nilai = $badg_eksekusi * 1;
        $badg_eksekusi_bobot_nilai =  $badg_eksekusi_riil_nilai +  $badg_eksekusi_lelang_nilai +  $badg_eksekusi_dicabut_nilai +  $badg_eksekusi_dicoret_nilai + $badg_eksekusi_ne_nilai + $badg_eksekusi_nilai;

        //Sumedang
        $smdg_eksekusi = DB::table('tb_eksekusi')->where('satker', 'sumedang')->count();

        $smdg_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'sumedang')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $smdg_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'sumedang')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $smdg_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'sumedang')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $smdg_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'sumedang')->where('proses_terakhir', 'Penetapan Coret')->count();

        $smdg_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'sumedang')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $smdg_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'sumedang')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $smdg_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'sumedang')->where('tgl_selesai', Null)->count();

        $smdg_eksekusi_blm_selesai =  $smdg_eksekusi_blm_selesai_0000 + $smdg_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $smdg_eksekusi_selesai = $smdg_eksekusi - $smdg_eksekusi_blm_selesai;

        //eksekusi sisa
        $smdg_eksekusi_sisa = $smdg_eksekusi - $smdg_eksekusi_selesai;

        //Presentase selesai
        $smdg_eksekusi_progres = $smdg_eksekusi_selesai / $smdg_eksekusi * 100;
        $smdg_eksekusi_presentase = round($smdg_eksekusi_progres);

        //Bobot Nilai
        $smdg_eksekusi_riil_nilai = $smdg_eksekusi_riil * 5;
        $smdg_eksekusi_lelang_nilai = $smdg_eksekusi_lelang * 5;
        $smdg_eksekusi_dicabut_nilai = $smdg_eksekusi_dicabut * 3;
        $smdg_eksekusi_dicoret_nilai = $smdg_eksekusi_dicoret * 3;
        $smdg_eksekusi_ne_nilai = $smdg_eksekusi_ne * 3;
        $smdg_eksekusi_nilai = $smdg_eksekusi * 1;
        $smdg_eksekusi_bobot_nilai =  $smdg_eksekusi_riil_nilai +  $smdg_eksekusi_lelang_nilai +  $smdg_eksekusi_dicabut_nilai +  $smdg_eksekusi_dicoret_nilai + $smdg_eksekusi_ne_nilai + $smdg_eksekusi_nilai;

        //Indramayu
        $im_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Indramayu')->count();

        $im_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Indramayu')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $im_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Indramayu')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $im_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Indramayu')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $im_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Indramayu')->where('proses_terakhir', 'Penetapan Coret')->count();

        $im_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Indramayu')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $im_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Indramayu')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $im_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Indramayu')->where('tgl_selesai', Null)->count();

        $im_eksekusi_blm_selesai =  $im_eksekusi_blm_selesai_0000 + $im_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $im_eksekusi_selesai = $im_eksekusi - $im_eksekusi_blm_selesai;

        //eksekusi sisa
        $im_eksekusi_sisa = $im_eksekusi - $im_eksekusi_selesai;

        //Presentase selesai
        $im_eksekusi_progres = $im_eksekusi_selesai / $im_eksekusi * 100;
        $im_eksekusi_presentase = round($im_eksekusi_progres);

        //Bobot Nilai
        $im_eksekusi_riil_nilai = $im_eksekusi_riil * 5;
        $im_eksekusi_lelang_nilai = $im_eksekusi_lelang * 5;
        $im_eksekusi_dicabut_nilai = $im_eksekusi_dicabut * 3;
        $im_eksekusi_dicoret_nilai = $im_eksekusi_dicoret * 3;
        $im_eksekusi_ne_nilai = $im_eksekusi_ne * 3;
        $im_eksekusi_nilai = $im_eksekusi * 1;
        $im_eksekusi_bobot_nilai =  $im_eksekusi_riil_nilai +  $im_eksekusi_lelang_nilai +  $im_eksekusi_dicabut_nilai +  $im_eksekusi_dicoret_nilai + $im_eksekusi_ne_nilai + $im_eksekusi_nilai;

        //Majalengka
        $mjl_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Majalengka')->count();

        $mjl_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Majalengka')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $mjl_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Majalengka')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $mjl_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Majalengka')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $mjl_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Majalengka')->where('proses_terakhir', 'Penetapan Coret')->count();

        $mjl_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Majalengka')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $mjl_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Majalengka')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $mjl_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Majalengka')->where('tgl_selesai', Null)->count();

        $mjl_eksekusi_blm_selesai =  $mjl_eksekusi_blm_selesai_0000 + $mjl_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $mjl_eksekusi_selesai = $mjl_eksekusi - $mjl_eksekusi_blm_selesai;

        //eksekusi sisa
        $mjl_eksekusi_sisa = $mjl_eksekusi - $mjl_eksekusi_selesai;

        //Presentase selesai
        $mjl_eksekusi_progres = $mjl_eksekusi_selesai / $mjl_eksekusi * 100;
        $mjl_eksekusi_presentase = round($mjl_eksekusi_progres);

        //Bobot Nilai
        $mjl_eksekusi_riil_nilai = $mjl_eksekusi_riil * 5;
        $mjl_eksekusi_lelang_nilai = $mjl_eksekusi_lelang * 5;
        $mjl_eksekusi_dicabut_nilai = $mjl_eksekusi_dicabut * 3;
        $mjl_eksekusi_dicoret_nilai = $mjl_eksekusi_dicoret * 3;
        $mjl_eksekusi_ne_nilai = $mjl_eksekusi_ne * 3;
        $mjl_eksekusi_nilai = $mjl_eksekusi * 1;
        $mjl_eksekusi_bobot_nilai =  $mjl_eksekusi_riil_nilai +  $mjl_eksekusi_lelang_nilai +  $mjl_eksekusi_dicabut_nilai +  $mjl_eksekusi_dicoret_nilai + $mjl_eksekusi_ne_nilai + $mjl_eksekusi_nilai;

        //Sumber
        $sbr_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Sumber')->count();

        $sbr_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Sumber')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $sbr_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Sumber')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $sbr_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Sumber')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $sbr_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Sumber')->where('proses_terakhir', 'Penetapan Coret')->count();

        $sbr_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Sumber')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $sbr_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Sumber')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $sbr_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Sumber')->where('tgl_selesai', Null)->count();

        $sbr_eksekusi_blm_selesai =  $sbr_eksekusi_blm_selesai_0000 + $sbr_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $sbr_eksekusi_selesai = $sbr_eksekusi - $sbr_eksekusi_blm_selesai;

        //eksekusi sisa
        $sbr_eksekusi_sisa = $sbr_eksekusi - $sbr_eksekusi_selesai;

        //Presentase selesai
        $sbr_eksekusi_progres = $sbr_eksekusi_selesai / $sbr_eksekusi * 100;
        $sbr_eksekusi_presentase = round($sbr_eksekusi_progres);

        //Bobot Nilai
        $sbr_eksekusi_riil_nilai = $sbr_eksekusi_riil * 5;
        $sbr_eksekusi_lelang_nilai = $sbr_eksekusi_lelang * 5;
        $sbr_eksekusi_dicabut_nilai = $sbr_eksekusi_dicabut * 3;
        $sbr_eksekusi_dicoret_nilai = $sbr_eksekusi_dicoret * 3;
        $sbr_eksekusi_ne_nilai = $sbr_eksekusi_ne * 3;
        $sbr_eksekusi_nilai = $sbr_eksekusi * 1;
        $sbr_eksekusi_bobot_nilai =  $sbr_eksekusi_riil_nilai +  $sbr_eksekusi_lelang_nilai +  $sbr_eksekusi_dicabut_nilai +  $sbr_eksekusi_dicoret_nilai + $sbr_eksekusi_ne_nilai + $sbr_eksekusi_nilai;

        //Ciamis
        $cms_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Ciamis')->count();

        $cms_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Ciamis')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $cms_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Ciamis')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $cms_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Ciamis')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $cms_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Ciamis')->where('proses_terakhir', 'Penetapan Coret')->count();

        $cms_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Ciamis')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $cms_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Ciamis')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $cms_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Ciamis')->where('tgl_selesai', Null)->count();

        $cms_eksekusi_blm_selesai =  $cms_eksekusi_blm_selesai_0000 + $cms_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $cms_eksekusi_selesai = $cms_eksekusi - $cms_eksekusi_blm_selesai;

        //eksekusi sisa
        $cms_eksekusi_sisa = $cms_eksekusi - $cms_eksekusi_selesai;

        //Presentase selesai
        $cms_eksekusi_progres = $cms_eksekusi_selesai / $cms_eksekusi * 100;
        $cms_eksekusi_presentase = round($cms_eksekusi_progres);

        //Bobot Nilai
        $cms_eksekusi_riil_nilai = $cms_eksekusi_riil * 5;
        $cms_eksekusi_lelang_nilai = $cms_eksekusi_lelang * 5;
        $cms_eksekusi_dicabut_nilai = $cms_eksekusi_dicabut * 3;
        $cms_eksekusi_dicoret_nilai = $cms_eksekusi_dicoret * 3;
        $cms_eksekusi_ne_nilai = $cms_eksekusi_ne * 3;
        $cms_eksekusi_nilai = $cms_eksekusi * 1;
        $cms_eksekusi_bobot_nilai =  $cms_eksekusi_riil_nilai +  $cms_eksekusi_lelang_nilai +  $cms_eksekusi_dicabut_nilai +  $cms_eksekusi_dicoret_nilai + $cms_eksekusi_ne_nilai + $cms_eksekusi_nilai;

        //Tasikmalaya
        $tsm_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Tasikmalaya')->count();

        $tsm_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Tasikmalaya')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $tsm_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Tasikmalaya')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $tsm_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Tasikmalaya')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $tsm_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Tasikmalaya')->where('proses_terakhir', 'Penetapan Coret')->count();

        $tsm_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Tasikmalaya')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $tsm_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Tasikmalaya')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $tsm_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Tasikmalaya')->where('tgl_selesai', Null)->count();

        $tsm_eksekusi_blm_selesai =  $tsm_eksekusi_blm_selesai_0000 + $tsm_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $tsm_eksekusi_selesai = $tsm_eksekusi - $tsm_eksekusi_blm_selesai;

        //eksekusi sisa
        $tsm_eksekusi_sisa = $tsm_eksekusi - $tsm_eksekusi_selesai;

        //Presentase selesai
        $tsm_eksekusi_progres = $tsm_eksekusi_selesai / $tsm_eksekusi * 100;
        $tsm_eksekusi_presentase = round($tsm_eksekusi_progres);

        //Bobot Nilai
        $tsm_eksekusi_riil_nilai = $tsm_eksekusi_riil * 5;
        $tsm_eksekusi_lelang_nilai = $tsm_eksekusi_lelang * 5;
        $tsm_eksekusi_dicabut_nilai = $tsm_eksekusi_dicabut * 3;
        $tsm_eksekusi_dicoret_nilai = $tsm_eksekusi_dicoret * 3;
        $tsm_eksekusi_ne_nilai = $tsm_eksekusi_ne * 3;
        $tsm_eksekusi_nilai = $tsm_eksekusi * 1;
        $tsm_eksekusi_bobot_nilai =  $tsm_eksekusi_riil_nilai +  $tsm_eksekusi_lelang_nilai +  $tsm_eksekusi_dicabut_nilai +  $tsm_eksekusi_dicoret_nilai + $tsm_eksekusi_ne_nilai + $tsm_eksekusi_nilai;

        //Karawang
        $krw_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Karawang')->count();

        $krw_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Karawang')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $krw_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Karawang')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $krw_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Karawang')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $krw_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Karawang')->where('proses_terakhir', 'Penetapan Coret')->count();

        $krw_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Karawang')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $krw_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Karawang')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $krw_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Karawang')->where('tgl_selesai', Null)->count();

        $krw_eksekusi_blm_selesai =  $krw_eksekusi_blm_selesai_0000 + $krw_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $krw_eksekusi_selesai = $krw_eksekusi - $krw_eksekusi_blm_selesai;

        //eksekusi sisa
        $krw_eksekusi_sisa = $krw_eksekusi - $krw_eksekusi_selesai;

        //Presentase selesai
        $krw_eksekusi_progres = $krw_eksekusi_selesai / $krw_eksekusi * 100;
        $krw_eksekusi_presentase = round($krw_eksekusi_progres);

        //Bobot Nilai
        $krw_eksekusi_riil_nilai = $krw_eksekusi_riil * 5;
        $krw_eksekusi_lelang_nilai = $krw_eksekusi_lelang * 5;
        $krw_eksekusi_dicabut_nilai = $krw_eksekusi_dicabut * 3;
        $krw_eksekusi_dicoret_nilai = $krw_eksekusi_dicoret * 3;
        $krw_eksekusi_ne_nilai = $krw_eksekusi_ne * 3;
        $krw_eksekusi_nilai = $krw_eksekusi * 1;
        $krw_eksekusi_bobot_nilai =  $krw_eksekusi_riil_nilai +  $krw_eksekusi_lelang_nilai +  $krw_eksekusi_dicabut_nilai +  $krw_eksekusi_dicoret_nilai + $krw_eksekusi_ne_nilai + $krw_eksekusi_nilai;

        //Cimahi
        $cmi_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Cimahi')->count();

        $cmi_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Cimahi')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $cmi_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Cimahi')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $cmi_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Cimahi')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $cmi_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Cimahi')->where('proses_terakhir', 'Penetapan Coret')->count();

        $cmi_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Cimahi')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $cmi_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Cimahi')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $cmi_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Cimahi')->where('tgl_selesai', Null)->count();

        $cmi_eksekusi_blm_selesai =  $cmi_eksekusi_blm_selesai_0000 + $cmi_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $cmi_eksekusi_selesai = $cmi_eksekusi - $cmi_eksekusi_blm_selesai;

        //eksekusi sisa
        $cmi_eksekusi_sisa = $cmi_eksekusi - $cmi_eksekusi_selesai;

        //Presentase selesai
        $cmi_eksekusi_progres = $cmi_eksekusi_selesai / $cmi_eksekusi * 100;
        $cmi_eksekusi_presentase = round($cmi_eksekusi_progres);

        //Bobot Nilai
        $cmi_eksekusi_riil_nilai = $cmi_eksekusi_riil * 5;
        $cmi_eksekusi_lelang_nilai = $cmi_eksekusi_lelang * 5;
        $cmi_eksekusi_dicabut_nilai = $cmi_eksekusi_dicabut * 3;
        $cmi_eksekusi_dicoret_nilai = $cmi_eksekusi_dicoret * 3;
        $cmi_eksekusi_ne_nilai = $cmi_eksekusi_ne * 3;
        $cmi_eksekusi_nilai = $cmi_eksekusi * 1;
        $cmi_eksekusi_bobot_nilai =  $cmi_eksekusi_riil_nilai +  $cmi_eksekusi_lelang_nilai +  $cmi_eksekusi_dicabut_nilai +  $cmi_eksekusi_dicoret_nilai + $cmi_eksekusi_ne_nilai + $cmi_eksekusi_nilai;

        //Subang
        $sbg_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Subang')->count();

        $sbg_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Subang')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $sbg_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Subang')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $sbg_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Subang')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $sbg_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Subang')->where('proses_terakhir', 'Penetapan Coret')->count();

        $sbg_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Subang')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $sbg_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Subang')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $sbg_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Subang')->where('tgl_selesai', Null)->count();

        $sbg_eksekusi_blm_selesai =  $sbg_eksekusi_blm_selesai_0000 + $sbg_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $sbg_eksekusi_selesai = $sbg_eksekusi - $sbg_eksekusi_blm_selesai;

        //eksekusi sisa
        $sbg_eksekusi_sisa = $sbg_eksekusi - $sbg_eksekusi_selesai;

        //Presentase selesai
        $sbg_eksekusi_progres = $sbg_eksekusi_selesai / $sbg_eksekusi * 100;
        $sbg_eksekusi_presentase = round($sbg_eksekusi_progres);

        //Bobot Nilai
        $sbg_eksekusi_riil_nilai = $sbg_eksekusi_riil * 5;
        $sbg_eksekusi_lelang_nilai = $sbg_eksekusi_lelang * 5;
        $sbg_eksekusi_dicabut_nilai = $sbg_eksekusi_dicabut * 3;
        $sbg_eksekusi_dicoret_nilai = $sbg_eksekusi_dicoret * 3;
        $sbg_eksekusi_ne_nilai = $sbg_eksekusi_ne * 3;
        $sbg_eksekusi_nilai = $sbg_eksekusi * 1;
        $sbg_eksekusi_bobot_nilai =  $sbg_eksekusi_riil_nilai +  $sbg_eksekusi_lelang_nilai +  $sbg_eksekusi_dicabut_nilai +  $sbg_eksekusi_dicoret_nilai + $sbg_eksekusi_ne_nilai + $sbg_eksekusi_nilai;
        
        //Purwakarta
        $pwk_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Purwakarta')->count();

        $pwk_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Purwakarta')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $pwk_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Purwakarta')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $pwk_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Purwakarta')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $pwk_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Purwakarta')->where('proses_terakhir', 'Penetapan Coret')->count();

        $pwk_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Purwakarta')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $pwk_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Purwakarta')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $pwk_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Purwakarta')->where('tgl_selesai', Null)->count();

        $pwk_eksekusi_blm_selesai =  $pwk_eksekusi_blm_selesai_0000 + $pwk_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $pwk_eksekusi_selesai = $pwk_eksekusi - $pwk_eksekusi_blm_selesai;

        //eksekusi sisa
        $pwk_eksekusi_sisa = $pwk_eksekusi - $pwk_eksekusi_selesai;

        //Presentase selesai
        $pwk_eksekusi_progres = $pwk_eksekusi_selesai / $pwk_eksekusi * 100;
        $pwk_eksekusi_presentase = round($pwk_eksekusi_progres);

        //Bobot Nilai
        $pwk_eksekusi_riil_nilai = $pwk_eksekusi_riil * 5;
        $pwk_eksekusi_lelang_nilai = $pwk_eksekusi_lelang * 5;
        $pwk_eksekusi_dicabut_nilai = $pwk_eksekusi_dicabut * 3;
        $pwk_eksekusi_dicoret_nilai = $pwk_eksekusi_dicoret * 3;
        $pwk_eksekusi_ne_nilai = $pwk_eksekusi_ne * 3;
        $pwk_eksekusi_nilai = $pwk_eksekusi * 1;
        $pwk_eksekusi_bobot_nilai =  $pwk_eksekusi_riil_nilai +  $pwk_eksekusi_lelang_nilai +  $pwk_eksekusi_dicabut_nilai +  $pwk_eksekusi_dicoret_nilai + $pwk_eksekusi_ne_nilai + $pwk_eksekusi_nilai;

        //Sukabumi
        $smi_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Sukabumi')->count();

        $smi_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Sukabumi')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $smi_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Sukabumi')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $smi_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Sukabumi')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $smi_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Sukabumi')->where('proses_terakhir', 'Penetapan Coret')->count();

        $smi_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Sukabumi')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $smi_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Sukabumi')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $smi_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Sukabumi')->where('tgl_selesai', Null)->count();

        $smi_eksekusi_blm_selesai =  $smi_eksekusi_blm_selesai_0000 + $smi_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $smi_eksekusi_selesai = $smi_eksekusi - $smi_eksekusi_blm_selesai;

        //eksekusi sisa
        $smi_eksekusi_sisa = $smi_eksekusi - $smi_eksekusi_selesai;

        //Presentase selesai
        $smi_eksekusi_progres = $smi_eksekusi_selesai / $smi_eksekusi * 100;
        $smi_eksekusi_presentase = round($smi_eksekusi_progres);

        //Bobot Nilai
        $smi_eksekusi_riil_nilai = $smi_eksekusi_riil * 5;
        $smi_eksekusi_lelang_nilai = $smi_eksekusi_lelang * 5;
        $smi_eksekusi_dicabut_nilai = $smi_eksekusi_dicabut * 3;
        $smi_eksekusi_dicoret_nilai = $smi_eksekusi_dicoret * 3;
        $smi_eksekusi_ne_nilai = $smi_eksekusi_ne * 3;
        $smi_eksekusi_nilai = $smi_eksekusi * 1;
        $smi_eksekusi_bobot_nilai =  $smi_eksekusi_riil_nilai +  $smi_eksekusi_lelang_nilai +  $smi_eksekusi_dicabut_nilai +  $smi_eksekusi_dicoret_nilai + $smi_eksekusi_ne_nilai + $smi_eksekusi_nilai;

        //Cianjur
        $cjr_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Cianjur')->count();

        $cjr_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Cianjur')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $cjr_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Cianjur')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $cjr_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Cianjur')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $cjr_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Cianjur')->where('proses_terakhir', 'Penetapan Coret')->count();

        $cjr_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Cianjur')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $cjr_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Cianjur')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $cjr_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Cianjur')->where('tgl_selesai', Null)->count();

        $cjr_eksekusi_blm_selesai =  $cjr_eksekusi_blm_selesai_0000 + $cjr_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $cjr_eksekusi_selesai = $cjr_eksekusi - $cjr_eksekusi_blm_selesai;

        //eksekusi sisa
        $cjr_eksekusi_sisa = $cjr_eksekusi - $cjr_eksekusi_selesai;

        //Presentase selesai
        $cjr_eksekusi_progres = $cjr_eksekusi_selesai / $cjr_eksekusi * 100;
        $cjr_eksekusi_presentase = round($cjr_eksekusi_progres);

        //Bobot Nilai
        $cjr_eksekusi_riil_nilai = $cjr_eksekusi_riil * 5;
        $cjr_eksekusi_lelang_nilai = $cjr_eksekusi_lelang * 5;
        $cjr_eksekusi_dicabut_nilai = $cjr_eksekusi_dicabut * 3;
        $cjr_eksekusi_dicoret_nilai = $cjr_eksekusi_dicoret * 3;
        $cjr_eksekusi_ne_nilai = $cjr_eksekusi_ne * 3;
        $cjr_eksekusi_nilai = $cjr_eksekusi * 1;
        $cjr_eksekusi_bobot_nilai =  $cjr_eksekusi_riil_nilai +  $cjr_eksekusi_lelang_nilai +  $cjr_eksekusi_dicabut_nilai +  $cjr_eksekusi_dicoret_nilai + $cjr_eksekusi_ne_nilai + $cjr_eksekusi_nilai;

        //Kuningan
        $kng_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Kuningan')->count();

        $kng_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Kuningan')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $kng_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Kuningan')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $kng_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Kuningan')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $kng_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Kuningan')->where('proses_terakhir', 'Penetapan Coret')->count();

        $kng_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Kuningan')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $kng_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Kuningan')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $kng_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Kuningan')->where('tgl_selesai', Null)->count();

        $kng_eksekusi_blm_selesai =  $kng_eksekusi_blm_selesai_0000 + $kng_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $kng_eksekusi_selesai = $kng_eksekusi - $kng_eksekusi_blm_selesai;

        //eksekusi sisa
        $kng_eksekusi_sisa = $kng_eksekusi - $kng_eksekusi_selesai;

        //Presentase selesai
        $kng_eksekusi_progres = $kng_eksekusi_selesai / $kng_eksekusi * 100;
        $kng_eksekusi_presentase = round($kng_eksekusi_progres);

        //Bobot Nilai
        $kng_eksekusi_riil_nilai = $kng_eksekusi_riil * 5;
        $kng_eksekusi_lelang_nilai = $kng_eksekusi_lelang * 5;
        $kng_eksekusi_dicabut_nilai = $kng_eksekusi_dicabut * 3;
        $kng_eksekusi_dicoret_nilai = $kng_eksekusi_dicoret * 3;
        $kng_eksekusi_ne_nilai = $kng_eksekusi_ne * 3;
        $kng_eksekusi_nilai = $kng_eksekusi * 1;
        $kng_eksekusi_bobot_nilai =  $kng_eksekusi_riil_nilai +  $kng_eksekusi_lelang_nilai +  $kng_eksekusi_dicabut_nilai +  $kng_eksekusi_dicoret_nilai + $kng_eksekusi_ne_nilai + $kng_eksekusi_nilai;

        //Cibadak
        $cbd_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Cibadak')->count();

        $cbd_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Cibadak')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $cbd_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Cibadak')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $cbd_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Cibadak')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $cbd_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Cibadak')->where('proses_terakhir', 'Penetapan Coret')->count();

        $cbd_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Cibadak')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $cbd_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Cibadak')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $cbd_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Cibadak')->where('tgl_selesai', Null)->count();

        $cbd_eksekusi_blm_selesai =  $cbd_eksekusi_blm_selesai_0000 + $cbd_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $cbd_eksekusi_selesai = $cbd_eksekusi - $cbd_eksekusi_blm_selesai;

        //eksekusi sisa
        $cbd_eksekusi_sisa = $cbd_eksekusi - $cbd_eksekusi_selesai;

        //Presentase selesai
        $cbd_eksekusi_progres = $cbd_eksekusi_selesai / $cbd_eksekusi * 100;
        $cbd_eksekusi_presentase = round($cbd_eksekusi_progres);

        //Bobot Nilai
        $cbd_eksekusi_riil_nilai = $cbd_eksekusi_riil * 5;
        $cbd_eksekusi_lelang_nilai = $cbd_eksekusi_lelang * 5;
        $cbd_eksekusi_dicabut_nilai = $cbd_eksekusi_dicabut * 3;
        $cbd_eksekusi_dicoret_nilai = $cbd_eksekusi_dicoret * 3;
        $cbd_eksekusi_ne_nilai = $cbd_eksekusi_ne * 3;
        $cbd_eksekusi_nilai = $cbd_eksekusi * 1;
        $cbd_eksekusi_bobot_nilai =  $cbd_eksekusi_riil_nilai +  $cbd_eksekusi_lelang_nilai +  $cbd_eksekusi_dicabut_nilai +  $cbd_eksekusi_dicoret_nilai + $cbd_eksekusi_ne_nilai + $cbd_eksekusi_nilai;
        
        //Cirebon
        $cn_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Cirebon')->count();

        $cn_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Cirebon')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $cn_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Cirebon')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $cn_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Cirebon')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $cn_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Cirebon')->where('proses_terakhir', 'Penetapan Coret')->count();

        $cn_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Cirebon')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $cn_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Cirebon')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $cn_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Cirebon')->where('tgl_selesai', Null)->count();

        $cn_eksekusi_blm_selesai =  $cn_eksekusi_blm_selesai_0000 + $cn_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $cn_eksekusi_selesai = $cn_eksekusi - $cn_eksekusi_blm_selesai;

        //eksekusi sisa
        $cn_eksekusi_sisa = $cn_eksekusi - $cn_eksekusi_selesai;

        //Presentase selesai
        $cn_eksekusi_progres = $cn_eksekusi_selesai / $cn_eksekusi * 100;
        $cn_eksekusi_presentase = round($cn_eksekusi_progres);

        //Bobot Nilai
        $cn_eksekusi_riil_nilai = $cn_eksekusi_riil * 5;
        $cn_eksekusi_lelang_nilai = $cn_eksekusi_lelang * 5;
        $cn_eksekusi_dicabut_nilai = $cn_eksekusi_dicabut * 3;
        $cn_eksekusi_dicoret_nilai = $cn_eksekusi_dicoret * 3;
        $cn_eksekusi_ne_nilai = $cn_eksekusi_ne * 3;
        $cn_eksekusi_nilai = $cn_eksekusi * 1;
        $cn_eksekusi_bobot_nilai =  $cn_eksekusi_riil_nilai +  $cn_eksekusi_lelang_nilai +  $cn_eksekusi_dicabut_nilai +  $cn_eksekusi_dicoret_nilai + $cn_eksekusi_ne_nilai + $cn_eksekusi_nilai;

        //Garut
        $grt_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Garut')->count();

        $grt_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Garut')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $grt_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Garut')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $grt_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Garut')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $grt_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Garut')->where('proses_terakhir', 'Penetapan Coret')->count();

        $grt_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Garut')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $grt_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Garut')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $grt_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Garut')->where('tgl_selesai', Null)->count();

        $grt_eksekusi_blm_selesai =  $grt_eksekusi_blm_selesai_0000 + $grt_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $grt_eksekusi_selesai = $grt_eksekusi - $grt_eksekusi_blm_selesai;

        //eksekusi sisa
        $grt_eksekusi_sisa = $grt_eksekusi - $grt_eksekusi_selesai;

        //Presentase selesai
        $grt_eksekusi_progres = $grt_eksekusi_selesai / $grt_eksekusi * 100;
        $grt_eksekusi_presentase = round($grt_eksekusi_progres);

        //Bobot Nilai
        $grt_eksekusi_riil_nilai = $grt_eksekusi_riil * 5;
        $grt_eksekusi_lelang_nilai = $grt_eksekusi_lelang * 5;
        $grt_eksekusi_dicabut_nilai = $grt_eksekusi_dicabut * 3;
        $grt_eksekusi_dicoret_nilai = $grt_eksekusi_dicoret * 3;
        $grt_eksekusi_ne_nilai = $grt_eksekusi_ne * 3;
        $grt_eksekusi_nilai = $grt_eksekusi * 1;
        $grt_eksekusi_bobot_nilai =  $grt_eksekusi_riil_nilai +  $grt_eksekusi_lelang_nilai +  $grt_eksekusi_dicabut_nilai +  $grt_eksekusi_dicoret_nilai + $grt_eksekusi_ne_nilai + $grt_eksekusi_nilai;

        //Bogor
        $bgr_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Bogor')->count();

        $bgr_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Bogor')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $bgr_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Bogor')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $bgr_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Bogor')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $bgr_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Bogor')->where('proses_terakhir', 'Penetapan Coret')->count();

        $bgr_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Bogor')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $bgr_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Bogor')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $bgr_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Bogor')->where('tgl_selesai', Null)->count();

        $bgr_eksekusi_blm_selesai =  $bgr_eksekusi_blm_selesai_0000 + $bgr_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $bgr_eksekusi_selesai = $bgr_eksekusi - $bgr_eksekusi_blm_selesai;

        //eksekusi sisa
        $bgr_eksekusi_sisa = $bgr_eksekusi - $bgr_eksekusi_selesai;

        //Presentase selesai
        $bgr_eksekusi_progres = $bgr_eksekusi_selesai / $bgr_eksekusi * 100;
        $bgr_eksekusi_presentase = round($bgr_eksekusi_progres);

        //Bobot Nilai
        $bgr_eksekusi_riil_nilai = $bgr_eksekusi_riil * 5;
        $bgr_eksekusi_lelang_nilai = $bgr_eksekusi_lelang * 5;
        $bgr_eksekusi_dicabut_nilai = $bgr_eksekusi_dicabut * 3;
        $bgr_eksekusi_dicoret_nilai = $bgr_eksekusi_dicoret * 3;
        $bgr_eksekusi_ne_nilai = $bgr_eksekusi_ne * 3;
        $bgr_eksekusi_nilai = $bgr_eksekusi * 1;
        $bgr_eksekusi_bobot_nilai =  $bgr_eksekusi_riil_nilai +  $bgr_eksekusi_lelang_nilai +  $bgr_eksekusi_dicabut_nilai +  $bgr_eksekusi_dicoret_nilai + $bgr_eksekusi_ne_nilai + $bgr_eksekusi_nilai;

        //Bekasi
        $bks_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Bekasi')->count();

        $bks_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Bekasi')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $bks_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Bekasi')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $bks_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Bekasi')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $bks_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Bekasi')->where('proses_terakhir', 'Penetapan Coret')->count();

        $bks_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Bekasi')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $bks_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Bekasi')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $bks_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Bekasi')->where('tgl_selesai', Null)->count();

        $bks_eksekusi_blm_selesai =  $bks_eksekusi_blm_selesai_0000 + $bks_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $bks_eksekusi_selesai = $bks_eksekusi - $bks_eksekusi_blm_selesai;

        //eksekusi sisa
        $bks_eksekusi_sisa = $bks_eksekusi - $bks_eksekusi_selesai;

        //Presentase selesai
        $bks_eksekusi_progres = $bks_eksekusi_selesai / $bks_eksekusi * 100;
        $bks_eksekusi_presentase = round($bks_eksekusi_progres);

        //Bobot Nilai
        $bks_eksekusi_riil_nilai = $bks_eksekusi_riil * 5;
        $bks_eksekusi_lelang_nilai = $bks_eksekusi_lelang * 5;
        $bks_eksekusi_dicabut_nilai = $bks_eksekusi_dicabut * 3;
        $bks_eksekusi_dicoret_nilai = $bks_eksekusi_dicoret * 3;
        $bks_eksekusi_ne_nilai = $bks_eksekusi_ne * 3;
        $bks_eksekusi_nilai = $bks_eksekusi * 1;
        $bks_eksekusi_bobot_nilai =  $bks_eksekusi_riil_nilai +  $bks_eksekusi_lelang_nilai +  $bks_eksekusi_dicabut_nilai +  $bks_eksekusi_dicoret_nilai + $bks_eksekusi_ne_nilai + $bks_eksekusi_nilai;

        //Cibinong
        $cbn_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Cibinong')->count();

        $cbn_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Cibinong')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $cbn_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Cibinong')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $cbn_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Cibinong')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $cbn_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Cibinong')->where('proses_terakhir', 'Penetapan Coret')->count();

        $cbn_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Cibinong')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $cbn_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Cibinong')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $cbn_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Cibinong')->where('tgl_selesai', Null)->count();

        $cbn_eksekusi_blm_selesai =  $cbn_eksekusi_blm_selesai_0000 + $cbn_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $cbn_eksekusi_selesai = $cbn_eksekusi - $cbn_eksekusi_blm_selesai;

        //eksekusi sisa
        $cbn_eksekusi_sisa = $cbn_eksekusi - $cbn_eksekusi_selesai;

        //Presentase selesai
        $cbn_eksekusi_progres = $cbn_eksekusi_selesai / $cbn_eksekusi * 100;
        $cbn_eksekusi_presentase = round($cbn_eksekusi_progres);

        //Bobot Nilai
        $cbn_eksekusi_riil_nilai = $cbn_eksekusi_riil * 5;
        $cbn_eksekusi_lelang_nilai = $cbn_eksekusi_lelang * 5;
        $cbn_eksekusi_dicabut_nilai = $cbn_eksekusi_dicabut * 3;
        $cbn_eksekusi_dicoret_nilai = $cbn_eksekusi_dicoret * 3;
        $cbn_eksekusi_ne_nilai = $cbn_eksekusi_ne * 3;
        $cbn_eksekusi_nilai = $cbn_eksekusi * 1;
        $cbn_eksekusi_bobot_nilai =  $cbn_eksekusi_riil_nilai +  $cbn_eksekusi_lelang_nilai +  $cbn_eksekusi_dicabut_nilai +  $cbn_eksekusi_dicoret_nilai + $cbn_eksekusi_ne_nilai + $cbn_eksekusi_nilai;

        //Cikarang
        $ckr_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Cikarang')->count();

        $ckr_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Cikarang')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $ckr_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Cikarang')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $ckr_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Cikarang')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $ckr_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Cikarang')->where('proses_terakhir', 'Penetapan Coret')->count();

        $ckr_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Cikarang')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $ckr_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Cikarang')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $ckr_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Cikarang')->where('tgl_selesai', Null)->count();

        $ckr_eksekusi_blm_selesai =  $ckr_eksekusi_blm_selesai_0000 + $ckr_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $ckr_eksekusi_selesai = $ckr_eksekusi - $ckr_eksekusi_blm_selesai;

        //eksekusi sisa
        $ckr_eksekusi_sisa = $ckr_eksekusi - $ckr_eksekusi_selesai;

        //Presentase selesai
        $ckr_eksekusi_progres = $ckr_eksekusi_selesai / $ckr_eksekusi * 100;
        $ckr_eksekusi_presentase = round($ckr_eksekusi_progres);

        //Bobot Nilai
        $ckr_eksekusi_riil_nilai = $ckr_eksekusi_riil * 5;
        $ckr_eksekusi_lelang_nilai = $ckr_eksekusi_lelang * 5;
        $ckr_eksekusi_dicabut_nilai = $ckr_eksekusi_dicabut * 3;
        $ckr_eksekusi_dicoret_nilai = $ckr_eksekusi_dicoret * 3;
        $ckr_eksekusi_ne_nilai = $ckr_eksekusi_ne * 3;
        $ckr_eksekusi_nilai = $ckr_eksekusi * 1;
        $ckr_eksekusi_bobot_nilai =  $ckr_eksekusi_riil_nilai +  $ckr_eksekusi_lelang_nilai +  $ckr_eksekusi_dicabut_nilai +  $ckr_eksekusi_dicoret_nilai + $ckr_eksekusi_ne_nilai + $ckr_eksekusi_nilai;

        //Depok
        $dpk_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Depok')->count();

        $dpk_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Depok')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $dpk_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Depok')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $dpk_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Depok')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $dpk_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Depok')->where('proses_terakhir', 'Penetapan Coret')->count();

        $dpk_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Depok')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $dpk_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Depok')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $dpk_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Depok')->where('tgl_selesai', Null)->count();

        $dpk_eksekusi_blm_selesai =  $dpk_eksekusi_blm_selesai_0000 + $dpk_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $dpk_eksekusi_selesai = $dpk_eksekusi - $dpk_eksekusi_blm_selesai;

        //eksekusi sisa
        $dpk_eksekusi_sisa = $dpk_eksekusi - $dpk_eksekusi_selesai;

        //Presentase selesai
        $dpk_eksekusi_progres = $dpk_eksekusi_selesai / $dpk_eksekusi * 100;
        $dpk_eksekusi_presentase = round($dpk_eksekusi_progres);

        //Bobot Nilai
        $dpk_eksekusi_riil_nilai = $dpk_eksekusi_riil * 5;
        $dpk_eksekusi_lelang_nilai = $dpk_eksekusi_lelang * 5;
        $dpk_eksekusi_dicabut_nilai = $dpk_eksekusi_dicabut * 3;
        $dpk_eksekusi_dicoret_nilai = $dpk_eksekusi_dicoret * 3;
        $dpk_eksekusi_ne_nilai = $dpk_eksekusi_ne * 3;
        $dpk_eksekusi_nilai = $dpk_eksekusi * 1;
        $dpk_eksekusi_bobot_nilai =  $dpk_eksekusi_riil_nilai +  $dpk_eksekusi_lelang_nilai +  $dpk_eksekusi_dicabut_nilai +  $dpk_eksekusi_dicoret_nilai + $dpk_eksekusi_ne_nilai + $dpk_eksekusi_nilai;

        //Kota Tasikmalaya
        $tmk_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Kota Tasikmalaya')->count();

        $tmk_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Kota Tasikmalaya')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $tmk_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Kota Tasikmalaya')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $tmk_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Kota Tasikmalaya')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $tmk_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Kota Tasikmalaya')->where('proses_terakhir', 'Penetapan Coret')->count();

        $tmk_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Kota Tasikmalaya')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $tmk_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Kota Tasikmalaya')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $tmk_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Kota Tasikmalaya')->where('tgl_selesai', Null)->count();

        $tmk_eksekusi_blm_selesai =  $tmk_eksekusi_blm_selesai_0000 + $tmk_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $tmk_eksekusi_selesai = $tmk_eksekusi - $tmk_eksekusi_blm_selesai;

        //eksekusi sisa
        $tmk_eksekusi_sisa = $tmk_eksekusi - $tmk_eksekusi_selesai;

        //Presentase selesai
        $tmk_eksekusi_progres = $tmk_eksekusi_selesai / $tmk_eksekusi * 100;
        $tmk_eksekusi_presentase = round($tmk_eksekusi_progres);

        //Bobot Nilai
        $tmk_eksekusi_riil_nilai = $tmk_eksekusi_riil * 5;
        $tmk_eksekusi_lelang_nilai = $tmk_eksekusi_lelang * 5;
        $tmk_eksekusi_dicabut_nilai = $tmk_eksekusi_dicabut * 3;
        $tmk_eksekusi_dicoret_nilai = $tmk_eksekusi_dicoret * 3;
        $tmk_eksekusi_ne_nilai = $tmk_eksekusi_ne * 3;
        $tmk_eksekusi_nilai = $tmk_eksekusi * 1;
        $tmk_eksekusi_bobot_nilai =  $tmk_eksekusi_riil_nilai +  $tmk_eksekusi_lelang_nilai +  $tmk_eksekusi_dicabut_nilai +  $tmk_eksekusi_dicoret_nilai + $tmk_eksekusi_ne_nilai + $tmk_eksekusi_nilai;

         //Kota Banjar
        $bjr_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Kota Banjar')->count();

        $bjr_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Kota Banjar')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $bjr_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Kota Banjar')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $bjr_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Kota Banjar')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $bjr_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Kota Banjar')->where('proses_terakhir', 'Penetapan Coret')->count();

        $bjr_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Kota Banjar')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $bjr_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Kota Banjar')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $bjr_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Kota Banjar')->where('tgl_selesai', Null)->count();

        $bjr_eksekusi_blm_selesai =  $bjr_eksekusi_blm_selesai_0000 + $bjr_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $bjr_eksekusi_selesai = $bjr_eksekusi - $bjr_eksekusi_blm_selesai;

        //eksekusi sisa
        $bjr_eksekusi_sisa = $bjr_eksekusi - $bjr_eksekusi_selesai;

        //Presentase selesai
        $bjr_eksekusi_progres = $bjr_eksekusi_selesai / $bjr_eksekusi * 100;
        $bjr_eksekusi_presentase = round($bjr_eksekusi_progres);

        //Bobot Nilai
        $bjr_eksekusi_riil_nilai = $bjr_eksekusi_riil * 5;
        $bjr_eksekusi_lelang_nilai = $bjr_eksekusi_lelang * 5;
        $bjr_eksekusi_dicabut_nilai = $bjr_eksekusi_dicabut * 3;
        $bjr_eksekusi_dicoret_nilai = $bjr_eksekusi_dicoret * 3;
        $bjr_eksekusi_ne_nilai = $bjr_eksekusi_ne * 3;
        $bjr_eksekusi_nilai = $bjr_eksekusi * 1;
        $bjr_eksekusi_bobot_nilai =  $bjr_eksekusi_riil_nilai +  $bjr_eksekusi_lelang_nilai +  $bjr_eksekusi_dicabut_nilai +  $bjr_eksekusi_dicoret_nilai + $bjr_eksekusi_ne_nilai + $bjr_eksekusi_nilai;

        //Soreang
        $sor_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Soreang')->count();

        $sor_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Soreang')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $sor_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Soreang')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $sor_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Soreang')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $sor_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Soreang')->where('proses_terakhir', 'Penetapan Coret')->count();

        $sor_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Soreang')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $sor_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Soreang')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $sor_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Soreang')->where('tgl_selesai', Null)->count();

        $sor_eksekusi_blm_selesai =  $sor_eksekusi_blm_selesai_0000 + $sor_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $sor_eksekusi_selesai = $sor_eksekusi - $sor_eksekusi_blm_selesai;

        //eksekusi sisa
        $sor_eksekusi_sisa = $sor_eksekusi - $sor_eksekusi_selesai;

        //Presentase selesai
        $sor_eksekusi_progres = $sor_eksekusi_selesai / $sor_eksekusi * 100;
        $sor_eksekusi_presentase = round($sor_eksekusi_progres);

        //Bobot Nilai
        $sor_eksekusi_riil_nilai = $sor_eksekusi_riil * 5;
        $sor_eksekusi_lelang_nilai = $sor_eksekusi_lelang * 5;
        $sor_eksekusi_dicabut_nilai = $sor_eksekusi_dicabut * 3;
        $sor_eksekusi_dicoret_nilai = $sor_eksekusi_dicoret * 3;
        $sor_eksekusi_ne_nilai = $sor_eksekusi_ne * 3;
        $sor_eksekusi_nilai = $sor_eksekusi * 1;
        $sor_eksekusi_bobot_nilai =  $sor_eksekusi_riil_nilai +  $sor_eksekusi_lelang_nilai +  $sor_eksekusi_dicabut_nilai +  $sor_eksekusi_dicoret_nilai + $sor_eksekusi_ne_nilai + $sor_eksekusi_nilai;

        //Ngamprah
        $nph_eksekusi = DB::table('tb_eksekusi')->where('satker', 'Ngamprah')->count();

        $nph_eksekusi_riil = DB::table('tb_eksekusi')->where('satker', 'Ngamprah')->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();

        $nph_eksekusi_lelang = DB::table('tb_eksekusi')->where('satker', 'Ngamprah')->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();

        $nph_eksekusi_dicabut = DB::table('tb_eksekusi')->where('satker', 'Ngamprah')->where('proses_terakhir', 'Penetapan Cabut')->count();

        $nph_eksekusi_dicoret = DB::table('tb_eksekusi')->where('satker', 'Ngamprah')->where('proses_terakhir', 'Penetapan Coret')->count();

        $nph_eksekusi_ne = DB::table('tb_eksekusi')->where('satker', 'Ngamprah')->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        //eksekusi belum selesai
        $nph_eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('satker', 'Ngamprah')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $nph_eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('satker', 'Ngamprah')->where('tgl_selesai', Null)->count();

        $nph_eksekusi_blm_selesai =  $nph_eksekusi_blm_selesai_0000 + $nph_eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $nph_eksekusi_selesai = $nph_eksekusi - $nph_eksekusi_blm_selesai;

        //eksekusi sisa
        $nph_eksekusi_sisa = $nph_eksekusi - $nph_eksekusi_selesai;

        //Presentase selesai
        $nph_eksekusi_progres = $nph_eksekusi_selesai / $nph_eksekusi * 100;
        $nph_eksekusi_presentase = round($nph_eksekusi_progres);

        //Bobot Nilai
        $nph_eksekusi_riil_nilai = $nph_eksekusi_riil * 5;
        $nph_eksekusi_lelang_nilai = $nph_eksekusi_lelang * 5;
        $nph_eksekusi_dicabut_nilai = $nph_eksekusi_dicabut * 3;
        $nph_eksekusi_dicoret_nilai = $nph_eksekusi_dicoret * 3;
        $nph_eksekusi_ne_nilai = $nph_eksekusi_ne * 3;
        $nph_eksekusi_nilai = $nph_eksekusi * 1;
        $nph_eksekusi_bobot_nilai =  $nph_eksekusi_riil_nilai +  $nph_eksekusi_lelang_nilai +  $nph_eksekusi_dicabut_nilai +  $nph_eksekusi_dicoret_nilai + $nph_eksekusi_ne_nilai + $nph_eksekusi_nilai;

        return view('/eksekusi/v_eksekusi_progres', $data, compact(
            'badg_eksekusi',
            'badg_eksekusi_riil',
            'badg_eksekusi_lelang',
            'badg_eksekusi_dicabut',
            'badg_eksekusi_dicoret',
            'badg_eksekusi_ne',
            'badg_eksekusi_selesai',
            'badg_eksekusi_sisa',
            'badg_eksekusi_progres',
            'badg_eksekusi_bobot_nilai',
            'smdg_eksekusi',
            'smdg_eksekusi_riil',
            'smdg_eksekusi_lelang',
            'smdg_eksekusi_dicabut',
            'smdg_eksekusi_dicoret',
            'smdg_eksekusi_ne',
            'smdg_eksekusi_selesai',
            'smdg_eksekusi_sisa',
            'smdg_eksekusi_progres',
            'smdg_eksekusi_bobot_nilai',
            'im_eksekusi',
            'im_eksekusi_riil',
            'im_eksekusi_lelang',
            'im_eksekusi_dicabut',
            'im_eksekusi_dicoret',
            'im_eksekusi_ne',
            'im_eksekusi_selesai',
            'im_eksekusi_sisa',
            'im_eksekusi_progres',
            'im_eksekusi_bobot_nilai',
            'mjl_eksekusi',
            'mjl_eksekusi_riil',
            'mjl_eksekusi_lelang',
            'mjl_eksekusi_dicabut',
            'mjl_eksekusi_dicoret',
            'mjl_eksekusi_ne',
            'mjl_eksekusi_selesai',
            'mjl_eksekusi_sisa',
            'mjl_eksekusi_progres',
            'mjl_eksekusi_bobot_nilai',
            'sbr_eksekusi',
            'sbr_eksekusi_riil',
            'sbr_eksekusi_lelang',
            'sbr_eksekusi_dicabut',
            'sbr_eksekusi_dicoret',
            'sbr_eksekusi_ne',
            'sbr_eksekusi_selesai',
            'sbr_eksekusi_sisa',
            'sbr_eksekusi_progres',
            'sbr_eksekusi_bobot_nilai',
            'cms_eksekusi',
            'cms_eksekusi_riil',
            'cms_eksekusi_lelang',
            'cms_eksekusi_dicabut',
            'cms_eksekusi_dicoret',
            'cms_eksekusi_ne',
            'cms_eksekusi_selesai',
            'cms_eksekusi_sisa',
            'cms_eksekusi_progres',
            'cms_eksekusi_bobot_nilai',
            'tsm_eksekusi',
            'tsm_eksekusi_riil',
            'tsm_eksekusi_lelang',
            'tsm_eksekusi_dicabut',
            'tsm_eksekusi_dicoret',
            'tsm_eksekusi_ne',
            'tsm_eksekusi_selesai',
            'tsm_eksekusi_sisa',
            'tsm_eksekusi_progres',
            'tsm_eksekusi_bobot_nilai',
            'krw_eksekusi',
            'krw_eksekusi_riil',
            'krw_eksekusi_lelang',
            'krw_eksekusi_dicabut',
            'krw_eksekusi_dicoret',
            'krw_eksekusi_ne',
            'krw_eksekusi_selesai',
            'krw_eksekusi_sisa',
            'krw_eksekusi_progres',
            'krw_eksekusi_bobot_nilai',
            'cmi_eksekusi',
            'cmi_eksekusi_riil',
            'cmi_eksekusi_lelang',
            'cmi_eksekusi_dicabut',
            'cmi_eksekusi_dicoret',
            'cmi_eksekusi_ne',
            'cmi_eksekusi_selesai',
            'cmi_eksekusi_sisa',
            'cmi_eksekusi_progres',
            'cmi_eksekusi_bobot_nilai',
            'sbg_eksekusi',
            'sbg_eksekusi_riil',
            'sbg_eksekusi_lelang',
            'sbg_eksekusi_dicabut',
            'sbg_eksekusi_dicoret',
            'sbg_eksekusi_ne',
            'sbg_eksekusi_selesai',
            'sbg_eksekusi_sisa',
            'sbg_eksekusi_progres',
            'sbg_eksekusi_bobot_nilai',
            'pwk_eksekusi',
            'pwk_eksekusi_riil',
            'pwk_eksekusi_lelang',
            'pwk_eksekusi_dicabut',
            'pwk_eksekusi_dicoret',
            'pwk_eksekusi_ne',
            'pwk_eksekusi_selesai',
            'pwk_eksekusi_sisa',
            'pwk_eksekusi_progres',
            'pwk_eksekusi_bobot_nilai',
            'smi_eksekusi',
            'smi_eksekusi_riil',
            'smi_eksekusi_lelang',
            'smi_eksekusi_dicabut',
            'smi_eksekusi_dicoret',
            'smi_eksekusi_ne',
            'smi_eksekusi_selesai',
            'smi_eksekusi_sisa',
            'smi_eksekusi_progres',
            'smi_eksekusi_bobot_nilai',
            'cjr_eksekusi',
            'cjr_eksekusi_riil',
            'cjr_eksekusi_lelang',
            'cjr_eksekusi_dicabut',
            'cjr_eksekusi_dicoret',
            'cjr_eksekusi_ne',
            'cjr_eksekusi_selesai',
            'cjr_eksekusi_sisa',
            'cjr_eksekusi_progres',
            'cjr_eksekusi_bobot_nilai',
            'kng_eksekusi',
            'kng_eksekusi_riil',
            'kng_eksekusi_lelang',
            'kng_eksekusi_dicabut',
            'kng_eksekusi_dicoret',
            'kng_eksekusi_ne',
            'kng_eksekusi_selesai',
            'kng_eksekusi_sisa',
            'kng_eksekusi_progres',
            'kng_eksekusi_bobot_nilai',
            'cbd_eksekusi',
            'cbd_eksekusi_riil',
            'cbd_eksekusi_lelang',
            'cbd_eksekusi_dicabut',
            'cbd_eksekusi_dicoret',
            'cbd_eksekusi_ne',
            'cbd_eksekusi_selesai',
            'cbd_eksekusi_sisa',
            'cbd_eksekusi_progres',
            'cbd_eksekusi_bobot_nilai',
            'cn_eksekusi',
            'cn_eksekusi_riil',
            'cn_eksekusi_lelang',
            'cn_eksekusi_dicabut',
            'cn_eksekusi_dicoret',
            'cn_eksekusi_ne',
            'cn_eksekusi_selesai',
            'cn_eksekusi_sisa',
            'cn_eksekusi_progres',
            'cn_eksekusi_bobot_nilai',
            'grt_eksekusi',
            'grt_eksekusi_riil',
            'grt_eksekusi_lelang',
            'grt_eksekusi_dicabut',
            'grt_eksekusi_dicoret',
            'grt_eksekusi_ne',
            'grt_eksekusi_selesai',
            'grt_eksekusi_sisa',
            'grt_eksekusi_progres',
            'grt_eksekusi_bobot_nilai',
            'bgr_eksekusi',
            'bgr_eksekusi_riil',
            'bgr_eksekusi_lelang',
            'bgr_eksekusi_dicabut',
            'bgr_eksekusi_dicoret',
            'bgr_eksekusi_ne',
            'bgr_eksekusi_selesai',
            'bgr_eksekusi_sisa',
            'bgr_eksekusi_progres',
            'bgr_eksekusi_bobot_nilai',
            'bks_eksekusi',
            'bks_eksekusi_riil',
            'bks_eksekusi_lelang',
            'bks_eksekusi_dicabut',
            'bks_eksekusi_dicoret',
            'bks_eksekusi_ne',
            'bks_eksekusi_selesai',
            'bks_eksekusi_sisa',
            'bks_eksekusi_progres',
            'bks_eksekusi_bobot_nilai',
            'cbn_eksekusi',
            'cbn_eksekusi_riil',
            'cbn_eksekusi_lelang',
            'cbn_eksekusi_dicabut',
            'cbn_eksekusi_dicoret',
            'cbn_eksekusi_ne',
            'cbn_eksekusi_selesai',
            'cbn_eksekusi_sisa',
            'cbn_eksekusi_progres',
            'cbn_eksekusi_bobot_nilai',
            'ckr_eksekusi',
            'ckr_eksekusi_riil',
            'ckr_eksekusi_lelang',
            'ckr_eksekusi_dicabut',
            'ckr_eksekusi_dicoret',
            'ckr_eksekusi_ne',
            'ckr_eksekusi_selesai',
            'ckr_eksekusi_sisa',
            'ckr_eksekusi_progres',
            'ckr_eksekusi_bobot_nilai',
            'dpk_eksekusi',
            'dpk_eksekusi_riil',
            'dpk_eksekusi_lelang',
            'dpk_eksekusi_dicabut',
            'dpk_eksekusi_dicoret',
            'dpk_eksekusi_ne',
            'dpk_eksekusi_selesai',
            'dpk_eksekusi_sisa',
            'dpk_eksekusi_progres',
            'dpk_eksekusi_bobot_nilai',
            'tmk_eksekusi',
            'tmk_eksekusi_riil',
            'tmk_eksekusi_lelang',
            'tmk_eksekusi_dicabut',
            'tmk_eksekusi_dicoret',
            'tmk_eksekusi_ne',
            'tmk_eksekusi_selesai',
            'tmk_eksekusi_sisa',
            'tmk_eksekusi_progres',
            'tmk_eksekusi_bobot_nilai',
            'bjr_eksekusi',
            'bjr_eksekusi_riil',
            'bjr_eksekusi_lelang',
            'bjr_eksekusi_dicabut',
            'bjr_eksekusi_dicoret',
            'bjr_eksekusi_ne',
            'bjr_eksekusi_selesai',
            'bjr_eksekusi_sisa',
            'bjr_eksekusi_progres',
            'bjr_eksekusi_bobot_nilai',
            'sor_eksekusi',
            'sor_eksekusi_riil',
            'sor_eksekusi_lelang',
            'sor_eksekusi_dicabut',
            'sor_eksekusi_dicoret',
            'sor_eksekusi_ne',
            'sor_eksekusi_selesai',
            'sor_eksekusi_sisa',
            'sor_eksekusi_progres',
            'sor_eksekusi_bobot_nilai',
            'nph_eksekusi',
            'nph_eksekusi_riil',
            'nph_eksekusi_lelang',
            'nph_eksekusi_dicabut',
            'nph_eksekusi_dicoret',
            'nph_eksekusi_ne',
            'nph_eksekusi_selesai',
            'nph_eksekusi_sisa',
            'nph_eksekusi_progres',
            'nph_eksekusi_bobot_nilai',
        ));
    }

    public function total_eks()
    {
        $data = [
            'title' => 'Perkara Eksekusi',
            'eksekusi' => $this->EksekusiModel->allData(),
        ];
        return view('/eksekusi/v_eksekusi', $data);
    }

    public function berjalan_eks()
    {
        $data = [
            'title' => 'Perkara Eksekusi',
            'eksekusi' => $this->EksekusiModel->berjalan_eks(),
        ];
        $sekarang =  date("Y-m-d");
        return view('/eksekusi/v_eksekusi', $data)
            ->with("sekarang", $sekarang);
    }

    public function selesai_eks()
    {
        $data = [
            'title' => 'Perkara Eksekusi',
            'eksekusi' => $this->EksekusiModel->selesai_eks(),
        ];
        return view('/eksekusi/v_eksekusi', $data);
    }

    //Detail
    public function detail($id_eks)
    {
        if (!$this->EksekusiModel->detailData($id_eks)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'eksekusi' => $this->EksekusiModel->detailData($id_eks),
        ];
        return view('/eksekusi/v_detail_eksekusi', $data);
    }

    //Tambah Data
    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/eksekusi/v_add_eksekusi', $data);
    }

    //Insert Data
    public function insert()
    {
        Request()->validate([
            'satker' => 'required',
            'no_eksekusi' => 'required|unique:tb_eksekusi,satker|max:255',
            'tgl_permohonan' => 'required',
            'proses_terakhir' => 'required',

        ], [
            'satker' => 'Nama satker wajib diisi!!',
            'no_eksekusi.required' => 'Nomor perkara wajib diisi!!',
            'no_eksekusi.unique' => 'Nomor perkara sudah ada!!',
            'no_eksekusi.max' => 'Max 255 Karakter!!',
            'tgl_permohonan.required' => 'Tanggal permohonan eksekusi wajib diisi!!',
            'proses_terakhir.required' => 'Proses terakhir wajib diisi!!',

        ]);

        $data = [
            'no_eksekusi' => Request()->no_eksekusi,
            'satker' => Request()->satker,
            'no_put' => Request()->no_put,
            'tgl_permohonan' => Request()->tgl_permohonan,
            'proses_terakhir' => Request()->proses_terakhir,
            'tgl_eks' => Request()->tgl_eks,
            'tgl_selesai' => Request()->tgl_selesai,
            'keterangan' => Request()->keterangan,
        ];

        $this->EksekusiModel->addData($data);
        return redirect()->route('berjalan_eks')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    //Edit Data
    public function edit($id_eks)
    {
        if (!$this->EksekusiModel->detailData($id_eks)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'eksekusi' => $this->EksekusiModel->detailData($id_eks),
        ];
        return view('/eksekusi/v_edit_eksekusi', $data);
    }

    //Update Data
    public function update($id_eks)
    {
        Request()->validate([
            'satker' => 'required',
            'no_eksekusi' => 'required|unique:tb_eksekusi,satker|max:255',
            'tgl_permohonan' => 'required',
            'proses_terakhir' => 'required',

        ], [
            'satker' => 'Nama satker wajib diisi!!',
            'no_eksekusi.required' => 'Nomor perkara wajib diisi!!',
            'no_eksekusi.unique' => 'Nomor perkara sudah ada!!',
            'no_eksekusi.max' => 'Max 255 Karakter!!',
            'tgl_permohonan.required' => 'Tanggal permohonan eksekusi wajib diisi!!',
            'proses_terakhir.required' => 'Proses terakhir wajib diisi!!',

        ]);

        $data = [
            'no_eksekusi' => Request()->no_eksekusi,
            'satker' => Request()->satker,
            'no_put' => Request()->no_put,
            'tgl_permohonan' => Request()->tgl_permohonan,
            'proses_terakhir' => Request()->proses_terakhir,
            'tgl_eks' => Request()->tgl_eks,
            'tgl_selesai' => Request()->tgl_selesai,
            'keterangan' => Request()->keterangan,
        ];

        $this->EksekusiModel->editData($id_eks, $data);

        return redirect()->route('berjalan_eks')->with('pesan', 'Data Berhasil Diupdate !!');
    }


    public function delete($id_eks)
    {
        //hapus file

        $this->EksekusiModel->deleteData($id_eks);
        return redirect()->route('eks')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
