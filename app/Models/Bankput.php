<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bankput extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model
     *
     * @var string
     */
    protected $table = 'bankputs';

    /**
     * Kunci primer tabel
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Kolom yang dapat diisi secara massal
     *
     * @var array
     */
    protected $fillable = [
        'no_banding',
        'jenis_perkara',
        'tgl_put_banding',
        'status_putus',
        'keterangan',
        'put_rtf',
        'put_anonim',
    ];

    /**
     * Tipe data kolom yang harus di-cast
     *
     * @var array
     */
    protected $casts = [
        'tgl_put_banding' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope untuk filter data
     */

    /**
     * Scope untuk mencari berdasarkan nomor banding
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $noBanding
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByNoBanding($query, $noBanding)
    {
        return $query->where('no_banding', 'like', '%' . $noBanding . '%');
    }

    /**
     * Scope untuk filter berdasarkan jenis perkara
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $jenisPerkara
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByJenisPerkara($query, $jenisPerkara)
    {
        return $query->where('jenis_perkara', $jenisPerkara);
    }

    /**
     * Scope untuk filter berdasarkan status putusan
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $statusPutus
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByStatusPutus($query, $statusPutus)
    {
        return $query->where('status_putus', $statusPutus);
    }

    /**
     * Scope untuk filter berdasarkan tahun
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $tahun
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByTahun($query, $tahun)
    {
        return $query->whereYear('tgl_put_banding', $tahun);
    }

    /**
     * Accessor untuk mendapatkan nama file put_rtf dengan path
     *
     * @return string|null
     */
    public function getPutRtfPathAttribute()
    {
        if (!$this->put_rtf) {
            return null;
        }
        return storage_path('app/public/bank_putusan/rtf/' . $this->put_rtf);
    }

    /**
     * Accessor untuk mendapatkan nama file put_anonim dengan path
     *
     * @return string|null
     */
    public function getPutAnonimPathAttribute()
    {
        if (!$this->put_anonim) {
            return null;
        }
        return storage_path('app/public/bank_putusan/anonim/' . $this->put_anonim);
    }

    /**
     * Accessor untuk URL download put_rtf
     *
     * @return string|null
     */
    public function getPutRtfUrlAttribute()
    {
        if (!$this->put_rtf) {
            return null;
        }
        return asset('storage/bank_putusan/rtf/' . $this->put_rtf);
    }

    /**
     * Accessor untuk URL download put_anonim
     *
     * @return string|null
     */
    public function getPutAnonimUrlAttribute()
    {
        if (!$this->put_anonim) {
            return null;
        }
        return asset('storage/bank_putusan/anonim/' . $this->put_anonim);
    }

    /**
     * Method untuk mengecek apakah file put_rtf exists
     *
     * @return bool
     */
    public function getPutRtfExistsAttribute()
    {
        if (!$this->put_rtf) {
            return false;
        }
        return file_exists(storage_path('app/public/bank_putusan/rtf/' . $this->put_rtf));
    }

    /**
     * Method untuk mengecek apakah file put_anonim exists
     *
     * @return bool
     */
    public function getPutAnonimExistsAttribute()
    {
        if (!$this->put_anonim) {
            return false;
        }
        return file_exists(storage_path('app/public/bank_putusan/anonim/' . $this->put_anonim));
    }

    /**
     * Method untuk mendapatkan data dengan pagination
     * (Alternatif jika ingin tetap menggunakan method allData() seperti sebelumnya)
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public static function getAllDataPaginated($perPage = 10)
    {
        return self::latest()->paginate($perPage);
    }

    /**
     * Method untuk mendapatkan detail data
     * (Alternatif jika ingin tetap menggunakan method detailData() seperti sebelumnya)
     *
     * @param int $id
     * @return \App\Models\BankputModel|null
     */
    public static function getDetailData($id)
    {
        return self::find($id);
    }

    /**
     * Method untuk menambah data
     * (Alternatif jika ingin tetap menggunakan method addData() seperti sebelumnya)
     *
     * @param array $data
     * @return \App\Models\BankputModel
     */
    public static function addNewData($data)
    {
        return self::create($data);
    }

    /**
     * Method untuk mengupdate data
     * (Alternatif jika ingin tetap menggunakan method editData() seperti sebelumnya)
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public static function updateData($id, $data)
    {
        return self::where('id', $id)->update($data);
    }

    /**
     * Method untuk menghapus data
     * (Alternatif jika ingin tetap menggunakan method deleteData() seperti sebelumnya)
     *
     * @param int $id
     * @return bool
     */
    public static function deleteData($id)
    {
        return self::where('id', $id)->delete();
    }
}
