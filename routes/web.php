<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StafController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BankputController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KasasiController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\RetensiController;
use App\Http\Controllers\UpayahukumController;
use App\Http\Controllers\SuratmasukController;
use App\Http\Controllers\SuratkeluarController;
use App\Http\Controllers\PkController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\JdihController;
use App\Http\Controllers\PbtController;
use App\Http\Controllers\EksekusiController;
use App\Http\Controllers\SkController;
use App\Http\Controllers\RegKasasiController;
use App\Http\Controllers\RegPkController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Ori Home
Route::get('/', [HomeController::class, 'index']);

//Arsip Perkara
Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip');
Route::get('/arsip_now', [ArsipController::class, 'arsip_now'])->name('arsip_now');
Route::get('/arsip/detail/{id_perkara}', [ArsipController::class, 'detail'])->name('detail');
Route::get('/arsip/add', [ArsipController::class, 'add'])->name('add');
Route::post('/arsip/insert', [ArsipController::class, 'insert'])->name('insert');
Route::get('/arsip/edit/{id_perkara}', [ArsipController::class, 'edit'])->name('edit');
Route::post('/arsip/update/{id_perkara}', [ArsipController::class, 'update'])->name('update');
// Route::get('/arsip/delete/{id_perkara}', [ArsipController::class, 'delete'])->name('delete');

//Bank Putusan
Route::get('/bankput', [BankputController::class, 'index'])->name('bankput');
Route::get('/bankput/detail/{id_bankput}', [BankputController::class, 'detail'])->name('detail');
Route::get('/bankput/add', [BankputController::class, 'add'])->name('add');
Route::post('/bankput/insert', [BankputController::class, 'insert'])->name('insert');
Route::get('/bankput/edit/{id_bankput}', [BankputController::class, 'edit'])->name('edit');
Route::post('/bankput/update/{id_bankput}', [BankputController::class, 'update'])->name('update');
// Route::get('/bankput/delete/{id_bankput}', [BankputController::class, 'delete'])->name('delete');

//Eksekusi
Route::get('/eks', [EksekusiController::class, 'index'])->name('eks');
Route::get('/eks/total', [EksekusiController::class, 'total_eks'])->name('total_eks');
Route::get('/eks/berjalan', [EksekusiController::class, 'berjalan_eks'])->name('berjalan_eks');
Route::get('/eks/selesai', [EksekusiController::class, 'selesai_eks'])->name('selesai_eks');
Route::get('/eks/progres', [EksekusiController::class, 'progres_eks'])->name('progres_eks');
Route::get('/eks/detail/{id_eks}', [EksekusiController::class, 'detail'])->name('detail');
Route::get('/eks/add', [EksekusiController::class, 'add'])->name('add');
Route::post('/eks/insert', [EksekusiController::class, 'insert'])->name('insert');
Route::get('/eks/edit/{id_eks}', [EksekusiController::class, 'edit'])->name('edit');
Route::post('/eks/update/{id_eks}', [EksekusiController::class, 'update'])->name('update');
// Route::get('/eks/delete/{id_eks}', [EksekusiController::class, 'delete'])->name('delete');

//Jdih
Route::get('/himper', [JdihController::class, 'index'])->name('himper');
Route::get('/himper/total', [JdihController::class, 'total'])->name('total');
Route::get('/himper/detail/{id_jdih}', [JdihController::class, 'detail'])->name('detail');
Route::get('/himper/add', [JdihController::class, 'add'])->name('add');
Route::post('/himper/insert', [JdihController::class, 'insert'])->name('insert');
Route::get('/himper/edit/{id_jdih}', [JdihController::class, 'edit'])->name('edit');
Route::post('/himper/update/{id_jdih}', [JdihController::class, 'update'])->name('update');
Route::get('/undang_undang', [JdihController::class, 'undang_undang'])->name('undang_undang');
Route::get('/perpu', [JdihController::class, 'perpu'])->name('perpu');
Route::get('/pp', [JdihController::class, 'pp'])->name('pp');
Route::get('/inpres', [JdihController::class, 'inpres'])->name('inpres');
Route::get('/perma', [JdihController::class, 'perma'])->name('perma');
Route::get('/sema', [JdihController::class, 'sema'])->name('sema');
Route::get('/sk_kma', [JdihController::class, 'sk_kma'])->name('sk_kma');
Route::get('/sk_sekma', [JdihController::class, 'sk_sekma'])->name('sk_sekma');
Route::get('/se_dirjen_badilag', [JdihController::class, 'se_dirjen_badilag'])->name('se_dirjen_badilag');
Route::get('/sk_dirjen_badilag', [JdihController::class, 'sk_dirjen_badilag'])->name('sk_dirjen_badilag');
Route::get('/se_kpta', [JdihController::class, 'se_kpta'])->name('se_kpta');
Route::get('/sk_kpta', [JdihController::class, 'sk_kpta'])->name('sk_kpta');
Route::get('/peraturan_lainnya', [JdihController::class, 'peraturan_lainnya'])->name('peraturan_lainnya');
// Route::get('/himper/delete/{id_jdih}', [JdihController::class, 'delete'])->name('delete');

