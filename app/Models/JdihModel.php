<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JdihModel extends Model
{
    public function allData()
    {
        return DB::table('tb_jdih')->orderBy('tgl_peraturan', 'desc')->get();
    }

    public function detailData($id_jdih)
    {
        return DB::table('tb_jdih')->where('id_jdih', $id_jdih)->first();
    }

    public function addData($data)
    {
        DB::table('tb_jdih')->insert($data);
    }

    public function editData($id_jdih, $data)
    {
        DB::table('tb_jdih')->where('id_jdih', $id_jdih)->update($data);
    }

    public function deleteData($id_jdih)
    {
        DB::table('tb_jdih')->where('id_jdih', $id_jdih)->delete();
    }
}
