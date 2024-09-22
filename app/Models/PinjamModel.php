<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PinjamModel extends Model
{
    public function allData()
    {
        return DB::table('tb_pinjam_berkas')->orderBy('tgl_pinjam', 'desc')->get();
    }

    public function detailData($id_pinjam)
    {
        return DB::table('tb_pinjam_berkas')->where('id_pinjam', $id_pinjam)->first();
    }

    public function addData($data)
    {
        DB::table('tb_pinjam_berkas')->insert($data);
    }

    public function editData($id_pinjam, $data)
    {
        DB::table('tb_pinjam_berkas')->where('id_pinjam', $id_pinjam)->update($data);
    }

    public function deleteData($id_pinjam)
    {
        DB::table('tb_pinjam_berkas')->where('id_pinjam', $id_pinjam)->delete();
    }
}