//Kasasi
Route::get('/kasasi', [KasasiController::class, 'index'])->name('kasasi');
Route::get('/kasasi/detail/{id_kasasi}', [KasasiController::class, 'detail'])->name('detail');
Route::get('/kasasi/add', [KasasiController::class, 'add'])->name('add');
Route::post('/kasasi/insert', [KasasiController::class, 'insert'])->name('insert');
Route::get('/kasasi/edit/{id_kasasi}', [KasasiController::class, 'edit'])->name('edit');
Route::post('/kasasi/update/{id_kasasi}', [KasasiController::class, 'update'])->name('update');
// Route::get('/kasasi/delete/{id_kasasi}', [KasasiController::class, 'delete'])->name('delete');

//Pbt putusan
Route::get('/pbt', [PbtController::class, 'index'])->name('pbt');
Route::get('/pbt/detail/{id_pbt}', [PbtController::class, 'detail'])->name('detail');
Route::get('/pbt/add', [PbtController::class, 'add'])->name('add');
Route::post('/pbt/insert', [PbtController::class, 'insert'])->name('insert');
Route::get('/pbt/edit/{id_pbt}', [PbtController::class, 'edit'])->name('edit');
Route::post('/pbt/update/{id_pbt}', [PbtController::class, 'update'])->name('update');
// Route::get('/pbt/delete/{id_pbt}', [PbtController::class, 'delete'])->name('delete');

//pengaduan
Route::get('/pgd', [PengaduanController::class, 'index'])->name('pgd');
Route::get('/pgd/detail/{id_pgd}', [PengaduanController::class, 'detail'])->name('detail');
Route::get('/pgd/add', [PengaduanController::class, 'add'])->name('add');
Route::post('/pgd/insert', [PengaduanController::class, 'insert'])->name('insert');
Route::get('/pgd/edit/{id_pgd}', [PengaduanController::class, 'edit'])->name('edit');
Route::post('/pgd/update/{id_pgd}', [PengaduanController::class, 'update'])->name('update');
// Route::get('/pgd/delete/{id_pgd}', [PengaduanController::class, 'delete'])->name('delete');

//Pinjam berkas
Route::get('/pinjam', [PinjamController::class, 'index'])->name('pinjam');
Route::get('/pinjam/detail/{id_pinjam}', [PinjamController::class, 'detail'])->name('detail');
Route::get('/pinjam/add', [PinjamController::class, 'add'])->name('add');
Route::post('/pinjam/insert', [PinjamController::class, 'insert'])->name('insert');
Route::get('/pinjam/edit/{id_pinjam}', [PinjamController::class, 'edit'])->name('edit');
Route::post('/pinjam/update/{id_pinjam}', [PinjamController::class, 'update'])->name('update');
// Route::get('/pinjam/delete/{id_pinjam}', [PinjamController::class, 'delete'])->name('delete');

//PK
Route::get('/pk', [PkController::class, 'index'])->name('pk');
Route::get('/pk/detail/{id_pk}', [PkController::class, 'detail'])->name('detail');
Route::get('/pk/add', [PkController::class, 'add'])->name('add');
Route::post('/pk/insert', [PkController::class, 'insert'])->name('insert');
Route::get('/pk/edit/{id_pk}', [PkController::class, 'edit'])->name('edit');
Route::post('/pk/update/{id_pk}', [PkController::class, 'update'])->name('update');
// Route::get('/pk/delete/{id_pk}', [PkController::class, 'delete'])->name('delete');

