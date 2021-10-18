<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerkAlat extends Model
{
    use HasFactory;

    protected $table = 'merk_alat';
    protected $fillable = [
        'nama_merk'
    ];
}
