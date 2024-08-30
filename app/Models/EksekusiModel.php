<?php

namespace App\Models;

use Hamcrest\Core\IsNull;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

use function PHPUnit\Framework\isNull;

class EksekusiModel extends Model
{
    public function allData()
    {
        return DB::table('tb_eksekusi')
            ->orderBy('tgl_permohonan', 'desc')
            ->get();
    }

    public function berjalan_eks()
    {
        return DB::table('tb_eksekusi')
            ->whereNull('tgl_selesai')
            ->orderBy('tgl_permohonan', 'desc')->get();
    }

    public function selesai_eks()
    {
        return DB::table('tb_eksekusi')
            ->whereNotNull('tgl_selesai')
            ->orderBy('tgl_permohonan', 'desc')->get();
    }

    public function detailData($id_eks)
    {
        return DB::table('tb_eksekusi')->where('id_eks', $id_eks)->first();
    }

    public function addData($data)
    {
        DB::table('tb_eksekusi')->insert($data);
    }

    public function editData($id_eks, $data)
    {
        DB::table('tb_eksekusi')->where('id_eks', $id_eks)->update($data);
    }

    public function deleteData($id_eks)
    {
        DB::table('tb_eksekusi')->where('id_eks', $id_eks)->delete();
    }
}
