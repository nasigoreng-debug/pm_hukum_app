<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_laporan',
        'tahun',
        'tgl_laporan',
        'judul',
        'dokumen',
        'konsep',
    ];

    protected $casts = [
        'tgl_laporan' => 'date',
    ];
}
