<?php

namespace App\Models;

use App\Mail\NotifyKalibration;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class TempatWaktuKalibrasi extends Model
{
    use HasFactory;

    protected $table = 'tempat_waktu_kalibrasi';
    protected $fillable = [
        'tempat',
        'tahun',
        'tanggal'
    ];

    public function notify($tanggal)
    {
        Mail::to("admin@mail.com")->send(new NotifyKalibration($tanggal));
        return "Email Terkirim";
    }
}
