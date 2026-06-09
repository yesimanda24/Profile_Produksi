<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';

    protected $fillable = [
        'nama', 'jabatan', 'tim', 'foto', 'urutan', 'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function getFotoUrlAttribute(): string
    {
        if ($this->foto && file_exists(public_path('images/' . $this->foto))) {
            return asset('images/' . $this->foto);
        }
        return '';
    }
}
