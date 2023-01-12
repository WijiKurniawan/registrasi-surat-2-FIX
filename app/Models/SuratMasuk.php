<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;
    protected $table = 'surat_masuk';
    protected $fillable = [
    'nomor_surat',
    'pengirim',
    'agenda',
    'perihal',
    'tgl_surat_masuk',
    'disposisi',
    'perintah',
    'catatan_KSOP',
    'catatan',
    'status',
    'dokumen',
    ];
}
