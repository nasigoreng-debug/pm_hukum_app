<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RegPkModel extends Model
{
    public function allData()
    {
        return DB::table('tb_reg_pk')->orderBy('tgl_masuk', 'desc')->get();
        // return DB::table('tb_reg_pk')
        // ->Join('tb_bank_putusan', 'tb_reg_pk.no_banding', '=', 'tb_bank_putusan.no_banding')
        // ->latest()
        // ->get();
            
    }

    public function detailData($id_reg_pk)
    {
        return DB::table('tb_reg_pk')->where('id_reg_pk', $id_reg_pk)->first();
    }

    public function addData($data)
    {
        DB::table('tb_reg_pk')->insert($data);
    }

    public function editData($id_reg_pk, $data)
    {
        DB::table('tb_reg_pk')->where('id_reg_pk', $id_reg_pk)->update($data);
    }

    public function deleteData($id_reg_pk)
    {
        DB::table('tb_reg_pk')->where('id_reg_pk', $id_reg_pk)->delete();
    }
}
