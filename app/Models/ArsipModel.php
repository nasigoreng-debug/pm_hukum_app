<?php

namespace App\Models;

use Illuminate\Support\Carbon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ArsipModel extends Model
{
    public function allData()
    {
        return DB::table('tb_arsip_perkara')->orderBy('tgl_masuk', 'desc')->get();
    }

    public function arsip_now()
    {
        //Function Tahun sekarang
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        return DB::table('tb_arsip_perkara')
            ->whereYear('tgl_masuk', $year)
            ->orderBy('tgl_masuk', 'desc')
            ->get();
    }

    public function user()
    {
        return DB::table('users')
            ->Where('level', '=', '2')
            ->OrWhere('level', '=', '3')
            ->orderBy('name', 'asc')
            ->get();
    }

    public function detailData($id_banding)
    {
        return DB::table('tb_arsip_perkara')->where('id_banding', $id_banding)->first();
    }

    public function addData($data)
    {
        DB::table('tb_arsip_perkara')->insert($data);
    }

    public function editData($id_banding, $data)
    {
        DB::table('tb_arsip_perkara')->where('id_banding', $id_banding)->update($data);
    }

    public function deleteData($id_banding)
    {
        DB::table('tb_arsip_perkara')->where('id_banding', $id_banding)->delete();
    }

    public function arsip_perkara_upload()
    {
        return DB::table('tb_arsip_perkara')
            ->whereNotNull('bundle_b')
            ->orderBy('tgl_put_banding', 'desc')->get();
    }

    public function arsip_perkara_blm_upload()
    {
        return DB::table('tb_arsip_perkara')
            ->whereNull('bundle_b')
            ->orderBy('tgl_put_banding', 'desc')->get();
    }

    public function arsip_perkara_total()
    {
        return DB::table('tb_arsip_perkara')->orderBy('tgl_put_banding', 'desc')->get();
    }
}
