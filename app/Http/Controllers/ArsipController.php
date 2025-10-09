<?php

namespace App\Http\Controllers;

use App\Models\ArsipModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
            'arsip_perkara' => $this->ArsipModel->allData(),
        ];

        $arsip_perkara_total = DB::table('tb_arsip_perkara')->count();
        $arsip_perkara_blm_upload = DB::table('tb_arsip_perkara')->whereNull('bundel_b')->count();
        $arsip_perkara_upload = DB::table('tb_arsip_perkara')->whereNotNull('bundel_b')->count();

        // Hindari division by zero dengan ternary operator
        $arsip_perkara_progres = $arsip_perkara_total > 0 ? ($arsip_perkara_upload / $arsip_perkara_total * 100) : 0;
        $arsip_perkara_presentase = round($arsip_perkara_progres);

        return view('/arsip/v_dashboard_arsip_perkara', $data, compact(
            'arsip_perkara_total',
            'arsip_perkara_blm_upload',
            'arsip_perkara_upload',
            'arsip_perkara_progres',
            'arsip_perkara_presentase',
        ));
    }

    public function arsip_perkara_blm_upload()
    {
        $data = [
            'title' => 'Arsip Perkara',
            'arsip_perkara' => $this->ArsipModel->arsip_perkara_blm_upload(),
        ];

        return view('/arsip/v_arsip_perkara', $data);
    }

    public function arsip_perkara_upload()
    {
        $data = [
            'title' => 'Arsip Perkara',
            'arsip_perkara' => $this->ArsipModel->arsip_perkara_upload(),
        ];

        return view('/arsip/v_arsip_perkara', $data);
    }

    public function arsip_perkara_total()
    {
        $data = [
            'title' => 'Arsip Perkara',
            'arsip_perkara' => $this->ArsipModel->arsip_perkara_total(),
        ];

        return view('/arsip/v_arsip_perkara', $data);
    }

    public function arsip_now()
    {
        $data = [
            'title' => 'Arsip Perkara',
            'arsip_perkara' => $this->ArsipModel->arsip_now(),
        ];

        return view('/arsip/v_arsip_perkara', $data);
    }

    //Detail
    public function detail($id)
    {
        if (!$this->ArsipModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'arsip_perkara' => $this->ArsipModel->detailData($id),
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
            'bundel_b' => 'mimes:rar,zip|max:10000',
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
            'bundel_b.required' => 'Putusan wajib diupload!!',
            'bundel_b.mimes' => 'Jenis file harus Rar/Zip!!',
            'bundel_b.max' => 'Ukuran file max 10Mb!!',
        ]);

        if (Request()->putusan <> "" && Request()->bundel_b <> "") {
            //jika validasi tidak ada maka lakukan simpan data
            //upload file
            $file = Request()->putusan;
            $fileName = str_replace("/", "_",  Request()->no_banding) . '_' . 'Jo' . '_' . str_replace("/", "_",  Request()->no_pa) . '_' . date('dmYHis') . '.' . $file->extension();
            $file->move(public_path('arsip_perkara_putusan'), $fileName);

            $file = Request()->bundel_b;
            $fileNameZip = str_replace("/", "_",  Request()->no_banding) . '_' . 'Jo' . '_' . str_replace("/", "_",  Request()->no_pa) . '_' . date('dmYHis') . '.' . $file->extension();
            $file->move(public_path('bundel_b_arsip_perkara'), $fileNameZip);

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
                'bundel_b' => $fileNameZip,
            ];

            $this->ArsipModel->addData($data);
            return redirect()->route('arsip')->with('pesan', 'Data Berhasil Ditambahkan !!');
        } elseif (Request()->putusan <> "") {
            $file = Request()->putusan;
            $fileName = str_replace("/", "_",  Request()->no_banding) . '_' . 'Jo' . '_' . str_replace("/", "_",  Request()->no_pa) . '_' . date('dmYHis') . '.' . $file->extension();
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
        } elseif (Request()->bundel_b <> "") {
            $file = Request()->bundel_b;
            $fileNameZip = str_replace("/", "_",  Request()->no_banding) . '_' . 'Jo' . '_' . str_replace("/", "_",  Request()->no_pa) . '_' . date('dmYHis') . '.' . $file->extension();
            $file->move(public_path('bundel_b_arsip_perkara'), $fileNameZip);

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
                'bundel_b' => $fileNameZip,
            ];

            $this->ArsipModel->addData($data);
            return redirect()->route('arsip')->with('pesan', 'Data Berhasil Ditambahkan !!');
        }
    }

    //Edit Data
    public function edit($id)
    {
        if (!$this->ArsipModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'arsip_perkara' => $this->ArsipModel->detailData($id),
            'user' => $this->ArsipModel->user(),
        ];
        return view('/arsip/v_edit_arsip', $data);
    }

    //Update Data
    public function update($id)
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
            'bundel_b' => 'mimes:rar,zip|max:10000',
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
            'bundel_b.mimes' => 'Jenis file harus Rar/Zip!!',
            'bundel_b.max' => 'Ukuran file max 10Mb!!',
        ]);

        if (Request()->putusan <> "" && Request()->bundel_b <> "") {
            $file = Request()->putusan;
            $fileName = str_replace("/", "_",  Request()->no_banding) . '_' . 'Jo' . '_' . str_replace("/", "_",  Request()->no_pa) . '_' . date('dmYHis') . '.' . $file->extension();
            $file->move(public_path('arsip_perkara_putusan'), $fileName);

            $file = Request()->bundel_b;
            $fileNameZip = str_replace("/", "_",  Request()->no_banding) . '_' . 'Jo' . '_' . str_replace("/", "_",  Request()->no_pa) . '_' . date('dmYHis') . '.' . $file->extension();
            $file->move(public_path('bundel_b_arsip_perkara'), $fileNameZip);

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
                'bundel_b' => $fileNameZip,
            ];

            $this->ArsipModel->editData($id, $data);
            return redirect()->route('arsip')->with('pesan', 'Data Berhasil Diupdate !!');
        } elseif (Request()->putusan <> "") {
            $file = Request()->putusan;
            $fileName = str_replace("/", "_",  Request()->no_banding) . '_' . 'Jo' . '_' . str_replace("/", "_",  Request()->no_pa) . '_' . date('dmYHis') . '.' . $file->extension();
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

            $this->ArsipModel->editData($id, $data);
            return redirect()->route('arsip')->with('pesan', 'Data Berhasil Diupdate !!');
        } elseif (Request()->bundel_b <> "") {
            $file = Request()->bundel_b;
            $fileNameZip = str_replace("/", "_",  Request()->no_banding) . '_' . 'Jo' . '_' . str_replace("/", "_",  Request()->no_pa) . '_' . date('dmYHis') . '.' . $file->extension();
            $file->move(public_path('bundel_b_arsip_perkara'), $fileNameZip);

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
                'bundel_b' => $fileNameZip,
            ];

            $this->ArsipModel->editData($id, $data);
            return redirect()->route('arsip')->with('pesan', 'Data Berhasil Diupdate !!');
        } else {
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

            $this->ArsipModel->editData($id, $data);
            return redirect()->route('arsip')->with('pesan', 'Data Berhasil Diupdate !!');
        }
    }

    public function delete($id)
    {
        //hapus Data
        try {
            // Ambil data surat keluar
            $arsip_perkara = $this->ArsipModel->detailData($id);

            if (!$arsip_perkara) {
                return redirect()->route('arsip')->with('pesan', 'Data Berhasil Dihapus !!');
            }

            // Hapus file-file terkait
            $this->deleteRelatedFiles($arsip_perkara);

            // Hapus data dari database
            $this->ArsipModel->deleteData($id);

            return redirect()->route('arsip')->with('pesan', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('arsip')->with('pesan', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    protected function deleteRelatedFiles($arsip_perkara)
    {
        if (!empty($arsip_perkara->putusan && $arsip_perkara->bundel_b)) {
            $putusanPath = public_path('arsip_perkara_putusan') . '/' . $arsip_perkara->putusan;
            if (file_exists($putusanPath)) {
                unlink($putusanPath);
            }

            $bundel_bPath = public_path('bundel_b_arsip_perkara') . '/' . $arsip_perkara->bundel_b;
            if (file_exists($bundel_bPath)) {
                unlink($bundel_bPath);
            }
            // Hapus file surat PTA jika ada
        } elseif (!empty($arsip_perkara->putusan)) {
            $putusanPath = public_path('arsip_perkara_putusan') . '/' . $arsip_perkara->putusan;
            if (file_exists($putusanPath)) {
                unlink($putusanPath);
            }
        } elseif (!empty($sk->bundel_b)) {
            $bundel_bPath = public_path('bundel_b_arsip_perkara') . '/' . $arsip_perkara->bundel_b;
            if (file_exists($bundel_bPath)) {
                unlink($bundel_bPath);
            }
        }
    }

    public function searchByDateRangeArsipPerkara(Request $request)
    {
        $data = [
            $startDate = $request->input('start_date'),
            $endDate = $request->input('end_date'),

            'title' => 'Arsip Perkara',

            'arsip_perkara' => DB::table('tb_arsip_perkara')
                ->whereBetween('tgl_masuk', [$startDate, $endDate])
                ->get(),
        ];

        // dd($data);

        return view('/arsip/v_arsip_perkara', $data);
    }
}