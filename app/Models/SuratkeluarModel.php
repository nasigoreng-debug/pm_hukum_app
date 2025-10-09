<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SuratkeluarModel extends Model
{
    public function allData()
    {
        return DB::table('tb_surat_keluar')->orderBy('tgl_surat', 'desc')->get();
    }

    public function suratkeluar_berjalan()
    {

        //Function Tahun sekarang
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        $datenow = Carbon::now()->format('Y-m-d');

        return DB::table('tb_surat_keluar')
        ->whereYear('tgl_surat', $year)
        ->orderBy('tgl_surat', 'desc')->get();
    }

    public function suratkeluar_total()
    {
        return DB::table('tb_surat_keluar')->orderBy('tgl_surat', 'desc')->get();
    }

    public function detailData($id)
    {
        return DB::table('tb_surat_keluar')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('tb_surat_keluar')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('tb_surat_keluar')->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        DB::table('tb_surat_keluar')->where('id', $id)->delete();
    }
}
