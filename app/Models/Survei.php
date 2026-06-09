<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survei extends Model
{
    protected $table = 'survei';

    protected $fillable = [
        'nama', 'tim', 'target', 'realisasi', 'progres',
        'tanggal_mulai', 'tanggal_selesai',
        'buku_pedoman', 'kuesioner', 'daftar_sampel', 'aktif',
    ];

    protected $casts = [
        'aktif'          => 'boolean',
        'tanggal_mulai'  => 'date',
        'tanggal_selesai'=> 'date',
    ];

    public function getStatusAttribute(): string
    {
        if ($this->progres >= 100) return 'Selesai';
        if ($this->progres == 0)  return 'Persiapan';
        return 'Berjalan';
    }
}
