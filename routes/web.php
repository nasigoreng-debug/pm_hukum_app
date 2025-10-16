<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StafController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BankputController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KasasiController;
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
use App\Http\Controllers\LaporanController;


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

//Home
Route::get('/', [HomeController::class, 'index']);

//Arsip Perkara

Route::resource('arsip', ArsipController::class);
Route::get('arsip/filter/{filter}', [ArsipController::class, 'filter'])->name('arsip.filter');
Route::get('/search-date-range-arsip-perkara', [ArsipController::class, 'searchByDateRange'])->name('arsip.search');
Route::get('arsip/{id}/download-putusan', [ArsipController::class, 'downloadPutusan'])->name('arsip.download.putusan');
Route::get('arsip/{id}/download-bundel', [ArsipController::class, 'downloadBundel'])->name('arsip.download.bundel');
// Route::get('/arsip/delete/{id}', [ArsipController::class, 'delete'])->name('delete');

//Bank Putusan
Route::resource('bankput', BankputController::class);
// Route::get('/bankput', [BankputController::class, 'index'])->name('bankput');
// Route::get('/bankput/detail/{id}', [BankputController::class, 'detail'])->name('detail');
// Route::get('/bankput/add', [BankputController::class, 'add'])->name('add');
// Route::post('/bankput/insert', [BankputController::class, 'insert'])->name('insert');
// Route::get('/bankput/edit/{id}', [BankputController::class, 'edit'])->name('edit');
// Route::post('/bankput/update/{id}', [BankputController::class, 'update'])->name('update');
// Route::get('/bankput/delete/{id}', [BankputController::class, 'delete'])->name('delete');

//Eksekusi
Route::get('/eks', [EksekusiController::class, 'index'])->name('eks');
Route::get('/eks/total', [EksekusiController::class, 'total_eks'])->name('total_eks');
Route::get('/eks/berjalan', [EksekusiController::class, 'berjalan_eks'])->name('berjalan_eks');
Route::get('/eks/selesai', [EksekusiController::class, 'selesai_eks'])->name('selesai_eks');
Route::get('/eks/progres', [EksekusiController::class, 'progres_eks'])->name('progres_eks');
Route::get('/eks/detail/{id}', [EksekusiController::class, 'detail'])->name('detail');
Route::get('/eks/add', [EksekusiController::class, 'add'])->name('add');
Route::post('/eks/insert', [EksekusiController::class, 'insert'])->name('insert');
Route::get('/eks/edit/{id}', [EksekusiController::class, 'edit'])->name('edit');
Route::post('/eks/update/{id}', [EksekusiController::class, 'update'])->name('update');
Route::get('/search-date-range-eksekusi', [EksekusiController::class, 'searchByDateRangeEksekusi']);
// Route::get('/eks/delete/{id}', [EksekusiController::class, 'delete'])->name('delete');

//Jdih
Route::get('/himper', [JdihController::class, 'index'])->name('himper');
Route::get('/himper/total', [JdihController::class, 'total'])->name('total');
Route::get('/himper/detail/{id}', [JdihController::class, 'detail'])->name('detail');
Route::get('/himper/add', [JdihController::class, 'add'])->name('add');
Route::post('/himper/insert', [JdihController::class, 'insert'])->name('insert');
Route::get('/himper/edit/{id}', [JdihController::class, 'edit'])->name('edit');
Route::post('/himper/update/{id}', [JdihController::class, 'update'])->name('update');
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
// Route::get('/himper/delete/{id}', [JdihController::class, 'delete'])->name('delete');

//Kasasi
Route::get('/kasasi', [KasasiController::class, 'index'])->name('kasasi');
Route::get('/kasasi/detail/{id}', [KasasiController::class, 'detail'])->name('detail');
Route::get('/kasasi/add', [KasasiController::class, 'add'])->name('add');
Route::post('/kasasi/insert', [KasasiController::class, 'insert'])->name('insert');
Route::get('/kasasi/edit/{id}', [KasasiController::class, 'edit'])->name('edit');
Route::post('/kasasi/update/{id}', [KasasiController::class, 'update'])->name('update');
// Route::get('/kasasi/delete/{id}', [KasasiController::class, 'delete'])->name('delete');

//Pbt putusan
Route::get('/pbt', [PbtController::class, 'index'])->name('pbt');
Route::get('/pbt/detail/{id}', [PbtController::class, 'detail'])->name('detail');
Route::get('/pbt/add', [PbtController::class, 'add'])->name('add');
Route::post('/pbt/insert', [PbtController::class, 'insert'])->name('insert');
Route::get('/pbt/edit/{id}', [PbtController::class, 'edit'])->name('edit');
Route::post('/pbt/update/{id}', [PbtController::class, 'update'])->name('update');
// Route::get('/pbt/delete/{id}', [PbtController::class, 'delete'])->name('delete');

