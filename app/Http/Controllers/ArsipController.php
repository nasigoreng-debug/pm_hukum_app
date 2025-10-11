<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Gunakan aggregate query untuk performa lebih baik
        $stats = Arsip::selectRaw('
            COUNT(*) as total,
            COUNT(bundel_b) as uploaded,
            COUNT(*) - COUNT(bundel_b) as not_uploaded
        ')->first();

        $data = [
            'title' => 'Arsip Perkara',
            'arsip_perkara' => Arsip::orderBy('tgl_masuk', 'desc')->get(),
            'arsip_perkara_total' => $stats->total,
            'arsip_perkara_blm_upload' => $stats->not_uploaded,
            'arsip_perkara_upload' => $stats->uploaded,
            'arsip_perkara_progres' => $stats->total > 0 ? ($stats->uploaded / $stats->total * 100) : 0,
            'arsip_perkara_presentase' => round($stats->total > 0 ? ($stats->uploaded / $stats->total * 100) : 0),
        ];

        return view('arsip.v_dashboard_arsip_perkara', $data);
    }

    /**
     * Display arsip perkara berdasarkan filter
     *
     * @param string $filter
     * @return \Illuminate\Http\Response
     */
    public function filter($filter)
    {
        $query = Arsip::query();
        $title = 'Arsip Perkara';

        switch ($filter) {
            case 'belum-upload':
                $query->whereNull('bundel_b');
                $title .= ' - Belum Upload';
                break;
            case 'sudah-upload':
                $query->whereNotNull('bundel_b');
                $title .= ' - Sudah Upload';
                break;
            case 'tahun-ini':
                $query->whereYear('tgl_masuk', now()->year);
                $title .= ' - Tahun Ini';
                break;
            case 'total':
            default:
                $title .= ' - Total';
                break;
        }

        $arsip_perkara = $filter === 'tahun-ini' 
            ? $query->orderBy('tgl_masuk', 'desc')->get()
            : $query->orderBy('tgl_put_banding', 'desc')->get();

        return view('arsip.index', compact('arsip_perkara', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Arsip Perkara';
        $users = User::whereIn('level', [2, 3])->orderBy('name', 'asc')->get();

        return view('arsip.create', compact('title', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_banding' => 'required|unique:arsips,no_banding|max:255',
            'tgl_masuk' => 'required|date',
            'no_pa' => 'required|string|max:100',
            'jenis_perkara' => 'required|string|max:100',
            'tgl_put_banding' => 'required|date',
            'penyerah' => 'required|string|max:100',
            'penerima' => 'required|string|max:100',
            'no_lemari' => 'required|string|max:100',
            'no_laci' => 'required|string|max:100',
            'no_box' => 'required|string|max:100',
            'tgl_alih_media' => 'required|date',
            'putusan' => 'required|file|mimes:pdf|max:10240',
            'bundel_b' => 'nullable|file|mimes:rar,zip|max:10240',
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
            'bundel_b.mimes' => 'Jenis file harus Rar/Zip!!',
            'bundel_b.max' => 'Ukuran file max 10Mb!!',
        ]);

        $data = $request->only([
            'tgl_masuk', 'no_banding', 'no_pa', 'jenis_perkara', 
            'tgl_put_banding', 'penyerah', 'penerima', 'no_lemari', 
            'no_laci', 'no_box', 'tgl_alih_media'
        ]);

        // Upload file putusan
        if ($request->hasFile('putusan')) {
            $data['putusan'] = $this->uploadFile($request->file('putusan'), $request->no_banding, $request->no_pa, 'arsip_perkara_putusan');
        }

        // Upload file bundel_b jika ada
        if ($request->hasFile('bundel_b')) {
            $data['bundel_b'] = $this->uploadFile($request->file('bundel_b'), $request->no_banding, $request->no_pa, 'bundel_b_arsip_perkara');
        }

        Arsip::create($data);

        return redirect()->route('arsip.index')
            ->with('pesan', 'Data arsip perkara berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arsip_perkara = Arsip::findOrFail($id);
        $title = 'Detail Arsip Perkara';

        return view('arsip.v_detail_arsip', compact('arsip_perkara', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arsip_perkara = Arsip::findOrFail($id);
        $title = 'Edit Arsip Perkara';
        $users = User::whereIn('level', [2, 3])->orderBy('name', 'asc')->get();

        return view('arsip.edit', compact('arsip_perkara', 'title', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $arsip_perkara = Arsip::findOrFail($id);

        $request->validate([
            'no_banding' => 'required|max:255|unique:arsips,no_banding,' . $id,
            'tgl_masuk' => 'required|date',
            'no_pa' => 'required|string|max:100',
            'jenis_perkara' => 'required|string|max:100',
            'tgl_put_banding' => 'required|date',
            'penyerah' => 'required|string|max:100',
            'penerima' => 'required|string|max:100',
            'no_lemari' => 'required|string|max:100',
            'no_laci' => 'required|string|max:100',
            'no_box' => 'required|string|max:100',
            'tgl_alih_media' => 'required|date',
            'putusan' => 'nullable|file|mimes:pdf|max:10240',
            'bundel_b' => 'nullable|file|mimes:rar,zip|max:10240',
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
            'putusan.mimes' => 'Jenis file harus pdf!!',
            'putusan.max' => 'Ukuran file max 10Mb!!',
            'bundel_b.mimes' => 'Jenis file harus Rar/Zip!!',
            'bundel_b.max' => 'Ukuran file max 10Mb!!',
        ]);

        $data = $request->only([
            'tgl_masuk', 'no_banding', 'no_pa', 'jenis_perkara', 
            'tgl_put_banding', 'penyerah', 'penerima', 'no_lemari', 
            'no_laci', 'no_box', 'tgl_alih_media'
        ]);

        // Handle file uploads
        if ($request->hasFile('putusan')) {
            // Delete old file if exists
            if ($arsip_perkara->putusan) {
                $this->deleteFile($arsip_perkara->putusan, 'arsip_perkara_putusan');
            }
            $data['putusan'] = $this->uploadFile($request->file('putusan'), $request->no_banding, $request->no_pa, 'arsip_perkara_putusan');
        }

        if ($request->hasFile('bundel_b')) {
            // Delete old file if exists
            if ($arsip_perkara->bundel_b) {
                $this->deleteFile($arsip_perkara->bundel_b, 'bundel_b_arsip_perkara');
            }
            $data['bundel_b'] = $this->uploadFile($request->file('bundel_b'), $request->no_banding, $request->no_pa, 'bundel_b_arsip_perkara');
        }

        $arsip_perkara->update($data);

        return redirect()->route('arsip.index')
            ->with('pesan', 'Data arsip perkara berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $arsip_perkara = Arsip::findOrFail($id);
            
            \Log::info('Deleting arsip perkara', [
                'id' => $arsip_perkara->id,
                'no_banding' => $arsip_perkara->no_banding,
                'putusan' => $arsip_perkara->putusan,
                'bundel_b' => $arsip_perkara->bundel_b
            ]);

            // Delete related files
            if ($arsip_perkara->putusan) {
                $this->deleteFile($arsip_perkara->putusan, 'arsip_perkara_putusan');
            }
            
            if ($arsip_perkara->bundel_b) {
                $this->deleteFile($arsip_perkara->bundel_b, 'bundel_b_arsip_perkara');
            }

            $arsip_perkara->delete();

            return redirect()->route('arsip.index')
                ->with('pesan', 'Data arsip perkara berhasil dihapus.');

        } catch (\Exception $e) {
            \Log::error('Delete error: ' . $e->getMessage());
            return redirect()->route('arsip.index')
                ->with('pesan', 'Gagal menghapus data arsip perkara: ' . $e->getMessage());
        }
    }

    /**
     * Search arsip perkara by date range
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function searchByDateRange(Request $request)
    {
        try {
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ]);

            $arsip_perkara = Arsip::whereBetween('tgl_masuk', [
                $request->start_date, 
                $request->end_date
            ])->get();

            $title = 'Arsip Perkara - Pencarian';

            return view('arsip.index', compact('arsip_perkara', 'title'));
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan dalam pencarian.');
        }
    }

    /**
     * Download file putusan
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadPutusan($id)
    {
        $arsip_perkara = Arsip::findOrFail($id);

        if (!$arsip_perkara->putusan) {
            return redirect()->back()->with('error', 'File putusan tidak ditemukan.');
        }

        $filePath = public_path('arsip_perkara_putusan/' . $arsip_perkara->putusan);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File putusan tidak ditemukan.');
        }

        return response()->download($filePath);
    }

    /**
     * Download file bundel_b
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadBundel($id)
    {
        $arsip_perkara = Arsip::findOrFail($id);

        if (!$arsip_perkara->bundel_b) {
            return redirect()->back()->with('error', 'File bundel tidak ditemukan.');
        }

        $filePath = public_path('bundel_b_arsip_perkara/' . $arsip_perkara->bundel_b);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File bundel tidak ditemukan.');
        }

        return response()->download($filePath);
    }

    /**
     * Helper method untuk upload file
     */
    private function uploadFile($file, $no_banding, $no_pa, $folder)
    {
        $fileName = str_replace("/", "_", $no_banding) . '_' . 'Jo' . '_' . 
                   str_replace("/", "_", $no_pa) . '_' . 
                   date('dmYHis') . '.' . $file->extension();
        
        $file->move(public_path($folder), $fileName);
        
        return $fileName;
    }

    /**
     * Helper method untuk delete file
     */
    private function deleteFile($fileName, $folder)
    {
        $filePath = public_path($folder) . '/' . $fileName;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}