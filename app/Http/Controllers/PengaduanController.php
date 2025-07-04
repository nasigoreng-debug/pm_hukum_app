<?php

namespace App\Http\Controllers;

use App\Models\PengaduanModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PengaduanController extends Controller
{
    public function __construct()
    {
        $this->PengaduanModel = new PengaduanModel();
        $this->middleware('auth');
    }
    public function index()
    {
        //Function Tahun sekarang
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        $data = [
            'title' => 'Pengaduan',
            'pengaduan' => $this->PengaduanModel->allData(),
        ];

        $pengaduan_total = DB::table('tb_pengaduan')->count();

        $pengaduan_berjalan = DB::table('tb_pengaduan')
                                ->whereYear('tgl_terima_pgd', $year)
                                ->count();

        $pengaduan_blm_selesai = DB::table('tb_pengaduan')
                                ->whereNull('tgl_selesai_pgd')
                                ->orderBy('tgl_terima_pgd', 'desc')->count();

        return view('/pengaduan/v_dashboard_pengaduan', $data, compact(
            'pengaduan_total',
            'pengaduan_berjalan',
            'pengaduan_blm_selesai',
        ));
    }

    public function pgd_berjalan()
    {

        $data = [
            'title' => 'Pengaduan',
            'pengaduan' => $this->PengaduanModel->pgd_berjalan(),
        ];
        
        return view('/pengaduan/v_pengaduan', $data);

    }

    public function pgd_total()
    {

        $data = [
            'title' => 'Pengaduan',
            'pengaduan' => $this->PengaduanModel->pgd_total(),
        ];
        return view('/pengaduan/v_pengaduan', $data);
    }

    public function pengaduan_blm_selesai()
    {

        $data = [
            'title' => 'Pengaduan',
            'pengaduan' => $this->PengaduanModel->pengaduan_blm_selesai(),
        ];
        return view('/pengaduan/v_pengaduan', $data);
    }

    public function detail($id_pgd)
    {
        if (!$this->PengaduanModel->detailData($id_pgd)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'pengaduan' => $this->PengaduanModel->detailData($id_pgd),
        ];
        return view('/pengaduan/v_detail_pengaduan', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/pengaduan/v_add_pengaduan', $data);
    }

    public function insert()
    {
        Request()->validate([
            'tgl_terima_pgd' => 'required',
            'no_pgd' => 'required|unique:tb_pengaduan,no_pgd|max:255',
            'pelapor' => 'required',
            'terlapor' => 'required',
            'uraian_pgd' => 'required',
            'ditangani_oleh' => 'required',
            'dis_pm_hk' => 'required',
            'status_pgd' => 'required',
            'status_berkas' => 'required',
            'surat_pgd' => 'required|mimes:pdf|max:10000',
            'lampiran' => 'mimes:pdf|max:10000',
        ], [
            'tgl_terima_pgd.required' => 'Satker wajib diisi!!',
            'no_pgd.required' => 'Nomor perkara wajib diisi!!',
            'no_pgd.unique' => 'Nomor perkara sudah ada!!',
            'no_pgd.max' => 'Max 255 Karakter!!',
            'pelapor.required' => 'Nama Pelapor wajib diisi!!',
            'terlapor.required' => 'Nama Terlapor wajib diisi!!',
            'uraian_pgd.required' => 'Uraian wajib diisi!!',
            'ditangani_oleh.required' => 'Tanggal ditangani wajib diisi!!',
            'dis_pm_hk.required' => 'Disposisi Panmud hukum wajib diisi!!',
            'status_pgd.required' => 'Status pengaduan wajib diisi!!',
            'status_berkas.required' => 'Status berkas wajib diisi!!',
            'surat_pgd.required' => 'Surat pengaduan wajib diisi!!',
            'surat_pgd.mimes' => 'Jenis file harus PDF!!',
            'surat_pgd.max' => 'Ukuran file max 10MB!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->surat_pgd <> "") {
            //upload file
            $file = Request()->surat_pgd;
            $fileName = 'surat' . '_' . str_replace("/", "_",  Request()->no_pgd) . '_' . 'uraian' . '_' . str_replace("/", "_",  Request()->no_pa) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('surat_pengaduan'), $fileName);

            $data = [
                'tgl_terima_pgd' => Request()->tgl_terima_pgd,
                'no_pgd' => Request()->no_pgd,
                'pelapor' => Request()->pelapor,
                'terlapor' => Request()->terlapor,
                'uraian_pgd' => Request()->uraian_pgd,
                'ditangani_oleh' => Request()->ditangani_oleh,
                'dis_pm_hk' => Request()->dis_pm_hk,
                'dis_kpta' => Request()->dis_kpta,
                'dis_wkpta' => Request()->dis_wkpta,
                'dis_hatiwasda' => Request()->dis_hatiwasda,
                'tgl_tindak_lanjut' => Request()->tgl_tindak_lanjut,
                'status_pgd' => Request()->status_pgd,
                'status_berkas' => Request()->status_berkas,
                'tgl_selesai_pgd' => Request()->tgl_selesai_pgd,
                'tgl_lhp' => Request()->tgl_lhp,
                'surat_pgd' => $fileName,
            ];
            $this->PengaduanModel->addData($data);
        }
        if (Request()->lampiran <> "") {
            //Jika ganti file
            //upload file
            $file = Request()->lampiran;
            $fileName = 'lampiran' . '_' . str_replace("/", "_",  Request()->no_pgd) . '_' . 'uraian' . '_' . str_replace("/", "_",  Request()->uraian_pgd) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('lampiran_pengaduan'), $fileName);

            $data = [
                'lampiran' => $fileName,
            ];
            $this->PengaduanModel->addData($data);
        }

        return redirect()->route('pgd')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    public function edit($id_pgd)
    {
        if (!$this->PengaduanModel->detailData($id_pgd)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'pengaduan' => $this->PengaduanModel->detailData($id_pgd),
        ];
        return view('/pengaduan/v_edit_pengaduan', $data);
    }

    public function update($id_pgd)
    {
        Request()->validate([
            'tgl_terima_pgd' => 'required',
            'no_pgd' => 'required|max:255',
            'pelapor' => 'required',
            'terlapor' => 'required',
            'uraian_pgd' => 'required',
            'ditangani_oleh' => 'required',
            'dis_pm_hk' => 'required',
            'status_pgd' => 'required',
            'status_berkas' => 'required',
            'surat_pgd' => 'mimes:pdf|max:10000',
            'lampiran' => 'mimes:pdf|max:10000',
        ], [
            'tgl_terima_pgd.required' => 'Satker wajib diisi!!',
            'no_pgd.required' => 'Nomor perkara wajib diisi!!',
            'no_pgd.max' => 'Max 255 Karakter!!',
            'pelapor.required' => 'Nama Pelapor wajib diisi!!',
            'terlapor.required' => 'Nama Terlapor wajib diisi!!',
            'uraian_pgd.required' => 'Uraian wajib diisi!!',
            'ditangani_oleh.required' => 'Tanggal ditangani wajib diisi!!',
            'dis_pm_hk.required' => 'Disposisi Panmud hukum wajib diisi!!',
            'status_pgd.required' => 'Status pengaduan wajib diisi!!',
            'status_berkas.required' => 'Status berkas wajib diisi!!',
            'surat_pgd.mimes' => 'Jenis file harus PDF!!',
            'surat_pgd.max' => 'Ukuran file max 10MB!!',
            'lampiran.mimes' => 'Jenis file harus PDF!!',
            'lampiran.max' => 'Ukuran file max 10MB!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->surat_pgd <> "") {
            //Jika ganti file
            $file = Request()->surat_pgd;
            $fileName = 'surat' . '_' . str_replace("/", "_",  Request()->no_pgd) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('surat_pengaduan'), $fileName);

            $data = [
                'tgl_terima_pgd' => Request()->tgl_terima_pgd,
                'no_pgd' => Request()->no_pgd,
                'pelapor' => Request()->pelapor,
                'terlapor' => Request()->terlapor,
                'uraian_pgd' => Request()->uraian_pgd,
                'ditangani_oleh' => Request()->ditangani_oleh,
                'dis_pm_hk' => Request()->dis_pm_hk,
                'dis_kpta' => Request()->dis_kpta,
                'dis_wkpta' => Request()->dis_wkpta,
                'dis_hatiwasda' => Request()->dis_hatiwasda,
                'tgl_tindak_lanjut' => Request()->tgl_tindak_lanjut,
                'status_pgd' => Request()->status_pgd,
                'status_berkas' => Request()->status_berkas,
                'tgl_selesai_pgd' => Request()->tgl_selesai_pgd,
                'tgl_lhp' => Request()->tgl_lhp,
                'surat_pgd' => $fileName,
            ];

            $this->PengaduanModel->editData($id_pgd, $data);
        } else {
            $data = [
                'tgl_terima_pgd' => Request()->tgl_terima_pgd,
                'no_pgd' => Request()->no_pgd,
                'pelapor' => Request()->pelapor,
                'terlapor' => Request()->terlapor,
                'uraian_pgd' => Request()->uraian_pgd,
                'ditangani_oleh' => Request()->ditangani_oleh,
                'dis_pm_hk' => Request()->dis_pm_hk,
                'dis_kpta' => Request()->dis_kpta,
                'dis_wkpta' => Request()->dis_wkpta,
                'dis_hatiwasda' => Request()->dis_hatiwasda,
                'tgl_tindak_lanjut' => Request()->tgl_tindak_lanjut,
                'status_pgd' => Request()->status_pgd,
                'status_berkas' => Request()->status_berkas,
                'tgl_selesai_pgd' => Request()->tgl_selesai_pgd,
                'tgl_lhp' => Request()->tgl_lhp,
            ];
            $this->PengaduanModel->editData($id_pgd, $data);
        }

        if (Request()->lampiran <> "") {
            //Jika ganti file
            $file = Request()->lampiran;
            $fileName = 'lampiran' . '_' . str_replace("/", "_",  Request()->no_pgd) . '_' . date('dmY') . '.' . $file->extension();
            $file->move(public_path('lampiran_pengaduan'), $fileName);

            $data = [
                'lampiran' => $fileName,
            ];
            $this->PengaduanModel->editData($id_pgd, $data);
        }
        return redirect()->route('pgd')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id_pgd)
    {
        //hapus file
        $pengaduan = $this->PengaduanModel->detailData($id_pgd);
        if ($pengaduan->surat_pgd <> "") {
            unlink(public_path('surat_pengaduan') . '/' . $pengaduan->surat_pgd);
        }
        if ($pengaduan->lampiran <> "") {
            unlink(public_path('lampiran_pengaduan') . '/' . $pengaduan->lampiran);
        }

        $this->PengaduanModel->deleteData($id_pgd);
        return redirect()->route('pgd')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
