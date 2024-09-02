<?php

namespace App\Http\Controllers;

use App\Models\EksekusiModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

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

        //eksekusi belum selesai
        $eksekusi_blm_selesai_0000 = DB::table('tb_eksekusi')->where('tgl_selesai', 0000 - 00 - 00)->count();
        //upy_hk belum selesai
        $eksekusi_blm_selesai_null = DB::table('tb_eksekusi')->where('tgl_selesai', Null)->count();

        $eksekusi_blm_selesai =  $eksekusi_blm_selesai_0000 + $eksekusi_blm_selesai_null;

        //eksekusi selesai 
        $eksekusi_selesai = $eksekusi_total - $eksekusi_blm_selesai;

        //Presentase selesai
        $eksekusi_progres = $eksekusi_selesai / $eksekusi_total * 100;
        $eksekusi_presentase = round($eksekusi_progres);
        return view('/eksekusi/v_dashboard_eksekusi', $data, compact(
            'eksekusi_total',
            'eksekusi_masuk_thn_ini',
            'eksekusi_bln_ini',
            'eksekusi_presentase',
            'eksekusi_blm_selesai',
            'eksekusi_selesai',
            'eksekusi_presentase',

        ));
    }

    public function total_eks()
    {
        $data = [
            'title' => 'Perkara Eksekusi',
            'eksekusi' => $this->EksekusiModel->allData(),
        ];
        return view('/eksekusi/v_eksekusi', $data);
    }

    public function berjalan_eks()
    {
        $data = [
            'title' => 'Perkara Eksekusi',
            'eksekusi' => $this->EksekusiModel->berjalan_eks(),
        ];
        return view('/eksekusi/v_eksekusi_berjalan', $data);
    }

    public function selesai_eks()
    {
        $data = [
            'title' => 'Perkara Eksekusi',
            'eksekusi' => $this->EksekusiModel->selesai_eks(),
        ];
        return view('/eksekusi/v_eksekusi_selesai', $data);
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
