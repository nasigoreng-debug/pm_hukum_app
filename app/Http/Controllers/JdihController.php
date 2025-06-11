<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JdihModel;

class JdihController extends Controller
{
    public function __construct()
    {
        $this->JdihModel = new JdihModel();
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Himpunan Peraturan',
            'jdih' => $this->JdihModel->allData(),
        ];
        return view('/jdih/v_jdih', $data);
    }

    //Detail
    public function detail($id_jdih)
    {
        if (!$this->JdihModel->detailData($id_jdih)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'jdih' => $this->JdihModel->detailData($id_jdih),
        ];
        return view('/jdih/v_detail_jdih', $data);
    }

    //Tambah Data
    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/jdih/v_add_jdih', $data);
    }

    //Insert Data
    public function insert()
    {
        Request()->validate([
            'jenis_peraturan' => 'required',
            'no_peraturan' => 'required',
            'tahun' => 'required',
            'tgl_peraturan' => 'required',
            'tentang' => 'required|unique:tb_jdih,tentang|max:255',
            'dokumen' => 'required|mimes:pdf|max:10024',
        ], [
            'tentang.required' => 'Tentang peraturan wajib diisi!!',
            'tentang.unique' => 'Peraturan sudah ada!!',
            'tentang.max' => 'Max 255 Karakter!!',
            'jenis_peraturan.required' => 'Jenis peraturan wajib diisi!!',
            'no_peraturan.required' => 'Nomor peraturan wajib diisi!!',
            'tahun.required' => 'Tahun wajib diisi!!',
            'tgl_peraturan.required' => 'Tanggal wajib diisi!!',
            'dokumen.required' => 'Dokumen wajib diupload!!',
            'dokumen.mimes' => 'Jenis file harus pdf!!',
            'dokumen.max' => 'Ukuran file max 10Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload file
        $file = Request()->dokumen;
        $fileName = str_replace(" ", "_",  Request()->jenis_peraturan) . '_' . date('YmdHis') . '.' . $file->extension();
        $file->move(public_path('jdih'), $fileName);

        $data = [
            'jenis_peraturan' => Request()->jenis_peraturan,
            'no_peraturan' => Request()->no_peraturan,
            'tahun' => Request()->tahun,
            'tgl_peraturan' => Request()->tgl_peraturan,
            'tentang' => Request()->tentang,
            'dokumen' => $fileName,
        ];

        $this->JdihModel->addData($data);
        return redirect()->route('himper')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    //Edit Data
    public function edit($id_jdih)
    {
        if (!$this->JdihModel->detailData($id_jdih)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'jdih' => $this->JdihModel->detailData($id_jdih),
        ];
        return view('/jdih/v_edit_jdih', $data);
    }

    //Update Data
    public function update($id_jdih)
    {
        Request()->validate([
            'jenis_peraturan' => 'required',
            'no_peraturan' => 'required',
            'tahun' => 'required',
            'tgl_peraturan' => 'required',
            'tentang' => 'required|max:255',
            'dokumen' => 'mimes:pdf|max:10024',
        ], [
            'tentang.required' => 'Tentang peraturan wajib diisi!!',
            'tentang.max' => 'Max 255 Karakter!!',
            'jenis_peraturan.required' => 'Jenis peraturan wajib diisi!!',
            'no_peraturan.required' => 'Nomor peraturan wajib diisi!!',
            'tahun.required' => 'Tahun wajib diisi!!',
            'tgl_peraturan.required' => 'Tanggal wajib diisi!!',
            'dokumen.required' => 'Dokumen wajib diupload!!',
            'dokumen.mimes' => 'Jenis file harus pdf!!',
            'dokumen.max' => 'Ukuran file max 10Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->dokumen <> "") {
            //Jika ganti file
            //upload file
            $file = Request()->dokumen;
            $fileName = str_replace(" ", "_",  Request()->jenis_peraturan) . '_' . date('YmdHis') . '.' . $file->extension();
            $file->move(public_path('jdih'), $fileName);

            $data = [
                'jenis_peraturan' => Request()->jenis_peraturan,
                'no_peraturan' => Request()->no_peraturan,
                'tahun' => Request()->tahun,
                'tgl_peraturan' => Request()->tgl_peraturan,
                'tentang' => Request()->tentang,
                'dokumen' => $fileName,
            ];

            $this->JdihModel->editData($id_jdih, $data);
        } else {
            //Jika tidak ganti file
            //upload file

            $data = [
                'jenis_peraturan' => Request()->jenis_peraturan,
                'no_peraturan' => Request()->no_peraturan,
                'tahun' => Request()->tahun,
                'tgl_peraturan' => Request()->tgl_peraturan,
                'tentang' => Request()->tentang,
            ];

            $this->JdihModel->editData($id_jdih, $data);
        }
        return redirect()->route('himper')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id_jdih)
    {
        //hapus Data
        $jdih = $this->JdihModel->detailData($id_jdih);
        if ($jdih->dokumen <> "") {
            unlink(public_path('jdih') . '/' . $jdih->dokumen);
        }

        $this->JdihModel->deleteData($id_jdih);
        return redirect()->route('himper')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
