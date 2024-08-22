<?php

namespace App\Http\Controllers;

use App\Models\SkModel;

class SkController extends Controller
{
    public function __construct()
    {
        $this->SkModel = new SkModel();
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Surat Keputusan',
            'sk' => $this->SkModel->allData(),
        ];
        return view('/surat_keputusan/v_sk', $data);
    }

    //Detail
    public function detail($id_sk)
    {
        if (!$this->SkModel->detailData($id_sk)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'sk' => $this->SkModel->detailData($id_sk),
        ];
        return view('/surat_keputusan/v_detail_sk', $data);
    }

    //Tambah Data
    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/surat_keputusan/v_add_sk', $data);
    }

    //Insert Data
    public function insert()
    {
        Request()->validate([
            'no_sk' => 'required|unique:tb_sk,no_sk|max:255',
            'tahun' => 'required',
            'tgl_sk' => 'required',
            'tentang' => 'required',
            'dokumen' => 'required|mimes:pdf|max:1024',
            'dokumen' => 'mimes:pdf|max:1024',
        ], [
            'no_sk.required' => 'Nomor SK wajib diisi!!',
            'no_sk.unique' => 'Nomor SK sudah ada!!',
            'no_sk.max' => 'Max 255 Karakter!!',
            'tahun.required' => 'Tahun wajib diisi!!',
            'tgl_sk.required' => 'Tanggal SK wajib diisi!!',
            'tentang.required' => 'Wajib diisi!!',
            'dokumen.required' => 'SK wajib diupload!!',
            'dokumen.mimes' => 'Jenis file harus pdf!!',
            'dokumen.max' => 'Ukuran file max 1Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload file
        $file = Request()->dokumen;
        $fileName = str_replace("/", "_",  Request()->no_sk) . '_' .  str_replace(" ", "_",  Request()->tahun) . '_' . date('dmY') . '.' . $file->extension();
        $file->move(public_path('surat_keputusan'), $fileName);

        $data = [
            'no_sk' => Request()->no_sk,
            'tahun' => Request()->tahun,
            'tgl_sk' => Request()->tgl_sk,
            'tentang' => Request()->tentang,
            'dokumen' => $fileName,
        ];

        $this->SkModel->addData($data);
        return redirect()->route('suratkeputusan')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    //Edit Data
    public function edit($id_sk)
    {
        if (!$this->SkModel->detailData($id_sk)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'sk' => $this->SkModel->detailData($id_sk),
        ];
        return view('/surat_keputusan/v_edit_sk', $data);
    }

    //Update Data
    public function update($id_sk)
    {
        Request()->validate([
            'no_sk' => 'required',
            'tahun' => 'required',
            'tgl_sk' => 'required',
            'tentang' => 'required|max:255',
            'dokumen' => 'mimes:pdf|max:1024',
        ], [
            'no_sk.required' => 'Nomor SK wajib diisi!!',
            'tahun.required' => 'Tahun wajib diisi!!',
            'tgl_sk.required' => 'Tanggal wajib diisi!!',
            'dokumen.required' => 'Dokumen wajib diupload!!',
            'dokumen.mimes' => 'Jenis file harus pdf!!',
            'dokumen.max' => 'Ukuran file max 1Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->dokumen <> "") {
            //Jika ganti file
            //upload file
            $file = Request()->dokumen;
            $fileName = str_replace("/", "_",  Request()->no_sk) . '_' . str_replace(" ", "_",  Request()->tahun) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('surat_keputusan'), $fileName);

            $data = [
                'no_sk' => Request()->no_sk,
                'tahun' => Request()->tahun,
                'tgl_sk' => Request()->tgl_sk,
                'tentang' => Request()->tentang,
                'dokumen' => $fileName,
            ];

            $this->SkModel->editData($id_sk, $data);
        } else {
            //Jika tidak ganti file
            //upload file

            $data = [
                'no_sk' => Request()->no_sk,
                'tahun' => Request()->tahun,
                'tgl_sk' => Request()->tgl_sk,
                'tentang' => Request()->tentang,
            ];

            $this->SkModel->editData($id_sk, $data);
        }
        return redirect()->route('suratkeputusan')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id_sk)
    {
        //hapus Data
        $sk = $this->SkModel->detailData($id_sk);
        if ($sk->dokumen <> "") {
            unlink(public_path('surat_keputusan') . '/' . $sk->dokumen);
        }
        $this->SkModel->deleteData($id_sk);
        return redirect()->route('suratkeputusan')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
