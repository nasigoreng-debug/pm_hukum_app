<?php

namespace App\Http\Controllers;

use App\Models\SuratkeluarModel;

class SuratkeluarController extends Controller
{
    public function __construct()
    {
        $this->SuratkeluarModel = new SuratkeluarModel();
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Surat Keluar',
            'suratkeluar' => $this->SuratkeluarModel->allData(),
        ];
        return view('/surat_keluar/v_suratkeluar', $data);
    }

    //Detail
    public function detail($id_suratkeluar)
    {
        if (!$this->SuratkeluarModel->detailData($id_suratkeluar)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'suratkeluar' => $this->SuratkeluarModel->detailData($id_suratkeluar),
        ];
        return view('/surat_keluar/v_detail_suratkeluar', $data);
    }

    //Tambah Data
    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/surat_keluar/v_add_suratkeluar', $data);
    }

    //Insert Data
    public function insert()
    {
        Request()->validate([
            'no_surat' => 'required|unique:tb_surat_keluar,no_surat|max:255',
            'tgl_surat' => 'required',
            'tujuan_surat' => 'required',
            'perihal' => 'required',
            'surat_pta' => 'required|mimes:pdf|max:1024',
            'lampiran' => 'mimes:pdf|max:1024',
        ], [
            'no_surat.required' => 'Nomor surat wajib diisi!!',
            'no_surat.unique' => 'Nomor surat sudah ada!!',
            'no_surat.max' => 'Max 255 Karakter!!',
            'tgl_surat.required' => 'Tanggal surat wajib diisi!!',
            'tujuan_surat.required' => 'Nomor index wajib diisi!!',
            'perihal.required' => 'Perihal wajib diisi!!',
            'surat_pta.required' => 'Surat keluar wajib diupload!!',
            'surat_pta.mimes' => 'Jenis file harus pdf!!',
            'surat_pta.max' => 'Ukuran file max 1Mb!!',
            'lampiran.mimes' => 'Jenis file harus pdf!!',
            'lampiran.max' => 'Ukuran file max 1Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->surat_pta <> "") {
            //upload file
            $file = Request()->surat_pta;
            $fileName = 'surat' . '_' . str_replace("/", "_",  Request()->no_surat) . '_' . 'perihal' . '_' . str_replace(" ", "_",  Request()->perihal) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('surat_keluar'), $fileName);

            $data = [
                'no_surat' => Request()->no_surat,
                'tgl_surat' => Request()->tgl_surat,
                'tujuan_surat' => Request()->tujuan_surat,
                'perihal' => Request()->perihal,
                'surat_pta' => $fileName,
                'keterangan' => Request()->keterangan,
            ];

            $this->SuratkeluarModel->addData($data);
        } else {
            $data = [
                'no_surat' => Request()->no_surat,
                'tgl_surat' => Request()->tgl_surat,
                'tujuan_surat' => Request()->tujuan_surat,
                'perihal' => Request()->perihal,
                'keterangan' => Request()->keterangan,
            ];
            $this->SuratkeluarModel->addData($data);
        }

        if (Request()->lampiran <> "") {
            //upload file

            $file = Request()->lampiran;
            $fileName = 'lampiran' . '_' .  str_replace("/", "_",  Request()->no_surat) . '_' . 'perihal' . '_' . str_replace(" ", "_",  Request()->perihal) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('lampiran_surat_keluar'), $fileName);

            $data = [
                'lampiran' => $fileName,
            ];

            $this->SuratkeluarModel->addData($data);
        }

        return redirect()->route('suratkeluar')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    //Edit Data
    public function edit($id_suratkeluar)
    {
        if (!$this->SuratkeluarModel->detailData($id_suratkeluar)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'suratkeluar' => $this->SuratkeluarModel->detailData($id_suratkeluar),
        ];
        return view('/surat_keluar/v_edit_suratkeluar', $data);
    }

    //Update Data
    public function update($id_suratkeluar)
    {
        Request()->validate([
            'no_surat' => 'required',
            'tgl_surat' => 'required',
            'tujuan_surat' => 'required',
            'perihal' => 'required',
            'surat_pta' => 'mimes:pdf|max:1024',
            'lampiran' => 'mimes:pdf|max:1024',
        ], [
            'no_surat.required' => 'Nomor surat wajib diisi!!',
            'no_surat.unique' => 'Nomor surat sudah ada!!',
            'tgl_surat.required' => 'Tanggal surat wajib diisi!!',
            'tujuan_surat.required' => 'Nomor index wajib diisi!!',
            'perihal.required' => 'Perihal wajib diisi!!',
            'surat_pta.mimes' => 'Jenis file harus pdf!!',
            'surat_pta.max' => 'Ukuran file max 1Mb!!',
            'lampiran.mimes' => 'Jenis file harus pdf!!',
            'lampiran.max' => 'Ukuran file max 1Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->surat_pta <> "") {
            //Jika ganti file
            //upload file
            $file = Request()->surat_pta;
            $fileName = 'surat' . '_' . str_replace("/", "_",  Request()->no_surat) . '_' . 'perihal' . '_' . str_replace(" ", "_",  Request()->perihal) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('surat_keluar'), $fileName);

            $data = [
                'no_surat' => Request()->no_surat,
                'tgl_surat' => Request()->tgl_surat,
                'tujuan_surat' => Request()->tujuan_surat,
                'perihal' => Request()->perihal,
                'surat_pta' => $fileName,
                'keterangan' => Request()->keterangan,
            ];

            $this->SuratkeluarModel->editData($id_suratkeluar, $data);
        } else {
            //Jika tidak ganti file
            //upload file

            $data = [
                'no_surat' => Request()->no_surat,
                'tgl_surat' => Request()->tgl_surat,
                'tujuan_surat' => Request()->tujuan_surat,
                'perihal' => Request()->perihal,
                'keterangan' => Request()->keterangan,
            ];

            $this->SuratkeluarModel->editData($id_suratkeluar, $data);
        }

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->lampiran <> "") {
            //Jika ganti file
            //upload file

            $file = Request()->lampiran;
            $fileName = 'lampiran' . '_' .  str_replace("/", "_",  Request()->no_surat) . '_' . 'perihal' . '_' . str_replace(" ", "_",  Request()->perihal) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('lampiran_surat_keluar'), $fileName);

            $data = [
                'lampiran' => $fileName,
            ];

            $this->SuratkeluarModel->editData($id_suratkeluar, $data);
        }
        return redirect()->route('suratkeluar')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id_suratkeluar)
    {
        //hapus Data
        $suratkeluar = $this->SuratkeluarModel->detailData($id_suratkeluar);
        if ($suratkeluar->surat_pta <> "") {
            unlink(public_path('surat_keluar') . '/' . $suratkeluar->surat_pta);
        }
        if ($suratkeluar->lampiran <> "") {
            unlink(public_path('lampiran_surat_keluar') . '/' . $suratkeluar->lampiran);
        }

        $this->SuratkeluarModel->deleteData($id_suratkeluar);
        return redirect()->route('suratkeluar')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
