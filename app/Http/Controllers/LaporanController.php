<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
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
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:2048'
        ]);

        $data = $request->all();

        // Upload dokumen jika ada
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('laporans', $fileName, 'public');
            $data['dokumen'] = $fileName;
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
    public function show(Laporan $laporan)
    {
        return view('laporans.show', compact('laporan'));
    }

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
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:2048'
        ]);

        $data = $request->all();

        // Upload dokumen baru jika ada
        if ($request->hasFile('dokumen')) {
            // Hapus dokumen lama jika ada
            if ($laporan->dokumen) {
                Storage::disk('public')->delete('laporans/' . $laporan->dokumen);
            }

            $file = $request->file('dokumen');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('laporans', $fileName, 'public');
            $data['dokumen'] = $fileName;
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
                'dokumen' => $laporan->dokumen
            ]);

            // Hapus file dokumen jika ada
            if ($laporan->dokumen) {
                $filePath = 'laporans/' . $laporan->dokumen;
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
                ->with('error', 'Gagal menghapus laporan: ' . $e->getMessage());
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