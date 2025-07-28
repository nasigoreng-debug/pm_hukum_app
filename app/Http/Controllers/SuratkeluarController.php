<?php

namespace App\Http\Controllers;

use App\Models\SuratkeluarModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SuratkeluarController extends Controller
{
    public function __construct()
    {
        $this->SuratkeluarModel = new SuratkeluarModel();
        $this->middleware('auth');
    }
    public function index()
    {
        //Function Tahun sekarang
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        $data = [
            'title' => 'Surat Keluar',
            'suratkeluar' => $this->SuratkeluarModel->allData(),
        ];

        $suratkeluar_total = DB::table('tb_surat_keluar')->count();

        $suratkeluar_berjalan = DB::table('tb_surat_keluar')
            ->whereYear('tgl_surat', $year)
            ->count();

        return view('/surat_keluar/v_dashboard_suratkeluar', $data, compact(
            'suratkeluar_total',
            'suratkeluar_berjalan',
        ));
    }

    public function suratkeluar_berjalan()
    {

        $data = [
            'title' => 'Surat Keluar',
            'suratkeluar' => $this->SuratkeluarModel->suratkeluar_berjalan(),
        ];

        return view('/surat_keluar/v_suratkeluar', $data);
    }

    public function suratkeluar_total()
    {

        $data = [
            'title' => 'Surat Keluar',
            'suratkeluar' => $this->SuratkeluarModel->suratkeluar_total(),
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
            // 'lampiran' => 'mimes:pdf|max:1024',
            'konsep_surat' => 'required|mimes:docx,rtf|max:1024',
        ], [
            'no_surat.required' => 'Nomor surat wajib diisi!!',
            'no_surat.unique' => 'Nomor surat sudah ada!!',
            'no_surat.max' => 'Max 255 Karakter!!',
            'tgl_surat.required' => 'Tanggal surat wajib diisi!!',
            'tujuan_surat.required' => 'Nomor index wajib diisi!!',
            'perihal.required' => 'Perihal wajib diisi!!',
            'surat_pta.required' => 'Surat keluar wajib diupload!!',
            'konsep_surat.required' => 'Konsep surat keluar wajib diupload!!',
            'surat_pta.mimes' => 'Jenis file harus pdf!!',
            'surat_pta.max' => 'Ukuran file max 1Mb!!',
            // 'lampiran.mimes' => 'Jenis file harus pdf!!',
            'konsep_surat.mimes' => 'Jenis file harus docx/rtf!!',
            // 'lampiran.max' => 'Ukuran file max 1Mb!!',
            'konsep_surat.max' => 'Ukuran file max 1Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->surat_pta <> "" && Request()->konsep_surat <> "") {
            //upload file
            $file = Request()->surat_pta;
            $fileName = 'surat' . '_' . str_replace("/", "_",  Request()->tujuan_surat) . '_' . date('YmdHisu') . '.' . $file->extension();
            $file->move(public_path('surat_keluar'), $fileName);

            $file = Request()->konsep_surat;
            $fileNameRtf = 'konsep_surat' . '_' .  str_replace("/", "_",  Request()->tujuan_surat) . '_' . date('YmdHisu') . '.' . $file->extension();
            $file->move(public_path('konsep_surat_keluar'), $fileNameRtf);

            // $file = Request()->lampiran;
            // $fileNamePdf = 'lampiran' . '_' .  str_replace("/", "_",  Request()->tujuan_surat) . '_' . date('YmdHisu') . '.' . $file->extension();
            // $file->move(public_path('lampiran_surat_keluar'), $fileNamePdf);

            $data = [
                'no_surat' => Request()->no_surat,
                'tgl_surat' => Request()->tgl_surat,
                'tujuan_surat' => Request()->tujuan_surat,
                'perihal' => Request()->perihal,
                'surat_pta' => $fileName,
                'konsep_surat' => $fileNameRtf,
                // 'lampiran' => $fileNamePdf,
                'keterangan' => Request()->keterangan,
            ];

            $this->SuratkeluarModel->addData($data);

            return redirect()->route('suratkeluar_berjalan')->with('pesan', 'Data Berhasil Ditambahkan !!');
        } elseif (Request()->surat_pta <> "") {
            $file = Request()->surat_pta;
            $fileName = 'surat' . '_' . str_replace("/", "_",  Request()->tujuan_surat) . '_' . date('YmdHisu') . '.' . $file->extension();
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
            return redirect()->route('suratkeluar_berjalan')->with('pesan', 'Data Berhasil Ditambahkan !!');
        } elseif (Request()->konsep_surat <> "") {
            $file = Request()->konsep_surat;
            $fileName = 'surat' . '_' . str_replace("/", "_",  Request()->tujuan_surat) . '_' . date('YmdHisu') . '.' . $file->extension();
            $file->move(public_path('surat_keluar'), $fileName);

            $data = [
                'no_surat' => Request()->no_surat,
                'tgl_surat' => Request()->tgl_surat,
                'tujuan_surat' => Request()->tujuan_surat,
                'perihal' => Request()->perihal,
                'konsep_surat' => $fileName,
                'keterangan' => Request()->keterangan,
            ];

            $this->SuratkeluarModel->addData($data);
            return redirect()->route('suratkeluar_berjalan')->with('pesan', 'Data Berhasil Ditambahkan !!');
        }
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
            'konsep_surat' => 'mimes:docx,rtf|max:1024',
        ], [
            'no_surat.required' => 'Nomor surat wajib diisi!!',
            'no_surat.unique' => 'Nomor surat sudah ada!!',
            'tgl_surat.required' => 'Tanggal surat wajib diisi!!',
            'tujuan_surat.required' => 'Nomor index wajib diisi!!',
            'perihal.required' => 'Perihal wajib diisi!!',
            'surat_pta.mimes' => 'Jenis file harus pdf!!',
            'surat_pta.max' => 'Ukuran file max 1Mb!!',
            'lampiran.mimes' => 'Jenis file harus pdf!!',
            'konsep_surat.mimes' => 'Jenis file harus rtf/docx!!',
            'lampiran.max' => 'Ukuran file max 1Mb!!',
            'konsep_surat.max' => 'Ukuran file max 1Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        // $suratkeluar = $this->SuratkeluarModel->detailData($id_suratkeluar);

        // if (Request()->surat_pta <> "" && Request()->konsep_surat <> "") {
        //     $surat_ptaPath = public_path('surat_keluar') . '/' . $suratkeluar->surat_pta;
        //     if (file_exists($surat_ptaPath)) {
        //         unlink($surat_ptaPath);
        //     }

        //     $konsepPath = public_path('konsep_surat_keluar') . '/' . $suratkeluar->konsep_surat;
        //     if (file_exists($konsepPath)) {
        //         unlink($konsepPath);
        //     }
        //     // Hapus file surat PTA jika ada
        // } elseif (Request()->surat_pta <> "") {
        //     $surat_ptaPath = public_path('surat_keluar') . '/' . $suratkeluar->surat_pta;
        //     if (file_exists($surat_ptaPath)) {
        //         unlink($surat_ptaPath);
        //     }
        // } elseif (Request()->konsep_surat <> "") {
        //     $konsepPath = public_path('konsep_surat_keluar') . '/' . $suratkeluar->konsep_surat;
        //     if (file_exists($konsepPath)) {
        //         unlink($konsepPath);
        //     }
        // }

        // Hapus file surat PTA jika ada

        //Jika surat & 
        if (Request()->surat_pta <> "" && Request()->konsep_surat <> "") {

            //jika validasi tidak ada maka lakukan hapus file surat PTA dan kosnep jika ada
            // $suratkeluar = $this->SuratkeluarModel->detailData($id_suratkeluar);

            // $surat_ptaPath = public_path('surat_keluar') . '/' . $suratkeluar->surat_pta;
            // if (file_exists($surat_ptaPath)) {
            //     unlink($surat_ptaPath);
            // }

            // $konsepPath = public_path('konsep_surat_keluar') . '/' . $suratkeluar->konsep_surat;
            // if (file_exists($konsepPath)) {
            //     unlink($konsepPath);
            // }


            //jika validasi tidak ada maka lakukan ganti data
            $file = Request()->surat_pta;
            $fileName = 'surat' . '_' . str_replace("/", "_",  Request()->tujuan_surat) . '_' . date('YmdHisu') . '.' . $file->extension();
            $file->move(public_path('surat_keluar'), $fileName);

            $file = Request()->konsep_surat;
            $fileNameRtf = 'konsep_surat' . '_' .  str_replace("/", "_",  Request()->tujuan_surat) . '_' . date('YmdHisu') . '.' . $file->extension();
            $file->move(public_path('konsep_surat_keluar'), $fileNameRtf);

            $data = [
                'no_surat' => Request()->no_surat,
                'tgl_surat' => Request()->tgl_surat,
                'tujuan_surat' => Request()->tujuan_surat,
                'perihal' => Request()->perihal,
                'surat_pta' => $fileName,
                'konsep_surat' => $fileNameRtf,
                'keterangan' => Request()->keterangan,
            ];

            $this->SuratkeluarModel->editData($id_suratkeluar, $data);

            return redirect()->route('suratkeluar_berjalan')->with('pesan', 'Data Berhasil Diupdate !!');
        } elseif (Request()->surat_pta <> "") {

            //jika validasi tidak ada maka lakukan hapus file surat PTA jika ada
            // $suratkeluar = $this->SuratkeluarModel->detailData($id_suratkeluar);

            // $surat_ptaPath = public_path('surat_keluar') . '/' . $suratkeluar->surat_pta;
            // if (file_exists($surat_ptaPath)) {
            //     unlink($surat_ptaPath);
            // }

            $file = Request()->surat_pta;
            $fileName = 'surat' . '_' . str_replace("/", "_",  Request()->tujuan_surat) . '_' . date('YmdHisu') . '.' . $file->extension();
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

            return redirect()->route('suratkeluar_berjalan')->with('pesan', 'Data Berhasil Diupdate !!');
        } elseif (Request()->konsep_surat <> "") {

            //jika validasi tidak ada maka lakukan hapus file surat PTA jika ada
            // $suratkeluar = $this->SuratkeluarModel->detailData($id_suratkeluar);

            // $konsepPath = public_path('konsep_surat_keluar') . '/' . $suratkeluar->konsep_surat;
            // if (file_exists($konsepPath)) {
            //     unlink($konsepPath);
            // }

            $file = Request()->konsep_surat;
            $fileNameRtf = 'konsep_surat' . '_' .  str_replace("/", "_",  Request()->tujuan_surat) . '_' . date('YmdHisu') . '.' . $file->extension();
            $file->move(public_path('konsep_surat_keluar'), $fileNameRtf);

            $data = [
                'no_surat' => Request()->no_surat,
                'tgl_surat' => Request()->tgl_surat,
                'tujuan_surat' => Request()->tujuan_surat,
                'perihal' => Request()->perihal,
                'konsep_surat' => $fileNameRtf,
                'keterangan' => Request()->keterangan,
            ];

            $this->SuratkeluarModel->editData($id_suratkeluar, $data);
            return redirect()->route('suratkeluar_berjalan')->with('pesan', 'Data Berhasil Diupdate !!');
        } else {

            $data = [
                'no_surat' => Request()->no_surat,
                'tgl_surat' => Request()->tgl_surat,
                'tujuan_surat' => Request()->tujuan_surat,
                'perihal' => Request()->perihal,
                'keterangan' => Request()->keterangan,
            ];

            $this->SuratkeluarModel->editData($id_suratkeluar, $data);
            return redirect()->route('suratkeluar_berjalan')->with('pesan', 'Data Berhasil Diupdate !!');
        }
    }

    public function delete($id_suratkeluar)
    {
        try {
            // Ambil data surat keluar
            $suratkeluar = $this->SuratkeluarModel->detailData($id_suratkeluar);

            if (!$suratkeluar) {
                return redirect()->route('suratkeluar_berjalan')->with('pesan', 'Data tidak ditemukan!');
            }

            // Hapus file-file terkait
            $this->deleteRelatedFiles($suratkeluar);

            // Hapus data dari database
            $this->SuratkeluarModel->deleteData($id_suratkeluar);

            return redirect()->route('suratkeluar_berjalan')->with('pesan', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('suratkeluar_berjalan')->with('pesan', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    /**
     * Helper function untuk menghapus file-file terkait
     */
    protected function deleteRelatedFiles($suratkeluar)
    {

        if (!empty($suratkeluar->surat_pta && $suratkeluar->konsep_surat)) {
            $surat_ptaPath = public_path('surat_keluar') . '/' . $suratkeluar->surat_pta;
            if (file_exists($surat_ptaPath)) {
                unlink($surat_ptaPath);
            }

            $konsepPath = public_path('konsep_surat_keluar') . '/' . $suratkeluar->konsep_surat;
            if (file_exists($konsepPath)) {
                unlink($konsepPath);
            }
            // Hapus file surat PTA jika ada
        } elseif (!empty($suratkeluar->surat_pta)) {
            $surat_ptaPath = public_path('surat_keluar') . '/' . $suratkeluar->surat_pta;
            if (file_exists($surat_ptaPath)) {
                unlink($surat_ptaPath);
            }
        } elseif (!empty($suratkeluar->konsep_surat)) {
            $konsepPath = public_path('konsep_surat_keluar') . '/' . $suratkeluar->konsep_surat;
            if (file_exists($konsepPath)) {
                unlink($konsepPath);
            }
        }
    }
}
