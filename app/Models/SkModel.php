<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SkModel extends Model
{
    public function allData()
    {
        return DB::table('tb_sk')->orderBy('tgl_sk', 'desc')->get();
    }

    public function detailData($id_sk)
    {
        return DB::table('tb_sk')->where('id_sk', $id_sk)->first();
    }

    public function addData($data)
    {
        DB::table('tb_sk')->insert($data);
    }

    public function editData($id_sk, $data)
    {
        DB::table('tb_sk')->where('id_sk', $id_sk)->update($data);
    }

    public function deleteData($id_sk)
    {
        DB::table('tb_sk')->where('id_sk', $id_sk)->delete();
    }
}
