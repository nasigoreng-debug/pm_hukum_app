<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class PkModel extends Model
{
    public function allData()
    {
        return DB::table('tb_peninjauan_kembali')->orderBy('tgl_masuk', 'desc')->get();

        // return DB::table('tb_peninjauan_kembali')

        //     ->Join('tb_reg_pk', 'tb_peninjauan_kembali.no_banding', '=', 'tb_reg_pk.no_banding')
        //     ->Join('tb_reg_kasasi', 'tb_peninjauan_kembali.no_banding', '=', 'tb_reg_kasasi.no_banding')
        //     ->latest('tb_peninjauan_kembali.tgl_masuk')
        //     ->get();

    //     return  DB::table('tb_reg_pk')
    //         ->Join('tb_peninjauan_kembali', function ($join) {
    //             $join->on('tb_reg_pk.no_banding', '=', 'tb_peninjauan_kembali.no_banding');
    //         })->orderByDesc('tb_peninjauan_kembali.tgl_masuk')->get();
    }

    public function detailData($id)
    {
        return DB::table('tb_peninjauan_kembali')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('tb_peninjauan_kembali')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('tb_peninjauan_kembali')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tb_peninjauan_kembali')->where('id', $id)->delete();
    }
}
