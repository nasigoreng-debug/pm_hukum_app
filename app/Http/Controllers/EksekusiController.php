<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\EksekusiModel; // Pastikan import model yang benar

class EksekusiController extends Controller
{
    public function __construct()
    {
        $this->EksekusiModel = new EksekusiModel();
        $this->middleware('auth');
    }

    public function index()
    {

        $data = [
            'title' => 'Perkara Eksekusi',
            'eksekusi' => $this->EksekusiModel->allData(),

        ];

        //Function Tahun sekarang
        $day = Carbon::now()->format('d');    // 01-31
        $month = Carbon::now()->format('m');  // 01-12  
        $year = Carbon::now()->format('Y');   // 2024

        //eksekusi
        $eksekusi_total = DB::table('tb_eksekusi')
            ->count();

        //eksekusi
        $eksekusi_masuk_thn_ini = DB::table('tb_eksekusi')
            ->whereYear('tgl_permohonan', $year)
            ->count();

        //eksekusi Bulan Ini
        $eksekusi_bln_ini = DB::table('tb_eksekusi')
            ->whereDay('tgl_permohonan', $day)
            ->count();

        // Hitung total data eksekusi
        $eksekusi_total = DB::table('tb_eksekusi')->count();

        // Eksekusi belum selesai - perbaikan format tanggal
        $eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')
            ->where('tgl_selesai', '0000-00-00')
            ->count();

        // Eksekusi belum selesai - null
        $eksekusi_blm_selesai_null = DB::table('tb_eksekusi')
            ->whereNull('tgl_selesai')
            ->count();

        $eksekusi_blm_selesai = $eksekusi_blm_selesai_0000 + $eksekusi_blm_selesai_null;

        // Eksekusi selesai 
        $eksekusi_selesai = $eksekusi_total - $eksekusi_blm_selesai;

        // Presentase selesai - handle division by zero
        $eksekusi_progres = $eksekusi_total > 0
            ? ($eksekusi_selesai / $eksekusi_total * 100)
            : 0;
        $eksekusi_presentase = round($eksekusi_progres);

        // Data lainnya
        $eksekusi_putusan = DB::table('tb_eksekusi')->whereNotNull('no_put')->count();
        $eksekusi_ht = DB::table('tb_eksekusi')->whereNull('no_put')->count();

        $eksekusi_riil = DB::table('tb_eksekusi')
            ->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')
            ->count();

        $eksekusi_lelang = DB::table('tb_eksekusi')
            ->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')
            ->count();

        $eksekusi_dicabut = DB::table('tb_eksekusi')
            ->where('proses_terakhir', 'Penetapan Cabut')
            ->count();

        $eksekusi_dicoret = DB::table('tb_eksekusi')
            ->where('proses_terakhir', 'Penetapan Coret')
            ->count();

        $eksekusi_ne = DB::table('tb_eksekusi')
            ->where('proses_terakhir', 'Penetapan Non-Eksekutabel')
            ->count();

        return view('/eksekusi/v_dashboard_eksekusi', $data, compact(
            'eksekusi_total',
            'eksekusi_putusan',
            'eksekusi_ht',
            'eksekusi_masuk_thn_ini',
            'eksekusi_bln_ini',
            'eksekusi_presentase',
            'eksekusi_blm_selesai',
            'eksekusi_selesai',
            'eksekusi_presentase',
            'eksekusi_riil',
            'eksekusi_lelang',
            'eksekusi_dicabut',
            'eksekusi_dicoret',
            'eksekusi_ne',
        ));
    }

