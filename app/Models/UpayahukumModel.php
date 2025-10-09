<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UpayahukumModel extends Model
{
    public function allData()
    {
        // return DB::table('tb_upy_hk')->orderBy('tgl_register', 'desc')->get();
        return DB::table('tb_upy_hk')
            ->selectRaw("*, IF(tgl_put_upy='0000-00-00', DATEDIFF(NOW(), tgl_register), DATEDIFF(tgl_put_upy, tgl_register)) AS selisih")
            ->orderBy('tgl_masuk', 'desc')
            ->get();
    }

    public function detailData($id)
    {
        return DB::table('tb_upy_hk')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('tb_upy_hk')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('tb_upy_hk')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tb_upy_hk')->where('id', $id)->delete();
    }
}
