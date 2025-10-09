<?php

namespace App\Http\Controllers;

use App\Models\UpayahukumModel;

class UpayahukumController extends Controller
{
    public function __construct()
    {
        $this->UpayahukumModel = new UpayahukumModel();
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Register Upaya Hukum',
            'uphukum' => $this->UpayahukumModel->allData(),
        ];
        return view('/upaya_hukum/v_uphukum', $data);
    }

    public function detail($id)
    {
        if (!$this->UpayahukumModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'uphukum' => $this->UpayahukumModel->detailData($id),
        ];
        return view('/upaya_hukum/v_detail_uphukum', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/upaya_hukum/v_add_uphukum', $data);
    }

    public function insert()
    {
        Request()->validate([
            'pa_pengaju' => 'required',
            'tgl_masuk' => 'required',
            'tgl_register' => 'required',
            'no_upy_hk' => 'required|unique:tb_upy_hk,no_upy_hk|max:255',
            'no_banding' => 'required|unique:tb_upy_hk,no_banding|max:255',
            'tgl_put_banding' => 'required',
            'no_pa' => 'required',
            'tgl_put_pa' => 'required',
            'pemohon_upy' => 'required',
            'termohon_upy' => 'required',
            'keterangan' => 'required',
        ], [
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            'no_banding.unique' => 'Nomor perkara sudah ada!!',
            'no_banding.max' => 'Max 255 Karakter!!',
            'pa_pengaju.required' => 'Satker wajib diisi!!',
            'tgl_masuk.required' => 'Tanggal alih media wajib diisi!!',
            'tgl_register.required' => 'Tanggal Register wajib diisi!!',
            'no_upy_hk.required' => 'Nomor upaya hukum wajib diisi!!',
            'no_upy_hk.unique' => 'Nomor perkara sudah ada!!',
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            'tgl_put_banding.required' => 'Tanggal putus wajib diisi!!',
            'no_pa.required' => 'Nomor perkara wajib diisi!!',
            'tgl_put_pa.required' => 'Tanggal putus wajib diisi!!',
            'pemohon_upy.required' => 'Pemohon putus wajib diisi!!',
            'termohon_upy.required' => 'Termohon putus wajib diisi!!',
            'keterangan.required' => 'Keterangan wajib diisi!!',
        ]);


        $data = [
            'pa_pengaju' => Request()->pa_pengaju,
            'tgl_masuk' => Request()->tgl_masuk,
            'tgl_register' => Request()->tgl_register,
            'no_upy_hk' => Request()->no_upy_hk,
            'no_banding' => Request()->no_banding,
            'tgl_put_banding' => Request()->tgl_put_banding,
            'no_pa' => Request()->no_pa,
            'tgl_put_pa' => Request()->tgl_put_pa,
            'pemohon_upy' => Request()->pemohon_upy,
            'termohon_upy' => Request()->termohon_upy,
            'tgl_put_upy' => Request()->tgl_put_upy,
            'no_box' => Request()->no_box,
            'keterangan' => Request()->keterangan,
        ];

        $this->UpayahukumModel->addData($data);
        return redirect()->route('uphukum')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    public function edit($id)
    {
        if (!$this->UpayahukumModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'uphukum' => $this->UpayahukumModel->detailData($id),
        ];
        return view('/upaya_hukum/v_edit_uphukum', $data);
    }

    public function update($id)
    {
        Request()->validate([
            'pa_pengaju' => 'required',
            'tgl_masuk' => 'required',
            'tgl_register' => 'required',
            'no_upy_hk' => 'required',
            'no_banding' => 'required',
            'tgl_put_banding' => 'required',
            'no_pa' => 'required',
            'tgl_put_pa' => 'required',
            'pemohon_upy' => 'required',
            'termohon_upy' => 'required',
            'keterangan' => 'required',
        ], [
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            'no_banding.max' => 'Max 255 Karakter!!',
            'pa_pengaju.required' => 'Satker wajib diisi!!',
            'tgl_masuk.required' => 'Tanggal alih media wajib diisi!!',
            'tgl_register.required' => 'Tanggal Register wajib diisi!!',
            'no_upy_hk.required' => 'Nomor upaya hukum wajib diisi!!',
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            'tgl_put_banding.required' => 'Tanggal putus wajib diisi!!',
            'no_pa.required' => 'Nomor perkara wajib diisi!!',
            'tgl_put_pa.required' => 'Tanggal putus wajib diisi!!',
            'pemohon_upy.required' => 'Pemohon putus wajib diisi!!',
            'termohon_upy.required' => 'Termohon putus wajib diisi!!',
            'keterangan.required' => 'Keterangan wajib diisi!!',
        ]);

        $data = [
            'pa_pengaju' => Request()->pa_pengaju,
            'tgl_masuk' => Request()->tgl_masuk,
            'tgl_register' => Request()->tgl_register,
            'no_upy_hk' => Request()->no_upy_hk,
            'no_banding' => Request()->no_banding,
            'tgl_put_banding' => Request()->tgl_put_banding,
            'no_pa' => Request()->no_pa,
            'tgl_put_pa' => Request()->tgl_put_pa,
            'pemohon_upy' => Request()->pemohon_upy,
            'termohon_upy' => Request()->termohon_upy,
            'tgl_put_upy' => Request()->tgl_put_upy,
            'no_box' => Request()->no_box,
            'keterangan' => Request()->keterangan,
        ];

        $this->UpayahukumModel->editData($id, $data);
        return redirect()->route('uphukum')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id)
    {
        //hapus file

        $this->UpayahukumModel->deleteData($id);
        return redirect()->route('uphukum')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
