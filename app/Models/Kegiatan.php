<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';

    protected $fillable = [
        'judul', 'deskripsi', 'gambar', 'tanggal', 'tampil_di_home',
    ];

    protected $casts = [
        'tanggal'        => 'date',
        'tampil_di_home' => 'boolean',
    ];
}
