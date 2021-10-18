<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatWaktuKalibrasi extends Model
{
    use HasFactory;

    protected $table = 'tempat_waktu_kalibrasi';
    protected $fillable = [
        'tempat',
        'tahun',
        'tanggal'
    ];
}
