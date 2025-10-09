<?php

namespace App\Http\Controllers;

use App\Models\KasasiModel;

class KasasiController extends Controller
{
    // Kasasi function
    public function __construct()
    {
        $this->KasasiModel = new KasasiModel();
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Kasasi Perkara',
            'kasasi' => $this->KasasiModel->allData(),
        ];
        return view('/kasasi/v_kasasi', $data);
    }

    public function detail($id)
    {
        if (!$this->KasasiModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'kasasi' => $this->KasasiModel->detailData($id),
        ];
        return view('/kasasi/v_detail_kasasi', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/kasasi/v_add_kasasi', $data);
    }

    public function insert()
    {
        Request()->validate([
            // 'pa_pengaju' => 'required',
            'tgl_masuk' => 'required',
            // 'pemohon_kasasi' => 'required',
            // 'termohon_kasasi' => 'required',
            // 'no_pa' => 'required',
            // 'tgl_put_pa' => 'required',
            'no_banding' => 'required',
            // 'tgl_put_banding' => 'required',
            'no_kasasi' => 'required|unique:tb_kasasi',
            // 'tgl_put_kasasi' => 'required',
            'status_put' => 'required',
            'salput_kasasi' => 'required|mimes:pdf|max:6000',
        ], [
            'no_kasasi.required' => 'Nomor perkara wajib diisi!!',
            'no_kasasi.unique' => 'Nomor perkara sudah ada!!',
            'no_kasasi.max' => 'Max 255 Karakter!!',
            // 'pa_pengaju' => 'Satker wajib diisi!!',
            'tgl_masuk.required' => 'Tanggal masuk wajib diisi!!',
            // 'pemohon_kasasi.required' => 'Pemohon wajib diisi!!',
            // 'termohon_kasasi.required' => 'Termohon wajib diisi!!',
            // 'no_pa.required' => 'Nomor perkara wajib diisi!!',
            // 'tgl_put_pa.required' => 'Tanggal putus wajib diisi!!',
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            // 'tgl_put_banding.required' => 'Tanggal putus wajib diisi!!',
            // 'tgl_put_kasasi.required' => 'Tanggal putus wajib diisi!!',
            'status_put.required' => 'Status Putusan wajib diisi!!',
            'salput_kasasi.required' => 'Salput kasasi wajib diupload!!',
            'salput_kasasi.mimes' => 'Jenis file harus pdf!!',
            'salput_kasasi.max' => 'Ukuran file max 6Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload file
        $file = Request()->salput_kasasi;
        $fileName = str_replace("/", "_",  Request()->no_kasasi) . '_' .  'Jo' . '_' . str_replace("/", "_",  Request()->no_banding) . '_' . date('dmY') . '.' . $file->extension();
        $file->move(public_path('kasasi_perkara_putusan'), $fileName);

        $data = [
            // 'pa_pengaju' => Request()->pa_pengaju,
            'tgl_masuk' => Request()->tgl_masuk,
            // 'pemohon_kasasi' => Request()->pemohon_kasasi,
            // 'termohon_kasasi' => Request()->termohon_kasasi,
            // 'no_pa' => Request()->no_pa,
            // 'tgl_put_pa' => Request()->tgl_put_pa,
            'no_banding' => Request()->no_banding,
            // 'tgl_put_banding' => Request()->tgl_put_banding,
            'no_kasasi' => Request()->no_kasasi,
            // 'tgl_put_kasasi' => Request()->tgl_put_kasasi,
            'status_put' => Request()->status_put,
            'salput_kasasi' => $fileName,
        ];

        $this->KasasiModel->addData($data);
        return redirect()->route('kasasi')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    public function edit($id)
    {
        if (!$this->KasasiModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'kasasi' => $this->KasasiModel->detailData($id),
        ];
        return view('/kasasi/v_edit_kasasi', $data);
    }

    public function update($id)
    {
        Request()->validate([
            // 'pa_pengaju' => 'required',
            'tgl_masuk' => 'required',
            // 'pemohon_kasasi' => 'required',
            // 'termohon_kasasi' => 'required',
            // 'no_pa' => 'required',
            // 'tgl_put_pa' => 'required',
            'no_banding' => 'required',
            // 'tgl_put_banding' => 'required',
            'no_kasasi' => 'required',
            // 'tgl_put_kasasi' => 'required',
            'status_put' => 'required',
            'salput_kasasi' => 'mimes:pdf|max:6000',
        ], [
            'no_kasasi.required' => 'Nomor perkara wajib diisi!!',
            'no_kasasi.unique' => 'Nomor perkara sudah ada!!',
            'no_kasasi.max' => 'Max 255 Karakter!!',
            // 'pa_pengaju' => 'Satker wajib diisi!!',
            'tgl_masuk.required' => 'Tanggal masuk wajib diisi!!',
            // 'pemohon_kasasi.required' => 'Pemohon wajib diisi!!',
            // 'termohon_kasasi.required' => 'Termohon wajib diisi!!',
            // 'no_pa.required' => 'Nomor perkara wajib diisi!!',
            // 'tgl_put_pa.required' => 'Tanggal putus wajib diisi!!',
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            // 'tgl_put_banding.required' => 'Tanggal putus wajib diisi!!',
            // 'tgl_put_kasasi.required' => 'Tanggal putus wajib diisi!!',
            'status_put.required' => 'Status Putusan wajib diisi!!',
            'salput_kasasi.max' => 'Ukuran file max 6Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->salput_kasasi <> "") {
            //Jika ganti file
            //upload file
            $file = Request()->salput_kasasi;
            $fileName = str_replace("/", "_",  Request()->no_kasasi) . '_' .  'Jo' . '_' . str_replace("/", "_",  Request()->no_banding) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('kasasi_perkara_putusan'), $fileName);

            $data = [
                // 'pa_pengaju' => Request()->pa_pengaju,
                'tgl_masuk' => Request()->tgl_masuk,
                // 'pemohon_kasasi' => Request()->pemohon_kasasi,
                // 'termohon_kasasi' => Request()->termohon_kasasi,
                // 'no_pa' => Request()->no_pa,
                // 'tgl_put_pa' => Request()->tgl_put_pa,
                'no_banding' => Request()->no_banding,
                // 'tgl_put_banding' => Request()->tgl_put_banding,
                'no_kasasi' => Request()->no_kasasi,
                // 'tgl_put_kasasi' => Request()->tgl_put_kasasi,
                'status_put' => Request()->status_put,
                'salput_kasasi' => $fileName,
            ];

            $this->KasasiModel->editData($id, $data);
        } else {
            //Jika tidak ganti file
            //upload file
            $data = [
                // 'pa_pengaju' => Request()->pa_pengaju,
                'tgl_masuk' => Request()->tgl_masuk,
                // 'pemohon_kasasi' => Request()->pemohon_kasasi,
                // 'termohon_kasasi' => Request()->termohon_kasasi,
                // 'no_pa' => Request()->no_pa,
                // 'tgl_put_pa' => Request()->tgl_put_pa,
                'no_banding' => Request()->no_banding,
                // 'tgl_put_banding' => Request()->tgl_put_banding,
                'no_kasasi' => Request()->no_kasasi,
                // 'tgl_put_kasasi' => Request()->tgl_put_kasasi,
                'status_put' => Request()->status_put,
            ];

            $this->KasasiModel->editData($id, $data);
        }
        return redirect()->route('kasasi')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id)
    {
        //hapus file
        $kasasi = $this->KasasiModel->detailData($id);
        if ($kasasi->salput_kasasi <> "") {
            unlink(public_path('kasasi_perkara_putusan') . '/' . $kasasi->salput_kasasi);
        }

        $this->KasasiModel->deleteData($id);
        return redirect()->route('kasasi')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
