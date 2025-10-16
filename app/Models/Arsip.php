<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    // TAMBAHKAN BARIS INI SAJA
    public $timestamps = false;

    protected $table = 'arsips';

    protected $fillable = [
        'tgl_masuk',
        'no_banding',
        'no_pa',
        'jenis_perkara',
        'tgl_put_banding',
        'penyerah',
        'penerima',
        'no_lemari',
        'no_laci',
        'no_box',
        'tgl_alih_media',
        'putusan',
        'bundel_b'
    ];
}
