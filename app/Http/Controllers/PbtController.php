<?php

namespace App\Http\Controllers;

use App\Models\PbtModel;

class PbtController extends Controller
{
    public function __construct()
    {
        $this->PbtModel = new PbtModel();
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Pemberitahuan Putusan',
            'pbt' => $this->PbtModel->allData(),
        ];
        return view('/pbt_banding/v_pbt', $data);
    }

    //Detail
    public function detail($id)
    {
        if (!$this->PbtModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'pbt' => $this->PbtModel->detailData($id),
        ];
        return view('/pbt_banding/v_detail_pbt', $data);
    }

    //Tambah Data
    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/pbt_banding/v_add_pbt', $data);
    }

    //Insert Data
    public function insert()
    {
        Request()->validate([
            'tgl_masuk' => 'required',
            'no_banding' => 'required|unique:tb_pbt_banding,no_banding|max:255',
            'no_pa' => 'required',
            'tgl_pbt_p' => 'required',
            'tgl_pbt_t' => 'required',
            'pbt_put' => 'required|mimes:pdf|max:1024',
        ], [
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            'no_banding.unique' => 'Nomor perkara sudah ada!!',
            'no_banding.max' => 'Max 255 Karakter!!',
            'tgl_masuk.required' => 'Tanggal masuk wajib diisi!!',
            'no_pa.required' => 'Nomor perkara wajib diisi!!',
            'tgl_pbt_p.required' => 'Tanggal wajib diisi!!',
            'tgl_pbt_t.required' => 'Tanggal wajib diisi!!',
            'pbt_put.required' => 'pbt_put wajib diupload!!',
            'pbt_put.mimes' => 'Jenis file harus pdf!!',
            'pbt_put.max' => 'Ukuran file max 1Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload file
        $file = Request()->pbt_put;
        $fileName = str_replace("/", "_",  Request()->no_banding) . '_' . date('dmY') . '.' . $file->extension();
        $file->move(public_path('pbt_putusan'), $fileName);

        $data = [
            'tgl_masuk' => Request()->tgl_masuk,
            'no_banding' => Request()->no_banding,
            'no_pa' => Request()->no_pa,
            'tgl_pbt_p' => Request()->tgl_pbt_p,
            'tgl_pbt_t' => Request()->tgl_pbt_t,
            'pbt_put' => $fileName,
            'keterangan' => Request()->keterangan,
        ];

        $this->PbtModel->addData($data);
        return redirect()->route('pbt')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    //Edit Data
    public function edit($id)
    {
        if (!$this->PbtModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'pbt' => $this->PbtModel->detailData($id),
        ];
        return view('/pbt_banding/v_edit_pbt', $data);
    }

    //Update Data
    public function update($id)
    {
        Request()->validate([
            'tgl_masuk' => 'required',
            'no_banding' => 'required',
            'no_pa' => 'required',
            'tgl_pbt_p' => 'required',
            'tgl_pbt_t' => 'required',
            'pbt_put' => 'mimes:pdf|max:1024',
        ], [
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            'tgl_masuk.required' => 'Tanggal masuk wajib diisi!!',
            'no_pa.required' => 'Nomor perkara wajib diisi!!',
            'tgl_pbt_p.required' => 'Tanggal wajib diisi!!',
            'tgl_pbt_t.required' => 'Tanggal wajib diisi!!',
            'pbt_put.required' => 'pbt_put wajib diupload!!',
            'pbt_put.mimes' => 'Jenis file harus pdf!!',
            'pbt_put.max' => 'Ukuran file max 1Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->pbt_put <> "") {
            //Jika ganti file
            //upload file
            $file = Request()->pbt_put;
            $fileName = str_replace("/", "_",  Request()->no_banding) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('pbt_putusan'), $fileName);

            $data = [
                'tgl_masuk' => Request()->tgl_masuk,
                'no_banding' => Request()->no_banding,
                'no_pa' => Request()->no_pa,
                'tgl_pbt_p' => Request()->tgl_pbt_p,
                'tgl_pbt_t' => Request()->tgl_pbt_t,
                'pbt_put' => $fileName,
                'keterangan' => Request()->keterangan,
            ];

            $this->PbtModel->editData($id, $data);
        } else {
            //Jika tidak ganti file
            //upload file

            $data = [
                'tgl_masuk' => Request()->tgl_masuk,
                'no_banding' => Request()->no_banding,
                'no_pa' => Request()->no_pa,
                'tgl_pbt_p' => Request()->tgl_pbt_p,
                'tgl_pbt_t' => Request()->tgl_pbt_t,
                'keterangan' => Request()->keterangan,
            ];

            $this->PbtModel->editData($id, $data);
        }
        return redirect()->route('pbt')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id)
    {
        //hapus Data
        $pbt = $this->PbtModel->detailData($id);
        if ($pbt->pbt_put <> "") {
            unlink(public_path('pbt_putusan') . '/' . $pbt->pbt_put);
        }

        $this->PbtModel->deleteData($id);
        return redirect()->route('pbt')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
