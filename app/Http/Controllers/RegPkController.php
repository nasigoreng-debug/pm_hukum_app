<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegPkModel;

class RegPkController extends Controller
{
    public function __construct()
    {
        $this->RegPkModel = new RegPkModel();
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Register Peninjauan Kembali',
            'reg_pk' => $this->RegPkModel->allData(),
        ];
        $sekarang =  date("Y-m-d");
        return view('/reg_pk/v_reg_pk', $data)
            ->with("sekarang", $sekarang);
    }

    public function detail($id)
    {
        if (!$this->RegPkModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'reg_pk' => $this->RegPkModel->detailData($id),
        ];
        return view('/reg_pk/v_detail_reg_pk', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/reg_pk/v_add_reg_pk', $data);
    }

    public function insert()
    {
        Request()->validate([
            'pa_pengaju' => 'required',
            'tgl_masuk' => 'required',
            // 'tgl_register' => 'required',
            'no_pk' => 'required|unique:tb_reg_pk,no_pk|max:255',
            'no_banding' => 'required|unique:tb_reg_pk,no_banding|max:255',
            'tgl_put_banding' => 'required',
            'no_pa' => 'required',
            'tgl_put_pa' => 'required',
            'pemohon_pk' => 'required',
            'termohon_pk' => 'required',
            'keterangan' => 'required',
        ], [
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            'no_banding.unique' => 'Nomor perkara sudah ada!!',
            'no_banding.max' => 'Max 255 Karakter!!',
            'pa_pengaju.required' => 'Satker wajib diisi!!',
            'tgl_masuk.required' => 'Tanggal alih media wajib diisi!!',
            // 'tgl_register.required' => 'Tanggal Register wajib diisi!!',
            'no_pk.required' => 'Nomor upaya hukum wajib diisi!!',
            'no_pk.unique' => 'Nomor perkara sudah ada!!',
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            'tgl_put_banding.required' => 'Tanggal putus wajib diisi!!',
            'no_pa.required' => 'Nomor perkara wajib diisi!!',
            'tgl_put_pa.required' => 'Tanggal putus wajib diisi!!',
            'pemohon_pk.required' => 'Pemohon putus wajib diisi!!',
            'termohon_pk.required' => 'Termohon putus wajib diisi!!',
            'keterangan.required' => 'Keterangan wajib diisi!!',
        ]);


        $data = [
            'pa_pengaju' => Request()->pa_pengaju,
            'tgl_masuk' => Request()->tgl_masuk,
            'tgl_register' => Request()->tgl_register,
            'no_pk' => Request()->no_pk,
            'no_banding' => Request()->no_banding,
            'tgl_put_banding' => Request()->tgl_put_banding,
            'no_pa' => Request()->no_pa,
            'tgl_put_pa' => Request()->tgl_put_pa,
            'pemohon_pk' => Request()->pemohon_pk,
            'termohon_pk' => Request()->termohon_pk,
            'tgl_put_pk' => Request()->tgl_put_pk,
            'no_box' => Request()->no_box,
            'keterangan' => Request()->keterangan,
        ];

        $this->RegPkModel->addData($data);
        return redirect()->route('reg_pk')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    public function edit($id)
    {
        if (!$this->RegPkModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'reg_pk' => $this->RegPkModel->detailData($id),
        ];
        return view('/reg_pk/v_edit_reg_pk', $data);
    }

    public function update($id)
    {
        Request()->validate([
            'pa_pengaju' => 'required',
            'tgl_masuk' => 'required',
            // 'tgl_register' => 'required',
            'no_pk' => 'required',
            'no_banding' => 'required',
            'tgl_put_banding' => 'required',
            'no_pa' => 'required',
            'tgl_put_pa' => 'required',
            'pemohon_pk' => 'required',
            'termohon_pk' => 'required',
            'keterangan' => 'required',
        ], [
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            'no_banding.max' => 'Max 255 Karakter!!',
            'pa_pengaju.required' => 'Satker wajib diisi!!',
            'tgl_masuk.required' => 'Tanggal alih media wajib diisi!!',
            // 'tgl_register.required' => 'Tanggal Register wajib diisi!!',
            'no_pk.required' => 'Nomor upaya hukum wajib diisi!!',
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            'tgl_put_banding.required' => 'Tanggal putus wajib diisi!!',
            'no_pa.required' => 'Nomor perkara wajib diisi!!',
            'tgl_put_pa.required' => 'Tanggal putus wajib diisi!!',
            'pemohon_pk.required' => 'Pemohon putus wajib diisi!!',
            'termohon_pk.required' => 'Termohon putus wajib diisi!!',
            'keterangan.required' => 'Keterangan wajib diisi!!',
        ]);

        $data = [
            'pa_pengaju' => Request()->pa_pengaju,
            'tgl_masuk' => Request()->tgl_masuk,
            'tgl_register' => Request()->tgl_register,
            'no_pk' => Request()->no_pk,
            'no_banding' => Request()->no_banding,
            'tgl_put_banding' => Request()->tgl_put_banding,
            'no_pa' => Request()->no_pa,
            'tgl_put_pa' => Request()->tgl_put_pa,
            'pemohon_pk' => Request()->pemohon_pk,
            'termohon_pk' => Request()->termohon_pk,
            'tgl_put_pk' => Request()->tgl_put_pk,
            'no_box' => Request()->no_box,
            'keterangan' => Request()->keterangan,
        ];

        $this->RegPkModel->editData($id, $data);
        return redirect()->route('reg_pk')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id)
    {
        //hapus file

        $this->RegPkModel->deleteData($id);
        return redirect()->route('reg_pk')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