//Retensi Arsip
Route::get('/retensi', [RetensiController::class, 'index'])->name('retensi');
Route::get('/retensi/detail/{id_retensi}', [RetensiController::class, 'detail'])->name('detail');
Route::get('/retensi/add', [RetensiController::class, 'add'])->name('add');
Route::post('/retensi/insert', [RetensiController::class, 'insert'])->name('insert');
Route::get('/retensi/edit/{id_retensi}', [RetensiController::class, 'edit'])->name('edit');
Route::post('/retensi/update/{id_retensi}', [RetensiController::class, 'update'])->name('update');
Route::get('/retensi_blm', [RetensiController::class, 'retensi_blm'])->name('retensi_blm');
Route::get('/retensi_sdh', [RetensiController::class, 'retensi_sdh'])->name('retensi_sdh');
Route::get('/retensi_total', [RetensiController::class, 'retensi_total'])->name('retensi_total');
// Route::get('/retensi/delete/{id_retensi}', [RetensiController::class, 'delete'])->name('delete');

//Surat Keputusan
Route::get('/suratkeputusan', [SkController::class, 'index'])->name('suratkeputusan');
Route::get('/suratkeputusan/detail/{id_sk}', [SkController::class, 'detail'])->name('detail');
Route::get('/suratkeputusan/retensi_blm', [SkController::class, 'add'])->name('add');
Route::post('/suratkeputusan/insert', [SkController::class, 'insert'])->name('insert');
Route::get('/suratkeputusan/edit/{id_sk}', [SkController::class, 'edit'])->name('edit');
Route::post('/suratkeputusan/update/{id_sk}', [SkController::class, 'update'])->name('update');
// Route::get('/suratkeputusan/delete/{id_sk}', [SkController::class, 'delete'])->name('delete');

//Surat Masuk
Route::get('/suratmasuk', [SuratmasukController::class, 'index'])->name('suratmasuk');
Route::get('/suratmasuk/detail/{id_suratmasuk}', [SuratmasukController::class, 'detail'])->name('detail');
Route::get('/suratmasuk/add', [SuratmasukController::class, 'add'])->name('add');
Route::post('/suratmasuk/insert', [SuratmasukController::class, 'insert'])->name('insert');
Route::get('/suratmasuk/edit/{id_suratmasuk}', [SuratmasukController::class, 'edit'])->name('edit');
Route::post('/suratmasuk/update/{id_suratmasuk}', [SuratmasukController::class, 'update'])->name('update');
Route::get('/search-date-range', [SuratmasukController::class, 'searchByDateRange']);
// Route::get('/suratmasuk/delete/{id_suratmasuk}', [SuratmasukController::class, 'delete'])->name('delete');

//Surat Keluar
Route::get('/suratkeluar', [SuratkeluarController::class, 'index'])->name('suratkeluar');
Route::get('/suratkeluar/detail/{id_suratkeluar}', [SuratkeluarController::class, 'detail'])->name('detail');
Route::get('/suratkeluar/add', [SuratkeluarController::class, 'add'])->name('add');
Route::post('/suratkeluar/insert', [SuratkeluarController::class, 'insert'])->name('insert');
Route::get('/suratkeluar/edit/{id_suratkeluar}', [SuratkeluarController::class, 'edit'])->name('edit');
Route::post('/suratkeluar/update/{id_suratkeluar}', [SuratkeluarController::class, 'update'])->name('update');
// Route::get('/suratkeluar/delete/{id_suratkeluar}', [SuratkeluarController::class, 'delete'])->name('delete');

//Upaya Hukum 
Route::get('/uphukum', [UpayahukumController::class, 'index'])->name('uphukum');
Route::get('/uphukum/detail/{id_uphukum}', [UpayahukumController::class, 'detail'])->name('detail');
Route::get('/uphukum/add', [UpayahukumController::class, 'add'])->name('add');
Route::post('/uphukum/insert', [UpayahukumController::class, 'insert'])->name('insert');
Route::get('/uphukum/edit/{id_uphukum}', [UpayahukumController::class, 'edit'])->name('edit');
Route::post('/uphukum/update/{id_uphukum}', [UpayahukumController::class, 'update'])->name('update');
// Route::get('/uphukum/delete/{id_uphukum}', [UpayahukumController::class, 'delete'])->name('delete');

