<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BankputModel extends Model
{
    public function allData()
    {
        // return DB::table('tb_bank_putusan')->orderBy('tgl_put_banding', 'desc')->get();
        return DB::table('tb_bank_putusan')
            
            ->orderBy('tgl_put_banding', 'desc')->get();
    }

    public function detailData($id)
    {
        return DB::table('tb_bank_putusan')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('tb_bank_putusan')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('tb_bank_putusan')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tb_bank_putusan')->where('id', $id)->delete();
    }
}