//pengaduan
Route::get('/pgd', [PengaduanController::class, 'index'])->name('pgd');
Route::get('/pgd_berjalan', [PengaduanController::class, 'pgd_berjalan'])->name('pgd_berjalan');
Route::get('/pgd_total', [PengaduanController::class, 'pgd_total'])->name('pgd_total');
Route::get('/pengaduan_blm_selesai', [PengaduanController::class, 'pengaduan_blm_selesai'])->name('pengaduan_blm_selesai');
Route::get('/pgd/detail/{id}', [PengaduanController::class, 'detail'])->name('detail');
Route::get('/pgd/add', [PengaduanController::class, 'add'])->name('add');
Route::post('/pgd/insert', [PengaduanController::class, 'insert'])->name('insert');
Route::get('/pgd/edit/{id}', [PengaduanController::class, 'edit'])->name('edit');
Route::post('/pgd/update/{id}', [PengaduanController::class, 'update'])->name('update');
Route::get('/search-date-range-pengaduan', [PengaduanController::class, 'searchByDateRangePengaduan']);
// Route::get('/pgd/delete/{id}', [PengaduanController::class, 'delete'])->name('delete');

//Pinjam berkas
Route::get('/pinjam', [PinjamController::class, 'index'])->name('pinjam');
Route::get('/pinjam/detail/{id}', [PinjamController::class, 'detail'])->name('detail');
Route::get('/pinjam/add', [PinjamController::class, 'add'])->name('add');
Route::post('/pinjam/insert', [PinjamController::class, 'insert'])->name('insert');
Route::get('/pinjam/edit/{id}', [PinjamController::class, 'edit'])->name('edit');
Route::post('/pinjam/update/{id}', [PinjamController::class, 'update'])->name('update');
// Route::get('/pinjam/delete/{id}', [PinjamController::class, 'delete'])->name('delete');

//PK
Route::get('/pk', [PkController::class, 'index'])->name('pk');
Route::get('/pk/detail/{id}', [PkController::class, 'detail'])->name('detail');
Route::get('/pk/add', [PkController::class, 'add'])->name('add');
Route::post('/pk/insert', [PkController::class, 'insert'])->name('insert');
Route::get('/pk/edit/{id}', [PkController::class, 'edit'])->name('edit');
Route::post('/pk/update/{id}', [PkController::class, 'update'])->name('update');
// Route::get('/pk/delete/{id}', [PkController::class, 'delete'])->name('delete');

//Retensi Arsip
Route::get('/retensi', [RetensiController::class, 'index'])->name('retensi');
Route::get('/retensi/detail/{id}', [RetensiController::class, 'detail'])->name('detail');
Route::get('/retensi/add', [RetensiController::class, 'add'])->name('add');
Route::post('/retensi/insert', [RetensiController::class, 'insert'])->name('insert');
Route::get('/retensi/edit/{id}', [RetensiController::class, 'edit'])->name('edit');
Route::post('/retensi/update/{id}', [RetensiController::class, 'update'])->name('update');
Route::get('/retensi_blm', [RetensiController::class, 'retensi_blm'])->name('retensi_blm');
Route::get('/retensi_sdh', [RetensiController::class, 'retensi_sdh'])->name('retensi_sdh');
Route::get('/retensi_total', [RetensiController::class, 'retensi_total'])->name('retensi_total');
// Route::get('/retensi/delete/{id}', [RetensiController::class, 'delete'])->name('delete');

//Surat Keputusan
Route::get('/suratkeputusan', [SkController::class, 'index'])->name('suratkeputusan');
Route::get('/suratkeputusan/detail/{id}', [SkController::class, 'detail'])->name('detail');
Route::get('/suratkeputusan/add', [SkController::class, 'add'])->name('add');
Route::post('/suratkeputusan/insert', [SkController::class, 'insert'])->name('insert');
Route::get('/suratkeputusan/edit/{id}', [SkController::class, 'edit'])->name('edit');
Route::post('/suratkeputusan/update/{id}', [SkController::class, 'update'])->name('update');
// Route::get('/suratkeputusan/delete/{id}', [SkController::class, 'delete'])->name('delete');

//Surat Masuk
Route::get('/suratmasuk', [SuratmasukController::class, 'index'])->name('suratmasuk');
Route::get('/suratmasuk_berjalan', [SuratmasukController::class, 'suratmasuk_berjalan'])->name('suratmasuk_berjalan');
Route::get('/suratmasuk_total', [SuratmasukController::class, 'suratmasuk_total'])->name('suratmasuk_total');
Route::get('/suratmasuk/detail/{id}', [SuratmasukController::class, 'detail'])->name('detail');
Route::get('/suratmasuk/add', [SuratmasukController::class, 'add'])->name('add');
Route::post('/suratmasuk/insert', [SuratmasukController::class, 'insert'])->name('insert');
Route::get('/suratmasuk/edit/{id}', [SuratmasukController::class, 'edit'])->name('edit');
Route::post('/suratmasuk/update/{id}', [SuratmasukController::class, 'update'])->name('update');
Route::get('/search-date-range-surat-masuk', [SuratmasukController::class, 'searchByDateRangeSuratMasuk']);
// Route::get('/suratmasuk/delete/{id}', [SuratmasukController::class, 'delete'])->name('delete');

