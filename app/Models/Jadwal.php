<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'petugas',
        'wilayah_rt',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function petugas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
