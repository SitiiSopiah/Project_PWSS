<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Petugas;

class Jadwal extends Model
{
    protected $fillable = [
        'tanggal',
        'wilayah_rt',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function petugas()
    {
        return $this->belongsToMany(
            Petugas::class,
            'jadwal_petugas',
            'jadwal_id',
            'petugas_id'
        );
    }
}