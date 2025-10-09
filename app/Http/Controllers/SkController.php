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
    public function detail($id)
    {
        if (!$this->SkModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'sk' => $this->SkModel->detailData($id),
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
            'konsep_sk' => 'required|mimes:docx,rtf|max:1024',

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
            'konsep_sk.required' => 'Konsep SK wajib diupload!!',
            'konsep_sk.mimes' => 'Jenis file harus docx/rtf!!',
            'konsep_sk.max' => 'Ukuran file max 1Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload file
        // $file = Request()->dokumen;
        // $fileName = str_replace("/", "_",  Request()->tahun) . '_' . date('YmdHis') . '.' . $file->extension();
        // $file->move(public_path('surat_keputusan'), $fileName);

        // $data = [
        //     'no_sk' => Request()->no_sk,
        //     'tahun' => Request()->tahun,
        //     'tgl_sk' => Request()->tgl_sk,
        //     'tentang' => Request()->tentang,
        //     'dokumen' => $fileName,
        // ];

        // $this->SkModel->addData($data);
        // return redirect()->route('suratkeputusan')->with('pesan', 'Data Berhasil Ditambahkan !!');

        if (Request()->dokumen <> "" && Request()->konsep_sk <> "") {
            //upload file

            $file = Request()->dokumen;
            $fileName = 'dokumen' . '_' . str_replace("/", "_",  Request()->tahun) . '_' . date('YmdHis') . '.' . $file->extension();
            $file->move(public_path('surat_keputusan'), $fileName);

            $file = Request()->konsep_sk;
            $fileNameRtf = 'konsep_sk' . '_' .  str_replace("/", "_",  Request()->tahun) . '_' . date('YmdHis') . '.' . $file->extension();
            $file->move(public_path('konsep_sk'), $fileNameRtf);

            // $file = Request()->lampiran;
            // $fileNamePdf = 'lampiran' . '_' .  str_replace("/", "_",  Request()->tujuan_surat) . '_' . date('YmdHisu') . '.' . $file->extension();
            // $file->move(public_path('lampiran_surat_keluar'), $fileNamePdf);

            $data = [
                'no_sk' => Request()->no_sk,
                'tahun' => Request()->tahun,
                'tgl_sk' => Request()->tgl_sk,
                'tentang' => Request()->tentang,
                'dokumen' => $fileName,
                'konsep_sk' => $fileNameRtf,
            ];

            $this->SkModel->addData($data);
            return redirect()->route('suratkeputusan')->with('pesan', 'Data Berhasil Ditambahkan !!');
        } elseif (Request()->dokumen <> "") {
            $file = Request()->dokumen;
            $fileName = 'dokumen' . '_' . str_replace("/", "_",  Request()->tahun) . '_' . date('YmdHis') . '.' . $file->extension();
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
        } elseif (Request()->konsep_sk <> "") {
            $file = Request()->konsep_sk;
            $fileNameRtf = 'konsep_sk' . '_' .  str_replace("/", "_",  Request()->tahun) . '_' . date('YmdHis') . '.' . $file->extension();
            $file->move(public_path('konsep_sk'), $fileNameRtf);

            $data = [
                'no_sk' => Request()->no_sk,
                'tahun' => Request()->tahun,
                'tgl_sk' => Request()->tgl_sk,
                'tentang' => Request()->tentang,
                'konsep_sk' => $fileNameRtf,
            ];

            $this->SkModel->addData($data);
            return redirect()->route('suratkeputusan')->with('pesan', 'Data Berhasil Ditambahkan !!');
        }
    }

    //Edit Data
    public function edit($id)
    {
        if (!$this->SkModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'sk' => $this->SkModel->detailData($id),
        ];
        return view('/surat_keputusan/v_edit_sk', $data);
    }

    //Update Data
    public function update($id)
    {
        Request()->validate([
            'no_sk' => 'required',
            'tahun' => 'required',
            'tgl_sk' => 'required',
            'tentang' => 'required|max:255',
            'dokumen' => 'mimes:pdf|max:1024',
            'konsep_sk' => 'mimes:docx,rtf|max:1024',
        ], [
            'no_sk.required' => 'Nomor SK wajib diisi!!',
            'tahun.required' => 'Tahun wajib diisi!!',
            'tgl_sk.required' => 'Tanggal wajib diisi!!',
            'dokumen.mimes' => 'Jenis file harus pdf!!',
            'dokumen.max' => 'Ukuran file max 1Mb!!',
            'konsep_sk.mimes' => 'Jenis file harus docx/rtf!!',
            'konsep_sk.max' => 'Ukuran file max 1Mb!!',
        ]);

        if (Request()->dokumen <> "" && Request()->konsep_sk <> "") {
            //Jika ganti file

            //upload file
            $file = Request()->dokumen;
            $fileName = 'dokumen' . '_' . str_replace("/", "_",  Request()->tahun) . '_' . date('YmdHis') . '.' . $file->extension();
            $file->move(public_path('surat_keputusan'), $fileName);

            $file = Request()->konsep_sk;
            $fileNameRtf = 'konsep_sk' . '_' .  str_replace("/", "_",  Request()->tahun) . '_' . date('YmdHisu') . '.' . $file->extension();
            $file->move(public_path('konsep_sk'), $fileNameRtf);

            $data = [
                'no_sk' => Request()->no_sk,
                'tahun' => Request()->tahun,
                'tgl_sk' => Request()->tgl_sk,
                'tentang' => Request()->tentang,
                'dokumen' => $fileName,
                'konsep_sk' => $fileNameRtf,
            ];

            $this->SkModel->editData($id, $data);
            return redirect()->route('suratkeputusan')->with('pesan', 'Data Berhasil Diupdate !!');
        } elseif (Request()->dokumen <> "") {
            //Jika ganti file
            //upload file
            $file = Request()->dokumen;
            $fileName = 'dokumen' . '_' . str_replace("/", "_",  Request()->tahun) . '_' . date('YmdHis') . '.' . $file->extension();
            $file->move(public_path('surat_keputusan'), $fileName);

            $data = [
                'no_sk' => Request()->no_sk,
                'tahun' => Request()->tahun,
                'tgl_sk' => Request()->tgl_sk,
                'tentang' => Request()->tentang,
                'dokumen' => $fileName,

            ];

            $this->SkModel->editData($id, $data);
            return redirect()->route('suratkeputusan')->with('pesan', 'Data Berhasil Diupdate !!');
        } elseif (Request()->konsep_sk <> "") {
            //Jika tidak ganti file
            //upload file

            $file = Request()->konsep_sk;
            $fileNameRtf = 'konsep_sk' . '_' .  str_replace("/", "_",  Request()->tahun) . '_' . date('YmdHis') . '.' . $file->extension();
            $file->move(public_path('konsep_sk'), $fileNameRtf);

            $data = [
                'no_sk' => Request()->no_sk,
                'tahun' => Request()->tahun,
                'tgl_sk' => Request()->tgl_sk,
                'tentang' => Request()->tentang,
                'konsep_sk' => $fileNameRtf,
            ];

            $this->SkModel->editData($id, $data);
            return redirect()->route('suratkeputusan')->with('pesan', 'Data Berhasil Diupdate !!');
        } else {

            $data = [
                'no_sk' => Request()->no_sk,
                'tahun' => Request()->tahun,
                'tgl_sk' => Request()->tgl_sk,
                'tentang' => Request()->tentang,

            ];

            $this->SkModel->editData($id, $data);
            return redirect()->route('suratkeputusan')->with('pesan', 'Data Berhasil Diupdate !!');
        }
    }

    public function delete($id)
    {
        //hapus Data
        // $sk = $this->SkModel->detailData($id);
        // if ($sk->dokumen <> "") {
        //     unlink(public_path('surat_keputusan') . '/' . $sk->dokumen);
        // }
        // $this->SkModel->deleteData($id);
        // return redirect()->route('suratkeputusan')->with('pesan', 'Data Berhasil Dihapus !!');

        try {
            // Ambil data surat keluar
            $suratkeputusan = $this->SkModel->detailData($id);

            if (!$suratkeputusan) {
                return redirect()->route('suratkeputusan')->with('pesan', 'Data Berhasil Dihapus !!');
            }

            // Hapus file-file terkait
            $this->deleteRelatedFiles($suratkeputusan);

            // Hapus data dari database
            $this->SkModel->deleteData($id);

            return redirect()->route('suratkeputusan')->with('pesan', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('suratkeputusan')->with('pesan', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    protected function deleteRelatedFiles($suratkeputusan)
    {

        if (!empty($suratkeputusan-> dokumen && $suratkeputusan->konsep_sk)) {
            $dokumenPath = public_path('surat_keputusan') . '/' . $suratkeputusan->dokumen;
            if (file_exists($dokumenPath)) {
                unlink($dokumenPath);
            }

            $konsepPath = public_path('konsep_sk') . '/' . $suratkeputusan->konsep_sk;
            if (file_exists($konsepPath)) {
                unlink($konsepPath);
            }
            // Hapus file surat PTA jika ada
        } elseif (!empty($suratkeputusan->dokumen)) {
            $dokumenPath = public_path('surat_keputusan') . '/' . $suratkeputusan->dokumen;
            if (file_exists($dokumenPath)) {
                unlink($dokumenPath);
            }
        } elseif (!empty($sk->konsep_sk)) {
            $konsepPath = public_path('konsep_sk') . '/' . $suratkeputusan->konsep_sk;
            if (file_exists($konsepPath)) {
                unlink($konsepPath);
            }
        }
    }
}
