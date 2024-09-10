<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RegKasasiModel extends Model
{
    public function allData()
    {
        return DB::table('tb_reg_kasasi')->orderBy('tgl_register', 'desc')->get();
        // return DB::table('tb_reg_kasasi')
        //     ->selectRaw("*, IF(tgl_put_kasasi='0000-00-00', DATEDIFF(NOW(), tgl_register), DATEDIFF(tgl_put_kasasi, tgl_register)) AS selisih")
        //     ->orderBy('tgl_masuk', 'desc')->get();
    }

    public function detailData($id_reg_kasasi)
    {
        return DB::table('tb_reg_kasasi')->where('id_reg_kasasi', $id_reg_kasasi)->first();
    }

    public function addData($data)
    {
        DB::table('tb_reg_kasasi')->insert($data);
    }

    public function editData($id_reg_kasasi, $data)
    {
        DB::table('tb_reg_kasasi')->where('id_reg_kasasi', $id_reg_kasasi)->update($data);
    }

    public function deleteData($id_reg_kasasi)
    {
        DB::table('tb_reg_kasasi')->where('id_reg_kasasi', $id_reg_kasasi)->delete();
    }
}
