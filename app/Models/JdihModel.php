<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JdihModel extends Model
{
    public function allData()
    {
        return DB::table('tb_jdih')->orderBy('tgl_peraturan', 'desc')->get();
    }

    public function undang_undang()
    {
        return DB::table('tb_jdih')
            ->where('jenis_peraturan', 'Undang-Undang (UU)')
            ->orderBy('tgl_peraturan', 'desc')->get();
    }

    public function perpu()
    {
        return DB::table('tb_jdih')
            ->where('jenis_peraturan', 'Peraturan Pemerintah Pengganti Undang-undang (PERPU)')
            ->orderBy('tgl_peraturan', 'desc')->get();
    }

    public function pp()
    {
        return DB::table('tb_jdih')
            ->where('jenis_peraturan', 'Peraturan Pemerintah (PP)')
            ->orderBy('tgl_peraturan', 'desc')->get();
    }

    public function inpres()
    {
        return DB::table('tb_jdih')
            ->where('jenis_peraturan', 'Instruksi Presiden (INPRES)')
            ->orderBy('tgl_peraturan', 'desc')->get();
    }

    public function perma()
    {
        return DB::table('tb_jdih')
            ->where('jenis_peraturan', 'Peraturan Mahkamah Agung (PERMA)')
            ->orderBy('tgl_peraturan', 'desc')->get();
    }

    public function sema()
    {
        return DB::table('tb_jdih')
            ->where('jenis_peraturan', 'Surat Edaran Mahkamah Agung (SEMA)')
            ->orderBy('tgl_peraturan', 'desc')->get();
    }

    public function sk_kma()
    {
        return DB::table('tb_jdih')
            ->where('jenis_peraturan', 'Surat Keputusan Ketua Mahkamah Agung (SK KMA)')
            ->orderBy('tgl_peraturan', 'desc')->get();
    }

    public function sk_sekma()
    {
        return DB::table('tb_jdih')
            ->where('jenis_peraturan', 'Surat Keputusan Sekretaris Mahkamah Agung (SK SEKMA)')
            ->orderBy('tgl_peraturan', 'desc')->get();
    }

    public function se_dirjen_badilag()
    {
        return DB::table('tb_jdih')
            ->where('jenis_peraturan', 'Surat Edaran Direktur Jenderal Badan Peradilan Agama (SE Dirjen Badilag)')
            ->orderBy('tgl_peraturan', 'desc')->get();
    }

    public function sk_dirjen_badilag()
    {
        return DB::table('tb_jdih')
            ->where('jenis_peraturan', 'Surat Keputusan Direktur Jenderal Badan Peradilan Agama (SK Dirjen Badilag)')
            ->orderBy('tgl_peraturan', 'desc')->get();
    }

    public function se_kpta()
    {
        return DB::table('tb_jdih')
            ->where('jenis_peraturan', 'Surat Edaran Ketua Pengadilan Tinggi Agama Bandung (SE KPTA Bandung)')
            ->orderBy('tgl_peraturan', 'desc')->get();
    }

    public function sk_kpta()
    {
        return DB::table('tb_jdih')
            ->where('jenis_peraturan', 'Surat Keputusan Ketua Pengadilan Tinggi Agama Bandung (SK KPTA Bandung)')
            ->orderBy('tgl_peraturan', 'desc')->get();
    }

    public function peraturan_lainnya()
    {
        return DB::table('tb_jdih')
            ->where('jenis_peraturan', 'Peraturan lainnya')
            ->orderBy('tgl_peraturan', 'desc')->get();
    }

    public function detailData($id_jdih)
    {
        return DB::table('tb_jdih')->where('id_jdih', $id_jdih)->first();
    }

    public function addData($data)
    {
        DB::table('tb_jdih')->insert($data);
    }

    public function editData($id_jdih, $data)
    {
        DB::table('tb_jdih')->where('id_jdih', $id_jdih)->update($data);
    }

    public function deleteData($id_jdih)
    {
        DB::table('tb_jdih')->where('id_jdih', $id_jdih)->delete();
    }
}
