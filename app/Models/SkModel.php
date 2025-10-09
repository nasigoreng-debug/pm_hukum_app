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

    public function detailData($id)
    {
        return DB::table('tb_sk')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('tb_sk')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('tb_sk')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tb_sk')->where('id', $id)->delete();
    }
}
