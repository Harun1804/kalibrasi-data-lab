<?php

namespace App\Models;

use App\Models\Alat;
use App\Models\User;
use App\Models\Perusahaan;
use App\Models\TempatWaktuKalibrasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kalibrasi extends Model
{
    use HasFactory;

    protected $table = 'kalibrasi';
    protected $fillable = [
        'user_id',
        'alat_id',
        'perusahaan_id',
        'tempat_waktu_id',
        'scan',
        'tipe',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alat()
    {
        return $this->belongsTo(Alat::class);
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function tempatWaktu()
    {
        return $this->belongsTo(TempatWaktuKalibrasi::class);
    }

    public function getScanAttribute($value)
    {
        return url('storage/'.$value);
    }
}