//Register Kasasi
Route::get('/reg_kasasi', [RegKasasiController::class, 'index'])->name('reg_kasasi');
Route::get('/reg_kasasi/detail/{id_reg_kasasi}', [RegKasasiController::class, 'detail'])->name('detail');
Route::get('/reg_kasasi/add', [RegKasasiController::class, 'add'])->name('add');
Route::post('/reg_kasasi/insert', [RegKasasiController::class, 'insert'])->name('insert');
Route::get('/reg_kasasi/edit/{id_reg_kasasi}', [RegKasasiController::class, 'edit'])->name('edit');
Route::post('/reg_kasasi/update/{id_reg_kasasi}', [RegKasasiController::class, 'update'])->name('update');
// Route::get('/reg_kasasi/delete/{id_reg_kasasi}', [RegKasasiController::class, 'delete'])->name('delete');

//Register Peninjauan Kembali
Route::get('/reg_pk', [RegPkController::class, 'index'])->name('reg_pk');
Route::get('/reg_pk/detail/{id_reg_pk}', [RegPkController::class, 'detail'])->name('detail');
Route::get('/reg_pk/add', [RegPkController::class, 'add'])->name('add');
Route::post('/reg_pk/insert', [RegPkController::class, 'insert'])->name('insert');
Route::get('/reg_pk/edit/{id_reg_pk}', [RegPkController::class, 'edit'])->name('edit');
Route::post('/reg_pk/update/{id_reg_pk}', [RegPkController::class, 'update'])->name('update');
// Route::get('/reg_pk/delete/{id_reg_pk}', [RegPkController::class, 'delete'])->name('delete');

Auth::routes();

//Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Staf
Route::get('/staf', [StafController::class, 'index'])->name('staf');

//USer
Route::get('/user', [UserController::class, 'index'])->name('user');

//Hak akses admin
Route::group(['middleware' => 'admin'], function () {
    //Management User
    Route::get('/member', [MemberController::class, 'index'])->name('member');
    Route::get('/member/detail/{id}', [MemberController::class, 'detail'])->name('detail');
    Route::get('/member/add', [MemberController::class, 'add'])->name('add');
    Route::post('/member/insert', [MemberController::class, 'insert'])->name('insert');
    Route::get('/member/edit/{id}', [MemberController::class, 'edit'])->name('edit');
    Route::post('/member/update/{id}', [MemberController::class, 'update'])->name('update');
    Route::get('/member/delete/{id}', [MemberController::class, 'delete'])->name('delete');

    //Delete Data
    Route::get('/arsip/delete/{id_perkara}', [ArsipController::class, 'delete'])->name('delete');
    Route::get('/kasasi/delete/{id_kasasi}', [KasasiController::class, 'delete'])->name('delete');
    Route::get('/bankput/delete/{id_bankput}', [BankputController::class, 'delete'])->name('delete');
    Route::get('/pinjam/delete/{id_pinjam}', [PinjamController::class, 'delete'])->name('delete');
    Route::get('/uphukum/delete/{id_uphukum}', [UpayahukumController::class, 'delete'])->name('delete');
    Route::get('/suratmasuk/delete/{id_suratmasuk}', [SuratmasukController::class, 'delete'])->name('delete');
    Route::get('/suratkeluar/delete/{id_suratkeluar}', [SuratkeluarController::class, 'delete'])->name('delete');
    Route::get('/pk/delete/{id_pk}', [PkController::class, 'delete'])->name('delete');
    Route::get('/pgd/delete/{id_pgd}', [PengaduanController::class, 'delete'])->name('delete');
    Route::get('/himper/delete/{id_jdih}', [JdihController::class, 'delete'])->name('delete');
    Route::get('/pbt/delete/{id_pbt}', [PbtController::class, 'delete'])->name('delete');
    Route::get('/eks/delete/{id_eks}', [EksekusiController::class, 'delete'])->name('delete');
    Route::get('/suratkeputusan/delete/{id_sk}', [SkController::class, 'delete'])->name('delete');
    Route::get('/reg_kasasi/delete/{id_reg_kasasi}', [RegKasasiController::class, 'delete'])->name('delete');
    Route::get('/reg_pk/delete/{id_reg_pk}', [RegPkController::class, 'delete'])->name('delete');
    Route::get('/retensi/delete/{id_retensi}', [RetensiController::class, 'delete'])->name('delete');
});