    public function progres_eks()
    {
        $data = [
            'title' => 'Perkara Eksekusi',
            'eksekusi' => $this->EksekusiModel->allData(),
        ];

        // Function Tahun sekarang
        $currentDate = Carbon::now();
        $day = $currentDate->format('d');
        $month = $currentDate->format('m');
        $year = $currentDate->format('Y');

        // Data umum
        $eksekusi_total = DB::table('tb_eksekusi')->count();
        $eksekusi_masuk_thn_ini = DB::table('tb_eksekusi')
            ->whereYear('tgl_permohonan', $year)
            ->count();
        $eksekusi_bln_ini = DB::table('tb_eksekusi')
            ->whereMonth('tgl_permohonan', $month)
            ->whereYear('tgl_permohonan', $year)
            ->count();

        // Daftar semua satker - lebih mudah dikelola
        $satkers = [
            'bandung',
            'sumedang',
            'Indramayu',
            'Majalengka',
            'Sumber',
            'Ciamis',
            'Tasikmalaya',
            'Karawang',
            'Cimahi',
            'Subang',
            'Purwakarta',
            'Sukabumi',
            'Cianjur',
            'Kuningan',
            'Cibadak',
            'Cirebon',
            'Garut',
            'Bogor',
            'Bekasi',
            'Cibinong',
            'Cikarang',
            'Depok',
            'Kota Tasikmalaya',
            'Kota Banjar',
            'Soreang',
            'Ngamprah'
        ];

        $results = [];

        foreach ($satkers as $satker) {
            $results[$satker] = $this->hitungDataEksekusi($satker);
        }

        return view('/eksekusi/v_eksekusi_progres', array_merge($data, [
            'results' => $results,
            'eksekusi_total' => $eksekusi_total,
            'eksekusi_masuk_thn_ini' => $eksekusi_masuk_thn_ini,
            'eksekusi_bln_ini' => $eksekusi_bln_ini
        ]));
    }

    // Fungsi helper untuk menghitung data eksekusi per satker
    private function hitungDataEksekusi($satker)
    {
        // Query dasar untuk satker tertentu
        $query = DB::table('tb_eksekusi')->where('satker', $satker);

        // Hitung total eksekusi
        $total = $query->count();

        // Data berdasarkan putusan
        $putusan = (clone $query)->whereNotNull('no_put')->count();
        $ht = (clone $query)->whereNull('no_put')->count();

        // Data berdasarkan proses terakhir
        $riil = (clone $query)->where('proses_terakhir', 'Pelaksanaan Eksekusi Riil')->count();
        $lelang = (clone $query)->where('proses_terakhir', 'Penyerahan Hasil Eksekusi/Lelang')->count();
        $dicabut = (clone $query)->where('proses_terakhir', 'Penetapan Cabut')->count();
        $dicoret = (clone $query)->where('proses_terakhir', 'Penetapan Coret')->count();
        $ne = (clone $query)->where('proses_terakhir', 'Penetapan Non-Eksekutabel')->count();

        // Hitung eksekusi belum selesai
        $blm_selesai = (clone $query)
            ->where(function ($q) {
                $q->where('tgl_selesai', '0000-00-00')
                    ->orWhereNull('tgl_selesai');
            })
            ->count();

        // Hitung eksekusi selesai dan sisa
        $selesai = $total - $blm_selesai;
        $bagi = $total - ($dicabut + $dicoret + $ne);

        $selesai_eks = $riil + $lelang;
        $sisa = $total - $selesai;

        // Hitung presentase dengan pengecekan division by zero
        $progres = 0;
        if ($bagi > 0 && $total > 0) {
            $progres = ($selesai_eks / $bagi) * 100;
        }

        $presentase = number_format(round($progres, 2), 2, ',', '.');

        // Hitung bobot nilai
        $bobot_nilai = ($riil * 5) + ($lelang * 5);

        return [
            'total' => $total,
            'putusan' => $putusan,
            'ht' => $ht,
            'riil' => $riil,
            'lelang' => $lelang,
            'dicabut' => $dicabut,
            'dicoret' => $dicoret,
            'ne' => $ne,
            'selesai' => $selesai,
            'sisa' => $sisa,
            'presentase' => $presentase,
            'bobot_nilai' => $bobot_nilai
        ];
    }

    public function total_eks()
    {
        $data = [
            'title' => 'Perkara Eksekusi',
            'eksekusi' => $this->EksekusiModel->allData(),
        ];
        $sekarang =  date("Y-m-d");
        return view('/eksekusi/v_eksekusi', $data)
            ->with("sekarang", $sekarang);
    }

    public function berjalan_eks()
    {
        $data = [
            'title' => 'Perkara Eksekusi',
            'eksekusi' => $this->EksekusiModel->berjalan_eks(),
        ];
        $sekarang =  date("Y-m-d");
        return view('/eksekusi/v_eksekusi', $data)
            ->with("sekarang", $sekarang);
    }

