<?php

namespace App\Http\Controllers;

use App\Models\SuratmasukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SuratmasukController extends Controller
{
    public function __construct()
    {
        $this->SuratmasukModel = new SuratmasukModel();
        $this->middleware('auth');
    }

    public function index()
    {
        //Function Tahun sekarang
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        $data = [
            'title' => 'Surat Masuk',
            'suratmasuk' => $this->SuratmasukModel->allData(),
        ];

        $suratmasuk_total = DB::table('tb_surat_masuk')->count();

        $suratmasuk_berjalan = DB::table('tb_surat_masuk')
            ->whereYear('tgl_masuk_pan', $year)
            ->count();

        return view('/surat_masuk/v_dashboard_suratmasuk', $data, compact(
            'suratmasuk_total',
            'suratmasuk_berjalan',
        ));
    }

    public function suratmasuk_berjalan()
    {

        $data = [
            'title' => 'Surat Masuk',
            'suratmasuk' => $this->SuratmasukModel->suratmasuk_berjalan(),
        ];

        return view('/surat_masuk/v_suratmasuk', $data);
    }

    public function suratmasuk_total()
    {

        $data = [
            'title' => 'Surat Masuk',
            'suratmasuk' => $this->SuratmasukModel->suratmasuk_total(),
        ];
        return view('/surat_masuk/v_suratmasuk', $data);
    }

    //Detail
    public function detail($id)
    {
        if (!$this->SuratmasukModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'suratmasuk' => $this->SuratmasukModel->detailData($id),
        ];
        return view('/surat_masuk/v_detail_suratmasuk', $data);
    }

    //Tambah Data
    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data',
            'user' => $this->SuratmasukModel->user(),
        ];
        return view('/surat_masuk/v_add_suratmasuk', $data);
    }

    //Insert Data
    public function insert()
    {
        Request()->validate([
            'tgl_masuk_pan' => 'required|date|before_or_equal:today',
            'tgl_masuk_umum' => 'required|date|before_or_equal:today',
            'tgl_surat' => 'required|date|before_or_equal:today',
            'no_indeks' => 'required|integer|digits_between:1,11', // Batasi panjang digit
            'asal_surat' => 'required',
            'no_surat' => 'required|unique:tb_surat_masuk,no_surat|max:255',
            'perihal' => 'required',
            'lampiran' => 'mimes:pdf|max:1024',
            'disposisi' => 'required',
        ], [
            'tgl_masuk_pan.required' => 'Tanggal masuk wajib diisi!!',
            'tgl_masuk_pan.before_or_equal' => 'Tanggal masuk tidak boleh lebih dari hari ini!!',
            'tgl_masuk_umum.required' => 'Tanggal masuk wajib diisi!!',
            'tgl_masuk_umum.before_or_equal' => 'Tanggal masuk tidak boleh lebih dari hari ini!!',
            'tgl_surat.required' => 'Tanggal surat wajib diisi!!',
            'tgl_surat.before_or_equal' => 'Tanggal surat tidak boleh lebih dari hari ini!!',
            'no_indeks.required' => 'Nomor index wajib diisi!!',
            'no_indeks.integer' => 'Nomor index harus berupa angka!!',
            'no_indeks.digits_between' => 'Nomor index maksimal 11 digit!!',
            'no_surat.required' => 'Nomor surat wajib diisi!!',
            'no_surat.unique' => 'Nomor surat sudah ada!!',
            'no_surat.max' => 'Max 255 Karakter!!',
            'asal_surat.required' => 'Asal surat wajib diisi!!',
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
            //Jika tidak ada file lampiran
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
        return redirect()->route('suratmasuk_berjalan')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    public function edit($id)
    {
        $suratmasuk = $this->SuratmasukModel->detailData($id);

        if (!$suratmasuk) {
            abort(404, 'Data surat masuk tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Surat Masuk',
            'suratmasuk' => $suratmasuk,
            'user' => $this->SuratmasukModel->user(),
        ];

        return view('/surat_masuk/v_edit_suratmasuk', $data);
    }

    // Update Data
    public function update($id)
    {
        // Validasi data input
        Request()->validate([
            'tgl_masuk_pan' => 'required|date|before_or_equal:today',
            'tgl_masuk_umum' => 'required|date|before_or_equal:today',
            'tgl_surat' => 'required|date|before_or_equal:today',
            'no_indeks' => 'required|integer|digits_between:1,11',
            'asal_surat' => 'required',
            'no_surat' => 'required|max:255|unique:tb_surat_masuk,no_surat,' . $id . ',id',
            'perihal' => 'required',
            'lampiran' => 'nullable|mimes:pdf|max:1024',
            'disposisi' => 'required',
        ], [
            'tgl_masuk_pan.required' => 'Tanggal masuk PAN wajib diisi!!',
            'tgl_masuk_pan.before_or_equal' => 'Tanggal masuk PAN tidak boleh lebih dari hari ini!!',
            'tgl_masuk_umum.required' => 'Tanggal masuk umum wajib diisi!!',
            'tgl_masuk_umum.before_or_equal' => 'Tanggal masuk umum tidak boleh lebih dari hari ini!!',
            'tgl_surat.required' => 'Tanggal surat wajib diisi!!',
            'tgl_surat.before_or_equal' => 'Tanggal surat tidak boleh lebih dari hari ini!!',
            'no_indeks.required' => 'Nomor index wajib diisi!!',
            'no_indeks.integer' => 'Nomor index harus berupa angka!!',
            'no_indeks.digits_between' => 'Nomor index maksimal 11 digit!!',
            'no_surat.required' => 'Nomor surat wajib diisi!!',
            'no_surat.unique' => 'Nomor surat sudah ada!!',
            'no_surat.max' => 'Max 255 Karakter!!',
            'asal_surat.required' => 'Asal surat wajib diisi!!',
            'perihal.required' => 'Perihal wajib diisi!!',
            'lampiran.mimes' => 'Jenis file harus pdf!!',
            'lampiran.max' => 'Ukuran file max 1Mb!!',
            'disposisi.required' => 'Disposisi wajib diisi!!',
        ]);

        // Ambil data surat masuk yang akan diupdate
        $suratmasuk = $this->SuratmasukModel->detailData($id);

        if (!$suratmasuk) {
            return back()->with('error', 'Data surat masuk tidak ditemukan!');
        }

        // Jika ada file lampiran baru diupload
        if (Request()->hasFile('lampiran') && Request()->file('lampiran')->isValid()) {
            // Hapus file lampiran lama jika ada
            if ($suratmasuk->lampiran && file_exists(public_path('surat_masuk/' . $suratmasuk->lampiran))) {
                unlink(public_path('surat_masuk/' . $suratmasuk->lampiran));
            }

            // Upload file baru
            $file = Request()->lampiran;
            $fileName = str_replace("/", "_", Request()->no_surat) . '_' . date('dmY') . '.' . $file->extension();
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
        } else {
            // Jika tidak ganti file, pertahankan file lama
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
        }

        // Update data
        $this->SuratmasukModel->editData($id, $data);

        return redirect()->route('suratmasuk_berjalan')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id)
    {
        // Cari data surat masuk
        $suratmasuk = $this->SuratmasukModel->detailData($id);

        if (!$suratmasuk) {
            return back()->with('error', 'Data surat masuk tidak ditemukan!');
        }

        // Hapus file lampiran jika ada
        if ($suratmasuk->lampiran && file_exists(public_path('surat_masuk') . '/' . $suratmasuk->lampiran)) {
            unlink(public_path('surat_masuk') . '/' . $suratmasuk->lampiran);
        }

        // Hapus data dari database
        $this->SuratmasukModel->deleteData($id);

        return redirect()->route('suratmasuk_berjalan')->with('pesan', 'Data Berhasil Dihapus !!');
    }

    public function searchByDateRangeSuratMasuk(Request $request)
    {
        // Validasi input tanggal
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [
            'start_date.required' => 'Tanggal mulai wajib diisi',
            'end_date.required' => 'Tanggal akhir wajib diisi',
            'end_date.after_or_equal' => 'Tanggal akhir harus setelah atau sama dengan tanggal mulai',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $data = [
            'title' => 'Pencarian Surat Masuk - ' . $startDate . ' hingga ' . $endDate,
            'suratmasuk' => DB::table('tb_surat_masuk')
                ->whereBetween('tgl_masuk_pan', [$startDate, $endDate])
                ->orderBy('tgl_masuk_pan', 'asc')
                ->get(),
            'start_date' => $startDate,
            'end_date' => $endDate,
        ];

        return view('/surat_masuk/v_suratmasuk', $data);
    }
}
