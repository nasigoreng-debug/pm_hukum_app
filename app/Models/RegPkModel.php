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

    public function detailData($id)
    {
        return DB::table('tb_reg_pk')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('tb_reg_pk')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('tb_reg_pk')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tb_reg_pk')->where('id', $id)->delete();
    }
}