    public function selesai_eks()
    {
        $data = [
            'title' => 'Perkara Eksekusi',
            'eksekusi' => $this->EksekusiModel->selesai_eks(),
        ];
        $sekarang =  date("Y-m-d");
        return view('/eksekusi/v_eksekusi', $data)
            ->with("sekarang", $sekarang);
    }

    //Detail
    public function detail($id_eks)
    {
        if (!$this->EksekusiModel->detailData($id_eks)) {
            abort(404);
        }
        $data = [
            'title' => 'Detail',
            'eksekusi' => $this->EksekusiModel->detailData($id_eks),
        ];
        return view('/eksekusi/v_detail_eksekusi', $data);
    }

    //Tambah Data
    public function add()
    {
        $data = [
            'title' => 'Form Tambah Data'
        ];
        return view('/eksekusi/v_add_eksekusi', $data);
    }

    //Insert Data
    public function insert()
    {
        Request()->validate([
            'satker' => 'required',
            'no_eksekusi' => 'required|unique:tb_eksekusi,satker|max:255',
            'tgl_permohonan' => 'required',
            'proses_terakhir' => 'required',

        ], [
            'satker' => 'Nama satker wajib diisi!!',
            'no_eksekusi.required' => 'Nomor perkara wajib diisi!!',
            'no_eksekusi.unique' => 'Nomor perkara sudah ada!!',
            'no_eksekusi.max' => 'Max 255 Karakter!!',
            'tgl_permohonan.required' => 'Tanggal permohonan eksekusi wajib diisi!!',
            'proses_terakhir.required' => 'Proses terakhir wajib diisi!!',

        ]);

        $data = [
            'no_eksekusi' => Request()->no_eksekusi,
            'satker' => Request()->satker,
            'no_put' => Request()->no_put,
            'tgl_permohonan' => Request()->tgl_permohonan,
            'proses_terakhir' => Request()->proses_terakhir,
            'tgl_eks' => Request()->tgl_eks,
            'tgl_selesai' => Request()->tgl_selesai,
            'keterangan' => Request()->keterangan,
        ];

        $this->EksekusiModel->addData($data);
        return redirect()->route('berjalan_eks')->with('pesan', 'Data Berhasil Ditambahkan !!');
    }

    //Edit Data
    public function edit($id_eks)
    {
        if (!$this->EksekusiModel->detailData($id_eks)) {
            abort(404);
        }
        $data = [
            'title' => 'Edit',
            'eksekusi' => $this->EksekusiModel->detailData($id_eks),
        ];
        return view('/eksekusi/v_edit_eksekusi', $data);
    }

    //Update Data
    public function update($id_eks)
    {
        Request()->validate([
            'satker' => 'required',
            'no_eksekusi' => 'required|unique:tb_eksekusi,satker|max:255',
            'tgl_permohonan' => 'required',
            'proses_terakhir' => 'required',

        ], [
            'satker' => 'Nama satker wajib diisi!!',
            'no_eksekusi.required' => 'Nomor perkara wajib diisi!!',
            'no_eksekusi.unique' => 'Nomor perkara sudah ada!!',
            'no_eksekusi.max' => 'Max 255 Karakter!!',
            'tgl_permohonan.required' => 'Tanggal permohonan eksekusi wajib diisi!!',
            'proses_terakhir.required' => 'Proses terakhir wajib diisi!!',

        ]);

        $data = [
            'no_eksekusi' => Request()->no_eksekusi,
            'satker' => Request()->satker,
            'no_put' => Request()->no_put,
            'tgl_permohonan' => Request()->tgl_permohonan,
            'proses_terakhir' => Request()->proses_terakhir,
            'tgl_eks' => Request()->tgl_eks,
            'tgl_selesai' => Request()->tgl_selesai,
            'keterangan' => Request()->keterangan,
        ];

        $this->EksekusiModel->editData($id_eks, $data);

        return redirect()->route('berjalan_eks')->with('pesan', 'Data Berhasil Diupdate !!');
    }


    public function delete($id_eks)
    {
        //hapus file

        $this->EksekusiModel->deleteData($id_eks);
        return redirect()->route('eks')->with('pesan', 'Data Berhasil Dihapus !!');
    }
}
