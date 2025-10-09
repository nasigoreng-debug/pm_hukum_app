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

    public function detailData($id)
    {
        return DB::table('tb_retensi_arsip')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('tb_retensi_arsip')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('tb_retensi_arsip')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tb_retensi_arsip')->where('id', $id)->delete();
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
