<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SuratmasukModel extends Model
{
    public function allData()
    {
        return DB::table('tb_surat_masuk')->orderBy('tgl_masuk_pan', 'desc')->get();
    }

    public function user()
    {
        return DB::table('users')->where('level', '=', '2')->get();
    }

    public function detailData($id_suratmasuk)
    {
        return DB::table('tb_surat_masuk')->where('id_suratmasuk', $id_suratmasuk)->first();
    }

    public function addData($data)
    {
        DB::table('tb_surat_masuk')->insert($data);
    }

    public function editData($id_suratmasuk, $data)
    {
        DB::table('tb_surat_masuk')->where('id_suratmasuk', $id_suratmasuk)->update($data);
    }

    public function deleteData($id_suratmasuk)
    {
        DB::table('tb_surat_masuk')->where('id_suratmasuk', $id_suratmasuk)->delete();
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['tgl_masuk_pan'])
            ->translatedFormat('l, d-F-Y');
    }
}
