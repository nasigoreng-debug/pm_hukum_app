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

    public function suratmasuk_berjalan()
    {

        //Function Tahun sekarang
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        $datenow = Carbon::now()->format('Y-m-d');

        return DB::table('tb_surat_masuk')
        ->whereYear('tgl_surat', $year)
        ->orderBy('tgl_surat', 'desc')->get();
    }

    public function suratmasuk_total()
    {
        return DB::table('tb_surat_masuk')->orderBy('tgl_masuk_pan', 'desc')->get();
    }


    public function user()
    {
        return DB::table('users')
        ->Where('level', '=', '2')
        ->OrWhere('level', '=', '3')
        ->orderBy('name', 'asc')
        ->get();
    }

    public function detailData($id)
    {
        return DB::table('tb_surat_masuk')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('tb_surat_masuk')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('tb_surat_masuk')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tb_surat_masuk')->where('id', $id)->delete();
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['tgl_masuk_pan'])
            ->translatedFormat('l, d-F-Y');
    }
}