//Surat Keluar
Route::get('/suratkeluar', [SuratkeluarController::class, 'index'])->name('suratkeluar');
Route::get('/suratkeluar_berjalan', [SuratkeluarController::class, 'suratkeluar_berjalan'])->name('suratkeluar_berjalan');
Route::get('/suratkeluar_total', [SuratkeluarController::class, 'suratkeluar_total'])->name('suratkeluar_total');
Route::get('/suratkeluar/detail/{id}', [SuratkeluarController::class, 'detail'])->name('detail');
Route::get('/suratkeluar/add', [SuratkeluarController::class, 'add'])->name('add');
Route::post('/suratkeluar/insert', [SuratkeluarController::class, 'insert'])->name('insert');
Route::get('/suratkeluar/edit/{id}', [SuratkeluarController::class, 'edit'])->name('edit');
Route::post('/suratkeluar/update/{id}', [SuratkeluarController::class, 'update'])->name('update');
// Route::get('/suratkeluar/delete/{id}', [SuratkeluarController::class, 'delete'])->name('delete');

//Register Kasasi
Route::get('/reg_kasasi', [RegKasasiController::class, 'index'])->name('reg_kasasi');
Route::get('/reg_kasasi/detail/{id}', [RegKasasiController::class, 'detail'])->name('detail');
Route::get('/reg_kasasi/add', [RegKasasiController::class, 'add'])->name('add');
Route::post('/reg_kasasi/insert', [RegKasasiController::class, 'insert'])->name('insert');
Route::get('/reg_kasasi/edit/{id}', [RegKasasiController::class, 'edit'])->name('edit');
Route::post('/reg_kasasi/update/{id}', [RegKasasiController::class, 'update'])->name('update');
// Route::get('/reg_kasasi/delete/{id}', [RegKasasiController::class, 'delete'])->name('delete');

//Register Peninjauan Kembali
Route::get('/reg_pk', [RegPkController::class, 'index'])->name('reg_pk');
Route::get('/reg_pk/detail/{id}', [RegPkController::class, 'detail'])->name('detail');
Route::get('/reg_pk/add', [RegPkController::class, 'add'])->name('add');
Route::post('/reg_pk/insert', [RegPkController::class, 'insert'])->name('insert');
Route::get('/reg_pk/edit/{id}', [RegPkController::class, 'edit'])->name('edit');
Route::post('/reg_pk/update/{id}', [RegPkController::class, 'update'])->name('update');
// Route::get('/reg_pk/delete/{id}', [RegPkController::class, 'delete'])->name('delete');

//Laporan
Route::resource('laporans', LaporanController::class);

Auth::routes();

//Home
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

// //Staf
// Route::get('/staf', [StafController::class, 'index'])->name('staf');

// //USer
// Route::get('/user', [UserController::class, 'index'])->name('user');

//Hak akses admin
Route::group(['middleware' => 'admin'], function () {
    //Management User
    Route::resource('users', UserController::class);

    //Delete Data
    Route::get('/arsip/delete/{id}', [ArsipController::class, 'delete'])->name('delete');
    Route::get('/kasasi/delete/{id}', [KasasiController::class, 'delete'])->name('delete');
    Route::get('/bankput/delete/{id}', [BankputController::class, 'delete'])->name('delete');
    Route::get('/pinjam/delete/{id}', [PinjamController::class, 'delete'])->name('delete');
    Route::get('/uphukum/delete/{id}', [UpayahukumController::class, 'delete'])->name('delete');
    Route::get('/suratmasuk/delete/{id}', [SuratmasukController::class, 'delete'])->name('delete');
    Route::get('/suratkeluar/delete/{id}', [SuratkeluarController::class, 'delete'])->name('delete');
    Route::get('/pk/delete/{id}', [PkController::class, 'delete'])->name('delete');
    Route::get('/pgd/delete/{id}', [PengaduanController::class, 'delete'])->name('delete');
    Route::get('/himper/delete/{id}', [JdihController::class, 'delete'])->name('delete');
    Route::get('/pbt/delete/{id}', [PbtController::class, 'delete'])->name('delete');
    Route::get('/eks/delete/{id}', [EksekusiController::class, 'delete'])->name('delete');
    Route::get('/suratkeputusan/delete/{id}', [SkController::class, 'delete'])->name('delete');
    Route::get('/reg_kasasi/delete/{id}', [RegKasasiController::class, 'delete'])->name('delete');
    Route::get('/reg_pk/delete/{id}', [RegPkController::class, 'delete'])->name('delete');
    Route::get('/retensi/delete/{id}', [RetensiController::class, 'delete'])->name('delete');
    Route::get('/laporan/destroy/{id}', [LaporanController::class, 'destroy'])->name('destroy');
    Route::get('/users/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
});
