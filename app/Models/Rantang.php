<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rantang extends Model
{
    protected $fillable = [
        'kode_rantang',
        'lokasi_terakhir',
        'pemegang_terakhir',
        'kondisi',
    ];
}
