<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SuratkeluarModel extends Model
{
    public function allData()
    {
        return DB::table('tb_surat_keluar')->orderBy('tgl_surat', 'desc')->get();
    }

    public function detailData($id_suratkeluar)
    {
        return DB::table('tb_surat_keluar')->where('id_suratkeluar', $id_suratkeluar)->first();
    }

    public function addData($data)
    {
        DB::table('tb_surat_keluar')->insert($data);
    }

    public function editData($id_suratkeluar, $data)
    {
        DB::table('tb_surat_keluar')->where('id_suratkeluar', $id_suratkeluar)->update($data);
    }

    public function deleteData($id_suratkeluar)
    {
        DB::table('tb_surat_keluar')->where('id_suratkeluar', $id_suratkeluar)->delete();
    }
}
