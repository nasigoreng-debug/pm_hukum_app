<?php

namespace App\Http\Controllers;

use App\Models\ArsipModel;


class ArsipController extends Controller
{
    public function __construct()
    {
        $this->ArsipModel = new ArsipModel();
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Arsip Perkara',
            'arsip' => $this->ArsipModel->allData(),
        ];
        return view('/arsip/v_arsip_perkara', $data);
    }

    public function arsip_now()
    {
        
        $data = [
            'title' => 'Arsip Perkara',
            'arsip' => $this->ArsipModel->arsip_now(),
        ];

        return view('/arsip/v_arsip_perkara', $data);
    }

    //Detail
    public function detail($id_banding)
    {
        if (!$this->ArsipModel->detailData($id_banding)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'arsip' => $this->ArsipModel->detailData($id_banding),
        ];
        return view('/arsip/v_detail_arsip', $data);
    }

    //Tambah Data
    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data',
            'user' => $this->ArsipModel->user(),
        ];
        return view('/arsip/v_add_arsip', $data);
    }

    //Insert Data
    public function insert()
    {
        Request()->validate([
            'no_banding' => 'required|unique:tb_arsip_perkara,no_banding|max:255',
            'tgl_masuk' => 'required',
            'no_pa' => 'required',
            'jenis_perkara' => 'required',
            'tgl_put_banding' => 'required',
            'penyerah' => 'required',
            'penerima' => 'required',
            'no_lemari' => 'required',
            'no_laci' => 'required',
            'no_box' => 'required',
            'tgl_alih_media' => 'required',
            'putusan' => 'required|mimes:pdf|max:10000',
        ], [
            'no_banding.required' => 'Nomor perkara banding wajib diisi!!',
            'no_banding.unique' => 'Nomor perkara sudah ada!!',
            'no_banding.max' => 'Max 255 Karakter!!',
            'tgl_masuk.required' => 'Tanggal masuk wajib diisi!!',
            'no_pa.required' => 'Nomor perkara tk1 wajib diisi!!',
            'jenis_perkara.required' => 'Jenis perkara wajib diisi!!',
            'tgl_put_banding.required' => 'Tanggal putus wajib diisi!!',
            'penyerah.required' => 'Staf yang menyerahkan berkas wajib diisi!!',
            'penerima.required' => 'Petugas yang menerima berkas wajib diisi!!',
            'no_lemari.required' => 'Nomor lemari wajib diisi!!',
            'no_laci.required' => 'Nomor laci wajib diisi!!',
            'no_box.required' => 'Nomor box wajib diisi!!',
            'tgl_alih_media.required' => 'Tanggal alih media wajib diisi!!',
            'putusan.required' => 'Putusan wajib diupload!!',
            'putusan.mimes' => 'Jenis file harus pdf!!',
            'putusan.max' => 'Ukuran file max 10Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload file
        $file = Request()->putusan;
        $fileName = str_replace("/", "_",  Request()->no_banding) . '_' . 'Jo' . '_' . str_replace("/", "_",  Request()->no_pa) . '_' . date('dmY') . '.' . $file->extension();
        $file->move(public_path('arsip_perkara_putusan'), $fileName);

        $data = [
            'tgl_masuk' => Request()->tgl_masuk,
            'no_banding' => Request()->no_banding,
            'no_pa' => Request()->no_pa,
            'jenis_perkara' => Request()->jenis_perkara,
            'tgl_put_banding' => Request()->tgl_put_banding,
            'penyerah' => Request()->penyerah,
            'penerima' => Request()->penerima,
            'no_lemari' => Request()->no_lemari,
            'no_laci' => Request()->no_laci,
            'no_box' => Request()->no_box,
            'tgl_alih_media' => Request()->tgl_alih_media,
            'putusan' => $fileName,
        ];

        $this->ArsipModel->addData($data);
        return redirect()->route('arsip')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    //Edit Data
    public function edit($id_banding)
    {
        if (!$this->ArsipModel->detailData($id_banding)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'arsip' => $this->ArsipModel->detailData($id_banding),
            'user' => $this->ArsipModel->user(),
        ];
        return view('/arsip/v_edit_arsip', $data);
    }

    //Update Data
    public function update($id_banding)
    {
        Request()->validate([
            'no_banding' => 'required|max:255',
            'tgl_masuk' => 'required',
            'no_pa' => 'required',
            'jenis_perkara' => 'required',
            'tgl_put_banding' => 'required',
            'penyerah' => 'required',
            'penerima' => 'required',
            'no_lemari' => 'required',
            'no_laci' => 'required',
            'no_box' => 'required',
            'tgl_alih_media' => 'required',
            'putusan' => 'mimes:pdf|max:10000',
        ], [
            'no_banding.required' => 'Nomor perkara banding wajib diisi!!',
            'no_banding.max' => 'Max 255 Karakter!!',
            'tgl_masuk.required' => 'Tanggal masuk wajib diisi!!',
            'no_pa.required' => 'Nomor perkara tk1 wajib diisi!!',
            'jenis_perkara.required' => 'Jenis perkara wajib diisi!!',
            'tgl_put_banding.required' => 'Tanggal putus wajib diisi!!',
            'penyerah.required' => 'Staf yang menyerahkan berkas wajib diisi!!',
            'penerima.required' => 'Petugas yang menerima berkas wajib diisi!!',
            'no_lemari.required' => 'Nomor lemari wajib diisi!!',
            'no_laci.required' => 'Nomor laci wajib diisi!!',
            'no_box.required' => 'Nomor box wajib diisi!!',
            'tgl_alih_media.required' => 'Tanggal alih media wajib diisi!!',
            'putusan.mimes' => 'Jenis file harus pdf!!',
            'putusan.max' => 'Ukuran file max 10Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->putusan <> "") {
            //Jika ganti file
            //upload file
            $file = Request()->putusan;
            $fileName = str_replace("/", "_",  Request()->no_banding) . '_' . 'Jo' . '_' . str_replace("/", "_",  Request()->no_pa) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('arsip_perkara_putusan'), $fileName);

            $data = [
                'tgl_masuk' => Request()->tgl_masuk,
                'no_banding' => Request()->no_banding,
                'no_pa' => Request()->no_pa,
                'jenis_perkara' => Request()->jenis_perkara,
                'tgl_put_banding' => Request()->tgl_put_banding,
                'penyerah' => Request()->penyerah,
                'penerima' => Request()->penerima,
                'no_lemari' => Request()->no_lemari,
                'no_laci' => Request()->no_laci,
                'no_box' => Request()->no_box,
                'tgl_alih_media' => Request()->tgl_alih_media,
                'putusan' => $fileName,
            ];

            $this->ArsipModel->editData($id_banding, $data);
        } else {
            //Jika tidak ganti file
            //upload file

            $data = [
                'tgl_masuk' => Request()->tgl_masuk,
                'no_banding' => Request()->no_banding,
                'no_pa' => Request()->no_pa,
                'jenis_perkara' => Request()->jenis_perkara,
                'tgl_put_banding' => Request()->tgl_put_banding,
                'penyerah' => Request()->penyerah,
                'penerima' => Request()->penerima,
                'no_lemari' => Request()->no_lemari,
                'no_laci' => Request()->no_laci,
                'no_box' => Request()->no_box,
                'tgl_alih_media' => Request()->tgl_alih_media,
            ];

            $this->ArsipModel->editData($id_banding, $data);
        }
        return redirect()->route('arsip')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id_banding)
    {
        //hapus Data
        $arsip = $this->ArsipModel->detailData($id_banding);
        if ($arsip->putusan <> "") {
            unlink(public_path('arsip_perkara_putusan') . '/' . $arsip->putusan);
        }

        $this->ArsipModel->deleteData($id_banding);
        return redirect()->route('arsip')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
