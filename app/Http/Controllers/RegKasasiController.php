<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegKasasiModel;

class RegKasasiController extends Controller
{
    public function __construct()
    {
        $this->RegKasasiModel = new RegKasasiModel();
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Register Kasasi',
            'reg_kasasi' => $this->RegKasasiModel->allData(),
        ];
        $sekarang =  date("Y-m-d");
        return view('/reg_kasasi/v_reg_kasasi', $data)
            ->with("sekarang", $sekarang);
    }

    public function detail($id)
    {
        if (!$this->RegKasasiModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'reg_kasasi' => $this->RegKasasiModel->detailData($id),
        ];
        return view('/reg_kasasi/v_detail_reg_kasasi', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/reg_kasasi/v_add_reg_kasasi', $data);
    }

    public function insert()
    {
        Request()->validate([
            'pa_pengaju' => 'required',
            // 'tgl_masuk' => 'required',
            'tgl_register' => 'required',
            'no_kasasi' => 'required|unique:tb_reg_kasasi,no_kasasi|max:255',
            'no_banding' => 'required|unique:tb_reg_kasasi,no_banding|max:255',
            // 'tgl_put_banding' => 'required',
            'no_pa' => 'required',
            // 'tgl_put_pa' => 'required',
            // 'pemohon_kasasi' => 'required',
            // 'termohon_kasasi' => 'required',
            // 'keterangan' => 'required',
        ], [
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            'no_banding.unique' => 'Nomor perkara sudah ada!!',
            'no_banding.max' => 'Max 255 Karakter!!',
            'pa_pengaju.required' => 'Satker wajib diisi!!',
            // 'tgl_masuk.required' => 'Tanggal alih media wajib diisi!!',
            'tgl_register.required' => 'Tanggal Register wajib diisi!!',
            // 'no_kasasi.required' => 'Nomor upaya hukum wajib diisi!!',
            // 'no_kasasi.unique' => 'Nomor perkara sudah ada!!',
            // 'no_banding.required' => 'Nomor perkara wajib diisi!!',
            // 'tgl_put_banding.required' => 'Tanggal putus wajib diisi!!',
            'no_pa.required' => 'Nomor perkara wajib diisi!!',
            // 'tgl_put_pa.required' => 'Tanggal putus wajib diisi!!',
            // 'pemohon_kasasi.required' => 'Pemohon putus wajib diisi!!',
            // 'termohon_kasasi.required' => 'Termohon putus wajib diisi!!',
            // 'keterangan.required' => 'Keterangan wajib diisi!!',
        ]);


        $data = [
            'pa_pengaju' => Request()->pa_pengaju,
            'tgl_masuk' => Request()->tgl_masuk,
            'tgl_register' => Request()->tgl_register,
            'no_kasasi' => Request()->no_kasasi,
            'no_banding' => Request()->no_banding,
            'tgl_put_banding' => Request()->tgl_put_banding,
            'no_pa' => Request()->no_pa,
            'tgl_put_pa' => Request()->tgl_put_pa,
            'pemohon_kasasi' => Request()->pemohon_kasasi,
            'termohon_kasasi' => Request()->termohon_kasasi,
            'tgl_put_kasasi' => Request()->tgl_put_kasasi,
            'no_box' => Request()->no_box,
            'keterangan' => Request()->keterangan,
        ];

        $this->RegKasasiModel->addData($data);
        return redirect()->route('reg_kasasi')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    public function edit($id)
    {
        if (!$this->RegKasasiModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'reg_kasasi' => $this->RegKasasiModel->detailData($id),
        ];
        return view('/reg_kasasi/v_edit_reg_kasasi', $data);
    }

    public function update($id)
    {
        Request()->validate([
            'pa_pengaju' => 'required',
            'tgl_masuk' => 'required',
            // 'tgl_register' => 'required',
            'no_kasasi' => 'required',
            'no_banding' => 'required',
            'tgl_put_banding' => 'required',
            'no_pa' => 'required',
            'tgl_put_pa' => 'required',
            'pemohon_kasasi' => 'required',
            'termohon_kasasi' => 'required',
            'keterangan' => 'required',
        ], [
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            'no_banding.max' => 'Max 255 Karakter!!',
            'pa_pengaju.required' => 'Satker wajib diisi!!',
            'tgl_masuk.required' => 'Tanggal alih media wajib diisi!!',
            // 'tgl_register.required' => 'Tanggal Register wajib diisi!!',
            'no_kasasi.required' => 'Nomor upaya hukum wajib diisi!!',
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            'tgl_put_banding.required' => 'Tanggal putus wajib diisi!!',
            'no_pa.required' => 'Nomor perkara wajib diisi!!',
            'tgl_put_pa.required' => 'Tanggal putus wajib diisi!!',
            'pemohon_kasasi.required' => 'Pemohon putus wajib diisi!!',
            'termohon_kasasi.required' => 'Termohon putus wajib diisi!!',
            'keterangan.required' => 'Keterangan wajib diisi!!',
        ]);

        $data = [
            'pa_pengaju' => Request()->pa_pengaju,
            'tgl_masuk' => Request()->tgl_masuk,
            // 'tgl_register' => Request()->tgl_register,
            'no_kasasi' => Request()->no_kasasi,
            'no_banding' => Request()->no_banding,
            'tgl_put_banding' => Request()->tgl_put_banding,
            'no_pa' => Request()->no_pa,
            'tgl_put_pa' => Request()->tgl_put_pa,
            'pemohon_kasasi' => Request()->pemohon_kasasi,
            'termohon_kasasi' => Request()->termohon_kasasi,
            'tgl_put_kasasi' => Request()->tgl_put_kasasi,
            'no_box' => Request()->no_box,
            'keterangan' => Request()->keterangan,
        ];

        $this->RegKasasiModel->editData($id, $data);
        return redirect()->route('reg_kasasi')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id)
    {
        //hapus file

        $this->RegKasasiModel->deleteData($id);
        return redirect()->route('reg_kasasi')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
