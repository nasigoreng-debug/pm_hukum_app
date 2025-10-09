<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JdihModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class JdihController extends Controller
{
    public function __construct()
    {
        $this->JdihModel = new JdihModel();
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Himpunan Peraturan',
            'jdih' => $this->JdihModel->allData(),
        ];

         //Function Tahun sekarang
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        $jdih_uu = DB::table('tb_jdih')->where('jenis_peraturan', 'Undang-Undang (UU)')->count();
        $jdih_perpu = DB::table('tb_jdih')->where('jenis_peraturan', 'Peraturan Pemerintah Pengganti Undang-undang (PERPU)')->count();
        $jdih_pp = DB::table('tb_jdih')->where('jenis_peraturan', 'Peraturan Pemerintah (PP)')->count();
        $jdih_inpres = DB::table('tb_jdih')->where('jenis_peraturan', 'Instruksi Presiden (INPRES)')->count();
        $jdih_perma = DB::table('tb_jdih')->where('jenis_peraturan', 'Peraturan Mahkamah Agung (PERMA)')->count();
        $jdih_sema = DB::table('tb_jdih')->where('jenis_peraturan', 'Surat Edaran Mahkamah Agung (SEMA)')->count();
        $jdih_sk_kma = DB::table('tb_jdih')->where('jenis_peraturan', 'Surat Keputusan Ketua Mahkamah Agung (SK KMA)')->count();
        $jdih_sk_sekma = DB::table('tb_jdih')->where('jenis_peraturan', 'Surat Keputusan Sekretaris Mahkamah Agung (SK SEKMA)')->count();
        $jdih_se_dirjen = DB::table('tb_jdih')->where('jenis_peraturan', 'Surat Edaran Direktur Jenderal Badan Peradilan Agama (SE Dirjen Badilag)')->count();
        $jdih_sk_dirjen = DB::table('tb_jdih')->where('jenis_peraturan', 'Surat Keputusan Direktur Jenderal Badan Peradilan Agama (SK Dirjen Badilag)')->count();
        $jdih_se_kpta = DB::table('tb_jdih')->where('jenis_peraturan', 'Surat Edaran Ketua Pengadilan Tinggi Agama Bandung (SE KPTA Bandung)')->count();
        $jdih_sk_kpta = DB::table('tb_jdih')->where('jenis_peraturan', 'Surat Keputusan Ketua Pengadilan Tinggi Agama Bandung (SK KPTA Bandung)')->count();
        $jdih_peraturan_lainnya = DB::table('tb_jdih')->where('jenis_peraturan', 'Peraturan lainnya')->count();

        return view('/jdih/v_dashboard_jdih', $data, compact(
            'jdih_uu',
            'jdih_perpu',
            'jdih_pp',
            'jdih_inpres',
            'jdih_perma',
            'jdih_sema',
            'jdih_sk_kma',
            'jdih_sk_sekma',
            'jdih_se_dirjen',
            'jdih_sk_dirjen',
            'jdih_se_kpta',
            'jdih_sk_kpta',
            'jdih_peraturan_lainnya',
        ));
    }


    //Total
    public function total()
    {
        if (!$this->JdihModel->allData()) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'jdih' => $this->JdihModel->allData(),
        ];
        return view('/jdih/v_jdih', $data);
    }


    //Detail
    public function detail($id)
    {
        if (!$this->JdihModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'jdih' => $this->JdihModel->detailData($id),
        ];
        return view('/jdih/v_detail_jdih', $data);
    }

    //Tambah Data
    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/jdih/v_add_jdih', $data);
    }

    //Insert Data
    public function insert()
    {
        Request()->validate([
            'jenis_peraturan' => 'required',
            'no_peraturan' => 'required',
            'tahun' => 'required',
            'tgl_peraturan' => 'required',
            'tentang' => 'required|unique:tb_jdih,tentang|max:255',
            'dokumen' => 'required|mimes:pdf|max:10024',
        ], [
            'tentang.required' => 'Tentang peraturan wajib diisi!!',
            'tentang.unique' => 'Peraturan sudah ada!!',
            'tentang.max' => 'Max 255 Karakter!!',
            'jenis_peraturan.required' => 'Jenis peraturan wajib diisi!!',
            'no_peraturan.required' => 'Nomor peraturan wajib diisi!!',
            'tahun.required' => 'Tahun wajib diisi!!',
            'tgl_peraturan.required' => 'Tanggal wajib diisi!!',
            'dokumen.required' => 'Dokumen wajib diupload!!',
            'dokumen.mimes' => 'Jenis file harus pdf!!',
            'dokumen.max' => 'Ukuran file max 10Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        //upload file
        $file = Request()->dokumen;
        $fileName = str_replace(" ", "_",  Request()->jenis_peraturan) . '_' . date('YmdHis') . '.' . $file->extension();
        $file->move(public_path('jdih'), $fileName);

        $data = [
            'jenis_peraturan' => Request()->jenis_peraturan,
            'no_peraturan' => Request()->no_peraturan,
            'tahun' => Request()->tahun,
            'tgl_peraturan' => Request()->tgl_peraturan,
            'tentang' => Request()->tentang,
            'dokumen' => $fileName,
        ];

        $this->JdihModel->addData($data);
        return redirect()->route('himper')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    //Edit Data
    public function edit($id)
    {
        if (!$this->JdihModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'jdih' => $this->JdihModel->detailData($id),
        ];
        return view('/jdih/v_edit_jdih', $data);
    }

    //Update Data
    public function update($id)
    {
        Request()->validate([
            'jenis_peraturan' => 'required',
            'no_peraturan' => 'required',
            'tahun' => 'required',
            'tgl_peraturan' => 'required',
            'tentang' => 'required|max:255',
            'dokumen' => 'mimes:pdf|max:10024',
        ], [
            'tentang.required' => 'Tentang peraturan wajib diisi!!',
            'tentang.max' => 'Max 255 Karakter!!',
            'jenis_peraturan.required' => 'Jenis peraturan wajib diisi!!',
            'no_peraturan.required' => 'Nomor peraturan wajib diisi!!',
            'tahun.required' => 'Tahun wajib diisi!!',
            'tgl_peraturan.required' => 'Tanggal wajib diisi!!',
            'dokumen.required' => 'Dokumen wajib diupload!!',
            'dokumen.mimes' => 'Jenis file harus pdf!!',
            'dokumen.max' => 'Ukuran file max 10Mb!!',
        ]);

        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->dokumen <> "") {
            //Jika ganti file
            //upload file
            $file = Request()->dokumen;
            $fileName = str_replace(" ", "_",  Request()->jenis_peraturan) . '_' . date('YmdHis') . '.' . $file->extension();
            $file->move(public_path('jdih'), $fileName);

            $data = [
                'jenis_peraturan' => Request()->jenis_peraturan,
                'no_peraturan' => Request()->no_peraturan,
                'tahun' => Request()->tahun,
                'tgl_peraturan' => Request()->tgl_peraturan,
                'tentang' => Request()->tentang,
                'dokumen' => $fileName,
            ];

            $this->JdihModel->editData($id, $data);
        } else {
            //Jika tidak ganti file
            //upload file

            $data = [
                'jenis_peraturan' => Request()->jenis_peraturan,
                'no_peraturan' => Request()->no_peraturan,
                'tahun' => Request()->tahun,
                'tgl_peraturan' => Request()->tgl_peraturan,
                'tentang' => Request()->tentang,
            ];

            $this->JdihModel->editData($id, $data);
        }
        return redirect()->route('himper')->with('pesan', 'Data Berhasil Diupdate !!');
    }

    public function delete($id)
    {
        //hapus Data
        $jdih = $this->JdihModel->detailData($id);
        if ($jdih->dokumen <> "") {
            unlink(public_path('jdih') . '/' . $jdih->dokumen);
        }

        $this->JdihModel->deleteData($id);
        return redirect()->route('himper')->with('pesan', 'Data Berhasil Dihapus !!');
    }

    public function undang_undang()
    {
        $data = [
            'title' => 'JDIH',
            'jdih' => $this->JdihModel->undang_undang(),
        ];
        return view('/jdih/v_jdih', $data);
    }

    public function perpu()
    {
        $data = [
            'title' => 'JDIH',
            'jdih' => $this->JdihModel->perpu(),
        ];
        return view('/jdih/v_jdih', $data);
    }

    public function pp()
    {
        $data = [
            'title' => 'JDIH',
            'jdih' => $this->JdihModel->pp(),
        ];
        return view('/jdih/v_jdih', $data);
    }

    public function inpres()
    {
        $data = [
            'title' => 'JDIH',
            'jdih' => $this->JdihModel->inpres(),
        ];
        return view('/jdih/v_jdih', $data);
    }

    public function perma()
    {
        $data = [
            'title' => 'JDIH',
            'jdih' => $this->JdihModel->perma(),
        ];
        return view('/jdih/v_jdih', $data);
    }

    public function sema()
    {
        $data = [
            'title' => 'JDIH',
            'jdih' => $this->JdihModel->sema(),
        ];
        return view('/jdih/v_jdih', $data);
    }

    public function sk_kma()
    {
        $data = [
            'title' => 'JDIH',
            'jdih' => $this->JdihModel->sk_kma(),
        ];
        return view('/jdih/v_jdih', $data);
    }

    public function sk_sekma()
    {
        $data = [
            'title' => 'JDIH',
            'jdih' => $this->JdihModel->sk_sekma(),
        ];
        return view('/jdih/v_jdih', $data);
    }

    public function se_dirjen_badilag()
    {
        $data = [
            'title' => 'JDIH',
            'jdih' => $this->JdihModel->se_dirjen_badilag(),
        ];
        return view('/jdih/v_jdih', $data);
    }

    public function sk_dirjen_badilag()
    {
        $data = [
            'title' => 'JDIH',
            'jdih' => $this->JdihModel->sk_dirjen_badilag(),
        ];
        return view('/jdih/v_jdih', $data);
    }

    public function se_kpta()
    {
        $data = [
            'title' => 'JDIH',
            'jdih' => $this->JdihModel->se_kpta(),
        ];
        return view('/jdih/v_jdih', $data);
    }

    public function sk_kpta()
    {
        $data = [
            'title' => 'JDIH',
            'jdih' => $this->JdihModel->sk_kpta(),
        ];
        return view('/jdih/v_jdih', $data);
    }

    public function peraturan_lainnya()
    {
        $data = [
            'title' => 'JDIH',
            'jdih' => $this->JdihModel->peraturan_lainnya(),
        ];
        return view('/jdih/v_jdih', $data);
    }

}
