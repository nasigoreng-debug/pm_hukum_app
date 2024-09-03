<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KasasiModel extends Model
{
    public function allData()
    {
        // return DB::table('tb_kasasi')->orderBy('tgl_masuk', 'desc')->get();

        // return DB::table('tb_kasasi')
        //     ->Join('tb_reg_kasasi', 'tb_kasasi.no_banding', '=', 'tb_reg_kasasi.no_banding')
        //     ->orderByDesc('tb_kasasi.tgl_masuk')
        //     ->get();

        return  DB::table('tb_reg_kasasi')
                    ->join('tb_kasasi', function ($join) {
                    $join->on('tb_reg_kasasi.no_banding', '=', 'tb_kasasi.no_banding')
                    ->orderByDesc('tb_kasasi.tgl_masuk');
                    })
                    ->get();
    }

    public function detailData($id_kasasi)
    {
        return DB::table('tb_kasasi')->where('id_kasasi', $id_kasasi)->first();
    }

    public function addData($data)
    {
        DB::table('tb_kasasi')->insert($data);
    }

    public function editData($id_kasasi, $data)
    {
        DB::table('tb_kasasi')->where('id_kasasi', $id_kasasi)->update($data);
    }

    public function deleteData($id_kasasi)
    {
        DB::table('tb_kasasi')->where('id_kasasi', $id_kasasi)->delete();
    }
}
