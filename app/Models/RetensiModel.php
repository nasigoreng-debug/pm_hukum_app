<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RetensiModel extends Model
{
    public function allData()
    {
        return DB::table('tb_retensi_arsip')->orderBy('tgl_put_banding', 'desc')->get();
    }

    public function detailData($id_retensi)
    {
        return DB::table('tb_retensi_arsip')->where('id_retensi', $id_retensi)->first();
    }

    public function addData($data)
    {
        DB::table('tb_retensi_arsip')->insert($data);
    }

    public function editData($id_retensi, $data)
    {
        DB::table('tb_retensi_arsip')->where('id_retensi', $id_retensi)->update($data);
    }

    public function deleteData($id_retensi)
    {
        DB::table('tb_retensi_arsip')->where('id_retensi', $id_retensi)->delete();
    }

    public function retensi_sdh()
    {
        return DB::table('tb_retensi_arsip')
            ->whereNotNull('putusan')
            ->orderBy('tgl_put_banding', 'desc')->get();
    }

    public function retensi_blm()
    {
        return DB::table('tb_retensi_arsip')
            ->whereNull('putusan')
            ->orderBy('tgl_put_banding', 'desc')->get();
    }

    public function retensi_total()
    {
        return DB::table('tb_retensi_arsip')->orderBy('tgl_put_banding', 'desc')->get();
    }
}
