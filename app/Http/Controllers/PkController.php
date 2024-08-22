<?php

namespace App\Http\Controllers;

use App\Models\PkModel;

class PkController extends Controller
{
    public function __construct()
    {
        $this->PkModel = new PkModel();
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Peninjauan Kembali',
            'pk' => $this->PkModel->allData(),
        ];
        return view('/peninjauan_kembali/v_pk', $data);
    }

    public function detail($id_pk)
    {
        if (!$this->PkModel->detailData($id_pk)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'pk' => $this->PkModel->detailData($id_pk),
        ];
        return view('/peninjauan_kembali/v_detail_pk', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/peninjauan_kembali/v_add_pk', $data);
    }

    public function insert()
    {
        Request()->validate([
            // 'pa_pengaju' => 'required',
            'tgl_masuk' => 'required',
            // 'pemohon_pk' => 'required',
            // 'termohon_pk' => 'required',
            'no_pk' => 'required|unique:tb_peninjauan_kembali,no_pk|max:255',
            // 'tgl_put_pk' => 'required',
            // 'no_pa' => 'required',
            // 'tgl_put_pa' => 'required',
            'no_banding' => 'required',
            // 'tgl_put_banding' => 'required',
            // 'no_kasasi' => 'required',
            // 'tgl_put_kasasi' => 'required',
            'status_put' => 'required',
            'salput_pk' => 'required|mimes:pdf|max:6000',
        ], [
            'no_pk.required' => 'Nomor perkara wajib diisi!!',
            'no_pk.unique' => 'Nomor perkara sudah ada!!',
            'no_pk.max' => 'Max 255 Karakter!!',
            // 'pa_pengaju.required' => 'Satker wajib diisi!!',
            'tgl_masuk.required' => 'Tanggal wajib diisi!!',
            // 'pemohon_pk.required' => 'Pemohon wajib diisi!!',
            // 'termohon_pk.required' => 'Termohon wajib diisi!!',
            'no_pk.required' => 'Nomor perkara wajib diisi!!',
            // 'tgl_put_pk.required' => 'Tanggal putus wajib diisi!!',
            // 'no_pa.required' => 'Nomor perkara wajib diisi!!',
            // 'tgl_put_pa.required' => 'Tanggal putus wajib diisi!!',
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            // 'tgl_put_banding.required' => 'Tanggal putus wajib diisi!!',
            // 'no_kasasi.required' => 'Nomor perkara wajib diisi!!',
            // 'tgl_put_kasasi.required' => 'Tanggal putus wajib diisi!!',
            'status_put.required' => 'Status Putusan wajib diisi!!',
            'salput_pk.required' => 'Salput pk wajib diupload!!',
            'salput_pk.mimes' => 'Jenis file harus pdf!!',
            'salput_pk.max' => 'Ukuran file max 6Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload file
        $file = Request()->salput_pk;
        $fileName = str_replace("/", "_",  Request()->no_pk) . '_' . 'Jo' . '_' . str_replace("/", "_",  Request()->no_banding) . '_' . date('dmY') . '.' . $file->extension();
        $file->move(public_path('peninjauan_kembali'), $fileName);
        $data = [
            // 'pa_pengaju' => Request()->pa_pengaju,
            'tgl_masuk' => Request()->tgl_masuk,
            // 'pemohon_pk' => Request()->pemohon_pk,
            // 'termohon_pk' => Request()->termohon_pk,
            'no_pk' => Request()->no_pk,
            // 'tgl_put_pk' => Request()->tgl_put_pk,
            // 'no_pa' => Request()->no_pa,
            // 'tgl_put_pa' => Request()->tgl_put_pa,
            'no_banding' => Request()->no_banding,
            // 'tgl_put_banding' => Request()->tgl_put_banding,
            // 'no_kasasi' => Request()->no_kasasi,
            // 'tgl_put_kasasi' => Request()->tgl_put_kasasi,
            'status_put' => Request()->status_put,
            'salput_pk' => $fileName,
        ];

        $this->PkModel->addData($data);
        return redirect()->route('pk')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    public function edit($id_pk)
    {
        if (!$this->PkModel->detailData($id_pk)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'pk' => $this->PkModel->detailData($id_pk),
        ];
        return view('/peninjauan_kembali/v_edit_pk', $data);
    }

    public function update($id_pk)
    {
        Request()->validate([
            // 'pa_pengaju' => 'required',
            'tgl_masuk' => 'required',
            // 'pemohon_pk' => 'required',
            // 'termohon_pk' => 'required',
            'no_pk' => 'required',
            // 'tgl_put_pk' => 'required',
            // 'no_pa' => 'required',
            // 'tgl_put_pa' => 'required',
            'no_banding' => 'required',
            // 'tgl_put_banding' => 'required',
            // 'no_kasasi' => 'required',
            // 'tgl_put_kasasi' => 'required',
            'status_put' => 'required',
            'salput_pk' => 'mimes:pdf|max:6000',
        ], [
            'no_pk.required' => 'Nomor perkara wajib diisi!!',
            // 'pa_pengaju.required' => 'Satker wajib diisi!!',
            'tgl_masuk.required' => 'Tanggal wajib diisi!!',
            // 'pemohon_pk.required' => 'Pemohon wajib diisi!!',
            // 'termohon_pk.required' => 'Termohon wajib diisi!!',
            'no_pk.required' => 'Nomor perkara wajib diisi!!',
            // 'tgl_put_pk.required' => 'Tanggal putus wajib diisi!!',
            // 'no_pa.required' => 'Nomor perkara wajib diisi!!',
            // 'tgl_put_pa.required' => 'Tanggal putus wajib diisi!!',
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            // 'tgl_put_banding.required' => 'Tanggal putus wajib diisi!!',
            // 'no_kasasi.required' => 'Nomor perkara wajib diisi!!',
            // 'tgl_put_kasasi.required' => 'Tanggal putus wajib diisi!!',
            'status_put.required' => 'Status Putusan wajib diisi!!',
            'salput_pk.mimes' => 'Jenis file harus pdf!!',
            'salput_pk.max' => 'Ukuran file max 6Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->salput_pk <> "") {
            //upload file
            $file = Request()->salput_pk;
            $fileName = str_replace("/", "_",  Request()->no_pk) . '_' . 'Jo' . '_' . str_replace("/", "_",  Request()->no_banding) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('peninjauan_kembali'), $fileName);
            $data = [
                // 'pa_pengaju' => Request()->pa_pengaju,
                'tgl_masuk' => Request()->tgl_masuk,
                // 'pemohon_pk' => Request()->pemohon_pk,
                // 'termohon_pk' => Request()->termohon_pk,
                'no_pk' => Request()->no_pk,
                // 'tgl_put_pk' => Request()->tgl_put_pk,
                // 'no_pa' => Request()->no_pa,
                // 'tgl_put_pa' => Request()->tgl_put_pa,
                'no_banding' => Request()->no_banding,
                // 'tgl_put_banding' => Request()->tgl_put_banding,
                // 'no_kasasi' => Request()->no_kasasi,
                // 'tgl_put_kasasi' => Request()->tgl_put_kasasi,
                'status_put' => Request()->status_put,
                'salput_pk' => $fileName,
            ];
        } else {
            $data = [

                // 'pa_pengaju' => Request()->pa_pengaju,
                'tgl_masuk' => Request()->tgl_masuk,
                // 'pemohon_pk' => Request()->pemohon_pk,
                // 'termohon_pk' => Request()->termohon_pk,
                'no_pk' => Request()->no_pk,
                // 'tgl_put_pk' => Request()->tgl_put_pk,
                // 'no_pa' => Request()->no_pa,
                // 'tgl_put_pa' => Request()->tgl_put_pa,
                'no_banding' => Request()->no_banding,
                // 'tgl_put_banding' => Request()->tgl_put_banding,
                // 'no_kasasi' => Request()->no_kasasi,
                // 'tgl_put_kasasi' => Request()->tgl_put_kasasi,
                'status_put' => Request()->status_put,
            ];
            $this->PkModel->editData($id_pk, $data);
        }

        return redirect()->route('pk')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id_pk)
    {
        //hapus file
        $pk = $this->PkModel->detailData($id_pk);
        if ($pk->salput_pk <> "") {
            unlink(public_path('peninjauan_kembali') . '/' . $pk->salput_pk);
        }

        $this->PkModel->deleteData($id_pk);
        return redirect()->route('pk')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
