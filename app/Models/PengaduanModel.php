<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PengaduanModel extends Model
{
    public function allData()
    {
        return DB::table('tb_pengaduan')
            ->orderBy('tgl_terima_pgd', 'desc')
            ->get();
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
