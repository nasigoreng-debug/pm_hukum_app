<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class PkModel extends Model
{
    public function allData()
    {
        // return DB::table('tb_peninjauan_kembali')->orderBy('tgl_masuk', 'desc')->get();

        return DB::table('tb_peninjauan_kembali')

            ->Join('tb_reg_pk', 'tb_peninjauan_kembali.no_banding', '=', 'tb_reg_pk.no_banding')
            ->Join('tb_reg_kasasi', 'tb_peninjauan_kembali.no_banding', '=', 'tb_reg_kasasi.no_banding')
            ->latest()
            ->get();
    }

    public function detailData($id_pk)
    {
        return DB::table('tb_peninjauan_kembali')->where('id_pk', $id_pk)->first();
    }

    public function addData($data)
    {
        DB::table('tb_peninjauan_kembali')->insert($data);
    }

    public function editData($id_pk, $data)
    {
        DB::table('tb_peninjauan_kembali')->where('id_pk', $id_pk)->update($data);
    }

    public function deleteData($id_pk)
    {
        DB::table('tb_peninjauan_kembali')->where('id_pk', $id_pk)->delete();
    }
}
