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

    public function detailData($id)
    {
        return DB::table('tb_reg_kasasi')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('tb_reg_kasasi')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('tb_reg_kasasi')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tb_reg_kasasi')->where('id', $id)->delete();
    }
}
