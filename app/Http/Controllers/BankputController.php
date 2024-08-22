<?php

namespace App\Http\Controllers;

use App\Models\BankputModel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BankputController extends Controller
{
    public function __construct()
    {
        $this->BankputModel = new BankputModel();
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Bank Putusan',
            'bankput' => $this->BankputModel->allData(),
        ];

        return view('/bank_putusan/v_bankput_perkara', $data);
    }

    //Detail
    public function detail($id_bankput)
    {
        if (!$this->BankputModel->detailData($id_bankput)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'bankput' => $this->BankputModel->detailData($id_bankput),
        ];
        return view('/bank_putusan/v_detail_bankput', $data);
    }

    //Tambah Data
    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/bank_putusan/v_add_bankput', $data);
    }

    //Insert Data
    public function insert()
    {
        Request()->validate([
            'no_banding' => 'required|unique:tb_bank_putusan,no_banding|max:255',
            'jenis_perkara' => 'required',
            'tgl_put_banding' => 'required',
            'status_putus' => 'required',
            'keterangan' => 'required',
            'put_rtf' => 'required|mimes:docx,doc,rtf|max:2000',
            'put_anonim' => 'required|mimes:docx,doc,rtf|max:2000',

        ], [
            'no_banding.required' => 'Nomor perkara banding wajib diisi!!',
            'no_banding.unique' => 'Nomor perkara sudah ada!!',
            'no_banding.max' => 'Max 255 Karakter!!',
            'jenis_perkara.required' => 'Jenis perkara wajib diisi!!',
            'tgl_put_banding.required' => 'Tanggal masuk wajib diisi!!',
            'status_putus.required' => 'Status putusan wajib diisi!!',
            'keterangan.required' => 'Keterangan wajib diisi!!',
            'put_rtf.required' => 'Putusan wajib diupload!!',
            'put_rtf.mimes' => 'Jenis file harus doc,docx,rtf!!',
            'put_rtf.max' => 'Ukuran file max 2Mb!!',
            'put_anonim.required' => 'Anonimasi wajib diupload!!',
            'put_anonim.mimes' => 'Jenis file harus doc,docx,rtf!!',
            'put_anonim.max' => 'Ukuran file max 2Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload file
        $file = Request()->put_rtf;
        $fileNameRtf = str_replace("/", "_",  Request()->no_banding) . '_' . str_replace("/", "_",  Request()->jenis_perkara) . '_' . '_' . str_replace("/", "_",  Request()->tgl_put_banding) . '_' . str_replace("/", "_",  Request()->status_putus) . '_' . str_replace("/", "_",  Request()->keterangan) . '_' . 'putusan' . '.' . $file->extension();
        $file->move(public_path('bank_putusan_rtf'), $fileNameRtf);

        $file = Request()->put_anonim;
        $fileNameAnonim = str_replace("/", "_",  Request()->no_banding) . '_' . str_replace("/", "_",  Request()->jenis_perkara) . '_' . str_replace("/", "_",  Request()->tgl_put_banding) . '_' . str_replace("/", "_",  Request()->status_putus) . '_'.  str_replace("/", "_",  Request()->keterangan) . '_' . 'anonimasi' . '.' . $file->extension();
        $file->move(public_path('bank_putusan_anonim'), $fileNameAnonim);

        $data = [
            'no_banding' => Request()->no_banding,
            'jenis_perkara' => Request()->jenis_perkara,
            'tgl_put_banding' => Request()->tgl_put_banding,
            'status_putus' => Request()->status_putus,
            'keterangan' => Request()->keterangan,
            'put_rtf' => $fileNameRtf,
            'put_anonim' => $fileNameAnonim,
        ];

        $this->BankputModel->addData($data);
        return redirect()->route('bankput')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    //Edit Data
    public function edit($id_bankput)
    {
        if (!$this->BankputModel->detailData($id_bankput)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'bankput' => $this->BankputModel->detailData($id_bankput),
        ];
        return view('/bank_putusan/v_edit_bankput', $data);
    }

    //Update Data
    public function update($id_bankput)
    {
        Request()->validate([
            'no_banding' => 'required|max:255',
            // 'tgl_reg' => 'required',
            'jenis_perkara' => 'required',
            // 'pembanding' => 'required',
            // 'terbanding' => 'required',
            'tgl_put_banding' => 'required',
            'status_putus' => 'required',
            'keterangan' => 'required',
            'put_rtf' => 'mimes:docx,doc,rtf|max:2000',
            'put_anonim' => 'mimes:docx,doc,rtf|max:2000',
        ], [
            'no_banding.required' => 'Nomor perkara banding wajib diisi!!',
            'no_banding.max' => 'Max 255 Karakter!!',
            // 'tgl_reg.required' => 'Tanggal masuk wajib diisi!!',
            'jenis_perkara.required' => 'Jenis perkara wajib diisi!!',
            // 'pembanding.required' => 'Nama Pembanding wajib diisi!!',
            // 'terbanding.required' => 'Nama Terbanding wajib diisi!!',
            'tgl_put_banding.required' => 'Tanggal masuk wajib diisi!!',
            'status_putus.required' => 'Status putusan wajib diisi!!',
            'keterangan.required' => 'Keterangan wajib diisi!!',
            'put_rtf.mimes' => 'Jenis file harus doc,docx,rtf!!',
            'put_rtf.max' => 'Ukuran file max 2Mb!!',
            'put_anonim.mimes' => 'Jenis file harus doc,docx,rtf!!',
            'put_anonim.max' => 'Ukuran file max 2Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->put_rtf <> "") {
            //Jika ganti file
            //upload file
            $file = Request()->put_rtf;
            $fileNameRtf = str_replace("/", "_",  Request()->no_banding) . '_' . str_replace("/", "_",  Request()->jenis_perkara) . '_' . '_' . str_replace("/", "_",  Request()->tgl_put_banding) . '_' . str_replace("/", "_",  Request()->status_putus) . '_' . str_replace("/", "_",  Request()->keterangan) . '_' . 'putusan' . '.' . $file->extension();
            $file->move(public_path('bank_putusan_rtf'), $fileNameRtf);

            $data = [
                // 'tgl_reg' => Request()->tgl_reg,
                'no_banding' => Request()->no_banding,
                'jenis_perkara' => Request()->jenis_perkara,
                // 'pembanding' => Request()->pembanding,
                // 'terbanding' => Request()->terbanding,
                'tgl_put_banding' => Request()->tgl_put_banding,
                'status_putus' => Request()->status_putus,
                'keterangan' => Request()->keterangan,
                'put_rtf' => $fileNameRtf,


            ];
            $this->BankputModel->editData($id_bankput, $data);
        } else {
            //Jika tidak ganti file
            //upload file

            $data = [
                // 'tgl_reg' => Request()->tgl_reg,
                'no_banding' => Request()->no_banding,
                'jenis_perkara' => Request()->jenis_perkara,
                // 'pembanding' => Request()->pembanding,
                // 'terbanding' => Request()->terbanding,
                'tgl_put_banding' => Request()->tgl_put_banding,
                'status_putus' => Request()->status_putus,
                'keterangan' => Request()->keterangan,


            ];

            $this->BankputModel->editData($id_bankput, $data);
        }

        if (Request()->put_anonim <> "") {
            //Jika ganti file
            //upload file

            $file = Request()->put_anonim;
            $fileNameAnonim = str_replace("/", "_",  Request()->no_banding) . '_' . str_replace("/", "_",  Request()->jenis_perkara) . '_' . str_replace("/", "_",  Request()->tgl_put_banding) . '_' . str_replace("/", "_",  Request()->status_putus) . '_'. str_replace("/", "_",  Request()->keterangan) . '_' . 'anonimasi' . '.' . $file->extension();
            $file->move(public_path('bank_putusan_anonim'), $fileNameAnonim);

            $data = [

                'put_anonim' => $fileNameAnonim,

            ];
            $this->BankputModel->editData($id_bankput, $data);
        }
        return redirect()->route('bankput')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id_bankput)
    {
        //hapus Data
        $bankput = $this->BankputModel->detailData($id_bankput);

        if ($bankput->put_rtf <> "") {
            unlink(public_path('bank_putusan_rtf') . '/' . $bankput->put_rtf);
            $this->BankputModel->deleteData($id_bankput);
        }
        if ($bankput->put_anonim <> "") {
            unlink(public_path('bank_putusan_anonim') . '/' . $bankput->put_anonim);
            $this->BankputModel->deleteData($id_bankput);
        }
        return redirect()->route('bankput')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
