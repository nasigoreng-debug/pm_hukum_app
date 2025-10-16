<?php

namespace App\Http\Controllers;

use App\Models\Bankput;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BankputController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bankputs = Bankput::latest()->get();
        $title = 'Bank Putusan';

        return view('bank_putusan.index', compact(
            'bankputs',
            'title'
        ));
    }

    public function create()
    {
        $title = 'Form Tambah Data';
        return view('bank_putusan.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_banding' => 'required|unique:bankputs,no_banding|max:255',
            'jenis_perkara' => 'required',
            'tgl_put_banding' => 'required|date',
            'status_putus' => 'required',
            'keterangan' => 'required',
            'put_rtf' => 'required|file|mimes:docx,doc,rtf|max:2048',
            'put_anonim' => 'required|file|mimes:docx,doc,rtf|max:2048',
        ], [
            'no_banding.required' => 'Nomor perkara banding wajib diisi!!',
            'no_banding.unique' => 'Nomor perkara sudah ada!!',
            'no_banding.max' => 'Max 255 Karakter!!',
            'jenis_perkara.required' => 'Jenis perkara wajib diisi!!',
            'tgl_put_banding.required' => 'Tanggal putusan banding wajib diisi!!',
            'status_putus.required' => 'Status putusan wajib diisi!!',
            'keterangan.required' => 'Keterangan wajib diisi!!',
            'put_rtf.required' => 'Putusan wajib diupload!!',
            'put_rtf.mimes' => 'Jenis file harus doc,docx,rtf!!',
            'put_rtf.max' => 'Ukuran file max 2MB!!',
            'put_anonim.required' => 'Anonimasi wajib diupload!!',
            'put_anonim.mimes' => 'Jenis file harus doc,docx,rtf!!',
            'put_anonim.max' => 'Ukuran file max 2MB!!',
        ]);

        $data = $request->all();

        // Generate nama file
        $fileNameBase = str_replace("/", "_", $request->no_banding) . '_' .
            str_replace("/", "_", $request->jenis_perkara) . '_' .
            str_replace("/", "_", $request->tgl_put_banding) . '_' .
            str_replace("/", "_", $request->status_putus) . '_' .
            str_replace("/", "_", $request->keterangan);

        // Upload file put_rtf
        if ($request->hasFile('put_rtf')) {
            $file = $request->file('put_rtf');
            $fileNameRtf = $fileNameBase . '_putusan.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('bank_putusan/rtf', $fileNameRtf, 'public');
            $data['put_rtf'] = $fileNameRtf;
        }

        // Upload file put_anonim
        if ($request->hasFile('put_anonim')) {
            $file = $request->file('put_anonim');
            $fileNameAnonim = $fileNameBase . '_anonimasi.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('bank_putusan/anonim', $fileNameAnonim, 'public');
            $data['put_anonim'] = $fileNameAnonim;
        }

        Bankput::create($data);

        return redirect()->route('bankput.index')
            ->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    public function show($id)
    {
        $bankput = Bankput::findOrFail($id);
        return view('bank_putusan.show', compact('bankput'));
    }

    public function edit($id)
    {
        $bankput = Bankput::findOrFail($id);
        $title = 'Edit Data';

        return view('bank_putusan.edit', compact(
            'bankput',
            'title'
        ));
    }

    public function update(Request $request, $id)
    {
        $bankput = Bankput::findOrFail($id);

        $request->validate([
            'no_banding' => 'required|max:255|unique:bankputs,no_banding,' . $id,
            'jenis_perkara' => 'required',
            'tgl_put_banding' => 'required|date',
            'status_putus' => 'required',
            'keterangan' => 'required',
            'put_rtf' => 'nullable|file|mimes:docx,doc,rtf|max:2048',
            'put_anonim' => 'nullable|file|mimes:docx,doc,rtf|max:2048',
        ], [
            'no_banding.required' => 'Nomor perkara banding wajib diisi!!',
            'no_banding.unique' => 'Nomor perkara sudah ada!!',
            'no_banding.max' => 'Max 255 Karakter!!',
            'jenis_perkara.required' => 'Jenis perkara wajib diisi!!',
            'tgl_put_banding.required' => 'Tanggal putusan banding wajib diisi!!',
            'status_putus.required' => 'Status putusan wajib diisi!!',
            'keterangan.required' => 'Keterangan wajib diisi!!',
            'put_rtf.mimes' => 'Jenis file harus doc,docx,rtf!!',
            'put_rtf.max' => 'Ukuran file max 2MB!!',
            'put_anonim.mimes' => 'Jenis file harus doc,docx,rtf!!',
            'put_anonim.max' => 'Ukuran file max 2MB!!',
        ]);

        $data = $request->all();

        // Generate nama file base
        $fileNameBase = str_replace("/", "_", $request->no_banding) . '_' .
            str_replace("/", "_", $request->jenis_perkara) . '_' .
            str_replace("/", "_", $request->tgl_put_banding) . '_' .
            str_replace("/", "_", $request->status_putus) . '_' .
            str_replace("/", "_", $request->keterangan);

        // Update file put_rtf jika ada
        if ($request->hasFile('put_rtf')) {
            // Hapus file lama jika ada
            if ($bankput->put_rtf) {
                Storage::disk('public')->delete('bank_putusan/rtf/' . $bankput->put_rtf);
            }

            $file = $request->file('put_rtf');
            $fileNameRtf = $fileNameBase . '_putusan.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('bank_putusan/rtf/', $fileNameRtf, 'public');
            $data['put_rtf'] = $fileNameRtf;
        }

        // Update file put_anonim jika ada
        if ($request->hasFile('put_anonim')) {
            // Hapus file lama jika ada
            if ($bankput->put_anonim) {
                Storage::disk('public')->delete('bank_putusan/anonim/' . $bankput->put_anonim);
            }

            $file = $request->file('put_anonim');
            $fileNameAnonim = $fileNameBase . '_anonimasi.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('bank_putusan/anonim', $fileNameAnonim, 'public');
            $data['put_anonim'] = $fileNameAnonim;
        }

        $bankput->update($data);

        return redirect()->route('bankput.index')
            ->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function destroy($id)
    {
        try {
            $bankput = Bankput::findOrFail($id);

            \Log::info('Deleting bank putusan', [
                'id' => $bankput->id,
                'no_banding' => $bankput->no_banding,
                'put_rtf' => $bankput->put_rtf,
                'put_anonim' => $bankput->put_anonim
            ]);

            // Hapus file put_rtf jika ada
            if ($bankput->put_rtf) {
                $filePath = 'bank_putusan/rtf/' . $bankput->put_rtf;
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }

            // Hapus file put_anonim jika ada
            if ($bankput->put_anonim) {
                $filePath = 'bank_putusan/anonim/' . $bankput->put_anonim;
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }

            $bankput->delete();

            return redirect()->route('bankput.index')
                ->with('pesan', 'Data Berhasil Dihapus !!');
        } catch (\Exception $e) {
            \Log::error('Delete error: ' . $e->getMessage());
            return redirect()->route('bankput.index')
                ->with('pesan', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function downloadRtf($id)
    {
        $bankput = Bankput::findOrFail($id);

        if (!$bankput->put_rtf) {
            return redirect()->back()->with('error', 'File putusan tidak ditemukan.');
        }

        $filePath = storage_path('app/public/bank_putusan/rtf/' . $bankput->put_rtf);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        return response()->download($filePath);
    }

    public function downloadAnonim($id)
    {
        $bankput = Bankput::findOrFail($id);

        if (!$bankput->put_anonim) {
            return redirect()->back()->with('error', 'File anonimasi tidak ditemukan.');
        }

        $filePath = storage_path('app/public/bank_putusan/anonim/' . $bankput->put_anonim);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        return response()->download($filePath);
    }
}
