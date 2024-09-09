<?php

namespace App\Http\Controllers;

use App\Models\PinjamModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function __construct()
    {
        $this->PinjamModel = new PinjamModel();
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Pinjam Berkas',
            'pinjam' => $this->PinjamModel->allData(),
        ];

        $awal = DB::table('tb_pinjam_berkas')
            ->where('tgl_pinjam');

        $akhir = DB::table('tb_pinjam_berkas')
            ->where('tgl_kembali');

        return view('/pinjam_berkas/v_pinjam', $data)
            ->with('awal', $awal)
            ->with('akhir', $akhir);
    }

    public function detail($id_pinjam)
    {
        if (!$this->PinjamModel->detailData($id_pinjam)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'pinjam' => $this->PinjamModel->detailData($id_pinjam),
        ];
        return view('/pinjam_berkas/v_detail_pinjam', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/pinjam_berkas/v_add_pinjam', $data);
    }

    public function insert()
    {
        Request()->validate([
            'nama_peminjam' => 'required',
            'no_banding' => 'required',
            'tgl_pinjam' => 'required',
            'bkt_pinjam' => 'mimes:jpg,png|max:1024',
        ], [
            'nama_peminjam.required' => 'Nama peminjam wajib diisi!!',
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            'tgl_pinjam.required' => 'Tanggal pinjam wajib diisi!!',
            'bkt_pinjam.required' => 'Bukti pinjam berkas wajib upload!!',
            'bkt_pinjam.required' => 'Bukti pinjam harus file jpg/png!!',
            'bkt_pinjam.required' => 'Ukuran file maximal 1MB!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->bkt_pinjam <> "") {
            //Jika ganti file
            //upload file
            $file = Request()->bkt_pinjam;
            $fileName = 'bkt_pinjam' . '_' .  str_replace("/", "_",  Request()->no_banding) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('dokumen_pinjam/bkt_pinjam'), $fileName);

            $data = [
                'nama_peminjam' => Request()->nama_peminjam,
                'no_banding' => Request()->no_banding,
                'tgl_pinjam' => Request()->tgl_pinjam,
                'tgl_kembali' => Request()->tgl_kembali,
                'bkt_pinjam' => $fileName,
                'keterangan' => Request()->keterangan,
            ];
        } else {
            $data = [
                'nama_peminjam' => Request()->nama_peminjam,
                'no_banding' => Request()->no_banding,
                'tgl_pinjam' => Request()->tgl_pinjam,
                'tgl_kembali' => Request()->tgl_kembali,
                'keterangan' => Request()->keterangan,
            ];
        }
        $this->PinjamModel->addData($data);
        return redirect()->route('pinjam')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    public function edit($id_pinjam)
    {
        if (!$this->PinjamModel->detailData($id_pinjam)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'pinjam' => $this->PinjamModel->detailData($id_pinjam),
        ];
        return view('/pinjam_berkas/v_edit_pinjam', $data);
    }

    public function update($id_pinjam)
    {
        Request()->validate([
            'nama_peminjam' => 'required',
            'no_banding' => 'required',
            'tgl_pinjam' => 'required',
            'bkt_pinjam' => 'mimes:jpg,png|max:1024',
        ], [
            'nama_peminjam.required' => 'Nama peminjam wajib diisi!!',
            'no_banding.required' => 'Nomor perkara wajib diisi!!',
            'tgl_pinjam.required' => 'Tanggal pinjam wajib diisi!!',
            'bkt_pinjam.required' => 'Bukti pinjam berkas wajib upload!!',
            'bkt_pinjam.required' => 'Bukti pinjam harus file jpg/png!!',
            'bkt_pinjam.required' => 'Ukuran file maximal 1MB!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->bkt_pinjam <> "") {
            //Jika ganti file
            //upload file
            $file = Request()->bkt_pinjam;
            $fileName = 'bkt_pinjam' . '_' .  str_replace("/", "_",  Request()->no_banding) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('dokumen_pinjam/bkt_pinjam'), $fileName);

            $data = [
                'nama_peminjam' => Request()->nama_peminjam,
                'no_banding' => Request()->no_banding,
                'tgl_pinjam' => Request()->tgl_pinjam,
                'tgl_kembali' => Request()->tgl_kembali,
                'bkt_pinjam' => $fileName,
                'keterangan' => Request()->keterangan,
            ];
        } else {
            $data = [
                'nama_peminjam' => Request()->nama_peminjam,
                'no_banding' => Request()->no_banding,
                'tgl_pinjam' => Request()->tgl_pinjam,
                'tgl_kembali' => Request()->tgl_kembali,
                'keterangan' => Request()->keterangan,
            ];
        }


        if (Request()->bkt_kembali <> "") {
            //upload file

            $file = Request()->bkt_kembali;
            $fileName = 'bkt_kembali' . '_' .  str_replace("/", "_",  Request()->no_banding) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('dokumen_pinjam/bkt_kembali'), $fileName);

            $data = [
                'bkt_kembali' => $fileName,
            ];

            $this->PinjamModel->editData($id_pinjam, $data);
        }
        return redirect()->route('pinjam')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id_pinjam)
    {
        //hapus file
        $pinjam = $this->PinjamModel->detailData($id_pinjam);
        if ($pinjam->bkt_pinjam <> "") {
            unlink(public_path('dokumen_pinjam/bkt_pinjam') . '/' . $pinjam->bkt_pinjam);
        }

        $pinjam = $this->PinjamModel->detailData($id_pinjam);
        if ($pinjam->bkt_kembali <> "") {
            unlink(public_path('dokumen_pinjam/bkt_kembali') . '/' . $pinjam->bkt_kembali);
        }

        $this->PinjamModel->deleteData($id_pinjam);
        return redirect()->route('pinjam')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
