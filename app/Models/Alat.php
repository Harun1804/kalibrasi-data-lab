<?php

namespace App\Models;

use App\Models\MerkAlat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alat extends Model
{
    use HasFactory;

    protected $table = 'alat';
    protected $fillable = [
        'nama_alat',
        'merk_alat_id'
    ];

    public function merk()
    {
        return $this->belongsTo(MerkAlat::class);
    }
}
