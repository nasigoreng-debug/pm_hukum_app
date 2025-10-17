<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
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

        $laporans = Laporan::latest()->get();
        $title = 'Laporan';
        return view('laporans.index', compact(
            'laporans',
            'title'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Laporan';
        return view('laporans.create', compact(
            'title'
        ));
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
            'jenis_laporan' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'tgl_laporan' => 'required|date',
            'judul' => 'required|string|max:255',
            'dokumen' => 'nullable|file|mimes:pdf|max:5048',
            'konsep' => 'nullable|file|mimes:doc,docx,rtf|max:5048'
        ]);

        $data = $request->all();

        // Upload dokumen jika ada
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('laporans/dokumen/', $fileName, 'public');
            $data['dokumen'] = $fileName;
        }

        // Upload konsep jika ada
        if ($request->hasFile('konsep')) {
            $file = $request->file('konsep');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('laporans/konsep/', $fileName, 'public');
            $data['konsep'] = $fileName;
        }

        Laporan::create($data);

        return redirect()->route('laporans.index')
            ->with('pesan', 'Laporan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    // Ubah method show, edit, update, destroy untuk konsistensi
    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporans.show', compact('laporan'));
    }

// atau gunakan route model binding secara konsisten

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
        public function edit($id)
    {
        $laporans = Laporan::findOrFail($id);
        $title = 'Edit Laporan';

        return view('laporans.edit', compact(
            'laporans',
            'title'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        $request->validate([
            'jenis_laporan' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'tgl_laporan' => 'required|date',
            'judul' => 'required|string|max:255',
            'dokumen' => 'nullable|file|mimes:pdf|max:5048',
            'konsep' => 'nullable|file|mimes:doc,docx,rtf|max:5048'
        ]);

        $data = $request->all();

        // Upload dokumen baru jika ada
        if ($request->hasFile('dokumen')) {
            // Hapus dokumen lama jika ada
            if ($laporan->dokumen) {
                Storage::disk('public')->delete('laporans/dokumen/' . $laporan->dokumen);
            }

            $file = $request->file('dokumen');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('laporans/dokumen/', $fileName, 'public');
            $data['dokumen'] = $fileName;
        }

          // Upload konsep baru jika ada
        if ($request->hasFile('konsep')) {
            // Hapus konsep lama jika ada
            if ($laporan->konsep) {
                Storage::disk('public')->delete('laporans/konsep/' . $laporan->konsep);
            }

            $file = $request->file('konsep');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('laporans/konsep/', $fileName, 'public');
            $data['konsep'] = $fileName;
        }

        $laporan->update($data);

        return redirect()->route('laporans.index')
            ->with('pesan', 'Laporan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
        public function destroy($id)
    {
        try {
            $laporan = Laporan::findOrFail($id);

            \Log::info('Deleting laporan', [
                'id' => $laporan->id,
                'dokumen' => $laporan->dokumen,
                'konsep' => $laporan->konsep
            ]);

            // Hapus file dokumen jika ada
            if ($laporan->dokumen) {
                $filePath = 'laporans/dokumen/' . $laporan->dokumen;
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }

            // Hapus file konsep jika ada
            if ($laporan->konsep) {
                $filePath = 'laporans/konsep/' . $laporan->konsep;
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }

            $laporan->delete();

            return redirect()->route('laporans.index')
                ->with('pesan', 'Laporan berhasil dihapus.');

        } catch (\Exception $e) {
            \Log::error('Delete error: ' . $e->getMessage());
            return redirect()->route('laporans.index')
                ->with('pesan', 'Gagal menghapus laporan: ' . $e->getMessage());
        }
    }

    /**
     * Download dokumen
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function download(Laporan $laporan)
    {
        if (!$laporan->dokumen) {
            return redirect()->back()->with('error', 'Dokumen tidak ditemukan.');
        }

        $filePath = storage_path('app/public/laporans/' . $laporan->dokumen);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        return response()->download($filePath);
    }
}
