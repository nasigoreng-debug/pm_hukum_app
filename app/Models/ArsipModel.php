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

    public function detailData($id)
    {
        return DB::table('tb_arsip_perkara')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('tb_arsip_perkara')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('tb_arsip_perkara')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tb_arsip_perkara')->where('id', $id)->delete();
    }

    public function arsip_perkara_upload()
    {
        return DB::table('tb_arsip_perkara')
            ->whereNotNull('bundel_b')
            ->orderBy('tgl_put_banding', 'desc')->get();
    }

    public function arsip_perkara_blm_upload()
    {
        return DB::table('tb_arsip_perkara')
            ->whereNull('bundel_b')
            ->orderBy('tgl_put_banding', 'desc')->get();
    }

    public function arsip_perkara_total()
    {
        return DB::table('tb_arsip_perkara')->orderBy('tgl_put_banding', 'desc')->get();
    }
}
