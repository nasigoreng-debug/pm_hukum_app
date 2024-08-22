<?php

namespace App\Http\Controllers;

use App\Models\EksekusiModel;

class EksekusiController extends Controller
{
    public function __construct()
    {
        $this->EksekusiModel = new EksekusiModel();
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Perkara Eksekusi',
            'eksekusi' => $this->EksekusiModel->allData(),
        ];
        return view('/eksekusi/v_eksekusi', $data);
    }

    //Detail
    public function detail($id_eks)
    {
        if (!$this->EksekusiModel->detailData($id_eks)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'eksekusi' => $this->EksekusiModel->detailData($id_eks),
        ];
        return view('/eksekusi/v_detail_eksekusi', $data);
    }

    //Tambah Data
    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/eksekusi/v_add_eksekusi', $data);
    }

    //Insert Data
    public function insert()
    {
        Request()->validate([
            'satker' => 'required',
            'no_eksekusi' => 'required|unique:tb_eksekusi,satker|max:255',
            'tgl_permohonan' => 'required',
            'proses_terakhir' => 'required',

        ], [
            'satker' => 'Nama satker wajib diisi!!',
            'no_eksekusi.required' => 'Nomor perkara wajib diisi!!',
            'no_eksekusi.unique' => 'Nomor perkara sudah ada!!',
            'no_eksekusi.max' => 'Max 255 Karakter!!',
            'tgl_permohonan.required' => 'Tanggal permohonan eksekusi wajib diisi!!',
            'proses_terakhir.required' => 'Proses terakhir wajib diisi!!',

        ]);

        $data = [
            'no_eksekusi' => Request()->no_eksekusi,
            'satker' => Request()->satker,
            'no_put' => Request()->no_put,
            'tgl_permohonan' => Request()->tgl_permohonan,
            'proses_terakhir' => Request()->proses_terakhir,
            'tgl_eks' => Request()->tgl_eks,
            'tgl_selesai' => Request()->tgl_selesai,
            'keterangan' => Request()->keterangan,
        ];

        $this->EksekusiModel->addData($data);
        return redirect()->route('eks')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    //Edit Data
    public function edit($id_eks)
    {
        if (!$this->EksekusiModel->detailData($id_eks)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'eksekusi' => $this->EksekusiModel->detailData($id_eks),
        ];
        return view('/eksekusi/v_edit_eksekusi', $data);
    }

    //Update Data
    public function update($id_eks)
    {
        Request()->validate([
            'satker' => 'required',
            'no_eksekusi' => 'required|unique:tb_eksekusi,satker|max:255',
            'tgl_permohonan' => 'required',
            'proses_terakhir' => 'required',

        ], [
            'satker' => 'Nama satker wajib diisi!!',
            'no_eksekusi.required' => 'Nomor perkara wajib diisi!!',
            'no_eksekusi.unique' => 'Nomor perkara sudah ada!!',
            'no_eksekusi.max' => 'Max 255 Karakter!!',
            'tgl_permohonan.required' => 'Tanggal permohonan eksekusi wajib diisi!!',
            'proses_terakhir.required' => 'Proses terakhir wajib diisi!!',

        ]);

        $data = [
            'no_eksekusi' => Request()->no_eksekusi,
            'satker' => Request()->satker,
            'no_put' => Request()->no_put,
            'tgl_permohonan' => Request()->tgl_permohonan,
            'proses_terakhir' => Request()->proses_terakhir,
            'tgl_eks' => Request()->tgl_eks,
            'tgl_selesai' => Request()->tgl_selesai,
            'keterangan' => Request()->keterangan,
        ];

        $this->EksekusiModel->editData($id_eks, $data);

        return redirect()->route('eks')->with('pesan', 'Data Berhasil Diupdate !!');
    }


    public function delete($id_eks)
    {
        //hapus file

        $this->EksekusiModel->deleteData($id_eks);
        return redirect()->route('eks')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
