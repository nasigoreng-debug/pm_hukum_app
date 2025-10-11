<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $table = 'arsips';

    protected $fillable = [
        'no_banding',
        'no_pa',
        'jenis_perkara',
        'tgl_masuk',
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

    protected $casts = [
        'tgl_masuk' => 'date',
        'tgl_put_banding' => 'date',
        'tgl_alih_media' => 'date',
    ];
}