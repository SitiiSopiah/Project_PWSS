<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jadwal;

class Petugas extends Model
{
    protected $table = 'petugas';

    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'jabatan',
    ];

    public function jadwals()
    {
        return $this->belongsToMany(
            Jadwal::class,
            'jadwal_petugas',
            'petugas_id',
            'jadwal_id'
        );
    }
}