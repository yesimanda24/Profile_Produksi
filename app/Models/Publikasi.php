<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    protected $table = 'publikasi';

    protected $fillable = [
        'judul', 'kategori', 'tahun', 'cover', 'file_pdf', 'tampil_di_home',
    ];

    protected $casts = [
        'tampil_di_home' => 'boolean',
    ];
}
