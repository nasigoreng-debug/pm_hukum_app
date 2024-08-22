<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PbtModel extends Model
{
    public function allData()
    {
        return DB::table('tb_pbt_banding')->orderBy('tgl_masuk', 'desc')->get();
    }

    public function detailData($id_pbt)
    {
        return DB::table('tb_pbt_banding')->where('id_pbt', $id_pbt)->first();
    }

    public function addData($data)
    {
        DB::table('tb_pbt_banding')->insert($data);
    }

    public function editData($id_pbt, $data)
    {
        DB::table('tb_pbt_banding')->where('id_pbt', $id_pbt)->update($data);
    }

    public function deleteData($id_pbt)
    {
        DB::table('tb_pbt_banding')->where('id_pbt', $id_pbt)->delete();
    }
}
