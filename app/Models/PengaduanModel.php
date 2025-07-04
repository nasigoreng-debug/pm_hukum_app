<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PengaduanModel extends Model
{
    public function allData()
    {
        return DB::table('tb_pengaduan')
            ->orderBy('tgl_terima_pgd', 'desc')
            ->get();
    }

    public function pgd_berjalan()
    {

        //Function Tahun sekarang
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        $datenow = Carbon::now()->format('Y-m-d');

        return DB::table('tb_pengaduan')
        ->whereYear('tgl_terima_pgd', $year)
        ->orderBy('tgl_terima_pgd', 'desc')->get();
    }

    public function pengaduan_blm_selesai()
    {

        return DB::table('tb_pengaduan')
        ->whereNull('tgl_selesai_pgd')
        ->orderBy('tgl_terima_pgd', 'desc')->get();
    }

    public function pgd_total()
    {
        return DB::table('tb_pengaduan')->orderBy('tgl_terima_pgd', 'desc')->get();
    }

    public function detailData($id_pgd)
    {
        return DB::table('tb_pengaduan')->where('id_pgd', $id_pgd)->first();
    }

    public function addData($data)
    {
        DB::table('tb_pengaduan')->insert($data);
    }

    public function editData($id_pgd, $data)
    {
        DB::table('tb_pengaduan')->where('id_pgd', $id_pgd)->update($data);
    }

    public function deleteData($id_pgd)
    {
        DB::table('tb_pengaduan')->where('id_pgd', $id_pgd)->delete();
    }
}
