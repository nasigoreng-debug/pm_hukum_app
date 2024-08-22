<?php

namespace App\Http\Controllers;

use App\Models\SuratmasukModel;

class SuratmasukController extends Controller
{
    public function __construct()
    {
        $this->SuratmasukModel = new SuratmasukModel();
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Surat Masuk',
            'suratmasuk' => $this->SuratmasukModel->allData(),
        ];
        return view('/surat_masuk/v_suratmasuk', $data);
    }

    //Detail
    public function detail($id_suratmasuk)
    {
        if (!$this->SuratmasukModel->detailData($id_suratmasuk)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'suratmasuk' => $this->SuratmasukModel->detailData($id_suratmasuk),
        ];
        return view('/surat_masuk/v_detail_suratmasuk', $data);
    }

    //Tambah Data
    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/surat_masuk/v_add_suratmasuk', $data);
    }

    //Insert Data
    public function insert()
    {
        Request()->validate([
            'tgl_masuk_pan' => 'required',
            'tgl_masuk_umum' => 'required',
            'no_indeks' => 'required',
            'asal_surat' => 'required',
            'no_surat' => 'required|unique:tb_surat_masuk,no_surat|max:255',
            'tgl_surat' => 'required',
            'perihal' => 'required',
            'lampiran' => 'mimes:pdf|max:1024',
            'disposisi' => 'required',
        ], [
            'no_surat.required' => 'Nomor surat wajib diisi!!',
            'no_surat.unique' => 'Nomor surat sudah ada!!',
            'no_surat.max' => 'Max 255 Karakter!!',
            'tgl_masuk_pan.required' => 'Tanggal masuk wajib diisi!!',
            'tgl_masuk_umum.required' => 'Tanggal masuk wajib diisi!!',
            'no_indeks.required' => 'Nomor index wajib diisi!!',
            'asal_surat.required' => 'Asal surat wajib diisi!!',
            'tgl_surat.required' => 'Tanggal surat wajib diisi!!',
            'perihal.required' => 'Perihal wajib diisi!!',
            'lampiran.mimes' => 'Jenis file harus pdf!!',
            'lampiran.max' => 'Ukuran file max 1Mb!!',
            'disposisi.required' => 'Disposisi wajib diisi!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->lampiran <> "") {
            //upload file
            $file = Request()->lampiran;
            $fileName = str_replace("/", "_",  Request()->no_surat) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('surat_masuk'), $fileName);

            $data = [
                'tgl_masuk_pan' => Request()->tgl_masuk_pan,
                'tgl_masuk_umum' => Request()->tgl_masuk_umum,
                'no_indeks' => Request()->no_indeks,
                'asal_surat' => Request()->asal_surat,
                'no_surat' => Request()->no_surat,
                'tgl_surat' => Request()->tgl_surat,
                'perihal' => Request()->perihal,
                'lampiran' => $fileName,
                'disposisi' => Request()->disposisi,
                'keterangan' => Request()->keterangan,
            ];
            $this->SuratmasukModel->addData($data);
        } else {
            //Jika tidak ganti file
            //upload file
            $data = [
                'tgl_masuk_pan' => Request()->tgl_masuk_pan,
                'tgl_masuk_umum' => Request()->tgl_masuk_umum,
                'no_indeks' => Request()->no_indeks,
                'asal_surat' => Request()->asal_surat,
                'no_surat' => Request()->no_surat,
                'tgl_surat' => Request()->tgl_surat,
                'perihal' => Request()->perihal,
                'disposisi' => Request()->disposisi,
                'keterangan' => Request()->keterangan,
            ];

            $this->SuratmasukModel->addData($data);
        }
        return redirect()->route('suratmasuk')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    //Edit Data
    public function edit($id_suratmasuk)
    {
        if (!$this->SuratmasukModel->detailData($id_suratmasuk)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'suratmasuk' => $this->SuratmasukModel->detailData($id_suratmasuk),
        ];

        return view('/surat_masuk/v_edit_suratmasuk', $data);
    }

    //Update Data
    public function update($id_suratmasuk)
    {
        Request()->validate([
            'tgl_masuk_pan' => 'required',
            'tgl_masuk_umum' => 'required',
            'no_indeks' => 'required',
            'asal_surat' => 'required',
            'no_surat' => 'required',
            'tgl_surat' => 'required',
            'perihal' => 'required',
            'lampiran' => 'mimes:pdf|max:1024',
            'disposisi' => 'required',
        ], [
            'no_surat.required' => 'Nomor surat wajib diisi!!',
            'tgl_masuk_pan.required' => 'Tanggal masuk wajib diisi!!',
            'tgl_masuk_umum.required' => 'Tanggal masuk wajib diisi!!',
            'no_indeks.required' => 'Nomor index wajib diisi!!',
            'asal_surat.required' => 'Asal surat wajib diisi!!',
            'tgl_surat.required' => 'Tanggal surat wajib diisi!!',
            'perihal.required' => 'Perihal wajib diisi!!',
            'lampiran.mimes' => 'Jenis file harus pdf!!',
            'lampiran.max' => 'Ukuran file max 1Mb!!',
            'disposisi.required' => 'Disposisi wajib diisi!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->lampiran <> "") {
            //Jika ganti file
            //upload file
            $file = Request()->lampiran;
            $fileName = str_replace("/", "_",  Request()->no_surat) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('surat_masuk'), $fileName);

            $data = [
                'tgl_masuk_pan' => Request()->tgl_masuk_pan,
                'tgl_masuk_umum' => Request()->tgl_masuk_umum,
                'no_indeks' => Request()->no_indeks,
                'asal_surat' => Request()->asal_surat,
                'no_surat' => Request()->no_surat,
                'tgl_surat' => Request()->tgl_surat,
                'perihal' => Request()->perihal,
                'lampiran' => $fileName,
                'disposisi' => Request()->disposisi,
                'keterangan' => Request()->keterangan,
            ];

            $this->SuratmasukModel->editData($id_suratmasuk, $data);
        } else {
            //Jika tidak ganti file
            //upload file

            $data = [
                'tgl_masuk_pan' => Request()->tgl_masuk_pan,
                'tgl_masuk_umum' => Request()->tgl_masuk_umum,
                'no_indeks' => Request()->no_indeks,
                'asal_surat' => Request()->asal_surat,
                'no_surat' => Request()->no_surat,
                'tgl_surat' => Request()->tgl_surat,
                'perihal' => Request()->perihal,
                'disposisi' => Request()->disposisi,
                'keterangan' => Request()->keterangan,
            ];

            $this->SuratmasukModel->editData($id_suratmasuk, $data);
        }
        return redirect()->route('suratmasuk')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id_suratmasuk)
    {
        //hapus Data
        $suratmasuk = $this->SuratmasukModel->detailData($id_suratmasuk);
        if ($suratmasuk->lampiran <> "") {
            unlink(public_path('surat_masuk') . '/' . $suratmasuk->lampiran);
        }

        $this->SuratmasukModel->deleteData($id_suratmasuk);
        return redirect()->route('suratmasuk')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
